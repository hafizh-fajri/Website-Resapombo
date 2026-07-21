<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BumdesController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PotensiController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\PerangkatController;

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
        Route::prefix('profil')->name('profil.')->group(function () {
            Route::get('/', [ProfilController::class, 'index'])->name('index');
            Route::put('/visi', [ProfilController::class, 'updateVisi'])->name('visi.update');
            Route::post('/misi', [ProfilController::class, 'storeMisi'])->name('misi.store');
            Route::put('/misi/{misi}', [ProfilController::class, 'updateMisi'])->name('misi.update');
            Route::delete('/misi/{misi}', [ProfilController::class, 'destroyMisi'])->name('misi.destroy');
            Route::post('/dokumen', [ProfilController::class, 'storeDokumen'])->name('dokumen.store');
            Route::delete('/dokumen/{dokumen}', [ProfilController::class, 'destroyDokumen'])->name('dokumen.destroy');
            Route::post('/kepala-desa', [ProfilController::class, 'storeKepalaDesa'])->name('kepala-desa.store');
            Route::delete('/kepala-desa/{kepalaDesa}', [ProfilController::class, 'destroyKepalaDesa'])->name('kepala-desa.destroy');
        });
        Route::resource('jabatan', JabatanController::class);
        Route::resource('perangkat', PerangkatController::class);
        Route::put('/bumdes-kontak', [BumdesController::class, 'updateKontak'])->name('bumdes.kontak.update');
    });

});