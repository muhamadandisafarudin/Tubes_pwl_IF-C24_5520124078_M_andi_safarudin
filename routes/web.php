<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MatakuliahController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KrsController as AdminKrsController;
use App\Http\Controllers\Mahasiswa\KrsController as MahasiswaKrsController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes yang butuh login
Route::middleware(['auth'])->group(function () {

    // Dashboard umum (redirect sesuai role)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // =====================
    // ROUTES ADMIN
    // =====================
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');

        // CRUD Dosen
        Route::resource('dosen', DosenController::class);

        // CRUD Matakuliah
        Route::resource('matakuliah', MatakuliahController::class);

        // CRUD Mahasiswa
        Route::resource('mahasiswa', MahasiswaController::class);

        // CRUD Jadwal
        Route::resource('jadwal', JadwalController::class);

        // KRS (Admin: lihat semua KRS)
        Route::get('/krs', [AdminKrsController::class, 'index'])->name('krs.index');
        Route::delete('/krs/{id}', [AdminKrsController::class, 'destroy'])->name('krs.destroy');
    });

    // =====================
    // ROUTES MAHASISWA
    // =====================
    Route::middleware(['role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {

        // Dashboard Mahasiswa
        Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');

        // KRS Mahasiswa
        Route::get('/krs', [MahasiswaKrsController::class, 'index'])->name('krs.index');
        Route::post('/krs', [MahasiswaKrsController::class, 'store'])->name('krs.store');
        Route::delete('/krs/{id}', [MahasiswaKrsController::class, 'destroy'])->name('krs.destroy');

        // Jadwal (hanya lihat)
        Route::get('/jadwal', [MahasiswaKrsController::class, 'jadwal'])->name('jadwal');
    });
});

require __DIR__.'/auth.php';