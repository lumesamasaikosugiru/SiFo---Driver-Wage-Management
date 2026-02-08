<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RouteCategory extends Model
{
    protected $fillable = [
        'name',
        'valid_from',
        'valid_until',
    ];

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class, 'routes_category_id');
    }
}
