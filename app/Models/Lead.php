<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'type', 'source_page', 'name', 'phone', 'email',
        'destination', 'travel_date', 'budget', 'plan_details',
        'service_slug', 'extra_data', 'status', 'admin_notes', 'assigned_to',
    ];

    protected $casts = [
        'extra_data'  => 'array',
        'travel_date' => 'date',
    ];

    protected static function booted()
    {
        static::created(function ($lead) {
            try {
                dispatch(new \App\Jobs\SendLeadNotification($lead));
            } catch (\Exception $e) {
                \Log::error('Lead notification dispatch failure: ' . $e->getMessage());
            }
        });
    }

    public function getStatusBadgeColorAttribute(): string
    {
        return match($this->status) {
            'new'         => 'emerald',
            'contacted'   => 'blue',
            'in_progress' => 'amber',
            'completed'   => 'slate',
            'cancelled'   => 'red',
            default       => 'slate',
        };
    }

    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('type', $type);
    }
}
