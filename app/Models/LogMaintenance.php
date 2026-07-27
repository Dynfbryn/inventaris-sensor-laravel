<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogMaintenance extends Model
{
    protected $table = 'log_maintenances';

    protected $fillable = [
        'perangkat_id',
        'teknisi_id',
        'tanggal',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Perangkat sensor yang di-maintenance pada log ini.
     */
    public function perangkat()
    {
        return $this->belongsTo(PerangkatSensor::class, 'perangkat_id');
    }

    /**
     * Teknisi yang melakukan/mencatat maintenance ini.
     */
    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }
}
