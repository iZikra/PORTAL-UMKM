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
    public function index()
    {
        $pengaduans = Pengaduan::with('user')->latest()->paginate(10);
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
