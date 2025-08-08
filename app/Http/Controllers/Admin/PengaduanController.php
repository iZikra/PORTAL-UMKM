<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan; // Import model Tanggapan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth untuk mendapatkan id admin

class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar semua pengaduan.
     */
    // app/Http/Controllers/Admin/PengaduanController.php

public function index(Request $request) // Tambahkan Request $request
{
    // Mulai query builder
    $query = Pengaduan::with('user');

    // Terapkan filter berdasarkan status jika ada
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Terapkan filter berdasarkan kata kunci pencarian jika ada
    if ($request->filled('search')) {
        $searchTerm = $request->search;
        $query->where(function ($q) use ($searchTerm) {
            $q->where('nama_usaha', 'like', "%{$searchTerm}%")
              ->orWhere('kategori', 'like', "%{$searchTerm}%")
              ->orWhere('judul', 'like', "%{$searchTerm}%");
        });
    }

    // Ambil data yang sudah difilter, urutkan, dan paginasi
    // Gunakan appends() agar parameter filter tetap ada saat pindah halaman
    $pengaduans = $query->latest()->paginate(10)->withQueryString();

    return view('admin.pengaduan.index', compact('pengaduans'));
}

    /**
     * Menampilkan detail satu pengaduan beserta tanggapannya.
     */
    public function show(Pengaduan $pengaduan)
    {
        // Memuat relasi tanggapans dan user yang memberikan tanggapan
        $pengaduan->load('tanggapans.user');
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    /**
     * PERBAIKAN: Menambahkan fungsi storeTanggapan yang hilang.
     * Fungsi ini untuk menyimpan tanggapan dari admin dan mengubah status.
     */
    public function storeTanggapan(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:Baru,Diproses,Selesai,Ditolak',
            'tanggapan' => 'nullable|string|max:2000',
        ]);

        // 1. Update status pengaduan
        $pengaduan->status = $request->status;
        $pengaduan->save();

        // 2. Jika admin menulis tanggapan, simpan tanggapan tersebut
        if ($request->filled('tanggapan')) {
            Tanggapan::create([
                'pengaduan_id' => $pengaduan->id,
                'user_id' => Auth::id(), // Menyimpan ID admin yang sedang login
                'tanggapan' => $request->tanggapan,
            ]);

            // Di sini Anda bisa menambahkan logika untuk mengirim email notifikasi ke pengguna
        }

        // 3. Kembali ke halaman detail dengan pesan sukses
        return redirect()->route('admin.pengaduan.show', $pengaduan)
                         ->with('success', 'Status dan tanggapan berhasil disimpan.');
    }
}