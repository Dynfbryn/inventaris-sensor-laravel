<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Urutan penting: kategori & lokasi dulu (dipakai sensor),
     * baru admin/pimpinan, lalu sensor & inventaris.
     */
    public function run(): void
    {
        $this->call([
            KategoriSensorSeeder::class,
            LokasiSeeder::class,
            AdminPimpinanSeeder::class,
            SensorSeeder::class,
            InventarisSeeder::class,
        ]);
    }
}
