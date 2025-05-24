<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\AnggotaKeluargaController;

Route::view('/', 'welcome')->name('welcome');
Route::resource('lokasi', LokasiController::class);
Route::resource('kartu-keluarga', KartuKeluargaController::class);
Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
