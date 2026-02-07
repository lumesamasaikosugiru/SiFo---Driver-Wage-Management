<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WageClaimBonus extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'bonus_rule_id',
        'amoount',
    ];
}
