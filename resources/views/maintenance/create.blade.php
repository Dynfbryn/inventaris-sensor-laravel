<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('🔨 Catat Maintenance') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Catat Kegiatan Maintenance</h1>

                <form action="{{ route('teknisi.maintenance.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sensor</label>
                        <select name="perangkat_id" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500">
                            <option value="">-- Pilih Sensor --</option>
                            @foreach($sensors as $sensor)
                                <option value="{{ $sensor->id }}" {{ old('perangkat_id', $selectedSensorId) == $sensor->id ? 'selected' : '' }}>
                                    {{ $sensor->nama_perangkat }} ({{ $sensor->lokasi->nama_lokasi ?? '-' }})
                                    @if($sensor->status === 'rusak') - Rusak @elseif($sensor->status === 'maintenance') - Maintenance @endif
                                </option>
                            @endforeach
                        </select>
                        @error('perangkat_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500">
                        @error('tanggal')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500"
                                  placeholder="Jelaskan kegiatan maintenance yang dilakukan...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-4">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="tandai_aktif" value="1" {{ old('tandai_aktif') ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-green-600 focus:ring-green-500 h-5 w-5">
                            <span class="text-sm text-gray-700">
                                Perbaikan sudah selesai, tandai sensor ini <strong>Aktif</strong> kembali setelah disimpan.
                            </span>
                        </label>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('teknisi.dashboard') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300">Batal</a>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-amber-600 text-white rounded-xl hover:from-orange-600 hover:to-amber-700 shadow-lg">Simpan Catatan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
