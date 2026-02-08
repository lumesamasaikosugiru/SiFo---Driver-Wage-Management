<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WageClaimBonus extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'bonus_rule_id',
        'amoount',
    ];

    public function wageClaim(): BelongsTo
    {
        return $this->belongsTo(WageClaimBonus::class, 'wage_claim_id');
    }

    public function bonusRule(): BelongsTo
    {
        return $this->belongsTo(BonusRules::class, 'bonus_rule_id');
    }
}
