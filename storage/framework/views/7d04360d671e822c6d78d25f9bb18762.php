<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts (Hanya menggunakan Vite) -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <?php if (isset($component)) { $__componentOriginala231aefbc1626acae338242c7a979fdb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala231aefbc1626acae338242c7a979fdb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.navigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala231aefbc1626acae338242c7a979fdb)): ?>
<?php $attributes = $__attributesOriginala231aefbc1626acae338242c7a979fdb; ?>
<?php unset($__attributesOriginala231aefbc1626acae338242c7a979fdb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala231aefbc1626acae338242c7a979fdb)): ?>
<?php $component = $__componentOriginala231aefbc1626acae338242c7a979fdb; ?>
<?php unset($__componentOriginala231aefbc1626acae338242c7a979fdb); ?>
<?php endif; ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>