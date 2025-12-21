<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistributionPoint extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'fanpage',
        'website',
        'latitude',
        'longitude',
        'province',
        'district',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
