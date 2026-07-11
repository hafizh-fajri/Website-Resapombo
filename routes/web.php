<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/struktur-organisasi', [PageController::class, 'struktur'])->name('struktur');
Route::get('/potensi', [PageController::class, 'potensi'])->name('potensi');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');