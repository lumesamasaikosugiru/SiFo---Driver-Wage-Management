<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WageClaimDeduction extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'type',
        'description',
        'amount',
        'evidence',
    ];

    public function wageClaim(): BelongsTo
    {
        return $this->belongsTo(WageClaim::class, 'wage_claim_id');
    }
}
