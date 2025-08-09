<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User; // [BARU] Import model User untuk mencari admin
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // [BARU] Import Mail facade
use App\Mail\BalasanUserMail; // [BARU] Import email notifikasi untuk user
use App\Mail\TanggapanAdminMail; // [BARU] Import email notifikasi untuk admin

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
        // Validasi input, minimal 3 karakter
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

        // --- [LOGIKA NOTIFIKASI BARU] ---
        // Cek siapa yang mengirim balasan dan kirim notifikasi email yang sesuai.
        try {
            if (Auth::user()->role === 'admin') {
                // Jika ADMIN yang membalas, kirim notifikasi ke PENGGUNA (pelapor).
                // Pastikan pelapor ada dan bukan admin itu sendiri.
                if ($pengaduan->user && $pengaduan->user->id !== Auth::id()) {
                    Mail::to($pengaduan->user->email)->send(new BalasanUserMail($pengaduan, $balasan));
                }
            } else {
                // Jika PENGGUNA yang membalas, kirim notifikasi ke SEMUA ADMIN.
                $admins = User::where('role', 'admin')->get();
                foreach ($admins as $admin) {
                    Mail::to($admin->email)->send(new TanggapanAdminMail($pengaduan, $balasan));
                }
            }
        } catch (\Exception $e) {
            // Jika email gagal dikirim, jangan hentikan proses.
            // Catat error ke log untuk debugging.
            \Log::error('Email notification failed: ' . $e->getMessage());
        }
        // --- [AKHIR LOGIKA NOTIFIKASI] ---

        return back()->with('success', 'Balasan Anda berhasil dikirim!');
    }
}
