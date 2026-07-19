<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Warga;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahWarga = Warga::count();

        $jumlahPetugas = User::where('role', 'petugas')->count();

        $jadwalHariIni = Jadwal::whereDate(
            'tanggal',
            Carbon::today()
        )->count();

        $absensiHariIni = Absensi::whereDate(
            'created_at',
            Carbon::today()
        )->count();

        return view('admin.dashboard', compact(
            'jumlahWarga',
            'jumlahPetugas',
            'jadwalHariIni',
            'absensiHariIni'
        ));
    }
}
