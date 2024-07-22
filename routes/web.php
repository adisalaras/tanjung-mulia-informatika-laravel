<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('anggota', AnggotaController::class); 
Route::resource('buku', BukuController::class );
Route::resource('peminjaman', PeminjamanController::class);

