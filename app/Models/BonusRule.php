<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BonusRule extends Model
{
    protected $fillable = [
        'name',
        'type',
        'min_value',
        'max_value',
        'bonus_value',
        'route_category_id',
        'is_active',
        'valid_from',
        'valid_until',
    ];

    public function wageClaimBonuses(): HasMany
    {
        return $this->hasMany(WageClaimBonus::class, 'bonus_rule_id');
    }

    public function routeCategory(): BelongsTo
    {
        return $this->belongsTo(RouteCategory::class, 'route_category_id');
    }
}
