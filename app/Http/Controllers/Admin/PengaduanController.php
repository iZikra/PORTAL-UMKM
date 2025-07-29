<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Menampilkan semua pengaduan dengan fitur filter dan pencarian.
     */
    public function index(Request $request)
{
    $query = Pengaduan::query();

    // Terapkan filter pencarian jika ada
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('nama_usaha', 'like', "%{$search}%")
              ->orWhere('kategori', 'like', "%{$search}%");
        });
    }

    // Terapkan filter status jika ada
    if ($request->filled('status')) {
        $query->where('status', $request->input('status'));
    }

    // Selalu gunakan paginate di akhir dan tambahkan filter ke link pagination
    $pengaduans = $query->latest()->paginate(10)->withQueryString();

    return view('admin.pengaduan.index', compact('pengaduans'));
}
    /**
     * Menampilkan detail satu pengaduan.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Menyimpan tanggapan dan/atau mengubah status pengaduan.
     */
    public function tanggapi(Request $request, Pengaduan $pengaduan)
{
    $request->validate([
        'status' => 'required|in:Baru,Diproses,Selesai,Ditolak',
        'tanggapan' => 'nullable|string|min:3',
    ]);

    // 1. Update status pengaduan
    $pengaduan->update(['status' => $request->input('status')]);

    // 2. Simpan tanggapan jika ada
    if ($request->filled('tanggapan')) {
        $pengaduan->tanggapans()->create([
            'user_id' => auth()->id(),
            'tanggapan' => $request->input('tanggapan'),
        ]);
    }

    // 3. Bangun parameter untuk redirect berdasarkan filter LAMA
    $filterParams = [
        'search' => $request->input('search'),
        'status' => $request->input('filter_status') // Menggunakan 'filter_status' dari hidden input
    ];
    
    // 4. Hapus parameter yang kosong
    $filterParams = array_filter($filterParams);

    // 5. Redirect ke halaman DAFTAR PENGADUAN dengan filter LAMA
    return redirect()->route('admin.pengaduan.index', $filterParams)
                     ->with('success', 'Perubahan pada pengaduan berhasil disimpan!');
}
}