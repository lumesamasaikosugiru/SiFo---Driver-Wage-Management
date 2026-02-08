<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'date_paid',
        'method',
        'proof',
        'paid_by',
    ];

    public function wageClaim(): BelongsTo
    {
        return $this->belongsTo(WageClaim::class, 'wage_claim_id');
    }

    public function paidBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'paid_by');
    }
}
