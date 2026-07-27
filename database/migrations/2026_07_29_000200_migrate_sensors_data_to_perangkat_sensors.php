<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Memindahkan seluruh baris di tabel `sensors` (model lama, sederhana)
     * ke tabel `perangkat_sensors` (model MKGI yang punya kategori & lokasi
     * ternormalisasi). Kategori dibuat otomatis dari kolom `type` lama, dan
     * lokasi dibuat otomatis dari kolom `location` lama, supaya tidak ada
     * data yang hilang.
     *
     * Pemetaan status: active -> aktif, maintenance -> maintenance,
     * broken -> rusak, selain itu -> nonaktif.
     */
    public function up(): void
    {
        if (!Schema::hasTable('sensors')) {
            return;
        }

        $statusMap = [
            'active'      => 'aktif',
            'maintenance' => 'maintenance',
            'broken'      => 'rusak',
        ];

        $sensors = DB::table('sensors')->get();

        foreach ($sensors as $sensor) {
            // Cari atau buat kategori dari nilai `type` lama.
            $kategoriNama = $sensor->type ?: 'Lainnya';
            $kategoriId = DB::table('kategori_sensors')
                ->where('nama_kategori', $kategoriNama)
                ->value('id');

            if (!$kategoriId) {
                $kategoriId = DB::table('kategori_sensors')->insertGetId([
                    'nama_kategori' => $kategoriNama,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }

            // Cari atau buat lokasi dari nilai `location` lama.
            $lokasiNama = $sensor->location ?: 'Belum Ditentukan';
            $lokasiId = DB::table('lokasis')
                ->where('nama_lokasi', $lokasiNama)
                ->value('id');

            if (!$lokasiId) {
                $lokasiId = DB::table('lokasis')->insertGetId([
                    'nama_lokasi' => $lokasiNama,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }

            $kodeAset = 'SNR-' . str_pad($sensor->id, 4, '0', STR_PAD_LEFT);
            // Hindari bentrok kalau kode_aset ini kebetulan sudah ada.
            while (DB::table('perangkat_sensors')->where('kode_aset', $kodeAset)->exists()) {
                $kodeAset .= '-X';
            }

            DB::table('perangkat_sensors')->insert([
                'legacy_sensor_id' => $sensor->id,
                'kode_aset'        => $kodeAset,
                'nama_perangkat'   => $sensor->name,
                'kategori_id'      => $kategoriId,
                'lokasi_id'        => $lokasiId,
                'status'           => $statusMap[$sensor->status] ?? 'nonaktif',
                'assigned_to'      => $sensor->assigned_to,
                'created_at'       => $sensor->created_at ?? now(),
                'updated_at'       => $sensor->updated_at ?? now(),
            ]);
        }

        // Petakan log_maintenances yang masih pakai sensor_id (tabel lama)
        // supaya menunjuk ke perangkat_id (tabel baru) yang benar.
        if (Schema::hasTable('log_maintenances') && Schema::hasColumn('log_maintenances', 'sensor_id')) {
            $logs = DB::table('log_maintenances')->whereNotNull('sensor_id')->get();

            foreach ($logs as $log) {
                $perangkatId = DB::table('perangkat_sensors')
                    ->where('legacy_sensor_id', $log->sensor_id)
                    ->value('id');

                if ($perangkatId) {
                    DB::table('log_maintenances')
                        ->where('id', $log->id)
                        ->update(['perangkat_id' => $perangkatId]);
                }
            }
        }
    }

    public function down(): void
    {
        // Data migration tidak dirancang untuk dikembalikan otomatis.
        // Kembalikan dari backup database jika perlu rollback.
    }
};
