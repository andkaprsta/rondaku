<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Menampilkan semua data warga
     */
    public function index()
    {
        $warga = Warga::all();

        return view('warga.index', compact('warga'));
    }

    /**
     * Menampilkan form tambah warga
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Menyimpan data warga
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        Warga::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit warga
     */
    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    /**
     * Mengupdate data warga
     */
    public function update(Request $request, Warga $warga)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $warga->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diupdate');
    }

    /**
     * Menghapus data warga
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus');
    }
}
