<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function exportExcel(Request $request)
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

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Petugas');
        $sheet->setCellValue('C1', 'Tanggal');
        $sheet->setCellValue('D1', 'Status');

        $sheet->getStyle('A1:D1')->getFont()->setBold(true);

        $row = 2;

        foreach ($absensi as $index => $item) {

            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $item->jadwal->petugas->name ?? '-');
            $sheet->setCellValue('C' . $row, $item->jadwal->tanggal ?? '-');
            $sheet->setCellValue('D' . $row, ucfirst($item->status));

            $row++;
        }

        foreach (range('A', 'D') as $column) {

            $sheet->getColumnDimension($column)
                ->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(function () use ($writer) {

            $writer->save('php://output');
        }, 'rekap-absensi.xlsx');
    }
}
