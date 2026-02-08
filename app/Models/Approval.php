<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Approval extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'approved_by',
        'role',
        'status',
        'note',
        'approved_at',
    ];

    public function wageClaim(): BelongsTo
    {
        return $this->belongsTo(WageClaim::class, 'wage_claim_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
