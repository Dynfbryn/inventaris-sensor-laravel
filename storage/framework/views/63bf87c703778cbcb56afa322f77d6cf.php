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
            <?php echo e(__('🏷️ Kategori Sensor')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-teal-500 to-cyan-600 rounded-2xl shadow-xl p-6 mb-6">
                <h1 class="text-2xl font-bold text-white">Kelola Kategori Sensor</h1>
                <p class="text-teal-100 text-sm mt-1">
                    Tambahkan kategori sesuai kebutuhan bidang MKGI Anda (Meteorologi, Klimatologi, Geofisika, Kualitas Udara, Maritim, dst) — tidak dibatasi jumlahnya.
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
                <h2 class="text-lg font-bold text-gray-800 mb-4">+ Tambah Kategori Baru</h2>
                <form action="<?php echo e(route('admin.kategori-sensor.store')); ?>" method="POST" class="flex gap-3">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="nama_kategori" value="<?php echo e(old('nama_kategori')); ?>" required
                           placeholder="Contoh: Kualitas Udara"
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500">
                    <button type="submit" class="px-6 py-3 bg-teal-600 text-white rounded-xl font-semibold hover:bg-teal-700">
                        Tambah
                    </button>
                </form>
                <?php $__errorArgs = ['nama_kategori'];
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
                            <?php $__empty_1 = true; $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50" x-data="{ editing: false }">
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <span x-show="!editing"><?php echo e($kategori->nama_kategori); ?></span>
                                        <form x-show="editing" action="<?php echo e(route('admin.kategori-sensor.update', $kategori->id)); ?>" method="POST" class="flex gap-2">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="text" name="nama_kategori" value="<?php echo e($kategori->nama_kategori); ?>"
                                                   class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                            <button type="submit" class="text-green-600 font-semibold text-sm">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($kategori->perangkat_sensors_count); ?> sensor</td>
                                    <td class="px-6 py-4 text-sm font-medium space-x-3">
                                        <button type="button" @click="editing = !editing" class="text-blue-600 hover:text-blue-900">
                                            <span x-text="editing ? 'Batal' : 'Edit'"></span>
                                        </button>
                                        <form action="<?php echo e(route('admin.kategori-sensor.destroy', $kategori->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-gray-500">Belum ada kategori sensor.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php if($kategoris->hasPages()): ?>
                    <div class="px-6 py-4 border-t border-gray-200"><?php echo e($kategoris->links()); ?></div>
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
<?php /**PATH C:\laragon\www\inventaris-sensor-mkg\resources\views/kategori-sensor/index.blade.php ENDPATH**/ ?>