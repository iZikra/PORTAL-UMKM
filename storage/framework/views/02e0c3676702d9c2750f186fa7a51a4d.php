<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <?php echo e(__('Kelola Basis Pengetahuan')); ?>

            </h2>
            <a href="<?php echo e(route('admin.knowledge-base.create')); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Tambah Artikel Baru
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Pusat Bantuan UMKM</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Temukan panduan, tips, dan solusi untuk pertanyaan umum seputar UMKM.</p>
                </div>
            </div>

            <div class="mt-6 space-y-6">
                
                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <span class="text-sm font-semibold text-indigo-600 dark:text-indigo-400"><?php echo e($article->category); ?></span>
                                    <h4 class="text-xl font-bold mt-1 text-gray-900 dark:text-gray-100"><?php echo e($article->title); ?></h4>
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 prose max-w-none">
                                        <?php echo nl2br(e($article->content)); ?>

                                    </div>
                                </div>
                                <!-- Tombol Aksi untuk Admin -->
                                <div class="flex-shrink-0 ml-4">
                                    <a href="<?php echo e(route('admin.knowledge-base.edit', $article->id)); ?>" class="text-sm text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="<?php echo e(route('admin.knowledge-base.destroy', $article->id)); ?>" method="POST" class="inline ml-2" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-sm text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                            Belum ada artikel yang ditambahkan. Klik "Tambah Artikel Baru" untuk memulai.
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/admin/knowledge-base/index.blade.php ENDPATH**/ ?>