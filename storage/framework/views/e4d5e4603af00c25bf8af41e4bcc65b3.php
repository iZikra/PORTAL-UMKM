<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased animate-page-enter">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            
            
            <div 
                class="absolute inset-0 w-full h-full bg-cover bg-center" 
                style="background-image: url('<?php echo e(asset('images/1.jpg')); ?>')">
            </div>

            
            <div class="relative w-full sm:max-w-md mt-6 px-6 py-8 bg-white/90 dark:bg-gray-800/90 shadow-2xl rounded-lg overflow-hidden">
                <?php echo e($slot); ?>

            </div>
        </div>
    </body>
</html><?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/components/layouts/guest.blade.php ENDPATH**/ ?>