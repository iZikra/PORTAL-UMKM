<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\User; // Memastikan model User di-import
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        // --- Data untuk Kartu Statistik ---
        $totalPengguna = User::where('role', 'user')->count(); // Menghitung user biasa saja
        $totalPengaduan = Pengaduan::count();
        $pengaduanBaru = Pengaduan::where('status', 'Baru')->count();
        $pengaduanDiproses = Pengaduan::where('status', 'Diproses')->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();
        $pengaduanDitolak = Pengaduan::where('status', 'Ditolak')->count();

        // --- Data untuk Grafik (Chart.js) ---
        $kategoriData = Pengaduan::query()
            ->select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();
        $chartLabels = $kategoriData->pluck('kategori');
        $chartData = $kategoriData->pluck('total');

                $kategoriCounts = Pengaduan::query()
            ->select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // Mengirim semua data ke view
        return view('admin.dashboard', compact(
            'totalPengguna',
            'totalPengaduan',
            'pengaduanBaru',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduanDitolak',
            'chartLabels',
            'chartData',
            'kategoriCounts'
        ));
    }
}
