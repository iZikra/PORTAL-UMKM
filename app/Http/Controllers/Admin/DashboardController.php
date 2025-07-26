<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total pengaduan
        $totalPengaduan = Pengaduan::count();

        // Menghitung pengaduan berdasarkan status
        $pengaduanBaru = Pengaduan::where('status', 'Baru')->count();
        $pengaduanDiproses = Pengaduan::where('status', 'Diproses')->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();
        // PERBAIKAN: Menambahkan perhitungan untuk status 'Ditolak'
        $pengaduanDitolak = Pengaduan::where('status', 'Ditolak')->count();

        // Mengambil data untuk grafik kategori
        $kategoriData = Pengaduan::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');
        
        // Menyiapkan data untuk Chart.js
        $chartLabels = $kategoriData->keys();
        $chartData = $kategoriData->values();

        // Mengirim semua data ke view, termasuk data baru
        return view('admin.dashboard', compact(
            'totalPengaduan',
            'pengaduanBaru',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduanDitolak', // PERBAIKAN: Mengirim variabel baru ke view
            'chartLabels',
            'chartData'
        ));
    }
}
