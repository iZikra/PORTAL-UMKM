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

        // Terapkan filter pencarian jika ada input 'search'
        if ($request->filled('search')) {
            $search = $request->input('search');
            // PERUBAHAN: Pencarian sekarang hanya mencakup 'nama_usaha' dan 'kategori'
            $query->where(function($q) use ($search) {
                $q->where('nama_usaha', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // Terapkan filter status jika ada input 'status'
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $pengaduans = $query->latest()->get();

        return view('admin.pengaduan.index', [
            'pengaduans' => $pengaduans,
            'search' => $request->input('search'),
            'status' => $request->input('status'),
        ]);
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
            'tanggapan' => 'nullable|string|min:5',
        ]);

        $pengaduan->status = $request->status;
        $pengaduan->save();

        if ($request->filled('tanggapan')) {
            Tanggapan::create([
                'pengaduan_id' => $pengaduan->id,
                'user_id' => Auth::id(),
                'tanggapan' => $request->tanggapan,
            ]);
        }

        return redirect()->route('admin.pengaduan.show', $pengaduan)->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
