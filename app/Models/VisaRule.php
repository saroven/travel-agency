<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VisaRule extends Model
{
    protected $fillable = ['country_code', 'title', 'price', 'processing_time'];

    public function requirements(): HasMany
    {
        return $this->hasMany(VisaRequirement::class)->orderBy('sort_order');
    }

    public function requirementsByOccupation(string $occupation)
    {
        return $this->requirements()->where('occupation', $occupation)->get();
    }

    public function getFormattedPriceAttribute(): string
    {
        return '৳' . number_format($this->price);
    }
}
