<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('petugas')->get();

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $petugas = User::where('role', 'petugas')->get();

        return view('jadwal.create', compact('petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'petugas_id' => 'required|exists:users,id',
        ]);

        Jadwal::create([
            'tanggal' => $request->tanggal,
            'petugas_id' => $request->petugas_id,
        ]);

        return redirect()->route('jadwal.index')
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

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
