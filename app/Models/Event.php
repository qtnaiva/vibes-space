<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'community_id',
        'title',
        'location',
        'address',
        'maps_url',
        'event_date',
        'event_time',
        'description',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'event_registrations', 'event_id', 'user_id')
                    ->withTimestamps();
    }
}