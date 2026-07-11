<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug', 'title', 'subtitle', 'icon', 'overview',
        'benefits', 'steps', 'form_fields_html', 'faqs', 'is_active',
    ];

    protected $casts = [
        'benefits'  => 'array',
        'steps'     => 'array',
        'faqs'      => 'array',
        'is_active' => 'boolean',
    ];
}
