<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Warga;

class LandingController extends Controller
{
    public function index()
    {
        $jumlahWarga = Warga::count();

        $jumlahPetugas = User::where('role', 'petugas')->count();

        $jumlahJadwal = Jadwal::whereDate('tanggal', '>=', now())->count();

        $jumlahAbsensi = Absensi::count();

        $jadwalMinggu = Jadwal::with('petugas')
            ->orderBy('tanggal')
            ->get()
            ->groupBy(function ($item) {
                return $item->tanggal;
            });

        return view('landing', compact(
            'jumlahWarga',
            'jumlahPetugas',
            'jumlahJadwal',
            'jumlahAbsensi',
            'jadwalMinggu'
        ));
    }
}
