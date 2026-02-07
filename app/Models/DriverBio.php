<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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


}
