<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSensor extends Model
{
    protected $table = 'kategori_sensors';

    protected $fillable = [
        'nama_kategori',
    ];

    /**
     * Semua perangkat sensor yang termasuk kategori ini.
     */
    public function perangkatSensors()
    {
        return $this->hasMany(PerangkatSensor::class, 'kategori_id');
    }
}
