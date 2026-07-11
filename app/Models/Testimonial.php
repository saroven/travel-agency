<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'company_or_title',
        'quote',
        'stars',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'stars' => 'integer',
    ];
}
