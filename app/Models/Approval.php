<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
        'wage_claim_id',
        'approved_by',
        'role',
        'status',
        'note',
        'approved_at',
    ];
}
