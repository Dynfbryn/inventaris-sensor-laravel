<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('perangkat_sensors', function (Blueprint $table) {
        $table->id();
        $table->string('kode_aset')->unique();
        $table->string('nama_perangkat');
        $table->foreignId('kategori_id')->constrained('kategori_sensors')->onDelete('cascade');
        $table->foreignId('lokasi_id')->constrained('lokasis')->onDelete('cascade');
        $table->string('merk')->nullable();
        $table->year('tahun_pengadaan')->nullable();
        $table->enum('status', ['aktif', 'rusak', 'maintenance', 'nonaktif'])->default('aktif');
        $table->text('kondisi_terakhir')->nullable();
        $table->foreignId('dicatat_oleh')->nullable()->constrained('users')->onDelete('set null');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_sensors');
    }
};
