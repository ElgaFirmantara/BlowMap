<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'nama_lokasi',
        'koordinat'
    ];

    protected $casts = [
        'koordinat' => 'array'
    ];

    public function kartuKeluargas()
    {
        return $this->hasMany(KartuKeluarga::class);
    }
}
