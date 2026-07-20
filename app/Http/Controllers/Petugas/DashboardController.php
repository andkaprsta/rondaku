<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $hadir = Absensi::whereHas('jadwal', function ($q) use ($user) {
            $q->where('petugas_id', $user->id);
        })->where('status', 'hadir')->count();

        $tidakHadir = Absensi::whereHas('jadwal', function ($q) use ($user) {
            $q->where('petugas_id', $user->id);
        })->where('status', 'tidak_hadir')->count();

        $jumlahJadwal = Jadwal::where('petugas_id', $user->id)->count();

        $jadwalHariIni = Jadwal::where('petugas_id', $user->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        $riwayat = Absensi::with('jadwal')
            ->whereHas('jadwal', function ($q) use ($user) {
                $q->where('petugas_id', $user->id);
            })
            ->latest()
            ->take(5)
            ->get();

        // Data grafik 6 bulan terakhir
        $labels = [];
        $data = [];

        for ($i = 5; $i >= 0; $i--) {

            $bulan = Carbon::now()->subMonths($i);

            $labels[] = $bulan->translatedFormat('M');

            $data[] = Absensi::whereHas('jadwal', function ($q) use ($bulan, $user) {

                $q->where('petugas_id', $user->id)
                    ->whereMonth('tanggal', $bulan->month)
                    ->whereYear('tanggal', $bulan->year);
            })->count();
        }

        return view('petugas.dashboard', compact(
            'hadir',
            'tidakHadir',
            'jumlahJadwal',
            'jadwalHariIni',
            'riwayat',
            'labels',
            'data'
        ));
    }
}
