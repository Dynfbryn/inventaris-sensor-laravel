<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Setelah migration sebelumnya memetakan semua sensor_id -> perangkat_id,
     * kolom sensor_id (tambal sulam) tidak dibutuhkan lagi, dan perangkat_id
     * bisa dikembalikan menjadi wajib diisi seperti desain awal.
     */
    public function up(): void
    {
        if (Schema::hasColumn('log_maintenances', 'sensor_id')) {
            Schema::table('log_maintenances', function (Blueprint $table) {
                $table->dropColumn('sensor_id');
            });
        }

        // Hapus dulu baris "yatim" (kalau ada) yang gagal terpetakan,
        // supaya constraint NOT NULL di bawah tidak gagal diterapkan.
        DB::table('log_maintenances')->whereNull('perangkat_id')->delete();

        DB::statement('ALTER TABLE log_maintenances ALTER COLUMN perangkat_id SET NOT NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE log_maintenances ALTER COLUMN perangkat_id DROP NOT NULL');

        Schema::table('log_maintenances', function (Blueprint $table) {
            $table->unsignedBigInteger('sensor_id')->nullable()->after('perangkat_id');
        });
    }
};
