<?php

namespace Database\Seeders;

use App\Models\KategoriSensor;
use Illuminate\Database\Seeder;

class KategoriSensorSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'Meteorologi',
            'Klimatologi',
            'Geofisika',
            'Kualitas Udara',
            'Maritim',
            'Penerbangan (AWOS)',
            'Hidrologi',
        ];

        foreach ($kategoris as $nama) {
            KategoriSensor::firstOrCreate(['nama_kategori' => $nama]);
        }
    }
}
