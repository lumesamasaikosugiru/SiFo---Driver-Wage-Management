<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    protected $fillable = [
        'user_id',
        'driver_code',
        'no_license',
        'status',
    ];

    public function wageClaims(): HasMany
    {
        return $this->hasMany(WageClaim::class, 'driver_id');
    }

    public function driverBio(): HasOne
    {
        return $this->hasOne(DriverBio::class, 'driver_id');
    }

    public function getFullnameAttribute()
    {
        return $this->driverBio?->fullname;
    }

    public function ritases(): HasMany
    {
        return $this->hasMany(Ritase::class, 'driver_id');
    }

    //belongsto

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
