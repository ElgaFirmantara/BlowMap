<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'role',
        'kartu_keluarga_id'
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }
}
