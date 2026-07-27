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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"><?php echo e(__('📦 Manajemen Inventaris')); ?></h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-purple-500 to-fuchsia-600 rounded-2xl shadow-xl p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Daftar Inventaris</h1>
                        <p class="text-purple-100 text-sm mt-1">Kelola semua barang inventaris</p>
                    </div>
                    <a href="<?php echo e(route('admin.inventaris.create')); ?>"
                       class="bg-white text-purple-600 px-6 py-3 rounded-xl font-semibold hover:bg-purple-50 shadow-lg">
                        + Tambah Barang
                    </a>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-xl">
                    <p><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>

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
                            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($item->id); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900"><?php echo e($item->name); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->type); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->quantity); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->condition); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->location); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        <a href="<?php echo e(route('admin.inventaris.edit', $item->id)); ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        <form action="<?php echo e(route('admin.inventaris.destroy', $item->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="7" class="px-6 py-12 text-center text-gray-500">Belum ada data inventaris.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php if($items->hasPages()): ?>
                    <div class="px-6 py-4 border-t border-gray-200"><?php echo e($items->links()); ?></div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\inventaris-sensor-mkg\resources\views/inventaris/index.blade.php ENDPATH**/ ?>