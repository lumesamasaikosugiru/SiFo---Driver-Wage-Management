<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteCategory extends Model
{
    protected $fillable = [
        'name',
        'valid_from',
        'valid_until',
    ];
}
