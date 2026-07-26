<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $now = Carbon::now('Asia/Jakarta');

        // Setelah tengah malam sampai jam 04.00 tetap memakai jadwal kemarin
        if ($now->hour < 4) {
            $tanggalJadwal = $now->copy()->subDay()->toDateString();
        } else {
            $tanggalJadwal = $now->toDateString();
        }

        $jadwal = Jadwal::where('petugas_id', $user->id)
            ->whereDate('tanggal', $tanggalJadwal)
            ->first();

        $absensi = null;
        $sudahAbsen = false;

        if ($jadwal) {

            $absensi = Absensi::where('jadwal_id', $jadwal->id)->first();

            if ($absensi && $absensi->status == 'hadir') {
                $sudahAbsen = true;
            }
        }

        return view('petugas.absensi.index', compact(
            'jadwal',
            'absensi',
            'sudahAbsen'
        ));
    }

    public function store(Request $request)
    {
        $now = Carbon::now('Asia/Jakarta');

        // Hanya boleh absen pukul 22:00 - 04:00
        if ($now->hour >= 22) {

            $tanggalRonda = $now->toDateString();
        } elseif ($now->hour < 4) {

            $tanggalRonda = $now->copy()->subDay()->toDateString();
        } else {

            return back()->with(
                'error',
                'Absensi hanya dapat dilakukan pukul 22.00 sampai 04.00 WIB.'
            );
        }

        $jadwal = Jadwal::where('petugas_id', auth()->id())
            ->whereDate('tanggal', $tanggalRonda)
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Anda tidak memiliki jadwal ronda.');
        }

        $absensi = Absensi::where('jadwal_id', $jadwal->id)->first();

        if (!$absensi) {
            return back()->with('error', 'Data absensi tidak ditemukan.');
        }

        if ($absensi->status == 'hadir') {
            return back()->with('error', 'Anda sudah melakukan absensi.');
        }

        $absensi->update([
            'status' => 'hadir'
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Melakukan absensi'
        ]);

        return back()->with('success', 'Absensi berhasil dilakukan.');
    }
}
