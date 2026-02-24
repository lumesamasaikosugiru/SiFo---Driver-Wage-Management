<?php

namespace App\Services\WageClaim;

use App\Models\WageClaim;
use App\Models\BonusRule;
use App\Models\Ritase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

class GenerateWageClaimService
{
    public function generate(int $driverId, Carbon $periodDate): ?WageClaim
    {
        try {
            /* =====================================================
             * 1. Tentukan periode
             * ===================================================== */
            $periodStart = $periodDate->copy()->startOfMonth();
            $periodEnd = $periodDate->copy()->endOfMonth();
            $periodKey = $periodDate->format('Y-m');

            /* =====================================================
             * 2. Cegah double claim
             * ===================================================== */
            if (
                WageClaim::where('driver_id', $driverId)
                    ->where('period_key', $periodKey)
                    ->exists()
            ) {
                return $this->notifyError(
                    'Wage claim sudah ada',
                    'Driver ini sudah memiliki wage claim pada periode tersebut.'
                );
            }

            /* =====================================================
             * 3. Ambil ritase valid
             * ===================================================== */
            $ritases = Ritase::query()
                ->where('driver_id', $driverId)
                ->whereBetween('date', [$periodStart, $periodEnd])
                ->where('status', 'draft')
                ->whereNull('locked_at')
                ->get();

            if ($ritases->isEmpty()) {
                return $this->notifyError(
                    'Tidak ada ritase',
                    'Tidak ditemukan ritase valid pada periode ini.'
                );
            }

            /* =====================================================
             * 4. Hitung dasar
             * ===================================================== */
            $totalRitase = $ritases->count();

            // ⚠️ PASTIKAN kolom ini benar sesuai DB
            $totalTarif = $ritases->sum('tarif');

            /* =====================================================
             * 5. Hitung bonus (sementara: ritase)
             * ===================================================== */
            $totalBonus = 0;
            $bonusSnapshots = [];

            $bonusRules = BonusRule::where('is_active', true)->get();

            foreach ($bonusRules as $rule) {
                if (
                    $rule->type === 'ritase'
                    && $totalRitase >= $rule->min_value
                    && $totalRitase <= $rule->max_value
                ) {
                    $totalBonus += $rule->bonus_value;

                    $bonusSnapshots[] = [
                        'bonus_rule_id' => $rule->id,
                        'name' => $rule->name,
                        'amount' => $rule->bonus_value,
                    ];
                }
            }

            /* =====================================================
             * 6. Deduction & Fee (sementara 0)
             * ===================================================== */
            $totalDeduction = 0;
            $totalFee = 0;

            /* =====================================================
             * 7. Net salary
             * ===================================================== */
            $totalNetSalary =
                $totalTarif
                + $totalBonus
                - $totalDeduction
                - $totalFee;

            if ($totalNetSalary < 0) {
                return $this->notifyError(
                    'Perhitungan tidak valid',
                    'Total gaji bersih bernilai negatif.'
                );
            }

            /* =====================================================
             * 8. SIMPAN (TRANSACTION)
             * ===================================================== */
            $wageClaim = DB::transaction(function () use ($driverId, $periodStart, $periodEnd, $periodKey, $totalRitase, $totalTarif, $totalBonus, $totalDeduction, $totalFee, $totalNetSalary, $bonusSnapshots, $ritases) {
                $wageClaim = WageClaim::create([
                    'driver_id' => $driverId,
                    'period_start' => $periodStart,
                    'period_end' => $periodEnd,
                    'period_key' => $periodKey,
                    'total_ritase' => $totalRitase,
                    'total_tarif' => $totalTarif,
                    'total_bonus' => $totalBonus,
                    'total_deduction' => $totalDeduction,
                    'total_fee' => $totalFee,
                    'total_net_salary' => $totalNetSalary,
                    'status' => 'draft',
                    'created_by' => auth()->id() ?? 1,
                ]);

                foreach ($bonusSnapshots as $bonus) {
                    $wageClaim->wageClaimBonuses()->create($bonus);
                }

                Ritase::whereIn('id', $ritases->pluck('id'))
                    ->update([
                        'locked_at' => now(),
                    ]);

                return $wageClaim;
            });

            /* =====================================================
             * 9. Notifikasi sukses
             * ===================================================== */
            Notification::make()
                ->title('Wage claim berhasil dibuat')
                ->body("Periode {$periodKey}")
                ->success()
                ->send();

            return $wageClaim;

        } catch (\Throwable $e) {

            // 🔥 INI PENTING UNTUK DEBUG
            Notification::make()
                ->title('Generate wage claim gagal')
                ->body($e->getMessage())
                ->danger()
                ->send();

            report($e);

            return null;
        }
    }

    /* =========================================================
     * Helper notif error
     * ========================================================= */
    protected function notifyError(string $title, string $message): null
    {
        Notification::make()
            ->title($title)
            ->body($message)
            ->danger()
            ->send();

        return null;
    }
}