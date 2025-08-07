<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Detail Pengaduan: ') . $pengaduan->judul); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100 space-y-6">

                    
                    <div class="mb-6">
                        <a href="<?php echo e(route('user.dashboard')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            &larr; Kembali ke Dashboard
                        </a>
                    </div>
                    
                    
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Pelapor</h3>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <p><strong>Nama Pelaku Usaha:</strong><br><?php echo e($pengaduan->nama_pelaku_usaha); ?></p>
                            <p><strong>Nama Usaha:</strong><br><?php echo e($pengaduan->nama_usaha); ?></p>
                            <p class="md:col-span-2"><strong>Alamat Usaha:</strong><br><?php echo e($pengaduan->alamat_usaha); ?></p>
                        </div>
                    </div>

                    
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2">Detail Laporan</h3>
                        <div class="mt-4 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <p><strong>Waktu Laporan:</strong><br><?php echo e($pengaduan->created_at->timezone('Asia/Jakarta')->format('d F Y, H:i')); ?> WIB</p>
                                <p><strong>Status Saat Ini:</strong><br>
                                    <?php
                                        $statusClass = '';
                                        switch ($pengaduan->status) {
                                            case 'Selesai':
                                                $statusClass = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                                                break;
                                            case 'Diproses':
                                                $statusClass = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
                                                break;
                                            case 'Ditolak':
                                                $statusClass = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                                                break;
                                            default:
                                                $statusClass = 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300';
                                                break;
                                        }
                                    ?>
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($statusClass); ?>">
                                        <?php echo e($pengaduan->status); ?>

                                    </span>
                                </p>
                                <p><strong>Judul:</strong><br><?php echo e($pengaduan->judul); ?></p>
                                <p><strong>Kategori:</strong><br><?php echo e($pengaduan->kategori); ?></p>
                            </div>

                            
                            <div class="prose dark:prose-invert max-w-none">
                                <p><strong>Deskripsi:</strong></p>
                                <blockquote class="border-l-4 border-gray-300 dark:border-gray-600 pl-4"><?php echo e($pengaduan->isi); ?></blockquote>
                            </div>
                            
                            
                            <?php if($pengaduan->bukti): ?>
                            <div class="mt-4">
                                <p><strong>Bukti Terlampir:</strong></p>
                                <?php
                                    $fileExtension = pathinfo($pengaduan->bukti, PATHINFO_EXTENSION);
                                ?>

                                <?php if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])): ?>
                                    <a href="<?php echo e(asset('storage/' . $pengaduan->bukti)); ?>" target="_blank" class="mt-2 inline-block">
                                        <img src="<?php echo e(asset('storage/' . $pengaduan->bukti)); ?>" alt="Bukti Pengaduan" class="rounded-lg border dark:border-gray-700 max-w-sm hover:opacity-90 transition-opacity">
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(asset('storage/' . $pengaduan->bukti)); ?>" target="_blank" class="mt-2 inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600">
                                        Lihat Dokumen (<?php echo e(strtoupper($fileExtension)); ?>)
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 pb-2">Riwayat Tanggapan</h3>
                        <div class="space-y-4 mt-4">
                            <?php $__empty_1 = true; $__currentLoopData = $pengaduan->tanggapans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tanggapan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="<?php echo e($tanggapan->user->role == 'admin' ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800'); ?> p-4 rounded-lg shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm font-semibold">
                                            <?php if($tanggapan->user->role == 'admin'): ?>
                                                <?php echo e($tanggapan->user->name); ?> (Petugas)
                                            <?php else: ?>
                                                Anda (Pelapor)
                                            <?php endif; ?>
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo e($tanggapan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i')); ?> WIB</p>
                                    </div>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300"><?php echo e($tanggapan->isi); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-sm text-gray-500">Belum ada tanggapan dari petugas.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <?php if(!in_array($pengaduan->status, ['Selesai', 'Ditolak'])): ?>
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 pb-2">Kirim Balasan</h3>
                            
                            <form method="POST" action="<?php echo e(route('pengaduan.balas.store', $pengaduan)); ?>">
                                <?php echo csrf_field(); ?>
                                
                                <textarea name="isi" rows="5" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" placeholder="Tulis balasan atau informasi tambahan di sini..." required></textarea>
                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">
                                        Kirim Balasan
                                    </button>
                                </div>
                            </form>
                        </div>
                    <?php else: ?>
                       <div class="border-t border-gray-200 dark:border-gray-700 pt-6 text-center">
                           <p class="text-sm text-gray-500">Diskusi untuk pengaduan ini telah ditutup.</p>
                       </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/user/pengaduan/show.blade.php ENDPATH**/ ?>