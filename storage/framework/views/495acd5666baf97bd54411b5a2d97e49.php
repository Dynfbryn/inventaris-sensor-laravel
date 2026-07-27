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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('📡 Manajemen Sensor')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl shadow-xl p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Daftar Sensor</h1>
                        <p class="text-green-100 text-sm mt-1">Kelola semua perangkat sensor MKGI dalam sistem</p>
                    </div>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('admin.sensors.create')); ?>"
                           class="bg-white text-green-600 px-6 py-3 rounded-xl font-semibold hover:bg-green-50 transition-all shadow-lg">
                            + Tambah Sensor
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Success / Error Message -->
            <?php if(session('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-xl" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl" role="alert">
                    <p class="font-bold">Gagal!</p>
                    <p><?php echo e(session('error')); ?></p>
                </div>
            <?php endif; ?>

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
                            <?php $__empty_1 = true; $__currentLoopData = $sensors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sensor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($sensor->kode_aset); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($sensor->nama_perangkat); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php echo e($sensor->kategori->nama_kategori ?? '-'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            <?php echo e($sensor->status === 'aktif' ? 'bg-green-100 text-green-800' : ''); ?>

                                            <?php echo e($sensor->status === 'maintenance' ? 'bg-yellow-100 text-yellow-800' : ''); ?>

                                            <?php echo e($sensor->status === 'rusak' ? 'bg-red-100 text-red-800' : ''); ?>

                                            <?php echo e($sensor->status === 'nonaktif' ? 'bg-gray-100 text-gray-800' : ''); ?>">
                                            <?php echo e(ucfirst($sensor->status)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php echo e($sensor->lokasi->nama_lokasi ?? '-'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php echo e($sensor->assignedTeknisi->name ?? '-'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-y-1">
                                        <?php if(auth()->user()->role === 'admin'): ?>
                                            <a href="<?php echo e(route('admin.sensors.edit', $sensor->id)); ?>"
                                               class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                            <form action="<?php echo e(route('admin.sensors.destroy', $sensor->id)); ?>"
                                                  method="POST" class="inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Yakin ingin menghapus sensor ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        <?php elseif(auth()->user()->role === 'teknisi'): ?>
                                            <div class="flex flex-col gap-1">
                                                <?php if($sensor->status === 'rusak' || $sensor->status === 'maintenance'): ?>
                                                    <a href="<?php echo e(route('teknisi.maintenance.create', ['sensor_id' => $sensor->id])); ?>"
                                                       class="text-red-600 hover:text-red-900 font-semibold">
                                                        🔧 Catat Perbaikan
                                                    </a>
                                                    <form action="<?php echo e(route('teknisi.sensors.updateStatus', $sensor->id)); ?>" method="POST"
                                                          onsubmit="return confirm('Tandai sensor ini aktif kembali?')">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PATCH'); ?>
                                                        <input type="hidden" name="status" value="aktif">
                                                        <button type="submit" class="text-green-600 hover:text-green-900 font-semibold">
                                                            ✅ Tandai Aktif
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <span class="text-gray-400">-</span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                        Belum ada data sensor. Silakan tambahkan sensor baru.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if($sensors->hasPages()): ?>
                    <div class="px-6 py-4 border-t border-gray-200">
                        <?php echo e($sensors->links()); ?>

                    </div>
                <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\laragon\www\inventaris-sensor-mkg\resources\views/sensor/index.blade.php ENDPATH**/ ?>