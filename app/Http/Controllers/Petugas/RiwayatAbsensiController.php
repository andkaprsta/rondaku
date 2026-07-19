<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class RiwayatAbsensiController extends Controller
{
    public function index()
    {
        $riwayat = Absensi::with('jadwal')
            ->whereHas('jadwal', function ($query) {
                $query->where('petugas_id', Auth::id());
            })
            ->latest()
            ->paginate(10);

        return view('petugas.riwayat.index', compact('riwayat'));
    }
}
