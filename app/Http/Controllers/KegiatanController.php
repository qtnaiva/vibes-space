<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil event beserta komunitasnya
        $events = Event::with(['community' => function ($q) {
                $q->select('id', 'slug', 'name', 'creator_id');
            }])
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        $registeredEventIds = [];
        $joinedCommunityIds = [];

        if ($user) {
            // 1. Ambil ID event yang sudah didaftari user
            $registeredEventIds = $user->registeredEvents()->pluck('events.id')->toArray();
            
            // 2. Ambil ID komunitas yang di-join user
            $joinedCommunityIds = $user->joinedCommunities()->pluck('communities.id')->toArray();
            
            // 3. Ambil ID komunitas yang dibuat user (pembuat otomatis jadi member)
            $createdIds = $user->communities()->pluck('id')->toArray();
            
            // Gabungkan komunitas yang di-join dan yang dibuat
            $joinedCommunityIds = array_unique(array_merge($joinedCommunityIds, $createdIds));
        }

        // Suntikkan flag is_member dan is_registered ke setiap event
        $events->each(function ($event) use ($joinedCommunityIds, $registeredEventIds) {
            $communityId = $event->community ? $event->community->id : null;
            
            $event->is_member = $communityId && in_array($communityId, $joinedCommunityIds);
            $event->is_registered = in_array($event->id, $registeredEventIds);
        });

        // Kirim ke view sebagai array
        return view('kegiatan', [
            'events' => $events->toArray(),
            'registeredEventIds' => $registeredEventIds,
            'joinedCommunityIds' => $joinedCommunityIds
        ]);
    }

    public function register($eventId)
    {
        $user = auth()->user();
        $event = Event::with('community')->findOrFail($eventId);

        // Validasi Server: Cek apakah user benar-benar anggota komunitas
        $isMember = $user->joinedCommunities()->where('communities.id', $event->community->id)->exists();
        $isCreator = $event->community->creator_id === $user->id;
        
        if (!$isMember && !$isCreator) {
            return back()->with('error', 'Kamu harus bergabung dengan komunitas ini dulu untuk mengikuti kegiatan.');
        }

        // Simpan pendaftaran jika belum ada
        if (!$user->registeredEvents()->where('events.id', $event->id)->exists()) {
            $user->registeredEvents()->attach($event->id);
        }

        return back()->with('success', 'Berhasil mengikuti kegiatan!');
    }

    public function unregister($eventId)
    {
        $user = auth()->user();
        
        // Hapus pendaftaran
        $user->registeredEvents()->detach($eventId);

        return back()->with('success', 'Pendaftaran kegiatan berhasil dibatalkan.');
    }
}