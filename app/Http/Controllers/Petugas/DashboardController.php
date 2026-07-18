<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cari jadwal petugas hari ini
        $jadwal = Jadwal::where('petugas_id', $user->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        $sudahAbsen = false;

        if ($jadwal) {
            $sudahAbsen = Absensi::where('jadwal_id', $jadwal->id)
                ->exists();
        }

        return view('petugas.dashboard', compact(
            'jadwal',
            'sudahAbsen'
        ));
    }
}
