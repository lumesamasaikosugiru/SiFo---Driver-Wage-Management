<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusRules extends Model
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
}
