<aside class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-center">
    <div class="flex flex-col items-center">
        <?php
            // Logika untuk membuat inisial nama
            $nameParts = explode(' ', Auth::user()->name);
            $initials = count($nameParts) > 1
                        ? strtoupper(substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1))
                        : strtoupper(substr($nameParts[0], 0, 2));
        ?>

        
        <div class="flex items-center justify-center h-24 w-24 rounded-full bg-indigo-500 text-white text-3xl font-bold mb-4 ring-4 ring-indigo-200 dark:ring-indigo-800">
            <span><?php echo e($initials); ?></span>
        </div>

        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100"><?php echo e(Auth::user()->name); ?></h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1"><?php echo e(Auth::user()->email); ?></p>
    </div>
</aside><?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/profile/partials/_profile-sidebar.blade.php ENDPATH**/ ?>