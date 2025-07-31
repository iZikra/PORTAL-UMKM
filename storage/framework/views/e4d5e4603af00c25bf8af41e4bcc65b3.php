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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900">
            <div class="hidden lg:block w-1/2 bg-cover bg-center" style="background-image: url('<?php echo e(asset('images/login-bg.jpg')); ?>');">
            </div>

            <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-6 sm:p-12">
                

                <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
                    <?php echo e($slot); ?>

                </div>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/components/layouts/guest.blade.php ENDPATH**/ ?>