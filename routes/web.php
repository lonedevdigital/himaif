<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\ProfileController; // Pastikan ini ada

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- HALAMAN PUBLIK ---
Route::get('/', [PublicController::class, 'index']);

// Halaman Klasemen (Data & Filter)
Route::get('/klasemen', [PublicController::class, 'data'])->name('klasemen');

// Halaman Detail Rapor Anggota
Route::get('/anggota/{id}', [PublicController::class, 'show'])->name('anggota.detail');


// --- HALAMAN ADMIN (DASHBOARD) ---
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminMemberController::class, 'index'])->name('dashboard');
    Route::get('/create', [AdminMemberController::class, 'create'])->name('admin.create');
    Route::post('/store', [AdminMemberController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [AdminMemberController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [AdminMemberController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminMemberController::class, 'destroy'])->name('admin.delete');

    // FITUR PENILAIAN (Input Nilai)
    Route::get('/nilai/{id}', [AdminMemberController::class, 'nilai'])->name('admin.nilai');
    Route::post('/nilai/{id}', [AdminMemberController::class, 'storeNilai'])->name('admin.nilai.store');
});


// --- INI BAGIAN YANG TADI HILANG (PROFILE ROUTES) ---
// Bagian ini penting supaya menu "Profile" di pojok kanan atas tidak error
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';