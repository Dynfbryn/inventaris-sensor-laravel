<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('➕ Tambah Sensor Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Tambah Sensor</h1>

                @if($kategoris->isEmpty() || $lokasis->isEmpty())
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-6 rounded-xl">
                        Kategori atau lokasi belum ada. Tambahkan dulu lewat menu
                        <a href="{{ route('admin.kategori-sensor.index') }}" class="underline font-semibold">Kategori Sensor</a>
                        dan <a href="{{ route('admin.lokasi.index') }}" class="underline font-semibold">Lokasi</a>.
                    </div>
                @endif

                <form action="{{ route('admin.sensors.store') }}" method="POST">
                    @csrf

                    <!-- Kode Aset -->
                    <div class="mb-6">
                        <label for="kode_aset" class="block text-sm font-medium text-gray-700 mb-2">Kode Aset</label>
                        <input type="text" name="kode_aset" id="kode_aset" value="{{ old('kode_aset') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Contoh: SNR-0101">
                        @error('kode_aset')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Perangkat -->
                    <div class="mb-6">
                        <label for="nama_perangkat" class="block text-sm font-medium text-gray-700 mb-2">Nama Perangkat</label>
                        <input type="text" name="nama_perangkat" id="nama_perangkat" value="{{ old('nama_perangkat') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Contoh: Sensor Suhu Ruang Server">
                        @error('nama_perangkat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori Sensor (dinamis, admin bisa tambah sendiri) -->
                    <div class="mb-6">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori Sensor
                            <a href="{{ route('admin.kategori-sensor.index') }}" class="text-xs text-green-600 hover:underline ml-2">+ kelola kategori</a>
                        </label>
                        <select name="kategori_id" id="kategori_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lokasi (dinamis) -->
                    <div class="mb-6">
                        <label for="lokasi_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Lokasi
                            <a href="{{ route('admin.lokasi.index') }}" class="text-xs text-green-600 hover:underline ml-2">+ kelola lokasi</a>
                        </label>
                        <select name="lokasi_id" id="lokasi_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">-- Pilih Lokasi --</option>
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}" {{ old('lokasi_id') == $lokasi->id ? 'selected' : '' }}>
                                    {{ $lokasi->nama_lokasi }}
                                </option>
                            @endforeach
                        </select>
                        @error('lokasi_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Merk -->
                    <div class="mb-6">
                        <label for="merk" class="block text-sm font-medium text-gray-700 mb-2">Merk (Opsional)</label>
                        <input type="text" name="merk" id="merk" value="{{ old('merk') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('merk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tahun Pengadaan -->
                    <div class="mb-6">
                        <label for="tahun_pengadaan" class="block text-sm font-medium text-gray-700 mb-2">Tahun Pengadaan (Opsional)</label>
                        <input type="number" name="tahun_pengadaan" id="tahun_pengadaan" value="{{ old('tahun_pengadaan') }}"
                               min="1990" max="{{ date('Y') + 1 }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('tahun_pengadaan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="rusak" {{ old('status') === 'rusak' ? 'selected' : '' }}>Rusak</option>
                            <option value="nonaktif" {{ old('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kondisi Terakhir -->
                    <div class="mb-6">
                        <label for="kondisi_terakhir" class="block text-sm font-medium text-gray-700 mb-2">Kondisi Terakhir (Opsional)</label>
                        <textarea name="kondisi_terakhir" id="kondisi_terakhir" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('kondisi_terakhir') }}</textarea>
                        @error('kondisi_terakhir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Assigned To -->
                    <div class="mb-6">
                        <label for="assigned_to" class="block text-sm font-medium text-gray-700 mb-2">Teknisi yang Bertanggung Jawab (Opsional)</label>
                        <select name="assigned_to" id="assigned_to"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">-- Pilih Teknisi --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.sensors.index') }}"
                           class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all shadow-lg">
                            Simpan Sensor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
