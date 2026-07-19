<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $query = Absensi::with('jadwal.petugas');

        if ($request->filled('tanggal_awal')) {

            $query->whereHas('jadwal', function ($q) use ($request) {

                $q->whereDate('tanggal', '>=', $request->tanggal_awal);
            });
        }

        if ($request->filled('tanggal_akhir')) {

            $query->whereHas('jadwal', function ($q) use ($request) {

                $q->whereDate('tanggal', '<=', $request->tanggal_akhir);
            });
        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);
        }

        $absensi = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.absensi.index', compact('absensi'));
    }

    public function exportPdf(Request $request)
    {
        $query = Absensi::with('jadwal.petugas');

        if ($request->filled('tanggal_awal')) {

            $query->whereHas('jadwal', function ($q) use ($request) {

                $q->whereDate('tanggal', '>=', $request->tanggal_awal);
            });
        }

        if ($request->filled('tanggal_akhir')) {

            $query->whereHas('jadwal', function ($q) use ($request) {

                $q->whereDate('tanggal', '<=', $request->tanggal_akhir);
            });
        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);
        }

        $absensi = $query->latest()->get();

        $pdf = Pdf::loadView(
            'admin.absensi.pdf',
            compact('absensi')
        );

        return $pdf->stream('laporan-absensi.pdf');
    }
}
