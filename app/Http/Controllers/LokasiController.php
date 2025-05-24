<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KartuKeluarga;
use App\Models\Lokasi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('lokasi.index', compact('lokasi'));
    }


    public function create()
    {
        return view('lokasi.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required',
            'koordinat.lat' => 'required|numeric',
            'koordinat.lng' => 'required|numeric',
        ]);

        $lokasi = Lokasi::create([
            'nama_lokasi' => $validated['nama_lokasi'],
            'koordinat' => [
                'lat' => $validated['koordinat']['lat'],
                'lng' => $validated['koordinat']['lng'],
            ]
        ]);

        return response()->json($lokasi);
    }


    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit', compact('lokasi'));
    }

    public function show($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $kartuKeluargas = KartuKeluarga::with('anggotaKeluargas')
            ->where('lokasi_id', $id)
            ->get();

        return view('lokasi.index', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'lokasi.nama_lokasi' => 'required',
                'lokasi.koordinat.lat' => 'required|numeric',
                'lokasi.koordinat.lng' => 'required|numeric',
                'kartuKeluarga.nomor_kk' => 'required',
                'kartuKeluarga.alamat' => 'required',
                'anggota.*.nama' => 'required',
                'anggota.*.nik' => 'required'
            ]);

            // Update Lokasi
            $lokasi = Lokasi::findOrFail($id);
            $lokasi->update([
                'nama_lokasi' => $validated['lokasi']['nama_lokasi'],
                'koordinat' => [
                    'lat' => $validated['lokasi']['koordinat']['lat'],
                    'lng' => $validated['lokasi']['koordinat']['lng']
                ]
            ]);

            // Update Kartu Keluarga
            $kartuKeluarga = $lokasi->kartuKeluargas()->first();
            if ($kartuKeluarga) {
                $kartuKeluarga->update([
                    'nomor_kk' => $validated['kartuKeluarga']['nomor_kk'],
                    'alamat' => $validated['kartuKeluarga']['alamat']
                ]);

                // Update Anggota Keluarga
                foreach ($request->anggota as $anggotaData) {
                    if (!isset($anggotaData['id'])) {
                        continue;
                    }
                    $anggota = AnggotaKeluarga::find($anggotaData['id']);
                    if ($anggota) {
                        $anggota->update($anggotaData);
                    }
                }
            }

            return response()->json(['success' => true]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }



    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        return response()->json(['success' => true]);
    }
}
