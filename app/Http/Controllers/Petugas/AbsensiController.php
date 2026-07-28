<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Setting;
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

        $serverTime = now('Asia/Jakarta')->toIso8601String();

        return view('petugas.absensi.index', compact(
            'jadwal',
            'absensi',
            'sudahAbsen',
            'serverTime'
        ));
    }

    public function store(Request $request)
    {
        $now = Carbon::now('Asia/Jakarta');

        // Tentukan tanggal jadwal
        $tanggalRonda = $now->hour < 4
            ? $now->copy()->subDay()->toDateString()
            : $now->toDateString();

        // ==================================================
        // CEK DULU APAKAH PETUGAS PUNYA JADWAL
        // ==================================================

        $jadwal = Jadwal::where('petugas_id', auth()->id())
            ->whereDate('tanggal', $tanggalRonda)
            ->first();

        if (!$jadwal) {

            return back()->with(
                'error',
                'Anda tidak memiliki jadwal ronda hari ini.'
            );
        }

        // ==================================================
        // BARU CEK JAM ABSENSI
        // ==================================================

        if (!($now->hour >= 22 || $now->hour < 4)) {

            return back()->with(
                'error',
                'Absensi hanya dapat dilakukan pukul 22.00 sampai 04.00 WIB.'
            );
        }

        // ==================================================
        // LANJUTKAN KODE YANG SUDAH ADA
        // ==================================================

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

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Absensi berhasil dilakukan.');
    }

    

    public function scan()
    {
        return view('petugas.absensi.scan');
    }

    public function scanQr($token)
    {
        $setting = Setting::first();

        if (!$setting || $setting->qr_token !== $token) {

            return redirect()
                ->route('absensi.index')
                ->with('error', 'QR Code tidak valid.');
        }

        // Jalankan seluruh proses absensi
        return $this->store(request());
    }
}
