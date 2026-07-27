<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('inventaris')->insert([
            ['name' => 'Laptop Dell', 'type' => 'Elektronik', 'quantity' => 5, 'condition' => 'Baik', 'location' => 'Ruang IT', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Printer HP', 'type' => 'Elektronik', 'quantity' => 2, 'condition' => 'Baik', 'location' => 'Ruang Admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meja Kerja', 'type' => 'Furniture', 'quantity' => 10, 'condition' => 'Baik', 'location' => 'Umum', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}