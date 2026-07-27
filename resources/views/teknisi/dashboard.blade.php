<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('🔧 Teknisi Dashboard') }}
            </h2>
            <span class="text-sm text-gray-600">{{ now()->format('d F Y') }}</span>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl shadow-xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">
                    Selamat Datang, {{ auth()->user()->name }}! 🔧
                </h1>
                <p class="text-orange-100">Kelola dan maintenance sensor dengan efisien</p>
            </div>
            
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                    <p class="text-blue-100 text-sm mb-1">Sensor Aktif</p>
                    <p class="text-4xl font-bold text-white">{{ $jumlahAktif }}</p>
                </div>
                <div class="bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                    <p class="text-yellow-100 text-sm mb-1">Maintenance</p>
                    <p class="text-4xl font-bold text-white">{{ $jumlahMaintenance }}</p>
                </div>
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                    <p class="text-red-100 text-sm mb-1">Rusak</p>
                    <p class="text-4xl font-bold text-white">{{ $jumlahRusak }}</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                    <p class="text-green-100 text-sm mb-1">Selesai Bulan Ini</p>
                    <p class="text-4xl font-bold text-white">{{ $jumlahSelesaiBulanIni }}</p>
                </div>
            </div>
            
            <!-- Menu Teknisi -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-orange-500 text-white rounded-lg p-2 mr-3">🛠️</span>
                    Menu Teknisi
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="{{ route('teknisi.sensors.index') }}" class="group bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-500 hover:to-blue-600 text-blue-700 hover:text-white px-6 py-4 rounded-xl transition-all duration-300 shadow-md">
                        <div class="text-center">
                            <div class="text-4xl mb-2">📡</div>
                            <p class="font-semibold">Lihat Sensor</p>
                        </div>
                    </a>
                    <a href="{{ route('teknisi.maintenance.create') }}" class="group bg-gradient-to-br from-yellow-50 to-yellow-100 hover:from-yellow-500 hover:to-yellow-600 text-yellow-700 hover:text-white px-6 py-4 rounded-xl transition-all duration-300 shadow-md">
                        <div class="text-center">
                            <div class="text-4xl mb-2">🔨</div>
                            <p class="font-semibold">Maintenance</p>
                        </div>
                    </a>
                    <a href="{{ route('teknisi.laporan.index') }}" class="group bg-gradient-to-br from-green-50 to-green-100 hover:from-green-500 hover:to-green-600 text-green-700 hover:text-white px-6 py-4 rounded-xl transition-all duration-300 shadow-md">
                        <div class="text-center">
                            <div class="text-4xl mb-2">✅</div>
                            <p class="font-semibold">Laporan</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>