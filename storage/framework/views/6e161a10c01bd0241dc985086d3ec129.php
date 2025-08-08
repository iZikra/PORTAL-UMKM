<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pengaduan Baru</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        <h2>Halo Admin,</h2>
        <p>Anda menerima sebuah <strong>pengaduan baru</strong> melalui Portal UMKM/IKM.</p>

        <hr>

        <h3 style="margin-top: 20px;">📄 Detail Pengaduan:</h3>
        <ul style="list-style: none; padding-left: 0;">
            <li><strong>Kode Unik:</strong> <?php echo e($pengaduan->kode_unik); ?></li>
            <li><strong>Nama Usaha:</strong> <?php echo e($pengaduan->nama_usaha); ?></li>
            <li><strong>Pelapor:</strong> <?php echo e($pengaduan->nama_pelaku_usaha); ?></li>
            <li><strong>Email Pelapor:</strong> <?php echo e($pengaduan->email); ?></li>
            <li><strong>Alamat Usaha:</strong> <?php echo e($pengaduan->alamat_usaha); ?></li>
            <li><strong>Judul Pengaduan:</strong> <?php echo e($pengaduan->judul); ?></li>
            <li><strong>Kategori:</strong> <?php echo e($pengaduan->kategori); ?></li>
        </ul>

        <h4 style="margin-top: 20px;">📝 Deskripsi Pengaduan:</h4>
        <p style="background: #f2f2f2; padding: 10px; border-radius: 5px;"><?php echo e($pengaduan->deskripsi); ?></p>

        <p>Silakan login ke <a href="<?php echo e(url('/admin/dashboard')); ?>">dashboard admin</a> untuk meninjau dan menanggapi pengaduan ini.</p>

        <p style="margin-top: 30px;">Terima kasih,<br><strong>Portal UMKM</strong></p>

        <hr>
        <small>Email ini dikirim otomatis oleh sistem pada <?php echo e(\Carbon\Carbon::now()->format('d M Y H:i')); ?></small>
    </div>
</body>
</html>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/emails/pengaduan-baru.blade.php ENDPATH**/ ?>