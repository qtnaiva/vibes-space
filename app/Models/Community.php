<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Community extends Model
{
    protected $fillable = [
        'creator_id', 'slug', 'name', 'category', 'category_slug',
        'description', 'cover', 'status', 'reject_reason', 'members_count',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'community_members', 'community_id', 'user_id')
                    ->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function isCreator($userId): bool
    {
        return $this->creator_id == $userId;
    }

    public function hasMember($userId): bool
    {
        return $this->members()->where('user_id', $userId)->exists();
    }
}