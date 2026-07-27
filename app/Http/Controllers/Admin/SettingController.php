<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;

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
}
