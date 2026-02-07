<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ritase extends Model
{
    protected $fillable = [
        'driver_id',
        'route_id',
        'job_order_id',
        'date',
        'tarif',
        'status',
        'locked_by',
        'locked_at',
    ];
}
