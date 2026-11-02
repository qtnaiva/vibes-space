<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'avatar'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function communities()
    {
        return $this->hasMany(Community::class, 'creator_id');
    }

    public function joinedCommunities()
    {
        return $this->belongsToMany(Community::class, 'community_members', 'user_id', 'community_id')
                    ->withTimestamps();
    }

    public function registeredEvents()
    {
        return $this->belongsToMany(Event::class, 'event_registrations', 'user_id', 'event_id')
                    ->withTimestamps();
    }

    public function isAdmin(): bool   { return $this->role === 'admin'; }
    public function isPembuat(): bool { return $this->role === 'pembuat'; }
    public function isAnggota(): bool { return $this->role === 'anggota'; }
}