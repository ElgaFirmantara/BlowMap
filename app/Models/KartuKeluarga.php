<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $fillable = [
        'nomor_kk',
        'alamat',
        'lokasi_id'
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function anggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::class);
    }
}
