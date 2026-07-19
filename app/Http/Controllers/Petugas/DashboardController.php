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

        // Jadwal hari ini milik petugas
        $jadwalHariIni = Jadwal::where('petugas_id', $user->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        // Sudah absen atau belum
        $sudahAbsen = false;

        if ($jadwalHariIni) {

            $sudahAbsen = Absensi::where('jadwal_id', $jadwalHariIni->id)
                ->exists();
        }

        // Total absensi petugas
        $totalAbsensi = Absensi::whereHas('jadwal', function ($q) use ($user) {
            $q->where('petugas_id', $user->id);
        })->count();

        // Riwayat 5 absensi terakhir
        $riwayat = Absensi::with('jadwal')
            ->whereHas('jadwal', function ($q) use ($user) {
                $q->where('petugas_id', $user->id);
            })
            ->latest()
            ->take(5)
            ->get();

        return view('petugas.dashboard', compact(
            'jadwalHariIni',
            'sudahAbsen',
            'totalAbsensi',
            'riwayat'
        ));
    }
}
