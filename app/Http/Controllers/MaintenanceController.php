<?php

namespace App\Http\Controllers;

use App\Models\LogMaintenance;
use App\Models\PerangkatSensor;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // Untuk menu "Maintenance" - catat kegiatan maintenance baru
    public function create(Request $request)
    {
        $sensors = PerangkatSensor::orderBy('nama_perangkat')->get();

        // Kalau teknisi datang dari tombol "Perbaikan" pada sensor tertentu
        // (lihat sensor.index), sensor itu sudah otomatis terpilih di form.
        $selectedSensorId = $request->query('sensor_id') ?? $request->query('perangkat_id');

        return view('maintenance.create', compact('sensors', 'selectedSensorId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perangkat_id' => 'required|exists:perangkat_sensors,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'tandai_aktif' => 'nullable|boolean',
        ]);

        LogMaintenance::create([
            'perangkat_id' => $request->perangkat_id,
            'teknisi_id' => auth()->id(),
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        // Kegiatan maintenance selesai dicatat dan teknisi menandai
        // perangkat sudah kembali aktif -> statusnya ikut diperbarui,
        // supaya catatan maintenance & status perangkat tidak terpisah.
        if ($request->boolean('tandai_aktif')) {
            PerangkatSensor::where('id', $request->perangkat_id)
                ->update(['status' => 'aktif']);
        }

        return redirect()->route('teknisi.laporan.index')
            ->with('success', 'Kegiatan maintenance berhasil dicatat!');
    }

    // Untuk menu "Laporan" - lihat riwayat maintenance
    public function index()
    {
        $logs = LogMaintenance::with(['perangkat.kategori', 'perangkat.lokasi', 'teknisi'])
            ->orderByDesc('tanggal')
            ->paginate(10);

        return view('maintenance.index', compact('logs'));
    }
}
