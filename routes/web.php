<?php

use Illuminate\Support\Facades\Route;
use App\Models\Lokasi;
use App\Models\KartuKeluarga;
use App\Models\AnggotaKeluarga;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\AuthController;

Route::view('/', 'welcome')->name('welcome');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.action');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('actionregister');

Route::view('/pengembang', 'pengembang')->name('pengembang');

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

Route::get('/lokasi/search', [LokasiController::class, 'search'])->name('lokasi.search');



// Resource Routes
Route::resource('lokasi', LokasiController::class);
Route::resource('kartu-keluarga', KartuKeluargaController::class);
Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
