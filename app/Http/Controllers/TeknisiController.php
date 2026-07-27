<?php

namespace App\Http\Controllers;

use App\Models\LogMaintenance;
use App\Models\PerangkatSensor;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        // Statistik diambil langsung dari data asli (perangkat_sensors),
        // bukan angka tetap, supaya selalu sinkron dengan Manage Sensor.
        $jumlahAktif = PerangkatSensor::where('status', 'aktif')->count();
        $jumlahMaintenance = PerangkatSensor::where('status', 'maintenance')->count();
        $jumlahRusak = PerangkatSensor::where('status', 'rusak')->count();
        $jumlahSelesaiBulanIni = LogMaintenance::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();

        return view('teknisi.dashboard', compact(
            'jumlahAktif',
            'jumlahMaintenance',
            'jumlahRusak',
            'jumlahSelesaiBulanIni'
        ));
    }

    /**
     * Teknisi menandai perangkat yang rusak/maintenance sudah kembali aktif.
     * Sengaja dibatasi transisi statusnya (tidak bebas ke status apapun)
     * supaya perubahan tetap masuk akal secara operasional.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:aktif,maintenance',
            'catatan' => 'nullable|string',
        ]);

        $sensor = PerangkatSensor::findOrFail($id);

        $sensor->update([
            'status' => $request->status,
            'kondisi_terakhir' => $request->filled('catatan')
                ? $request->catatan
                : $sensor->kondisi_terakhir,
        ]);

        return back()->with('success', "Status \"{$sensor->nama_perangkat}\" berhasil diperbarui menjadi " . ucfirst($request->status) . ".");
    }
}
