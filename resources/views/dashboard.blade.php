@extends('layouts.app')

@section('content')
    <!-- Dashboard Header -->
    <div class="dashboard-header text-center py-5 mb-5"
        style="
        background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
        color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    ">
        <h1 class="display-4 mb-4 d-flex align-items-center justify-content-center gap-3">
            <img src="{{ asset('images/logo-dashboard.png') }}" alt="Logo BlowMap" style="width: 100px; height: auto;">
            <span>Dashboard BlowMap</span>
        </h1>
    </div>

    <!-- Dashboard Content -->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Total Lokasi -->
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="dashboard-card text-center py-4 w-100"
                    style="
                    background: white;
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                    transition: all 0.3s;
                ">
                    <div class="card-icon mb-3">
                        <i class="fas fa-map-marker-alt fa-3x" style="color: #3498db;"></i>
                    </div>
                    <h3 class="card-title">Total Lokasi</h3>
                    <div class="card-value display-4 mb-2" style="font-weight: 800; color: #3498db;">{{ $totalLokasi ?? 0 }}
                    </div>
                    <p class="card-subtitle">Data Lokasi Terdaftar</p>
                    <a href="{{ route('lokasi.list') }}" class="btn btn-outline-primary mt-3">Lihat Semua</a>
                </div>
            </div>
            <!-- Kunjungi WebGIS -->
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="dashboard-card text-center py-4 w-100"
                    style="
                    background: linear-gradient(135deg, #2980b9 0%, #6dd5fa 100%);
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                    color: white;
                    transition: all 0.3s;
                ">
                    <div class="card-icon mb-3">
                        <i class="fas fa-globe fa-3x" style="color: white"></i>
                    </div>
                    <h3 class="card-title" style="color: white;">Kunjungi WebGIS</h3>
                    <p class="card-subtitle" style="color: #f0f6fa;">Lihat dan kelola data lokasi pada peta interaktif
                        WebGIS.</p>
                    <a href="{{ route('lokasi.index') }}" class="btn btn-light mt-3 px-4 py-2" style="font-weight: 600;">
                        <i class="fas fa-map me-2"></i> Buka WebGIS
                    </a>
                </div>
            </div>
            <!-- Total Kartu Keluarga -->
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="dashboard-card text-center py-4 w-100"
                    style="
                    background: white;
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                    transition: all 0.3s;
                ">
                    <div class="card-icon mb-3">
                        <i class="fas fa-address-card fa-3x" style="color: #3498db;"></i>
                    </div>
                    <h3 class="card-title">Total Kartu Keluarga</h3>
                    <div class="card-value display-4 mb-2" style="font-weight: 800; color: #3498db;">
                        {{ $totalKartuKeluarga ?? 0 }}</div>
                    <p class="card-subtitle">Data KK Terdaftar</p>
                    <a href="{{ route('kartu-keluarga.list') }}" class="btn btn-outline-primary mt-3">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
@endsection
