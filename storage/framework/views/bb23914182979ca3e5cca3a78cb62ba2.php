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
            <?php echo e(__('👥 Manajemen Users')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl shadow-xl p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Daftar User</h1>
                        <p class="text-blue-100 text-sm mt-1">Kelola semua pengguna sistem</p>
                    </div>
                    <a href="<?php echo e(route('admin.users.create')); ?>"
                       class="bg-white text-blue-600 px-6 py-3 rounded-xl font-semibold hover:bg-blue-50 transition-all shadow-lg">
                        + Tambah User
                    </a>
                </div>
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

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($user->id); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900"><?php echo e($user->name); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($user->email); ?></td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                            <?php echo e(ucfirst($user->role)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                                           class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>"
                                              method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada data user.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php if($users->hasPages()): ?>
                    <div class="px-6 py-4 border-t border-gray-200"><?php echo e($users->links()); ?></div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\inventaris-sensor-mkg\resources\views/user/index.blade.php ENDPATH**/ ?>