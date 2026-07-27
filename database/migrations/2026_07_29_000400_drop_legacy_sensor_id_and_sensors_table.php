<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('perangkat_sensors', 'legacy_sensor_id')) {
            Schema::table('perangkat_sensors', function (Blueprint $table) {
                $table->dropColumn('legacy_sensor_id');
            });
        }

        // Tabel `sensors` (model lama, sederhana) sudah tidak dipakai lagi
        // oleh kode manapun setelah migrasi ke `perangkat_sensors` selesai.
        Schema::dropIfExists('sensors');
    }

    public function down(): void
    {
        Schema::table('perangkat_sensors', function (Blueprint $table) {
            $table->unsignedBigInteger('legacy_sensor_id')->nullable()->after('id');
        });

        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('status')->default('active');
            $table->string('location')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamps();
        });
    }
};
