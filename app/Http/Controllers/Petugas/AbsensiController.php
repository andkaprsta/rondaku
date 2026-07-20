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

        $jadwal = Jadwal::where('petugas_id', $user->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        $absensi = null;
        $sudahAbsen = false;

        if ($jadwal) {

            $absensi = Absensi::where('jadwal_id', $jadwal->id)
                ->first();

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
        $jadwal = Jadwal::where('petugas_id', auth()->id())
            ->whereDate('tanggal', now())
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Anda tidak memiliki jadwal ronda hari ini.');
        }

        $absensi = Absensi::where('jadwal_id', $jadwal->id)->first();

        if (!$absensi) {
            return back()->with('error', 'Data absensi tidak ditemukan.');
        }

        if ($absensi->status == 'hadir') {
            return back()->with('error', 'Anda sudah melakukan absensi hari ini.');
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
