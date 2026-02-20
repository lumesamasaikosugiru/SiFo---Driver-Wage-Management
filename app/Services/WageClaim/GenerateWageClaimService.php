<?php

namespace App\Services\WageClaim;

use App\Models\{
    WageClaim,
    BonusRule,
    Ritase
};
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use RuntimeException;

class GenerateWageClaimService
{
    public function generate(int $driverId, Carbon $periodDate): WageClaim
    {
        // 1️⃣ Tentukan periode (bulanan)
        $periodStart = $periodDate->copy()->startOfMonth();
        $periodEnd = $periodDate->copy()->endOfMonth();
        $periodKey = $periodDate->format('Y-m');

        // 2️⃣ Cegah double wage claim
        if (
            WageClaim::where('driver_id', $driverId)
                ->where('period_key', $periodKey)
                ->exists()
        ) {
            throw new RuntimeException('Wage claim untuk periode ini sudah ada.');
        }

        // 3️⃣ Ambil ritase valid
        $ritases = Ritase::query()
            ->where('driver_id', $driverId)
            ->whereBetween('date', [$periodStart, $periodEnd])
            ->where('status', 'completed')
            ->whereNull('locked_at')
            ->get();

        if ($ritases->isEmpty()) {
            throw new RuntimeException('Tidak ada ritase valid untuk periode ini.');
        }

        // 4️⃣ Hitung total dasar
        $totalRitase = $ritases->count();
        $totalTarif = $ritases->sum('tarif');

        // 5️⃣ Hitung bonus
        $bonusResults = [];
        $totalBonus = 0;

        $bonusRules = BonusRule::query()
            ->where('is_active', true)
            ->where(function ($q) use ($periodStart, $periodEnd) {
                $q->whereNull('valid_from')
                    ->orWhere('valid_from', '<=', $periodEnd);
            })
            ->where(function ($q) use ($periodStart) {
                $q->whereNull('valid_until')
                    ->orWhere('valid_until', '>=', $periodStart);
            })
            ->get();

        foreach ($bonusRules as $rule) {
            if ($rule->type === 'ritase') {
                if (
                    $totalRitase >= $rule->min_value &&
                    $totalRitase <= $rule->max_value
                ) {
                    $bonusResults[] = [
                        'bonus_rule_id' => $rule->id,
                        'name' => $rule->name, // snapshot
                        'amount' => $rule->bonus_value,
                    ];

                    $totalBonus += $rule->bonus_value;
                }
            }
        }

        // 6️⃣ Simpan semuanya (TRANSACTION)
        return DB::transaction(function () use ($driverId, $periodStart, $periodEnd, $periodKey, $totalRitase, $totalTarif, $totalBonus, $bonusResults, $ritases) {

            // 6.1 Simpan wage claim
            $wageClaim = WageClaim::create([
                'driver_id' => $driverId,
                'period_start' => $periodStart,
                'period_end' => $periodEnd,
                'period_key' => $periodKey,
                'total_ritase' => $totalRitase,
                'total_tarif' => $totalTarif,
                'total_bonus' => $totalBonus,
                'total_deduction' => 0,
                'net_salary' => $totalTarif + $totalBonus,
                'status' => 'draft',
                'created_by' => auth()->id(),
            ]);

            // 6.2 Simpan bonus snapshot
            foreach ($bonusResults as $bonus) {
                $wageClaim->bonuses()->create($bonus);
            }

            // 6.3 Lock ritase
            Ritase::whereIn('id', $ritases->pluck('id'))
                ->update([
                    'locked_at' => now(),
                ]);

            return $wageClaim;
        });
    }
}
