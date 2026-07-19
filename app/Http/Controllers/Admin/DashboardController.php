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
        // =========================
        // Statistik
        // =========================

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

        // =========================
        // Grafik 7 Hari Terakhir
        // =========================

        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {

            $tanggal = Carbon::today()->subDays($i);

            $labels[] = $tanggal->translatedFormat('d M');

            $data[] = Absensi::whereDate(
                'created_at',
                $tanggal
            )->count();
        }

        // =========================
        // Absensi Terbaru
        // =========================

        $absensiTerbaru = Absensi::with('jadwal.petugas')

            ->latest()

            ->take(5)

            ->get();

        return view('admin.dashboard', compact(

            'jumlahWarga',

            'jumlahPetugas',

            'jadwalHariIni',

            'absensiHariIni',

            'labels',

            'data',

            'absensiTerbaru'

        ));
    }
}
