<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TourPackage extends Model
{
    protected $fillable = [
        'slug', 'title', 'subtitle', 'category', 'duration', 'duration_days',
        'price', 'stars', 'reviews_count', 'overview', 'image_path',
        'inclusions', 'exclusions', 'is_active', 'is_spotlight',
    ];

    protected $casts = [
        'inclusions'   => 'array',
        'exclusions'   => 'array',
        'is_active'    => 'boolean',
        'is_spotlight' => 'boolean',
    ];

    public function itineraryDays(): HasMany
    {
        return $this->hasMany(ItineraryDay::class)->orderBy('day_number');
    }

    public function images(): HasMany
    {
        return $this->hasMany(PackageImage::class)->orderBy('sort_order');
    }

    public function getFormattedPriceAttribute(): string
    {
        return '৳' . number_format($this->price);
    }
}
