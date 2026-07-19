<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

// Admin
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// Petugas
use App\Http\Controllers\Petugas\AbsensiController as PetugasAbsensiController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;

/*
|--------------------------------------------------------------------------
| Welcome
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

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
});

require __DIR__ . '/auth.php';
