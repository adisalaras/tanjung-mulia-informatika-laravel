<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('anggota', AnggotaController::class);
Route::resource('buku', BukuController::class );
Route::resource('peminjaman', PeminjamanController::class);

Route::get('/testroute', function() {
    $name = "adisa";

    $filePath = public_path('favicon.ico');

    // // The email sending is done using the to method on the Mail facade
    Mail::to('adrianramadhan881@gmail.com')->send(new MyTestEmail($name));
});

