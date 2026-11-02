<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    public function index()
    {
        $pendingCount = Community::where('status', 'pending')->count();
        return view('admin-pengajuan', compact('pendingCount'));
    }

    public function data()
    {
        $rows = Community::with('creator:id,name,email')
            ->latest()
            ->get()
            ->map(fn (Community $c) => [
                'slug'          => $c->slug,
                'name'          => $c->name,
                'category'      => $c->category,
                'description'   => $c->description,
                'cover'         => $c->cover,
                'status'        => $c->status,
                'reject_reason' => $c->reject_reason,
                'creator'       => $c->creator?->name,
                'creator_email' => $c->creator?->email,
                'created'       => optional($c->created_at)->translatedFormat('d M Y'),
            ]);

        return response()->json(['submissions' => $rows]);
    }

    public function approve(string $slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        DB::transaction(function () use ($community) {
            $community->update([
                'status'        => 'approved',
                'reject_reason' => null,
            ]);
            if ($community->creator && $community->creator->role === 'anggota') {
                $community->creator->update(['role' => 'pembuat']);
            }
        });

        return response()->json(['message' => 'Komunitas disetujui.']);
    }

    public function reject(Request $request, string $slug)
    {
        $validated = $request->validate([
            'reason' => 'nullable|string|max:500',
        ]);

        $community = Community::where('slug', $slug)->firstOrFail();
        $community->update([
            'status'        => 'rejected',
            'reject_reason' => $validated['reason'] ?? 'Tidak memenuhi kriteria',
        ]);

        return response()->json(['message' => 'Komunitas ditolak.']);
    }
}