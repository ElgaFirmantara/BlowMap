@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Tombol Mulai -->
        <button id="btn-mulai" class="btn btn-primary mb-3 shadow-sm"
            style="border-radius: 30px; background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); padding: 10px 24px; font-weight: 600;">
            <i class="fas fa-plus-circle me-2"></i> Tambah Data
        </button>

        <!-- Map Container -->
        <div id="map" class="shadow-lg rounded-4" style="height: 500px; margin-bottom: 24px; border: none;"></div>

        <!-- Step 1: Simpan Lokasi (Awalnya Disembunyikan) -->
        <div id="step1" class="card shadow-lg border-0 mb-4 p-4"
            style="display: none; border-radius: 20px; background: #f8f9fa;">
            <h4 class="mb-3 fw-bold" style="color: #2c3e50; border-bottom: 2px solid #28a745; padding-bottom: 8px;">
                <i class="fas fa-map-marker-alt me-2"></i> Step 1: Pilih Lokasi di Map
            </h4>
            <div class="alert alert-info rounded-3 border-0 shadow-sm mb-3" style="background: #e8f4fc;">
                <i class="fas fa-info-circle me-2"></i> Klik di map untuk memilih lokasi, lalu tekan Simpan Lokasi
            </div>
            <div class="mb-4">
                <label class="form-label fw-medium" style="color: #495057;">Nama Lokasi/Keluarga</label>
                <input type="text" id="nama_keluarga" class="form-control rounded-3 shadow-sm"
                    placeholder="Contoh: Keluarga Budi" required>
            </div>
            <div class="d-flex gap-2">
                <button id="btn-simpan-lokasi" class="btn btn-success rounded-pill shadow-sm" disabled
                    style="padding: 10px 24px; background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); font-weight: 600;">
                    <i class="fas fa-save me-2"></i> Simpan Lokasi
                </button>
                <button id="btn-cancel-lokasi" class="btn btn-secondary rounded-pill shadow-sm"
                    style="padding: 10px 24px; font-weight: 600;">
                    <i class="fas fa-times me-2"></i> Cancel
                </button>
            </div>
        </div>

        <!-- Div untuk detail -->
        <div id="detail-container" class="card shadow-lg border-0 mt-3 p-4"
            style="display: none; border-radius: 20px; background: #f8f9fa;">
            <div id="detail-content">
                <!-- Konten detail akan diisi oleh JavaScript -->
            </div>
        </div>

        <!-- Step 2: Form Kartu Keluarga (Awalnya Disembunyikan) -->
        <div id="step2" class="card shadow-lg border-0 mb-4 p-4"
            style="display: none; border-radius: 20px; background: #f8f9fa;">
            <h4 class="mb-3 fw-bold" style="color: #2c3e50; border-bottom: 2px solid #ffc107; padding-bottom: 8px;">
                <i class="fas fa-address-card me-2"></i> Step 2: Data Kartu Keluarga
            </h4>
            <form id="form-kk">
                @csrf
                <input type="hidden" name="lokasi_id" id="lokasi_id">
                <div class="mb-4">
                    <label class="form-label fw-medium" style="color: #495057;">Nomor KK</label>
                    <input type="text" name="nomor_kk" class="form-control rounded-3 shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-medium" style="color: #495057;">Alamat</label>
                    <textarea name="alamat" class="form-control rounded-3 shadow-sm" required rows="3"></textarea>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill shadow-sm"
                        style="padding: 10px 24px; background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); font-weight: 600;">
                        <i class="fas fa-save me-2"></i> Simpan Kartu Keluarga
                    </button>
                    <button type="button" id="btn-cancel-kk" class="btn btn-secondary rounded-pill shadow-sm"
                        style="padding: 10px 24px; font-weight: 600;">
                        <i class="fas fa-times me-2"></i> Cancel
                    </button>
                </div>
            </form>
        </div>

        <!-- Step 3: Form Anggota Keluarga (Awalnya Disembunyikan) -->
        <div id="step3" class="card shadow-lg border-0 p-4"
            style="display: none; border-radius: 20px; background: #f8f9fa;">
            <h4 class="mb-3 fw-bold" style="color: #2c3e50; border-bottom: 2px solid #17a2b8; padding-bottom: 8px;">
                <i class="fas fa-users me-2"></i> Step 3: Tambah Anggota Keluarga
            </h4>
            <form id="form-anggota">
                @csrf
                <input type="hidden" name="kartu_keluarga_id" id="kartu_keluarga_id">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-medium" style="color: #495057;">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control rounded-3 shadow-sm" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-medium" style="color: #495057;">NIK</label>
                            <input type="text" name="nik" class="form-control rounded-3 shadow-sm" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-medium" style="color: #495057;">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select rounded-3 shadow-sm" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-medium" style="color: #495057;">Peran dalam Keluarga</label>
                            <select name="role" class="form-select rounded-3 shadow-sm" required>
                                <option value="ayah">Ayah</option>
                                <option value="ibu">Ibu</option>
                                <option value="anak">Anak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                    <button type="submit" class="btn btn-primary rounded-pill shadow-sm"
                        style="padding: 10px 24px; background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); font-weight: 600;">
                        <i class="fas fa-save me-2"></i> Simpan Anggota
                    </button>
                    <button type="button" class="btn btn-success rounded-pill shadow-sm" id="btn-selesai"
                        style="padding: 10px 24px; background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); font-weight: 600;">
                        <i class="fas fa-check me-2"></i> Selesai
                    </button>
                    <button type="button" id="btn-cancel-anggota" class="btn btn-secondary rounded-pill shadow-sm"
                        style="padding: 10px 24px; font-weight: 600;">
                        <i class="fas fa-times me-2"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <script>
        let map;
        let marker;
        let lokasiId;
        let lokasiname;
        let kkId;

        $(document).ready(function() {
            initMap();

            // Event tombol mulai
            $('#btn-mulai').click(function() {
                $(this).hide();
                $('#step1').show();
                $('#map').css('cursor', 'crosshair');
            });

            // Event simpan lokasi
            $('#btn-simpan-lokasi').click(simpanLokasi);

            // Event submit form KK
            $('#form-kk').submit(function(e) {
                e.preventDefault();
                simpanKK();
            });

            // Event submit form anggota
            $('#form-anggota').submit(function(e) {
                e.preventDefault();
                simpanAnggota();
            });

            // Event selesai
            $('#btn-selesai').click(function() {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Proses selesai! Data tersimpan.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            });

            // Event tombol cancel lokasi
            $('#btn-cancel-lokasi').click(function() {
                $('#step1').hide();
                $('#btn-mulai').show();
                $('#map').css('cursor', 'pointer');
                if (marker) {
                    map.removeLayer(marker);
                    marker = null;
                }
                $('#btn-simpan-lokasi').prop('disabled', true);
                $('#nama_keluarga').val('');
            });

            // Event tombol cancel kartu keluarga
            $('#btn-cancel-kk').click(function() {
                $('#step2').hide();
                $('#btn-mulai').show();
                $('#map').css('cursor', 'pointer');
                if (marker) {
                    map.removeLayer(marker);
                    marker = null;
                }
                $('#lokasi_id').val('');
                $('#form-kk')[0].reset();
            });

            // Event tombol cancel anggota
            $('#btn-cancel-anggota').click(function() {
                $('#step3').hide();
                $('#btn-mulai').show();
                $('#map').css('cursor', 'pointer');
                if (marker) {
                    map.removeLayer(marker);
                    marker = null;
                }
                $('#kartu_keluarga_id').val('');
                $('#form-anggota')[0].reset();
            });
        });

        function initMap() {
            var lokasiData = @json($lokasi);
            map = L.map('map').setView([-0.0333, 109.3333], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            // Tampilkan marker dari data lokasi yang sudah ada
            lokasiData.forEach(function(item) {
                var koordinat = item.koordinat;
                if (koordinat && koordinat.lat && koordinat.lng) {
                    var popupContent = `
                    <div class="text-center">
                        <h5>${item.nama_lokasi}</h5>
                        <div class="btn-group mt-2">
                            <button onclick="show(${item.id})" class="btn btn-sm btn-info me-2" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="editKartuKeluarga(${item.id})" class="btn btn-sm btn-warning me-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="hapusLokasi(${item.id})" class="btn btn-sm btn-danger" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                    L.marker([koordinat.lat, koordinat.lng])
                        .addTo(map)
                        .bindPopup(popupContent);
                }
            });

            // Event klik map untuk menambah lokasi baru
            map.on('click', function(e) {
                if (!marker) {
                    marker = L.marker(e.latlng)
                        .addTo(map)
                        .bindPopup('Lokasi Terpilih')
                        .openPopup();
                    $('#btn-simpan-lokasi').prop('disabled', false);
                }
            });
        }

        function editKartuKeluarga(kartuKeluargaId) {
            $.ajax({
                url: '/kartu-keluarga/' + kartuKeluargaId + '/edit',
                method: 'GET',
                success: function(response) {
                    let content = `<div class="container p-2" style="max-width: 100%;">
                    <h4 class="mb-3 text-center">Edit Data</h4>
                    <button onclick="$('#detail-container').hide();" class="btn btn-sm btn-light position-absolute" style="top: 5px; right: 5px;" title="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <form id="form-lokasi-keluarga">
                `;

                    // Data Lokasi (Form)
                    content += `<div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-map-marker-alt me-2"></i> Lokasi
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Nama Lokasi</strong></label>
                            <input type="text" name="lokasi[nama_lokasi]" value="${response.lokasi.nama_lokasi}" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="lokasi[koordinat][lat]" value="${response.lokasi.koordinat.lat}" class="form-control">
                            </div>
                            <div class="col">
                                <input type="hidden" name="lokasi[koordinat][lng]" value="${response.lokasi.koordinat.lng}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>`;

                    // Data Kartu Keluarga (Form)
                    response.data.forEach((kk, index) => {
                        content += `<div class="card mb-3">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-address-card me-2"></i> Kartu Keluarga
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label"><strong>Nomor KK</strong></label>
                                <input type="text" name="data[${index}][nomor_kk]" value="${kk.nomor_kk}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Alamat</strong></label>
                                <input type="text" name="data[${index}][alamat]" value="${kk.alamat}" class="form-control">
                            </div>
                            <div class="mt-3">
                                <h6><i class="fas fa-users me-2"></i> Anggota Keluarga</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Peran</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;

                        // Data Anggota Keluarga (Form)
                        kk.anggota_keluargas.forEach((anggota, idx) => {
                            content += `<tr data-id="${anggota.id}">
                            <td>
                                <input type="text" name="data[${index}][anggota_keluargas][${idx}][nama]" value="${anggota.nama}" class="form-control form-control-sm">
                            </td>
                            <td>
                                <input type="text" name="data[${index}][anggota_keluargas][${idx}][nik]" value="${anggota.nik}" class="form-control form-control-sm">
                            </td>
                            <td>
                                <select name="data[${index}][anggota_keluargas][${idx}][jenis_kelamin]" class="form-select form-select-sm">
                                    <option value="L" ${anggota.jenis_kelamin === 'L' ? 'selected' : ''}>Laki-laki</option>
                                    <option value="P" ${anggota.jenis_kelamin === 'P' ? 'selected' : ''}>Perempuan</option>
                                </select>
                            </td>
                            <td>
                                <select name="data[${index}][anggota_keluargas][${idx}][Peran]" class="form-select form-select-sm">
                                    <option value="ayah" ${anggota.role === 'ayah' ? 'selected' : ''}>Ayah</option>
                                    <option value="ibu" ${anggota.role === 'ibu' ? 'selected' : ''}>Ibu</option>
                                    <option value="anak" ${anggota.role === 'anak' ? 'selected' : ''}>Anak</option>
                                </select>
                            </td>
                        </tr>`;
                        });

                        content += `</tbody></table></div></div></div>`;
                    });

                    // Tombol Submit
                    content += `
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                    </form>
                </div>`;

                    // Tampilkan detail di luar map
                    $('#detail-content').html(content);
                    $('#detail-container').show();

                    // Event submit form
                    $('#form-lokasi-keluarga').on('submit', function(e) {
                        e.preventDefault();
                        simpanPerubahanLokasi(response.lokasi.id);
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Error mengambil data: ' + (xhr.responseJSON?.message || xhr.statusText),
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }

        function simpanPerubahanLokasi(lokasiId) {
            const data = {
                lokasi: {
                    nama_lokasi: $('input[name="lokasi[nama_lokasi]"]').val(),
                    koordinat: {
                        lat: $('input[name="lokasi[koordinat][lat]"]').val(),
                        lng: $('input[name="lokasi[koordinat][lng]"]').val()
                    }
                },
                kartuKeluarga: {
                    nomor_kk: $('input[name="data[0][nomor_kk]"]').val(),
                    alamat: $('input[name="data[0][alamat]"]').val()
                },
                anggota: []
            };

            // Ambil data anggota dari tabel
            $('tbody tr').each(function(index) {
                data.anggota.push({
                    id: $(this).data('id'),
                    nama: $(this).find('input[name*="[nama]"]').val(),
                    nik: $(this).find('input[name*="[nik]"]').val(),
                    jenis_kelamin: $(this).find('select[name*="[jenis_kelamin]"]').val(),
                    role: $(this).find('select[name*="[Peran]"]').val()
                });
            });

            $.ajax({
                url: '/lokasi/' + lokasiId,
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil diperbarui!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    let errorMessage = 'Terjadi kesalahan saat menyimpan data.';
                    if (xhr.status === 422) {
                        errorMessage = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorMessage += value[0] + '\n';
                        });
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.statusText) {
                        errorMessage += ' (' + xhr.statusText + ')';
                    }
                    Swal.fire({
                        title: 'Error',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }

        function hapusLokasi(lokasiId) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Yakin ingin menghapus data ini? Semua kartu keluarga dan anggota di lokasi ini juga akan terhapus.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/lokasi/' + lokasiId,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Error: ' + xhr.responseJSON.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        }

        function show(kartuKeluargaId) {
            $.ajax({
                url: '/kartu-keluarga/' + kartuKeluargaId,
                method: 'GET',
                success: function(response) {
                    let content = `<div class="container p-2" style="max-width: 100%;">
                    <h4 class="mb-3 text-center">Detail Lengkap</h4>
                    <button onclick="$('#detail-container').hide();" class="btn btn-sm btn-light position-absolute" style="top: 5px; right: 5px;" title="Close">
                        <i class="fas fa-times"></i>
                    </button>
                `;

                    // Data Lokasi
                    content += `<div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-map-marker-alt me-2"></i> Lokasi
                    </div>
                    <div class="card-body">
                        <p><strong>Nama Lokasi:</strong> ${response.lokasi.nama_lokasi}</p>
                        <p><strong>Koordinat:</strong> 
                            Latitude: ${response.lokasi.koordinat.lat}, 
                            Longitude: ${response.lokasi.koordinat.lng}
                        </p>
                    </div>
                </div>`;

                    // Data Kartu Keluarga
                    response.data.forEach((kk, index) => {
                        content += `<div class="card mb-3">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-address-card me-2"></i> Kartu Keluarga
                        </div>
                        <div class="card-body">
                            <p><strong>Nomor KK:</strong> ${kk.nomor_kk}</p>
                            <p><strong>Alamat:</strong> ${kk.alamat}</p>
                            
                            <div class="mt-3">
                                <h6><i class="fas fa-users me-2"></i> Anggota Keluarga</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Peran</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;

                        // Data Anggota Keluarga
                        kk.anggota_keluargas.forEach(anggota => {
                            content += `<tr>
                            <td>${anggota.nama}</td>
                            <td>${anggota.nik}</td>
                            <td>
                                <span class="badge bg-${anggota.jenis_kelamin === 'L' ? 'primary' : 'danger'}">
                                    ${anggota.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'}
                                </span>
                            </td>
                            <td>${anggota.role}</td>
                        </tr>`;
                        });

                        content += `</tbody></table></div></div></div>`;
                    });

                    content += `</div>`;

                    // Tampilkan detail di luar map
                    $('#detail-content').html(content);
                    $('#detail-container').show();
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Error mengambil data: ' + (xhr.responseJSON?.message || xhr.statusText),
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }

        function simpanLokasi() {
            if (!marker) {
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Pilih lokasi dulu!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }
            const namaKeluarga = $('#nama_keluarga').val();
            if (!namaKeluarga) {
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Nama keluarga harus diisi!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }
            const latlng = marker.getLatLng();
            $.ajax({
                url: '/lokasi',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    nama_lokasi: namaKeluarga,
                    koordinat: {
                        lat: latlng.lat,
                        lng: latlng.lng
                    }
                },
                success: function(response) {
                    lokasiId = response.id;
                    $('#lokasi_id').val(lokasiId);
                    $('#step1').hide();
                    $('#step2').show();
                    map.off('click');
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Error: ' + xhr.responseJSON.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }

        function simpanKK() {
            $.ajax({
                url: '/kartu-keluarga',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $('#form-kk').serialize(),
                success: function(response) {
                    kkId = response.id;
                    $('#kartu_keluarga_id').val(kkId);
                    $('#step2').hide();
                    $('#step3').show();
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Error: ' + xhr.responseJSON.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }

        function simpanAnggota() {
            $.ajax({
                url: '/anggota-keluarga',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $('#form-anggota').serialize(),
                success: function() {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anggota berhasil ditambahkan!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#form-anggota')[0].reset();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Error: ' + xhr.responseJSON.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    </script>
@endsection
