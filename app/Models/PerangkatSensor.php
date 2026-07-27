<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatSensor extends Model
{
    protected $table = 'perangkat_sensors';

    protected $fillable = [
        'kode_aset',
        'nama_perangkat',
        'kategori_id',
        'lokasi_id',
        'merk',
        'tahun_pengadaan',
        'status',
        'kondisi_terakhir',
        'dicatat_oleh',
    ];

    /**
     * Kategori dari perangkat sensor ini (mis. Meteorologi, Klimatologi, Geofisika, dll).
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriSensor::class, 'kategori_id');
    }

    /**
     * Lokasi penempatan perangkat sensor ini.
     */
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    /**
     * User (teknisi/admin) yang mencatat/menambahkan perangkat ini.
     */
    public function pencatat()
    {
        return $this->belongsTo(User::class, 'dicatat_oleh');
    }

    /**
     * Teknisi yang bertanggung jawab/ditugaskan atas perangkat ini.
     */
    public function assignedTeknisi()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Riwayat maintenance untuk perangkat sensor ini.
     */
    public function logMaintenances()
    {
        return $this->hasMany(LogMaintenance::class, 'perangkat_id');
    }
}
