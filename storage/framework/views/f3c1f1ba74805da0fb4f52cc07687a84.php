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
            <?php echo e(__('Detail Pengaduan: ') . $pengaduan->kode_unik); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100 space-y-6">

                    
                    <div class="mb-6">
                        <a href="<?php echo e(route('admin.pengaduan.index', request()->query())); ?>" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            &larr; Kembali ke Daftar Pengaduan
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
                                    <?php if($pengaduan->status == 'Selesai'): ?>
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <?php elseif($pengaduan->status == 'Diproses'): ?>
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <?php elseif($pengaduan->status == 'Ditolak'): ?>
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    <?php else: ?>
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <?php endif; ?>
                                        <?php echo e($pengaduan->status); ?>

                                    </span>
                                </p>
                                <p><strong>Judul:</strong><br><?php echo e($pengaduan->judul); ?></p>
                                <p><strong>Kategori:</strong><br><?php echo e($pengaduan->kategori); ?></p>
                            </div>

                            
                            <div class="prose dark:prose-invert max-w-none">
                                <p><strong>Deskripsi:</strong></p>
                                <blockquote class="border-l-4 border-gray-300 dark:border-gray-600 pl-4"><?php echo e($pengaduan->deskripsi); ?></blockquote>
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
                            <?php $__empty_1 = true; $__currentLoopData = ($pengaduan->tanggapans ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tanggapan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="<?php echo e($tanggapan->user->role == 'admin' ? 'bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800' : 'bg-gray-50 dark:bg-gray-700/50'); ?> p-4 rounded-lg shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm font-semibold">
                                            <?php if($tanggapan->user->role == 'admin'): ?>
                                                Anda (Petugas)
                                            <?php else: ?>
                                                <?php echo e($tanggapan->user->name); ?> (Pelapor)
                                            <?php endif; ?>
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo e($tanggapan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i')); ?> WIB</p>
                                    </div>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300"><?php echo e($tanggapan->tanggapan); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-sm text-gray-500">Belum ada tanggapan untuk pengaduan ini.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 pb-2">Beri Tanggapan & Update Status</h3>
                        
                        <form method="POST" action="<?php echo e(route('admin.pengaduan.tanggapi', $pengaduan)); ?>">
                            <?php echo csrf_field(); ?>
                            

                            
                            <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                            <input type="hidden" name="filter_status" value="<?php echo e(request('status')); ?>">

                            <div class="mt-4">
                                <label for="status_select" class="block font-medium text-sm text-gray-700 dark:text-gray-300"><?php echo e(__('Ubah Status')); ?></label>
                                <select id="status_select" name="status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>
                                    <option value="Baru" <?php echo e($pengaduan->status == 'Baru' ? 'selected' : ''); ?>>Baru</option>
                                    <option value="Diproses" <?php echo e($pengaduan->status == 'Diproses' ? 'selected' : ''); ?>>Diproses</option>
                                    <option value="Selesai" <?php echo e($pengaduan->status == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                                    <option value="Ditolak" <?php echo e($pengaduan->status == 'Ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="tanggapan" class="block font-medium text-sm text-gray-700 dark:text-gray-300"><?php echo e(__('Tulis Tanggapan (Opsional)')); ?></label>
                                <textarea id="tanggapan" name="tanggapan" rows="5" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" placeholder="Tulis tanggapan untuk pelapor di sini..."></textarea>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">
                                    <?php echo e(__('Simpan Perubahan')); ?>

                                </button>
                            </div>
                        </form>
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
<?php endif; ?>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/admin/pengaduan/show.blade.php ENDPATH**/ ?>