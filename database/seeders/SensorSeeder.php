<?php

namespace Database\Seeders;

use App\Models\KategoriSensor;
use App\Models\Lokasi;
use App\Models\PerangkatSensor;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    public function run(): void
    {
        $meteorologi = KategoriSensor::where('nama_kategori', 'Meteorologi')->first();
        $klimatologi = KategoriSensor::where('nama_kategori', 'Klimatologi')->first();
        $geofisika = KategoriSensor::where('nama_kategori', 'Geofisika')->first();

        $ruangServer = Lokasi::where('nama_lokasi', 'Ruang Server')->first();
        $tamanAlat = Lokasi::where('nama_lokasi', 'Taman Alat Utama')->first();

        $contoh = [
            [
                'kode_aset' => 'SNR-0001',
                'nama_perangkat' => 'Sensor Suhu Udara 1',
                'kategori_id' => $meteorologi?->id,
                'lokasi_id' => $tamanAlat?->id,
                'status' => 'aktif',
            ],
            [
                'kode_aset' => 'SNR-0002',
                'nama_perangkat' => 'Sensor Kelembaban Tanah 1',
                'kategori_id' => $klimatologi?->id,
                'lokasi_id' => $tamanAlat?->id,
                'status' => 'aktif',
            ],
            [
                'kode_aset' => 'SNR-0003',
                'nama_perangkat' => 'Seismograf 1',
                'kategori_id' => $geofisika?->id,
                'lokasi_id' => $ruangServer?->id,
                'status' => 'maintenance',
            ],
        ];

        foreach ($contoh as $data) {
            PerangkatSensor::firstOrCreate(['kode_aset' => $data['kode_aset']], $data);
        }
    }
}
