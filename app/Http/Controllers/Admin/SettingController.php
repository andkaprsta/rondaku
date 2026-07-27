<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Response;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function qr()
    {
        $setting = Setting::first();

        return view('admin.setting.qr', compact('setting'));
    }

    public function printQr()
    {
        $setting = Setting::first();

        return view('admin.setting.print-qr', compact('setting'));
    }

   public function downloadQr()
{
    $setting = Setting::first();

    $svg = \QrCode::size(300)
        ->margin(1)
        ->generate(route('petugas.absensi.qr', $setting->qr_token));

    return response($svg)
        ->header('Content-Type', 'image/svg+xml')
        ->header(
            'Content-Disposition',
            'attachment; filename="QR-Pos-Ronda.svg"'
        );
}
}
