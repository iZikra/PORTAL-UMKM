<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController; // Pastikan ini ada
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute Publik ---
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/faq', [FaqController::class, 'showPublicFaq'])->name('faq.public');

// PERBAIKAN: Beri komentar atau hapus rute ini karena FAQ sekarang hanya untuk admin.
// Route::get('/faq', [FaqController::class, 'showPublicPage'])->name('faq');
// Jika Anda masih ingin ada halaman FAQ untuk publik, biarkan saja,
// tapi pastikan controllernya tidak memanggil navigation.blade.php yang butuh role.

// --- Rute Otentikasi ---
require __DIR__.'/auth.php';

// --- Rute yang Membutuhkan Login ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PengaduanController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- GRUP KHUSUS UNTUK ROLE: ADMIN ---
    Route::middleware([CheckRole::class . ':admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
            
            Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
            Route::get('/pengaduan/{pengaduan}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');
            Route::patch('/pengaduan/{pengaduan}/tanggapi', [AdminPengaduanController::class, 'tanggapi'])->name('pengaduan.tanggapi');

            // PERBAIKAN: Pastikan rute Manajemen FAQ ada DI DALAM grup admin ini.
            Route::resource('faq', FaqController::class);
    });

    // --- GRUP KHUSUS UNTUK ROLE: USER ---
    Route::middleware([CheckRole::class . ':user'])
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
            Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
            Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
            Route::post('/pengaduan/{pengaduan}/balas', [PengaduanController::class, 'balas'])->name('pengaduan.balas');
    });
});