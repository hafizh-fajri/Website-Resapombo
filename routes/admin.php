<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BumdesController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PotensiController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('bumdes', BumdesController::class);
        Route::resource('artikel', ArtikelController::class);
        Route::put('/informasi-desa', [DashboardController::class, 'updateInformasi'])->name('informasi.update');
        Route::resource('potensi', PotensiController::class);
        Route::put('/fakta-singkat', [DashboardController::class, 'updateFakta'])->name('fakta.update');
    });

});