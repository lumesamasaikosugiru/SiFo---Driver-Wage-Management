<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'date_paid',
        'method',
        'proof',
        'paid_by',
    ];
}
