<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * - assigned_to: teknisi yang bertanggung jawab atas perangkat (fitur ini
     *   sebelumnya ada di tabel `sensors` lama, dipindahkan ke sini).
     * - legacy_sensor_id: kolom sementara, hanya dipakai untuk memetakan data
     *   lama dari tabel `sensors` -> `perangkat_sensors` pada migration
     *   berikutnya. Akan dihapus lagi setelah migrasi data selesai.
     */
    public function up(): void
    {
        Schema::table('perangkat_sensors', function (Blueprint $table) {
            $table->foreignId('assigned_to')->nullable()->after('dicatat_oleh')
                ->constrained('users')->nullOnDelete();
            $table->unsignedBigInteger('legacy_sensor_id')->nullable()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('perangkat_sensors', function (Blueprint $table) {
            $table->dropConstrainedForeignId('assigned_to');
            $table->dropColumn('legacy_sensor_id');
        });
    }
};
