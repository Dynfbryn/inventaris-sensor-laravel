<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::withCount('perangkatSensors')
            ->orderBy('nama_lokasi')
            ->paginate(10);

        return view('lokasi.index', compact('lokasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255|unique:lokasis,nama_lokasi',
            'alamat' => 'nullable|string',
        ]);

        Lokasi::create($request->only('nama_lokasi', 'alamat'));

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $request->validate([
            'nama_lokasi' => 'required|string|max:255|unique:lokasis,nama_lokasi,' . $lokasi->id,
            'alamat' => 'nullable|string',
        ]);

        $lokasi->update($request->only('nama_lokasi', 'alamat'));

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::withCount('perangkatSensors')->findOrFail($id);

        if ($lokasi->perangkat_sensors_count > 0) {
            return redirect()->route('admin.lokasi.index')
                ->with('error', 'Lokasi ini masih dipakai oleh ' . $lokasi->perangkat_sensors_count . ' sensor, tidak bisa dihapus.');
        }

        $lokasi->delete();

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil dihapus!');
    }
}
