<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>FAQ - <?php echo e(config('app.name', 'Portal UMKM')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        
        <?php echo $__env->make('components.layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    <?php echo e(__('Frequently Asked Questions (FAQ)')); ?>

                </h2>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">
                            
                            <div class="mb-10 text-center">
                                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Daftar Pertanyaan</h3>
                                <p class="mt-3 text-lg text-gray-600 dark:text-gray-400">Temukan jawaban untuk pertanyaan yang paling sering diajukan di bawah ini.</p>
                            </div>

                            <div x-data="{ open: null }" class="space-y-4">
                                <?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                                        <button @click="open = (open === <?php echo e($faq->id); ?> ? null : <?php echo e($faq->id); ?>)" class="w-full flex justify-between items-center p-5 text-left font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                            <span><?php echo e($faq->pertanyaan); ?></span>
                                            <svg :class="{'rotate-180': open === <?php echo e($faq->id); ?>}" class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </button>
                                        
                                        <div x-show="open === <?php echo e($faq->id); ?>" x-collapse.duration.500ms>
                                            <div class="p-5 pt-0">
                                                <p class="text-gray-600 dark:text-gray-400"><?php echo e($faq->jawaban); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="text-center py-16 border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                          <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4a4.01 4.01 0 011.02-2.625z" />
                                          <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-semibold text-gray-900 dark:text-white">Belum ada FAQ</h3>
                                        <p class="mt-1 text-sm text-gray-500">Silakan periksa kembali nanti.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
         <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500 dark:text-gray-400">
                <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Portal UMKM')); ?>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/faq_public.blade.php ENDPATH**/ ?>