@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg mb-4" style="border: none; border-radius: 20px;">
            <div class="card-header text-white fw-bold position-relative"
                style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 20px 20px 0 0; padding: 1.5rem;">
                <div class="d-flex align-items-center">
                    <div class="icon-wrapper me-3"
                        style="background: rgba(255,255,255,0.2); padding: 12px; border-radius: 12px;">
                        <i class="fas fa-address-card fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">Daftar Kartu Keluarga</h4>
                        <small class="opacity-75">Data lengkap keluarga dan anggota</small>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0" style="border-radius: 0 0 20px 20px; overflow: hidden;">
                        <thead style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                            <tr>
                                <th class="text-center"
                                    style="width: 60px; padding: 1rem; color: #495057; font-weight: 600;">
                                    ID
                                </th>
                                <th style="padding: 1rem; color: #495057; font-weight: 600;">
                                    <i class="fas fa-id-card me-2"></i>Nomor KK
                                </th>
                                <th style="padding: 1rem; color: #495057; font-weight: 600;">
                                    <i class="fas fa-map-marker-alt me-2"></i>Alamat
                                </th>
                                <th class="text-center"
                                    style="width: 220px; padding: 1rem; color: #495057; font-weight: 600;">
                                    <i class="fas fa-location-dot me-1"></i>ID Lokasi
                                </th>
                                <th class="text-center"
                                    style="padding: 1rem; color: #495057; font-weight: 600; min-width: 350px;">
                                    <i class="fas fa-users me-2"></i>Anggota Keluarga
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daftarKK as $kk)
                                <tr class="table-row-hover" style="transition: all 0.3s ease;">
                                    <td class="text-center" style="padding: 1.5rem 1rem;">
                                        <div class="number-badge"
                                            style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
                                             color: white; width: 32px; height: 32px; border-radius: 50%;
                                             display: flex; align-items: center; justify-content: center;
                                             font-weight: 600; margin: 0 auto; font-size: 0.95rem;">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td style="padding: 1.5rem 1rem;">
                                        <div class="d-flex align-items-center">
                                            <div class="kk-icon me-3"
                                                style="background: linear-gradient(135deg, #ffc107 0%, #ff8c00 100%);
                                                 width: 40px; height: 40px; border-radius: 10px;
                                                 display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-address-card text-white"></i>
                                            </div>
                                            <div>
                                                <div style="font-weight: 600; color: #2c3e50; font-size: 1rem;">
                                                    {{ $kk->nomor_kk }}
                                                </div>
                                                <small class="text-muted">Nomor Kartu Keluarga</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 1.5rem 1rem;">
                                        <div class="alamat-info">
                                            <div style="color: #2c3e50; font-weight: 500; line-height: 1.4;">
                                                {{ $kk->alamat }}
                                            </div>
                                            <small class="text-muted">
                                                <i class="fas fa-map-pin me-1"></i>Alamat tempat tinggal
                                            </small>
                                        </div>
                                    </td>
                                    <td class="text-center" style="padding: 1.5rem 1rem;">
                                        <span class="badge"
                                            style="background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
                                              padding: 8px 16px; border-radius: 20px; font-size: 0.95rem; font-weight: 600;">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $kk->lokasi_id ?? '-' }}
                                            @if ($kk->lokasi && $kk->lokasi->nama_lokasi)
                                                - {{ $kk->lokasi->nama_lokasi }}
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-center" style="padding: 1.5rem 1rem;">
                                        @if ($kk->anggotaKeluargas->count())
                                            <div class="d-flex flex-column align-items-center gap-2">
                                                @foreach ($kk->anggotaKeluargas as $anggota)
                                                    <div class="anggota-card px-3 py-2"
                                                        style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
                                                         border: 1px solid #e9ecef; border-radius: 12px;
                                                         min-width: 260px; max-width: 350px; text-align: left;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar me-2"
                                                                style="width: 36px; height: 36px;
                                                                 background: {{ $anggota->jenis_kelamin == 'L' ? 'linear-gradient(135deg, #007bff 0%, #0056b3 100%)' : 'linear-gradient(135deg, #dc3545 0%, #c82333 100%)' }};
                                                                 border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                                <i
                                                                    class="fas {{ $anggota->jenis_kelamin == 'L' ? 'fa-mars' : 'fa-venus' }} text-white"></i>
                                                            </div>
                                                            <div>
                                                                <div
                                                                    style="font-weight: 600; color: #2c3e50; font-size: 0.98rem;">
                                                                    {{ $anggota->nama }}
                                                                </div>
                                                                <div class="info-row d-flex align-items-center mb-1">
                                                                    <small class="text-muted me-2">
                                                                        <i class="fas fa-id-badge me-1"
                                                                            style="color: #6c757d;"></i>
                                                                        NIK: {{ $anggota->nik }}
                                                                    </small>
                                                                    <small
                                                                        class="badge {{ $anggota->jenis_kelamin == 'L' ? 'badge-light-primary' : 'badge-light-danger' }}"
                                                                        style="background: {{ $anggota->jenis_kelamin == 'L' ? 'rgba(0,123,255,0.1)' : 'rgba(220,53,69,0.1)' }};
                                                                                  color: {{ $anggota->jenis_kelamin == 'L' ? '#007bff' : '#dc3545' }};
                                                                                  border: 1px solid {{ $anggota->jenis_kelamin == 'L' ? 'rgba(0,123,255,0.2)' : 'rgba(220,53,69,0.2)' }};
                                                                                  padding: 2px 8px; border-radius: 6px; font-size: 0.7rem;">
                                                                        <i
                                                                            class="fas {{ $anggota->jenis_kelamin == 'L' ? 'fa-mars' : 'fa-venus' }} me-1"></i>
                                                                        {{ $anggota->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                                    </small>
                                                                </div>
                                                                <div class="info-row">
                                                                    <span class="badge"
                                                                        style="background: {{ $anggota->role == 'ayah' ? 'linear-gradient(135deg, #17a2b8 0%, #138496 100%)' : ($anggota->role == 'ibu' ? 'linear-gradient(135deg, #e83e8c 0%, #d91a72 100%)' : 'linear-gradient(135deg, #28a745 0%, #1e7e34 100%)') }};
                                                                                 color: white; padding: 3px 12px; border-radius: 10px; font-size: 0.8rem; font-weight: 600;">
                                                                        <i
                                                                            class="fas fa-user me-1"></i>{{ ucfirst($anggota->role) }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="anggota-summary mt-2 pt-2"
                                                    style="border-top: 1px dashed #dee2e6;">
                                                    <small class="text-muted">
                                                        <i class="fas fa-users me-1"></i>
                                                        Total: <strong>{{ $kk->anggotaKeluargas->count() }}
                                                            anggota</strong>
                                                    </small>
                                                </div>
                                            </div>
                                        @else
                                            <div class="empty-state text-center" style="padding: 2rem; color: #6c757d;">
                                                <i class="fas fa-user-slash fa-2x mb-2 opacity-50"></i>
                                                <div>Belum ada anggota keluarga</div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center" style="padding: 4rem;">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">Belum ada data kartu keluarga</h5>
                                            <p class="text-muted">Data akan muncul setelah ada kartu keluarga yang terdaftar
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-row-hover:hover {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .anggota-card:hover {
            transform: translateX(5px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-color: #007bff !important;
        }

        .number-badge {
            box-shadow: 0 2px 10px rgba(0, 123, 255, 0.3);
        }

        .kk-icon {
            box-shadow: 0 2px 10px rgba(255, 193, 7, 0.3);
        }

        .avatar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
