<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('anggota', AnggotaController::class);
// Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
// Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
// Route::get('/anggota/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
// Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
// Route::post('/anggota/update', [AnggotaController::class, 'update'])->name('anggota.update');
Route::resource('buku', BukuController::class );
Route::resource('peminjaman', PeminjamanController::class);

