<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Kelola Semua Pengaduan')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    
                    <div class="mb-6 md:flex md:items-center md:justify-between">
                        
                        <div class="flex-1 grid grid-cols-2 sm:grid-cols-5 gap-4 mb-4 md:mb-0">
                            <a href="<?php echo e(route('admin.pengaduan.index')); ?>" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition <?php echo e(!$status ? 'bg-indigo-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600'); ?>">Semua</a>
                            <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'Baru'])); ?>" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition <?php echo e($status == 'Baru' ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600'); ?>">Baru</a>
                            <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'Diproses'])); ?>" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition <?php echo e($status == 'Diproses' ? 'bg-yellow-500 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600'); ?>">Diproses</a>
                            <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'Selesai'])); ?>" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition <?php echo e($status == 'Selesai' ? 'bg-green-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600'); ?>">Selesai</a>
                            <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'Ditolak'])); ?>" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition <?php echo e($status == 'Ditolak' ? 'bg-red-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600'); ?>">Ditolak</a>
                        </div>
                        
                        
                        <form action="<?php echo e(route('admin.pengaduan.index')); ?>" method="GET">
                            <input type="hidden" name="status" value="<?php echo e($status ?? ''); ?>">
                            <div class="relative">
                                <input type="text" name="search" placeholder="Cari judul atau nama..." value="<?php echo e($search ?? ''); ?>" class="w-full md:w-64 pl-10 pr-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 10.35a6.3 6.3 0 11-12.6 0 6.3 6.3 0 0112.6 0z"></path></svg>
                                </div>
                            </div>
                        </form>
                    </div>

                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">NO</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Waktu Lapor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Pelapor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                                    <th class="relative px-6 py-3"><span class="sr-only">Detail</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <?php $__empty_1 = true; $__currentLoopData = $pengaduans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pengaduan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400"><?php echo e($pengaduans->firstItem() + $key); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400"><?php echo e($pengaduan->created_at->format('d M Y, H:i')); ?></td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100"><?php echo e($pengaduan->judul); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400"><?php echo e($pengaduan->user->name); ?></td>
                                        <td class="px-6 py-4">
                                            
                                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-200' => $pengaduan->status == 'Baru',
                                                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-200' => $pengaduan->status == 'Diproses',
                                                'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-200' => $pengaduan->status == 'Selesai',
                                                'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200' => $pengaduan->status == 'Ditolak',
                                            ]); ?>">
                                                <?php echo e($pengaduan->status); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                            <a href="<?php echo e(route('admin.pengaduan.show', $pengaduan)); ?>" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada pengaduan yang cocok dengan filter.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    
                    <div class="mt-6">
                        <?php echo e($pengaduans->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?><?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/admin/pengaduan/index.blade.php ENDPATH**/ ?>