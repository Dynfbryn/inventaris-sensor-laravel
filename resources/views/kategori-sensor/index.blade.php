<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('🏷️ Kategori Sensor') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-teal-500 to-cyan-600 rounded-2xl shadow-xl p-6 mb-6">
                <h1 class="text-2xl font-bold text-white">Kelola Kategori Sensor</h1>
                <p class="text-teal-100 text-sm mt-1">
                    Tambahkan kategori sesuai kebutuhan bidang MKGI Anda (Meteorologi, Klimatologi, Geofisika, Kualitas Udara, Maritim, dst) — tidak dibatasi jumlahnya.
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-xl">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <!-- Form Tambah -->
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">+ Tambah Kategori Baru</h2>
                <form action="{{ route('admin.kategori-sensor.store') }}" method="POST" class="flex gap-3">
                    @csrf
                    <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required
                           placeholder="Contoh: Kualitas Udara"
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500">
                    <button type="submit" class="px-6 py-3 bg-teal-600 text-white rounded-xl font-semibold hover:bg-teal-700">
                        Tambah
                    </button>
                </form>
                @error('nama_kategori')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Daftar Kategori -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Nama Kategori</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Jumlah Sensor</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($kategoris as $kategori)
                                <tr class="hover:bg-gray-50" x-data="{ editing: false }">
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <span x-show="!editing">{{ $kategori->nama_kategori }}</span>
                                        <form x-show="editing" action="{{ route('admin.kategori-sensor.update', $kategori->id) }}" method="POST" class="flex gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}"
                                                   class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                            <button type="submit" class="text-green-600 font-semibold text-sm">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $kategori->perangkat_sensors_count }} sensor</td>
                                    <td class="px-6 py-4 text-sm font-medium space-x-3">
                                        <button type="button" @click="editing = !editing" class="text-blue-600 hover:text-blue-900">
                                            <span x-text="editing ? 'Batal' : 'Edit'"></span>
                                        </button>
                                        <form action="{{ route('admin.kategori-sensor.destroy', $kategori->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-gray-500">Belum ada kategori sensor.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($kategoris->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">{{ $kategoris->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
