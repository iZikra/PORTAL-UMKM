<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->role == 'admin'): ?>
                    <?php echo e(__('Manajemen FAQ')); ?>

                <?php else: ?>
                    <?php echo e(__('Frequently Asked Questions (FAQ)')); ?>

                <?php endif; ?>
            <?php else: ?>
                <?php echo e(__('Frequently Asked Questions (FAQ)')); ?>

            <?php endif; ?>
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->role == 'admin'): ?>
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-semibold">Daftar FAQ</h3>
                                <a href="<?php echo e(route('admin.faq.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                    Tambah FAQ Baru
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    
                    <?php if(session('success')): ?>
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-md relative mb-4" role="alert">
                            <span><?php echo e(session('success')); ?></span>
                        </div>
                    <?php endif; ?>

                    
                    <div class="space-y-8 mt-4">
                        <?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="border-b pb-4">
                                <h4 class="text-lg font-semibold text-gray-800"><?php echo e($faq->pertanyaan); ?></h4>
                                <p class="mt-2 text-gray-600"><?php echo e($faq->jawaban); ?></p>

                                
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(Auth::user()->role == 'admin'): ?>
                                        <div class="mt-4 text-right space-x-2">
                                            <a href="<?php echo e(route('admin.faq.edit', $faq->id)); ?>" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                            <form action="<?php echo e(route('admin.faq.destroy', $faq->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus FAQ ini?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-sm text-red-600 hover:text-red-900 font-medium">Hapus</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-center text-gray-500">Belum ada FAQ yang tersedia.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/faq.blade.php ENDPATH**/ ?>