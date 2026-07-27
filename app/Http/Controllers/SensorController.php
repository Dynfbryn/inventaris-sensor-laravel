<?php

namespace App\Http\Controllers;

use App\Models\KategoriSensor;
use App\Models\Lokasi;
use App\Models\PerangkatSensor;
use App\Models\User;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        $sensors = PerangkatSensor::with(['kategori', 'lokasi', 'assignedTeknisi'])
            ->latest()
            ->paginate(10);

        return view('sensor.index', compact('sensors'));
    }

    public function create()
    {
        $users = User::where('role', 'teknisi')->get();
        $kategoris = KategoriSensor::orderBy('nama_kategori')->get();
        $lokasis = Lokasi::orderBy('nama_lokasi')->get();

        return view('sensor.create', compact('users', 'kategoris', 'lokasis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_aset'        => 'required|string|max:255|unique:perangkat_sensors,kode_aset',
            'nama_perangkat'   => 'required|string|max:255',
            'kategori_id'      => 'required|exists:kategori_sensors,id',
            'lokasi_id'        => 'required|exists:lokasis,id',
            'merk'             => 'nullable|string|max:255',
            'tahun_pengadaan'  => 'nullable|digits:4|integer|min:1990|max:' . (date('Y') + 1),
            'status'           => 'required|in:aktif,rusak,maintenance,nonaktif',
            'kondisi_terakhir' => 'nullable|string',
            'assigned_to'      => 'nullable|exists:users,id',
        ]);

        $validated['dicatat_oleh'] = auth()->id();

        PerangkatSensor::create($validated);

        return redirect()->route('admin.sensors.index')
            ->with('success', 'Sensor berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sensor = PerangkatSensor::findOrFail($id);
        $users = User::where('role', 'teknisi')->get();
        $kategoris = KategoriSensor::orderBy('nama_kategori')->get();
        $lokasis = Lokasi::orderBy('nama_lokasi')->get();

        return view('sensor.edit', compact('sensor', 'users', 'kategoris', 'lokasis'));
    }

    public function update(Request $request, $id)
    {
        $sensor = PerangkatSensor::findOrFail($id);

        $validated = $request->validate([
            'kode_aset'        => 'required|string|max:255|unique:perangkat_sensors,kode_aset,' . $sensor->id,
            'nama_perangkat'   => 'required|string|max:255',
            'kategori_id'      => 'required|exists:kategori_sensors,id',
            'lokasi_id'        => 'required|exists:lokasis,id',
            'merk'             => 'nullable|string|max:255',
            'tahun_pengadaan'  => 'nullable|digits:4|integer|min:1990|max:' . (date('Y') + 1),
            'status'           => 'required|in:aktif,rusak,maintenance,nonaktif',
            'kondisi_terakhir' => 'nullable|string',
            'assigned_to'      => 'nullable|exists:users,id',
        ]);

        $sensor->update($validated);

        return redirect()->route('admin.sensors.index')
            ->with('success', 'Sensor berhasil diupdate!');
    }

    public function destroy($id)
    {
        PerangkatSensor::findOrFail($id)->delete();

        return redirect()->route('admin.sensors.index')
            ->with('success', 'Sensor berhasil dihapus!');
    }
}
