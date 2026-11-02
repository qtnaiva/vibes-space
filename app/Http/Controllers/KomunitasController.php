<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    // ... method lain (index, store, dll) ...

    public function detail($slug)
    {
        $community = Community::with(['creator'])
            ->where('slug', $slug)
            ->firstOrFail();

        $user = auth()->user();

        $isCreator = $user && $user->id === $community->creator_id;
        $isMember  = $user && $community->members()->where('user_id', $user->id)->exists();
        $canSeeMembers = $isCreator || $isMember;

        // Kegiatan mendatang dari komunitas ini
        $events = $community->events()
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        // Event IDs yang sudah didaftari user
        $registeredEventIds = $user
            ? $user->registeredEvents()->pluck('events.id')->toArray()
            : [];

        // Ambil beberapa anggota untuk sidebar
        $members = $community->members()->take(10)->get();

        return view('detail-komunitas', compact(
            'community',
            'events',
            'members',
            'isCreator',
            'isMember',
            'canSeeMembers',
            'registeredEventIds'
        ));
    }
}