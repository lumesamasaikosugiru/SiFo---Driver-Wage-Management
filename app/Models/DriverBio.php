<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverBio extends Model
{
    protected $fillable = [
        'driver_id',
        'fullname',
        'jk',
        'date_birth',
        'place_birth',
        'address',
        'medical_history',
        'no_tlp',
        'no_emergency',
        'status',
    ];
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

}
