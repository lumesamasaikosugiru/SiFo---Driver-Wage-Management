<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WageClaimDeduction extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'type',
        'description',
        'amount',
        'evidence',
    ];
}
