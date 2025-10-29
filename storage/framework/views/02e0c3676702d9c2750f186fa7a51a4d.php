<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-book-open mr-2"></i>
            <?php echo e(__('Kelola Basis Pengetahuan')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex justify-between items-center mb-6">
                        
                        <form action="<?php echo e(route('admin.knowledge-base.index')); ?>" method="GET" class="w-full md:w-auto">
                            <div class="relative">
                               <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                   <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 10.35a6.3 6.3 0 11-12.6 0 6.3 6.3 0 0112.6 0z"></path></svg>
                               </span>
                                <input type="text" name="search" placeholder="Cari berdasarkan judul..." value="<?php echo e(request('search')); ?>" class="w-full md:w-80 pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-900 focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-900 focus:ring-opacity-50 transition">
                            </div>
                        </form>
                        
                        <a href="<?php echo e(route('admin.knowledge-base.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-sm transition duration-300 ease-in-out text-sm ml-4 whitespace-nowrap">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Artikel
                        </a>
                    </div>

                    
                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150">
                                        
                                        <td class="px-6 py-5 whitespace-nowrap text-base font-semibold text-gray-900 dark:text-white"><?php echo e($article->title); ?></td>
                                        <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo e($article->category); ?></td>
                                        <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo e($article->created_at->isoFormat('D MMMM Y')); ?></td>
                                        
                                        
                                        <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="relative inline-block text-left group">
                                                <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300">
                                                    Aksi
                                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                                </button>
                                                <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 z-20 invisible group-hover:visible transition-all duration-200 ease-out transform opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100">
                                                    <div class="py-1">
                                                        <a href="<?php echo e(route('admin.knowledge-base.edit', $article)); ?>" class="flex items-center text-gray-700 dark:text-gray-200 px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <i class="fas fa-edit w-5 mr-3"></i><span>Edit</span>
                                                        </a>
                                                        <form action="<?php echo e(route('admin.knowledge-base.destroy', $article)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="flex items-center text-red-600 dark:text-red-400 w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <i class="fas fa-trash-alt w-5 mr-3"></i><span>Hapus</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center text-gray-500 dark:text-gray-400">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <h3 class="mt-2 text-lg font-medium">Belum Ada Artikel</h3>
                                                <p class="mt-1 text-sm">Hasil pencarian tidak ditemukan atau belum ada data.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="mt-8">
                        <?php echo e($articles->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $attributes = $__attributesOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $component = $__componentOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__componentOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?><?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/admin/knowledge-base/index.blade.php ENDPATH**/ ?>