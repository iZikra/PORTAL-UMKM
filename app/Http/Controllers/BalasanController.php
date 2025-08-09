<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan; // [FIX] Menambahkan baris ini untuk mengimpor model Tanggapan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalasanController extends Controller
{
    /**
     * Menyimpan balasan baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Pengaduan $pengaduan)
    {
        // [FIX] Menambahkan validasi minimal 3 karakter
        $request->validate([
            'tanggapan' => 'required|string|min:3',
        ]);

        // Otorisasi: Hanya admin atau pemilik pengaduan yang bisa membalas
        if ($pengaduan->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK MEMBERI BALASAN.');
        }

        // Simpan data balasan
        $balasan = new Tanggapan();
        $balasan->pengaduan_id = $pengaduan->id;
        $balasan->user_id = Auth::id();
        $balasan->tanggapan = $request->tanggapan;
        $balasan->save();

        return back()->with('success', 'Balasan Anda berhasil dikirim!');
    }
}
