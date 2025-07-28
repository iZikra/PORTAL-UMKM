<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\User; // <-- Pastikan model User di-import
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        // --- Data untuk Kartu Statistik ---
        $totalPengguna = User::count(); // <-- KODE YANG HILANG SEBELUMNYA
        $totalPengaduan = Pengaduan::count();
        $pengaduanBaru = Pengaduan::where('status', 'Baru')->count();
        $pengaduanDiproses = Pengaduan::where('status', 'Diproses')->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();
        $pengaduanDitolak = Pengaduan::where('status', 'Ditolak')->count();

        // --- Data untuk Grafik (Chart.js) ---
        // Kode ini saya perbaiki juga agar lebih akurat mengambil nama kategori
        $kategoriData = Pengaduan::query()
            ->select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();

        $chartLabels = $kategoriData->pluck('kategori');
        $chartData = $kategoriData->pluck('total');

        // Mengirim semua data ke view
        return view('admin.dashboard', compact(
            'totalPengguna', // <-- Sekarang variabel ini sudah ada
            'totalPengaduan',
            'pengaduanBaru',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduanDitolak',
            'chartLabels',
            'chartData'
        ));
    }
}