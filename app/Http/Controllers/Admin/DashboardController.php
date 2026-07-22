<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Warga;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // Statistik
        // =========================

        $jumlahWarga = Warga::count();

        $jumlahPetugas = User::where('role', 'petugas')->count();

        $jumlahJadwal = Jadwal::count();

        $jumlahAbsensi = Absensi::count();
        $jadwalHariIni = Jadwal::whereDate('tanggal', today())->count();

        $absensiHariIni = Absensi::whereDate('created_at', today())->count();

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

        $activities = ActivityLog::with('user')
            ->latest()
            ->take(8)
            ->get();

        $recentAbsensi = Absensi::with('jadwal.petugas')
            ->latest()
            ->take(5)
            ->get();

        // =========================
        // Notifikasi Dashboard
        // =========================

        $jadwalHariIniNotif = Jadwal::whereDate('tanggal', today())->count();

        $jadwalBesok = Jadwal::whereDate('tanggal', today()->addDay())->count();

        $hadirHariIni = Absensi::whereDate('created_at', today())
            ->where('status', 'hadir')
            ->count();

        $belumAbsenHariIni = Jadwal::whereDate('tanggal', today())->count() - $hadirHariIni;

        if ($belumAbsenHariIni < 0) {
            $belumAbsenHariIni = 0;
        }

        // =========================
        // Top 5 Petugas Terajin
        // =========================

        $topPetugas = User::select(
            'users.id',
            'users.name',
            DB::raw('COUNT(absensi.id) as total_hadir')
        )
            ->leftJoin('jadwal', 'users.id', '=', 'jadwal.petugas_id')
            ->leftJoin('absensi', function ($join) {
                $join->on('jadwal.id', '=', 'absensi.jadwal_id')
                    ->where('absensi.status', 'hadir');
            })
            ->where('users.role', 'petugas')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_hadir')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(

            'jumlahWarga',

            'jumlahPetugas',

            'jadwalHariIni',

            'absensiHariIni',

            'labels',

            'data',

            'absensiTerbaru',

            'activities',
            'recentAbsensi',
            'jadwalHariIniNotif',
            'jadwalBesok',
            'hadirHariIni',
            'belumAbsenHariIni',
            'topPetugas'
        ));
    }
}
