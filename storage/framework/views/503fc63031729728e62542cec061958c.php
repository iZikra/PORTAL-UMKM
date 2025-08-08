

<?php $__env->startSection('header'); ?>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <?php echo e(__('Admin Dashboard')); ?>

    </h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stat Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
                <a href="<?php echo e(route('admin.pengaduan.index')); ?>" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                    <h3 class="text-lg font-medium text-gray-500 dark:text-gray-400"><?php echo e(__('Total Pengaduan')); ?></h3>
                    <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-gray-100"><?php echo e($totalPengaduan); ?></p>
                </a>
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'baru'])); ?>" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                    <h3 class="text-lg font-medium text-blue-500"><?php echo e(__('Pengaduan Baru')); ?></h3>
                    <p class="mt-1 text-3xl font-semibold text-blue-500"><?php echo e($pengaduanBaru); ?></p>
                </a>
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'diproses'])); ?>" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                    <h3 class="text-lg font-medium text-yellow-500"><?php echo e(__('Diproses')); ?></h3>
                    <p class="mt-1 text-3xl font-semibold text-yellow-500"><?php echo e($pengaduanDiproses); ?></p>
                </a>
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'selesai'])); ?>" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                    <h3 class="text-lg font-medium text-green-500"><?php echo e(__('Selesai')); ?></h3>
                    <p class="mt-1 text-3xl font-semibold text-green-500"><?php echo e($pengaduanSelesai); ?></p>
                </a>
                <a href="<?php echo e(route('admin.pengaduan.index', ['status' => 'ditolak'])); ?>" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                    <h3 class="text-lg font-medium text-red-500"><?php echo e(__('Ditolak')); ?></h3>
                    <p class="mt-1 text-3xl font-semibold text-red-500"><?php echo e($pengaduanDitolak); ?></p>
                </a>
            </div>

            <!-- Chart -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 text-center"><?php echo e(__('Pengaduan Berdasarkan Kategori')); ?></h3>
                    
                    <div class="relative mx-auto" style="height:500px; width:100%; max-width:500px;">
                        <canvas id="kategoriChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('kategoriChart').getContext('2d');
            const data = <?php echo json_encode($kategoriCounts, 15, 512) ?>;

            const chartData = {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: Object.values(data),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
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
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Kategori Pengaduan'
                        }
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>