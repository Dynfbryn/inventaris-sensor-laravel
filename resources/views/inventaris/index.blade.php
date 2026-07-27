<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('📦 Manajemen Inventaris') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-purple-500 to-fuchsia-600 rounded-2xl shadow-xl p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Daftar Inventaris</h1>
                        <p class="text-purple-100 text-sm mt-1">Kelola semua barang inventaris</p>
                    </div>
                    <a href="{{ route('admin.inventaris.create') }}"
                       class="bg-white text-purple-600 px-6 py-3 rounded-xl font-semibold hover:bg-purple-50 shadow-lg">
                        + Tambah Barang
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-xl">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Nama Barang</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Kondisi</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($items as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->type }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->quantity }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->condition }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->location }}</td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        <a href="{{ route('admin.inventaris.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        <form action="{{ route('admin.inventaris.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="7" class="px-6 py-12 text-center text-gray-500">Belum ada data inventaris.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($items->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">{{ $items->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>