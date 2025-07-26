<!DOCTYPE html>
<html>
<head>
    <title>Balasan Baru dari Pelapor</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2>Halo Admin,</h2>
    <p>Ada balasan baru dari pelapor untuk pengaduan dengan judul <strong>"{{ $pengaduan->judul }}"</strong>.</p>
    <hr>
    <h3>Balasan dari {{ $tanggapan->user->name }}:</h3>
    <div style="background-color: #f4f4f4; padding: 15px; border-radius: 5px;">
        <p>{{ $tanggapan->tanggapan }}</p>
    </div>
    <p>Anda dapat melihat detail lengkap dan memberikan tanggapan lebih lanjut dengan login ke dashboard admin.</p>
    <p>
        <a href="{{ route('admin.pengaduan.show', $pengaduan) }}" style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px;">
            Lihat Detail Pengaduan
        </a>
    </p>
    <p>Terima kasih.</p>
</body>
</html>
