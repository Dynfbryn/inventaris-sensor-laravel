<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Inventaris Baru') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Tambah Inventaris</h1>

                <form action="{{ route('admin.inventaris.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500">
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe</label>
                        <input type="text" name="type" value="{{ old('type') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500"
                               placeholder="Contoh: Alat Ukur, Perkakas, dll">
                        @error('type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                        <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500">
                        @error('quantity')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                        <select name="condition" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500">
                            <option value="Baik" {{ old('condition') === 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ old('condition') === 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('condition') === 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('condition')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500">
                        @error('location')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ditugaskan Ke (Opsional)</label>
                        <select name="assigned_to" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500">
                            <option value="">-- Pilih Teknisi --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_to')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.inventaris.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300">Batal</a>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-fuchsia-600 text-white rounded-xl hover:from-purple-600 hover:to-fuchsia-700 shadow-lg">Simpan Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>