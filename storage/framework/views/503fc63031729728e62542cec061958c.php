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
            <?php echo e(__('Admin Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6 mb-6">

                
                <a href="<?php echo e(route('admin.users.index')); ?>" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <h3 class="text-lg font-medium text-gray-500 dark:text-gray-400">Total Pengguna</h3>
                    <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white"><?php echo e($totalPengguna); ?></p>
                </a>

                
                <a href="<?php echo e(route('admin.pengaduan.index')); ?>" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <h3 class="text-lg font-medium text-gray-500 dark:text-gray-400">Total Pengaduan</h3>
                    <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white"><?php echo e($totalPengaduan); ?></p>
                </a>

                
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'baru'])); ?>" class="bg-blue-100 dark:bg-blue-900/50 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-blue-200/80 dark:hover:bg-blue-900/80 transition">
                    <h3 class="text-lg font-medium text-blue-800 dark:text-blue-300">Baru</h3>
                    <p class="mt-1 text-3xl font-semibold text-blue-900 dark:text-blue-200"><?php echo e($pengaduanBaru); ?></p>
                </a>

                
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'diproses'])); ?>" class="bg-yellow-100 dark:bg-yellow-900/50 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-yellow-200/80 dark:hover:bg-yellow-900/80 transition">
                    <h3 class="text-lg font-medium text-yellow-800 dark:text-yellow-300">Diproses</h3>
                    <p class="mt-1 text-3xl font-semibold text-yellow-900 dark:text-yellow-200"><?php echo e($pengaduanDiproses); ?></p>
                </a>

                
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'selesai'])); ?>" class="bg-green-100 dark:bg-green-900/50 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-green-200/80 dark:hover:bg-green-900/80 transition">
                    <h3 class="text-lg font-medium text-green-800 dark:text-green-300">Selesai</h3>
                    <p class="mt-1 text-3xl font-semibold text-green-900 dark:text-green-200"><?php echo e($pengaduanSelesai); ?></p>
                </a>

                
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'ditolak'])); ?>" class="bg-red-100 dark:bg-red-900/50 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-red-200/80 dark:hover:bg-red-900/80 transition">
                    <h3 class="text-lg font-medium text-red-800 dark:text-red-300">Ditolak</h3>
                    <p class="mt-1 text-3xl font-semibold text-red-900 dark:text-red-200"><?php echo e($pengaduanDitolak); ?></p>
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 text-center">Pengaduan Berdasarkan Kategori</h3>
                    <div class="relative mx-auto" style="height:500px; width:100%; max-width:500px;">
                        <canvas id="kategoriChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('kategoriChart').getContext('2d');
            const data = <?php echo json_encode($kategoriCounts, 15, 512) ?>;
            
            // Mengatur warna teks chart agar sesuai dengan dark mode
            const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const textColor = isDarkMode ? 'rgba(255, 255, 255, 0.8)' : 'rgba(0, 0, 0, 0.8)';

            const chartData = {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: Object.values(data),
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.7)',  // blue-500
                        'rgba(234, 179, 8, 0.7)',   // yellow-500
                        'rgba(34, 197, 94, 0.7)',   // green-500
                        'rgba(139, 92, 246, 0.7)', // violet-500
                        'rgba(239, 68, 68, 0.7)',   // red-500
                        'rgba(249, 115, 22, 0.7)'  // orange-500
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            };

            new Chart(ctx, {
                type: 'pie',
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: textColor
                            }
                        }
                    }
                }
            });
        });
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $attributes = $__attributesOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $component = $__componentOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__componentOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>