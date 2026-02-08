<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    protected $fillable = [
        'route_category_id',
        'name',
        'fee',
    ];

    public function ritases(): HasMany
    {
        return $this->hasMany(Ritase::class, 'route_id');
    }

    public function routeCategory(): BelongsTo
    {
        return $this->belongsTo(RouteCategory::class, 'route_category_id');
    }
}
