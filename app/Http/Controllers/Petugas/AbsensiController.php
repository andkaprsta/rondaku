<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    /**
     * Dashboard Absensi Petugas
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Cari jadwal petugas hari ini
        $jadwal = Jadwal::where('petugas_id', $user->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        // Cek apakah sudah absen
        $absensi = null;

        if ($jadwal) {
            $absensi = Absensi::where('jadwal_id', $jadwal->id)
                ->where('warga_id', $user->warga_id)
                ->first();
        }

        return view('petugas.absensi.index', compact(
            'jadwal',
            'absensi'
        ));
    }

    /**
     * Simpan Absensi
     */
    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $jadwal = Jadwal::where('petugas_id', $user->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if (!$jadwal) {
            return back()->with(
                'error',
                'Anda tidak memiliki jadwal ronda hari ini.'
            );
        }

        $cek = Absensi::where('jadwal_id', $jadwal->id)
            ->where('warga_id', $user->warga_id)
            ->first();

        if ($cek) {
            return back()->with(
                'error',
                'Anda sudah melakukan absensi.'
            );
        }

        Absensi::create([
            'jadwal_id' => $jadwal->id,
            'warga_id' => $user->warga_id,
            'status' => 'hadir'
        ]);

        return back()->with(
            'success',
            'Absensi berhasil.'
        );
    }
}
