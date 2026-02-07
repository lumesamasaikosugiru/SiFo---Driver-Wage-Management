<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WageClaim extends Model
{
    protected $fillable = [
        'driver_id',
        'priod_start',
        'priod_end',
        'priod_key',
        'total_tarif',
        'total_bonus',
        'total_fee',
        'net_salary',
        'status',
        'created_by',
        'locked_at',
    ];
}
