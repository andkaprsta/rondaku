<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Warga;
use Carbon\Carbon;

class LandingController extends Controller
{
    public function index()
    {
        $jumlahWarga = Warga::count();

        $jumlahPetugas = User::where('role', 'petugas')->count();

        $jumlahJadwal = Jadwal::whereDate('tanggal', '>=', now())->count();

        $jumlahAbsensi = Absensi::count();


Carbon::setLocale('id');

$urutanHari = [
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday',
];

$semuaJadwal = Jadwal::with('petugas')->get();

$jadwalMinggu = collect();

foreach ($urutanHari as $hari) {

    $jadwalMinggu[$hari] = $semuaJadwal->filter(function ($jadwal) use ($hari) {

        return Carbon::parse($jadwal->tanggal)->englishDayOfWeek === $hari;

    });

}

        return view('landing', compact(
            'jumlahWarga',
            'jumlahPetugas',
            'jumlahJadwal',
            'jumlahAbsensi',
            'jadwalMinggu'
        ));
    }
}
