<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('📡 Manajemen Sensor') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl shadow-xl p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Daftar Sensor</h1>
                        <p class="text-green-100 text-sm mt-1">Kelola semua perangkat sensor MKGI dalam sistem</p>
                    </div>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.sensors.create') }}"
                           class="bg-white text-green-600 px-6 py-3 rounded-xl font-semibold hover:bg-green-50 transition-all shadow-lg">
                            + Tambah Sensor
                        </a>
                    @endif
                </div>
            </div>

            <!-- Success / Error Message -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-xl" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl" role="alert">
                    <p class="font-bold">Gagal!</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Aset</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Perangkat</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penanggung Jawab</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($sensors as $sensor)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $sensor->kode_aset }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $sensor->nama_perangkat }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $sensor->kategori->nama_kategori ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $sensor->status === 'aktif' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $sensor->status === 'maintenance' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $sensor->status === 'rusak' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $sensor->status === 'nonaktif' ? 'bg-gray-100 text-gray-800' : '' }}">
                                            {{ ucfirst($sensor->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $sensor->lokasi->nama_lokasi ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $sensor->assignedTeknisi->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-y-1">
                                        @if(auth()->user()->role === 'admin')
                                            <a href="{{ route('admin.sensors.edit', $sensor->id) }}"
                                               class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                            <form action="{{ route('admin.sensors.destroy', $sensor->id) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Yakin ingin menghapus sensor ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        @elseif(auth()->user()->role === 'teknisi')
                                            <div class="flex flex-col gap-1">
                                                @if($sensor->status === 'rusak' || $sensor->status === 'maintenance')
                                                    <a href="{{ route('teknisi.maintenance.create', ['sensor_id' => $sensor->id]) }}"
                                                       class="text-red-600 hover:text-red-900 font-semibold">
                                                        🔧 Catat Perbaikan
                                                    </a>
                                                    <form action="{{ route('teknisi.sensors.updateStatus', $sensor->id) }}" method="POST"
                                                          onsubmit="return confirm('Tandai sensor ini aktif kembali?')">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="aktif">
                                                        <button type="submit" class="text-green-600 hover:text-green-900 font-semibold">
                                                            ✅ Tandai Aktif
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                        Belum ada data sensor. Silakan tambahkan sensor baru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($sensors->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $sensors->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
