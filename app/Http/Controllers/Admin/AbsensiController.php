<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    /**
     * Menampilkan rekap absensi.
     */
    public function index()
    {
        $absensis = Absensi::with([
            'warga',
            'jadwal.petugas'
        ])
            ->latest()
            ->get();

        return view('admin.absensi.index', compact('absensis'));
    }
}
