@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="fas fa-map-marker-alt me-2"></i> Daftar Lokasi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Keluarga</th>
                                <th>Koordinat (Latitude)</th>
                                <th>Koordinat (Longitude)</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daftarLokasi as $lokasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td id="nama-lokasi-{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</td>
                                    <td>{{ $lokasi->koordinat['lat'] ?? '-' }}</td>
                                    <td>{{ $lokasi->koordinat['lng'] ?? '-' }}</td>
                                    <td class="text-center">
                                        <!-- Tombol Read (lihat di WebGIS, parameter id dikirim ke halaman WebGIS) -->
                                        <a href="{{ url('/lokasi') }}" class="btn btn-sm btn-info" title="Lihat di WebGIS">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada data lokasi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

< @endsection
