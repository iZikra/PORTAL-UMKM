<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan; // Import model Tanggapan
use App\Models\User;
use App\Mail\BalasanUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    // ... method index(), create(), store() yang sudah ada ...
    public function index()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('pengaduans'));
    }

    public function create()
    {
        return view('user.pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'nama_pelaku_usaha' => 'required|string|max:255',
            'alamat_usaha' => 'required|string',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string|min:3',
        ]);

        $pengaduan = Pengaduan::create([
            'user_id' => Auth::id(),
            'nama_usaha' => $request->nama_usaha,
            'nama_pelaku_usaha' => $request->nama_pelaku_usaha,
            'alamat_usaha' => $request->alamat_usaha,
            'kode_unik' => 'PDU-' . strtoupper(Str::random(8)),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'status' => 'Baru',
        ]);

        try {
            $admins = User::where('role', 'admin')->get();
            if ($admins->isNotEmpty()) {
                foreach ($admins as $admin) {
                    Mail::to($admin->email)->send(new \App\Mail\PengaduanBaruMail($pengaduan));
                }
            }
        } catch (\Exception $e) {
            \Log::error('Gagal mengirim email notifikasi pengaduan baru: ' . $e->getMessage());
        }

        return redirect()->route('dashboard')->with('success', 'Pengaduan Anda berhasil dikirim!');
    }

    public function show(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id !== Auth::id()) {
            abort(403, 'UNAUTHORIZED ACTION.');
        }
        $pengaduan->load('tanggapans.user');
        return view('user.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Method baru untuk menyimpan balasan dari user.
     */
    public function balas(Request $request, Pengaduan $pengaduan)
    {
        // Pastikan user hanya bisa membalas pengaduannya sendiri
        if ($pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate(['tanggapan' => 'required|string|min:5']);

        $tanggapan = Tanggapan::create([
            'pengaduan_id' => $pengaduan->id,
            'user_id' => Auth::id(), // ID dari user yang login
            'tanggapan' => $request->tanggapan,
        ]);

        // Kirim notifikasi email ke admin
        try {
            $admins = User::where('role', 'admin')->get();
            if ($admins->isNotEmpty()) {
                foreach ($admins as $admin) {
                    Mail::to($admin->email)->send(new BalasanUserMail($pengaduan, $tanggapan));
                }
            }
        } catch (\Exception $e) {
            \Log::error('Gagal mengirim email notifikasi balasan user: ' . $e->getMessage());
        }

        return redirect()->route('user.pengaduan.show', $pengaduan)->with('success', 'Balasan Anda berhasil dikirim!');
    }
}
