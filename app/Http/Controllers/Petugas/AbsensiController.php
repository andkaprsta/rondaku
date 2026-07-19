<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
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

        if ($jadwal) {
            $absensi = Absensi::where('jadwal_id', $jadwal->id)
                ->first();
        }

        return view('petugas.absensi.index', compact(
            'jadwal',
            'absensi'
        ));
    }

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
            ->first();

        if ($cek) {
            return back()->with(
                'error',
                'Anda sudah melakukan absensi.'
            );
        }

        Absensi::create([
            'jadwal_id' => $jadwal->id,
            'status' => 'hadir'
        ]);

        return back()->with(
            'success',
            'Absensi berhasil.'
        );
    }
}
