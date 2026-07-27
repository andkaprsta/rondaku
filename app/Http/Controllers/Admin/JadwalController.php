<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $jadwals = Jadwal::with('petugas')

            ->when($keyword, function ($query) use ($keyword) {

                $query->whereHas('petugas', function ($q) use ($keyword) {

                    $q->where('name', 'like', "%{$keyword}%");
                });
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('jadwal.index', compact('jadwals'));
    }
    public function create(Request $request)
    {
        $petugas = User::where('role', 'petugas')->get();

        $tanggal = $request->tanggal;

        return view(
            'jadwal.create',
            compact('petugas', 'tanggal')
        );
    }
    public function store(Request $request)
    {
        $request->validate([
            'petugas_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
        ]);

        $jadwal = Jadwal::create([
            'petugas_id' => $request->petugas_id,
            'tanggal' => $request->tanggal,
        ]);

        Absensi::create([
            'jadwal_id' => $jadwal->id,
            'status' => 'tidak_hadir',
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $petugas = User::where('role', 'petugas')->get();

        return view('jadwal.edit', compact('jadwal', 'petugas'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'petugas_id' => 'required|exists:users,id',
        ]);

        $jadwal->update([
            'tanggal' => $request->tanggal,
            'petugas_id' => $request->petugas_id,
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diubah.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }

    public function calendar()
    {
        return view('admin.jadwal.calendar');
    }

    public function events()
    {
        $jadwals = Jadwal::with('petugas')->get();

        $events = [];

        foreach ($jadwals as $jadwal) {

            $events[] = [

                'id' => $jadwal->id,

                'title' => $jadwal->petugas->name,

                'start' => $jadwal->tanggal,

                'color' => '#2563eb'

            ];
        }

        return response()->json($events);
    }

    public function event($id)
    {
        $jadwal = Jadwal::with('petugas')->findOrFail($id);

        return response()->json([
            'id' => $jadwal->id,
            'petugas' => $jadwal->petugas->name,
            'tanggal' => $jadwal->tanggal,
        ]);
    }

    public function destroyEvent($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jadwal berhasil dihapus.'
        ]);
    }
    
}
