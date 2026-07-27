<?php

namespace App\Http\Controllers;

use App\Models\KategoriSensor;
use Illuminate\Http\Request;

class KategoriSensorController extends Controller
{
    public function index()
    {
        $kategoris = KategoriSensor::withCount('perangkatSensors')
            ->orderBy('nama_kategori')
            ->paginate(10);

        return view('kategori-sensor.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_sensors,nama_kategori',
        ]);

        KategoriSensor::create($request->only('nama_kategori'));

        return redirect()->route('admin.kategori-sensor.index')
            ->with('success', 'Kategori sensor berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriSensor::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_sensors,nama_kategori,' . $kategori->id,
        ]);

        $kategori->update($request->only('nama_kategori'));

        return redirect()->route('admin.kategori-sensor.index')
            ->with('success', 'Kategori sensor berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kategori = KategoriSensor::withCount('perangkatSensors')->findOrFail($id);

        if ($kategori->perangkat_sensors_count > 0) {
            return redirect()->route('admin.kategori-sensor.index')
                ->with('error', 'Kategori ini masih dipakai oleh ' . $kategori->perangkat_sensors_count . ' sensor, tidak bisa dihapus.');
        }

        $kategori->delete();

        return redirect()->route('admin.kategori-sensor.index')
            ->with('success', 'Kategori sensor berhasil dihapus!');
    }
}
