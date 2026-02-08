<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobOrder extends Model
{
    protected $fillable = [
        'job_order_number',
        'vehicle_number',
        'load_address',
        'unload_address',
        'distance_km',
        'cargo_name',
        'load_tonnage',
        'unload_tonnage',
        'delivery_note_photo',
        'unload_note_photo',
        'status',
    ];

    public function ritase(): HasOne
    {
        return $this->hasOne(Ritase::class, 'job_order_id');
    }
}
