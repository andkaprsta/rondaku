<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;

// Admin
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SettingController;

// Petugas
use App\Http\Controllers\Petugas\AbsensiController as PetugasAbsensiController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;

/*
|--------------------------------------------------------------------------
| Welcome
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| Redirect Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    return $user->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('petugas.dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::get(
    '/admin/absensi/export-excel',
    [AdminAbsensiController::class, 'exportExcel']
)->name('admin.absensi.export.excel');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('warga', WargaController::class);

    Route::resource('jadwal', JadwalController::class);

    Route::resource('user', UserController::class);

    Route::get('/admin/absensi', [AdminAbsensiController::class, 'index'])
        ->name('admin.absensi');

    Route::get('/admin/absensi/pdf', [AdminAbsensiController::class, 'exportPdf'])
        ->name('admin.absensi.pdf');

    Route::get('/admin/kalender', [JadwalController::class, 'calendar'])
        ->name('jadwal.calendar');

    Route::get('/admin/kalender/events', [JadwalController::class, 'events'])
        ->name('jadwal.events');

    Route::get('/admin/kalender/event/{id}', [JadwalController::class, 'event'])
        ->name('jadwal.event');

    Route::delete('/admin/kalender/event/{id}', [JadwalController::class, 'destroyEvent'])
        ->name('jadwal.event.destroy');

    Route::get('/admin/setting/qr', [SettingController::class, 'qr'])
        ->name('setting.qr');

    Route::get('/setting', [App\Http\Controllers\Admin\SettingController::class, 'index'])
        ->name('setting.index');

    Route::get('/setting/qr', [App\Http\Controllers\Admin\SettingController::class, 'qr'])
        ->name('setting.qr.update');

    Route::get('/setting/qr/print', [SettingController::class, 'printQr'])
        ->name('setting.qr.print');

    Route::get('/setting/qr/download', [SettingController::class, 'downloadQr'])
        ->name('setting.qr.download');

    Route::get('/admin/dashboard/data', [AdminDashboardController::class, 'dashboardData'])
        ->middleware(['auth', 'admin'])
        ->name('admin.dashboard.data');
});

/*
|--------------------------------------------------------------------------
| Petugas
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'petugas'])->group(function () {

    Route::get('/petugas/dashboard', [PetugasDashboardController::class, 'index'])
        ->name('petugas.dashboard');

    Route::get('/absensi', [PetugasAbsensiController::class, 'index'])
        ->name('absensi.index');

    Route::post('/absensi', [PetugasAbsensiController::class, 'store'])
        ->name('absensi.store');
        
    Route::get('/riwayat-absensi', [App\Http\Controllers\Petugas\RiwayatAbsensiController::class, 'index'])
        ->name('petugas.riwayat');

    Route::get('/petugas/absensi/qr/{token}', [PetugasAbsensiController::class, 'scanQr'])
        ->name('petugas.absensi.qr');

    Route::get('/petugas/scan-qr', [App\Http\Controllers\Petugas\AbsensiController::class, 'scan'])
        ->name('absensi.scan');
});

require __DIR__ . '/auth.php';
