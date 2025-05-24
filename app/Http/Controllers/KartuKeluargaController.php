<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KartuKeluarga;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        $kartuKeluargas = KartuKeluarga::with('lokasi', 'anggotaKeluargas')->get();
        return view('lokasi.index', compact('kartuKeluargas'));
    }

    public function create()
    {
        $lokasi = Lokasi::all();
        return view('lokasi.create', compact('lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kk' => 'required|unique:kartu_keluargas',
            'alamat' => 'required',
            'lokasi_id' => 'required|exists:lokasis,id'
        ]);

        $kartu = KartuKeluarga::create($request->all());
        return response()->json($kartu);
    }

    public function show($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $kartuKeluargas = KartuKeluarga::with('anggotaKeluargas')
            ->where('lokasi_id', $id)
            ->get();

        return response()->json([
            'lokasi' => $lokasi,
            'data' => $kartuKeluargas
        ]);
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $kartuKeluargas = KartuKeluarga::with('anggotaKeluargas')
            ->where('lokasi_id', $id)
            ->get();

        return response()->json([
            'lokasi' => $lokasi,
            'data' => $kartuKeluargas
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Sesuaikan validasi sesuai kebutuhan
        ]);

        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        $kartuKeluarga->update($request->only('nomor_kk', 'alamat'));

        // Update anggota keluarga jika diperlukan
        foreach ($request->data[0]['anggota_keluargas'] as $anggota) {
            AnggotaKeluarga::find($anggota['id'])->update($anggota);
        }

        // Update lokasi jika diperlukan
        if ($request->lokasi) {
            $lokasi = Lokasi::find($kartuKeluarga->lokasi_id);
            $lokasi->update($request->lokasi);
        }

        return response()->json(['success' => true]);
    }


    public function destroy(KartuKeluarga $kartuKeluarga)
    {
        $kartuKeluarga->delete();
        return redirect()->route('kartu-keluarga.index');
    }
}
