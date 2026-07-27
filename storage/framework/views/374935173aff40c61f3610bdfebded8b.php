<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex flex-col md:flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('🎛️ Admin Dashboard')); ?>

            </h2>
            <div class="mt-2 md:mt-0 flex items-center space-x-2">
                <span class="text-sm text-gray-600 bg-gray-100 px-3 py-1 rounded-full">
                    <?php echo e(now()->locale('id')->isoFormat('dddd, D MMMM Y')); ?>

                </span>
                <span class="text-sm text-gray-600 bg-blue-100 px-3 py-1 rounded-full">
                    <?php echo e(now()->format('H:i')); ?> WIB
                </span>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl shadow-2xl p-8 mb-8 transform hover:scale-[1.01] transition-transform duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Selamat Datang, <?php echo e(auth()->user()->name); ?>! 👋
                        </h1>
                        <p class="text-blue-100 text-lg">
                            Panel Administrasi Sistem Inventaris Sensor MKG
                        </p>
                        <p class="text-blue-200 text-sm mt-2">
                            Kelola sistem inventaris dan sensor dengan mudah dan efisien
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <!-- Total Users Card -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-xl p-6 transform hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium mb-1 uppercase tracking-wide">
                                Total Users
                            </p>
                            <p class="text-5xl font-bold text-white mb-2">
                                <?php echo e($totalUsers ?? 0); ?>

                            </p>
                            <p class="text-blue-200 text-xs">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    Aktif saat ini
                                </span>
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-2xl p-4 backdrop-blur-sm">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Total Sensors Card -->
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl p-6 transform hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm font-medium mb-1 uppercase tracking-wide">
                                Total Sensors
                            </p>
                            <p class="text-5xl font-bold text-white mb-2">
                                <?php echo e($totalSensors ?? 0); ?>

                            </p>
                            <p class="text-green-200 text-xs">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Sensor aktif
                                </span>
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-2xl p-4 backdrop-blur-sm">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Total Inventaris Card -->
                <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl p-6 transform hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm font-medium mb-1 uppercase tracking-wide">
                                Total Inventaris
                            </p>
                            <p class="text-5xl font-bold text-white mb-2">
                                <?php echo e($totalInventaris ?? 0); ?>

                            </p>
                            <p class="text-purple-200 text-xs">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    Barang terdaftar
                                </span>
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-2xl p-4 backdrop-blur-sm">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions Menu -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl p-2 mr-3 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                        </span>
                        Menu Administrasi
                    </h2>
                    <span class="text-sm text-gray-500 bg-gray-100 px-4 py-2 rounded-full">
                        Akses Cepat
                    </span>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                    <!-- Kategori Sensor -->
                    <a href="<?php echo e(route('admin.kategori-sensor.index')); ?>" class="group relative overflow-hidden bg-gradient-to-br from-teal-50 to-teal-100 hover:from-teal-500 hover:to-teal-600 rounded-xl p-6 transition-all duration-300 shadow-md hover:shadow-2xl transform hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-2 -mr-2 w-20 h-20 bg-white opacity-10 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="text-5xl mb-3 transform group-hover:scale-110 transition-transform duration-300">
                                    🏷️
                                </div>
                                <h3 class="font-bold text-gray-800 group-hover:text-white mb-1 text-lg">
                                    Kategori Sensor
                                </h3>
                                <p class="text-sm text-gray-600 group-hover:text-teal-100">
                                    Kelola kategori MKGI
                                </p>
                            </div>
                        </div>
                    </a>

                    <!-- Lokasi -->
                    <a href="<?php echo e(route('admin.lokasi.index')); ?>" class="group relative overflow-hidden bg-gradient-to-br from-indigo-50 to-indigo-100 hover:from-indigo-500 hover:to-indigo-600 rounded-xl p-6 transition-all duration-300 shadow-md hover:shadow-2xl transform hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-2 -mr-2 w-20 h-20 bg-white opacity-10 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="text-5xl mb-3 transform group-hover:scale-110 transition-transform duration-300">
                                    📍
                                </div>
                                <h3 class="font-bold text-gray-800 group-hover:text-white mb-1 text-lg">
                                    Lokasi
                                </h3>
                                <p class="text-sm text-gray-600 group-hover:text-indigo-100">
                                    Kelola lokasi sensor
                                </p>
                            </div>
                        </div>
                    </a>

                    <!-- Manage Users -->
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="group relative overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-500 hover:to-blue-600 rounded-xl p-6 transition-all duration-300 shadow-md hover:shadow-2xl transform hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-2 -mr-2 w-20 h-20 bg-white opacity-10 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="text-5xl mb-3 transform group-hover:scale-110 transition-transform duration-300">
                                    👥
                                </div>
                                <h3 class="font-bold text-gray-800 group-hover:text-white mb-1 text-lg">
                                    Manage Users
                                </h3>
                                <p class="text-sm text-gray-600 group-hover:text-blue-100">
                                    Kelola pengguna sistem
                                </p>
                            </div>
                        </div>
                    </a>
                    
                    <!-- Manage Sensors - LINK SUDAH DIPERBAIKI! -->
                    <a href="<?php echo e(route('admin.sensors.index')); ?>" class="group relative overflow-hidden bg-gradient-to-br from-green-50 to-green-100 hover:from-green-500 hover:to-green-600 rounded-xl p-6 transition-all duration-300 shadow-md hover:shadow-2xl transform hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-2 -mr-2 w-20 h-20 bg-white opacity-10 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="text-5xl mb-3 transform group-hover:scale-110 transition-transform duration-300">
                                    📡
                                </div>
                                <h3 class="font-bold text-gray-800 group-hover:text-white mb-1 text-lg">
                                    Manage Sensors
                                </h3>
                                <p class="text-sm text-gray-600 group-hover:text-green-100">
                                    Monitoring sensor
                                </p>
                            </div>
                        </div>
                    </a>
                    
                    <!-- Manage Inventaris -->
                    <a href="<?php echo e(route('admin.inventaris.index')); ?>" class="group relative overflow-hidden bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-500 hover:to-purple-600 rounded-xl p-6 transition-all duration-300 shadow-md hover:shadow-2xl transform hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-2 -mr-2 w-20 h-20 bg-white opacity-10 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="text-5xl mb-3 transform group-hover:scale-110 transition-transform duration-300">
                                    
                                </div>
                                <h3 class="font-bold text-gray-800 group-hover:text-white mb-1 text-lg">
                                    Manage Inventaris
                                </h3>
                                <p class="text-sm text-gray-600 group-hover:text-purple-100">
                                    Inventaris barang
                                </p>
                            </div>
                        </div>
                    </a>
                    
                    <!-- Reports -->
                    <a href="<?php echo e(route('admin.reports.index')); ?>" class="group relative overflow-hidden bg-gradient-to-br from-red-50 to-red-100 hover:from-red-500 hover:to-red-600 rounded-xl p-6 transition-all duration-300 shadow-md hover:shadow-2xl transform hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-2 -mr-2 w-20 h-20 bg-white opacity-10 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="text-5xl mb-3 transform group-hover:scale-110 transition-transform duration-300">
                                    📊
                                </div>
                                <h3 class="font-bold text-gray-800 group-hover:text-white mb-1 text-lg">
                                    Reports
                                </h3>
                                <p class="text-sm text-gray-600 group-hover:text-red-100">
                                    Laporan sistem
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Recent Activity Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl p-2 mr-3 shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    Aktivitas Terbaru
                </h2>
                
                <div class="space-y-4">
                    <!-- Activity Item -->
                    <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-800 font-medium">User baru terdaftar</p>
                            <p class="text-gray-500 text-sm">Admin menambahkan teknisi baru ke sistem</p>
                            <p class="text-gray-400 text-xs mt-1">2 jam yang lalu</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item -->
                    <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-800 font-medium">Sensor berhasil ditambahkan</p>
                            <p class="text-gray-500 text-sm">Sensor Temperature #001 telah diinstal</p>
                            <p class="text-gray-400 text-xs mt-1">5 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\inventaris-sensor-mkg\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>