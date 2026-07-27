<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('📊 Pimpinan Dashboard') }}
            </h2>
            <span class="text-sm text-gray-600">{{ now()->format('d F Y') }}</span>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-700 rounded-2xl shadow-xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">
                    Selamat Datang, {{ auth()->user()->name }}! 📊
                </h1>
                <p class="text-indigo-100">Monitor dan analisis performa sistem inventaris</p>
            </div>
            
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm mb-1">Total Inventaris</p>
                            <p class="text-4xl font-bold text-white">{{ $totalInventaris ?? 0 }}</p>
                        </div>
                        <div class="text-5xl">📦</div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-green-600 to-teal-700 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm mb-1">Total Teknisi</p>
                            <p class="text-4xl font-bold text-white">{{ $totalTeknisi ?? 0 }}</p>
                        </div>
                        <div class="text-5xl">👨‍🔧</div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-purple-600 to-pink-700 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm mb-1">Sensor Aktif</p>
                            <p class="text-4xl font-bold text-white">{{ $activeSensors ?? 0 }}</p>
                        </div>
                        <div class="text-5xl">📡</div>
                    </div>
                </div>
            </div>
            
            <!-- Menu Pimpinan -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-indigo-500 text-white rounded-lg p-2 mr-3">📈</span>
                    Menu Pimpinan
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="#" class="group bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-500 hover:to-blue-600 text-blue-700 hover:text-white px-6 py-4 rounded-xl transition-all duration-300 shadow-md">
                        <div class="text-center">
                            <div class="text-4xl mb-2">📋</div>
                            <p class="font-semibold">Laporan</p>
                        </div>
                    </a>
                    <a href="#" class="group bg-gradient-to-br from-green-50 to-green-100 hover:from-green-500 hover:to-green-600 text-green-700 hover:text-white px-6 py-4 rounded-xl transition-all duration-300 shadow-md">
                        <div class="text-center">
                            <div class="text-4xl mb-2">📊</div>
                            <p class="font-semibold">Analytics</p>
                        </div>
                    </a>
                    <a href="#" class="group bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-500 hover:to-purple-600 text-purple-700 hover:text-white px-6 py-4 rounded-xl transition-all duration-300 shadow-md">
                        <div class="text-center">
                            <div class="text-4xl mb-2">📉</div>
                            <p class="font-semibold">Performance</p>
                        </div>
                    </a>
                    <a href="#" class="group bg-gradient-to-br from-orange-50 to-orange-100 hover:from-orange-500 hover:to-orange-600 text-orange-700 hover:text-white px-6 py-4 rounded-xl transition-all duration-300 shadow-md">
                        <div class="text-center">
                            <div class="text-4xl mb-2">👥</div>
                            <p class="font-semibold">Tim</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>