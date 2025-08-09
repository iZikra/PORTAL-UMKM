<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan; // Import model Tanggapan
use App\Models\User;
use App\Mail\BalasanUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    // ... method index(), create(), store() yang sudah ada ...
    public function index()
    {
        // [FIX] The view expects a variable named '$pengaduans'.
        // This ensures the correct data is passed to the view.
        $pengaduans = Pengaduan::where('user_id', Auth::id())->latest()->paginate(10);
        return view('user.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('user.pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelaku_usaha' => 'required|string|max:255',
            'nama_usaha' => 'required|string|max:255',
            'alamat_usaha' => 'required|string',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti-pengaduan', 'public');
        }

        Pengaduan::create([
            'user_id' => Auth::id(),
            'nama_pelaku_usaha' => $request->nama_pelaku_usaha,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' => $request->alamat_usaha,
            'kode_unik' => strtoupper(Str::random(10)),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            // [FIX] Nama kolom di database adalah 'deskripsi', bukan 'isi'.
            'deskripsi' => $request->deskripsi,
            'status' => 'Baru',
            'bukti' => $buktiPath,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Pengaduan berhasil dikirim!');

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
        // Pastikan user hanya bisa melihat pengaduannya sendiri, kecuali admin
        if (Auth::user()->role !== 'admin' && $pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

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
