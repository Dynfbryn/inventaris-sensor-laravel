<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Kolom perangkat_id awalnya NOT NULL (foreign key ke perangkat_sensors),
     * padahal fitur maintenance yang berjalan sekarang memakai sensor_id
     * (tabel sensors), bukan perangkat_id lagi. Akibatnya setiap kali
     * teknisi menyimpan catatan maintenance, INSERT selalu gagal karena
     * perangkat_id kosong -> dilempar ke halaman error.
     *
     * Migration ini membuat perangkat_id nullable supaya alur maintenance
     * berbasis sensor_id bisa berjalan normal.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE log_maintenances ALTER COLUMN perangkat_id DROP NOT NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE log_maintenances ALTER COLUMN perangkat_id SET NOT NULL');
    }
};
