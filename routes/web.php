<?php

use Illuminate\Support\Facades\Route;
use App\Models\Lokasi;
use App\Models\KartuKeluarga;
use App\Models\AnggotaKeluarga;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\AnggotaKeluargaController;

// Welcome (opsional)
Route::view('/', 'welcome')->name('welcome');

Route::get('/dashboard', function () {
    $totalLokasi = Lokasi::count();
    $totalKartuKeluarga = KartuKeluarga::count();
    $totalAnggotaKeluarga = AnggotaKeluarga::count();
    return view('dashboard', compact('totalLokasi', 'totalKartuKeluarga', 'totalAnggotaKeluarga'));
})->name('dashboard');

Route::get('/lokasi/list', function () {
    $daftarLokasi = Lokasi::all();
    return view('lokasi.list', compact('daftarLokasi'));
})->name('lokasi.list');

Route::get('/kartu-keluarga/list', function () {
    $daftarKK = KartuKeluarga::with(['lokasi', 'anggotaKeluargas'])->get();
    return view('kartu-keluarga.list', compact('daftarKK'));
})->name('kartu-keluarga.list');


// Resource Routes
Route::resource('lokasi', LokasiController::class);
Route::resource('kartu-keluarga', KartuKeluargaController::class);
Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
