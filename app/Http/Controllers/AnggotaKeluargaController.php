<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    public function index()
    {
        $anggota = AnggotaKeluarga::with('kartuKeluarga')->get();
        return view('lokasi.index', compact('anggotas'));
    }

    public function create()
    {
        $kartuKeluargas = KartuKeluarga::all();
        return view('index.create', compact('kartuKeluargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:anggota_keluargas',
            'jenis_kelamin' => 'required|in:L,P',
            'role' => 'required|in:ayah,ibu,anak,lainnya',
            'kartu_keluarga_id' => 'required|exists:kartu_keluargas,id'
        ]);

        $member = AnggotaKeluarga::create($request->all());
        return response()->json($member);
    }

    public function edit(AnggotaKeluarga $anggotaKeluarga)
    {
        $kartuKeluargas = KartuKeluarga::all();
        return view('anggota-keluarga.edit', compact('anggotaKeluarga', 'kartuKeluargas'));
    }

    public function update(Request $request, AnggotaKeluarga $anggotaKeluarga)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:anggota_keluarga,nik,' . $anggotaKeluarga->id,
            'jenis_kelamin' => 'required|in:L,P',
            'role' => 'required|in:ayah,ibu,anak,lainnya',
            'kartu_keluarga_id' => 'required|exists:kartu_keluarga,id'
        ]);

        $anggotaKeluarga->update($request->all());
        return redirect()->route('anggota-keluarga.index');
    }

    public function destroy(AnggotaKeluarga $anggotaKeluarga)
    {
        $anggotaKeluarga->delete();
        return redirect()->route('anggota-keluarga.index');
    }
}
