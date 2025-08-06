<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import semua controller yang dibutuhkan
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\BalasanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\KnowledgeBaseController;

// Import Admin Controller dengan alias untuk kejelasan
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\KnowledgeBaseController as AdminKnowledgeBaseController;

// Import Middleware CheckRole secara langsung
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK ---
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/faq', [FaqController::class, 'showPublicFaq'])->name('faq.public');
Route::get('/knowledge-base', [KnowledgeBaseController::class, 'showPublic'])->name('knowledge-base.public');

// --- RUTE OTENTIKASI ---
require __DIR__.'/auth.php';

// --- GRUP UNTUK PENGGUNA YANG SUDAH LOGIN & TERVERIFIKASI ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- GRUP KHUSUS UNTUK ROLE: USER ---
    Route::middleware([CheckRole::class . ':user'])->group(function () {
        Route::get('/user/dashboard', [PengaduanController::class, 'index'])->name('user.dashboard');
        Route::resource('pengaduan', PengaduanController::class)->names('user.pengaduan');
        Route::post('/pengaduan/{pengaduan}/balasan', [BalasanController::class, 'store'])->name('balasan.store');
    });

    // --- GRUP KHUSUS UNTUK ROLE: ADMIN ---
    Route::middleware([CheckRole::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', AdminUserController::class);
        Route::resource('faq', AdminFaqController::class);
        Route::resource('knowledge-base', AdminKnowledgeBaseController::class);
        Route::get('pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('pengaduan/{pengaduan}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');
        
        // PERBAIKAN: Mengubah Route::post menjadi Route::match agar menerima POST dan PATCH
        Route::match(['POST', 'PATCH'], 'pengaduan/{pengaduan}/tanggapi', [AdminPengaduanController::class, 'storeTanggapan'])->name('pengaduan.tanggapi');
    });
});
