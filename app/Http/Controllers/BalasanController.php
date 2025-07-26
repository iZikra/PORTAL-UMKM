<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalasanController extends Controller
{
    public function store(Request $request, Pengaduan $pengaduan)
    {
        dd(auth()->user());
        $request->validate(['isi_balasan' => 'required|string']);

        // Logika keamanan: Izinkan jika dia pemilik pengaduan ATAU dia adalah admin
        if ($pengaduan->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403); // Jika bukan keduanya, akses ditolak
        }

        $pengaduan->balasan()->create([
            'user_id' => Auth::id(),
            'isi_balasan' => $request->isi_balasan,
        ]);

        return back()->with('success', 'Balasan berhasil dikirim!');
    }
}
