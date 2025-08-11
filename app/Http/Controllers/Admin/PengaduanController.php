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

public function index(Request $request)
{
    // 1. Mengambil input dari URL untuk filter dan pencarian
    $status = $request->input('status');
    $search = $request->input('search');

    // 2. Memulai satu query builder yang akan kita gunakan
    $query = Pengaduan::query()->with('user'); // Eager load relasi 'user' untuk efisiensi

    // 3. Menerapkan filter berdasarkan status jika ada
    if ($status) {
        $query->where('status', $status);
    }

    // 4. Menerapkan filter pencarian jika ada
    if ($search) {
        // Mencari di beberapa kolom sekaligus
        $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('kategori', 'like', "%{$search}%")
              // Mencari juga berdasarkan nama pengguna yang terkait
              ->orWhereHas('user', function ($userQuery) use ($search) {
                  $userQuery->where('name', 'like', "%{$search}%");
              });
        });
    }

    // 5. Mengambil data, mengurutkan dari yang terbaru, dan melakukan paginasi
    $pengaduans = $query->latest()->paginate(10)->withQueryString();

    // 6. Mengirim semua data yang diperlukan ke view
    return view('admin.pengaduan.index', compact('pengaduans', 'status', 'search'));
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