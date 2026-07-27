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
            <?php echo e(__('📍 Lokasi Sensor')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl shadow-xl p-6 mb-6">
                <h1 class="text-2xl font-bold text-white">Kelola Lokasi</h1>
                <p class="text-indigo-100 text-sm mt-1">
                    Daftar lokasi penempatan perangkat sensor, supaya penulisan lokasi konsisten (tidak beda-beda ejaan antar sensor).
                </p>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-xl">
                    <p><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl">
                    <p><?php echo e(session('error')); ?></p>
                </div>
            <?php endif; ?>

            <!-- Form Tambah -->
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">+ Tambah Lokasi Baru</h2>
                <form action="<?php echo e(route('admin.lokasi.store')); ?>" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="nama_lokasi" value="<?php echo e(old('nama_lokasi')); ?>" required
                           placeholder="Contoh: Stasiun Klimatologi Kota A"
                           class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 md:col-span-1">
                    <input type="text" name="alamat" value="<?php echo e(old('alamat')); ?>"
                           placeholder="Alamat (opsional)"
                           class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 md:col-span-1">
                    <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 md:col-span-1">
                        Tambah
                    </button>
                </form>
                <?php $__errorArgs = ['nama_lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Daftar Lokasi -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Nama Lokasi</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Jumlah Sensor</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $lokasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50" x-data="{ editing: false }">
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <span x-show="!editing"><?php echo e($lokasi->nama_lokasi); ?></span>
                                        <div x-show="editing">
                                            <form action="<?php echo e(route('admin.lokasi.update', $lokasi->id)); ?>" method="POST" class="flex flex-col gap-2">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <input type="text" name="nama_lokasi" value="<?php echo e($lokasi->nama_lokasi); ?>"
                                                       class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                                <input type="text" name="alamat" value="<?php echo e($lokasi->alamat); ?>" placeholder="Alamat"
                                                       class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                                <button type="submit" class="text-green-600 font-semibold text-sm text-left">Simpan</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($lokasi->alamat ?: '-'); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($lokasi->perangkat_sensors_count); ?> sensor</td>
                                    <td class="px-6 py-4 text-sm font-medium space-x-3">
                                        <button type="button" @click="editing = !editing" class="text-blue-600 hover:text-blue-900">
                                            <span x-text="editing ? 'Batal' : 'Edit'"></span>
                                        </button>
                                        <form action="<?php echo e(route('admin.lokasi.destroy', $lokasi->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Hapus lokasi ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">Belum ada data lokasi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php if($lokasis->hasPages()): ?>
                    <div class="px-6 py-4 border-t border-gray-200"><?php echo e($lokasis->links()); ?></div>
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
<?php /**PATH C:\laragon\www\inventaris-sensor-mkg\resources\views/lokasi/index.blade.php ENDPATH**/ ?>