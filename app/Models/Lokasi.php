<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasis';

    protected $fillable = [
        'nama_lokasi',
        'alamat',
    ];

    /**
     * Semua perangkat sensor yang ditempatkan di lokasi ini.
     */
    public function perangkatSensors()
    {
        return $this->hasMany(PerangkatSensor::class, 'lokasi_id');
    }
}
