<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {
        $lokasis = [
            ['nama_lokasi' => 'Taman Alat Utama', 'alamat' => null],
            ['nama_lokasi' => 'Ruang Server', 'alamat' => null],
            ['nama_lokasi' => 'Gudang Peralatan', 'alamat' => null],
        ];

        foreach ($lokasis as $lokasi) {
            Lokasi::firstOrCreate(['nama_lokasi' => $lokasi['nama_lokasi']], $lokasi);
        }
    }
}
