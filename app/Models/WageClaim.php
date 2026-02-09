<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WageClaim extends Model
{
    protected $fillable = [
        'driver_id',
        'period_start',
        'period_end',
        'period_key',
        'total_tarif',
        'total_bonus',
        'total_fee',
        'net_salary',
        'status',
        'created_by',
        'locked_at',
    ];

    public function wageClaimBonuses(): HasMany
    {
        return $this->hasMany(WageClaimBonus::class, 'wage_claim_id');
    }

    public function wageClaimDeduction(): HasMany
    {
        return $this->hasMany(WageClaimDeduction::class, 'wage_claim_id');
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(Approval::class, 'wage_claim_id');
    }

    //hasone

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class, 'wage_claim_id');
    }

    //belongsto

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
