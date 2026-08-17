<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'event_date',
        'location',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', now());
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('event_date');
    }
}
