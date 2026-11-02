<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Community;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Daftar semua kegiatan dari komunitas approved (publik).
     */
    public function index(Request $request)
    {
        $query = Event::whereHas('community', function ($q) {
            $q->where('status', 'approved');
        })->with('community');

        if ($request->filled('filter')) {
            if ($request->filter === 'upcoming') {
                $query->where('event_date', '>=', now()->toDateString());
            } elseif ($request->filter === 'past') {
                $query->where('event_date', '<', now()->toDateString());
            }
        }

        $events = $query->orderBy('event_date', 'asc')->get();

        $registeredEventIds = [];
        if (Auth::check()) {
            $registeredEventIds = EventRegistration::where('user_id', Auth::id())
                ->pluck('event_id')
                ->toArray();
        }

        return view('kegiatan', compact('events', 'registeredEventIds'));
    }

    /**
     * Simpan kegiatan baru (hanya pembuat komunitas).
     */
    public function store(Request $request, $slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        if (!$community->isCreator(Auth::id())) {
            abort(403, 'Hanya pembuat komunitas yang bisa membuat kegiatan.');
        }

        $request->validate([
            'title' => 'required|min:3|max:150',
            'location' => 'required|min:3|max:150',
            'address' => 'nullable|max:255',
            'maps_url' => 'nullable|url|max:500',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'description' => 'nullable|max:1000',
        ], [
            'title.required' => 'Judul kegiatan wajib diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'location.required' => 'Lokasi wajib diisi.',
            'address.max' => 'Alamat maksimal 255 karakter.',
            'maps_url.url' => 'URL Google Maps tidak valid (harus diawali http/https).',
            'maps_url.max' => 'URL Google Maps maksimal 500 karakter.',
            'event_date.required' => 'Tanggal kegiatan wajib diisi.',
            'event_date.date' => 'Format tanggal tidak valid.',
            'event_time.date_format' => 'Format jam tidak valid (HH:MM 24 jam).',
            'description.max' => 'Deskripsi maksimal 1000 karakter.',
        ]);

        Event::create([
            'community_id' => $community->id,
            'title' => $request->title,
            'location' => $request->location,
            'address' => $request->address,
            'maps_url' => $request->maps_url,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Kegiatan berhasil dibuat!');
    }

    /**
     * Hapus kegiatan (pembuat atau admin).
     */
    public function destroy($id)
    {
        $event = Event::with('community')->findOrFail($id);

        $isCreator = $event->community && $event->community->isCreator(Auth::id());
        $isAdmin = Auth::user()->isAdmin();

        if (!$isCreator && !$isAdmin) {
            abort(403, 'Kamu tidak berhak menghapus kegiatan ini.');
        }

        $event->delete();

        return back()->with('success', 'Kegiatan berhasil dihapus.');
    }

    /**
     * Daftar kegiatan (user).
     */
    public function register($id)
    {
        $event = Event::with('community')->findOrFail($id);

        if (!$event->community || $event->community->status !== 'approved') {
            return back()->with('error', 'Kegiatan ini tidak tersedia.');
        }

        $exists = EventRegistration::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exists) {
            return back()->with('error', 'Kamu sudah terdaftar di kegiatan ini.');
        }

        EventRegistration::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Berhasil mendaftar kegiatan "' . $event->title . '"!');
    }

    /**
     * Batal daftar kegiatan (user).
     */
    public function unregister($id)
    {
        $event = Event::findOrFail($id);

        $deleted = EventRegistration::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->delete();

        if ($deleted) {
            return back()->with('success', 'Pendaftaran kegiatan dibatalkan.');
        }

        return back()->with('error', 'Kamu belum terdaftar di kegiatan ini.');
    }
}