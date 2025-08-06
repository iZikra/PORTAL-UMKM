<?php

namespace App\Http\Controllers;

use App\Models\Faq; // Pastikan Model Faq sudah di-import
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Menampilkan halaman FAQ untuk publik.
     * Fungsi ini yang akan dipanggil oleh rute 'faq.public'.
     * PERBAIKAN: Nama fungsi diubah dari showPublic menjadi showPublicFaq agar sesuai dengan file rute.
     */
    public function showPublicFaq()
    {
        // 1. Mengambil semua data dari tabel 'faqs', diurutkan dari yang terbaru.
        $faqs = Faq::latest()->get();

        // 2. Mengirim data tersebut ke view 'faq_public'.
        //    Di dalam view, data ini akan bisa diakses melalui variabel $faqs.
        return view('faq_public', compact('faqs'));
    }


    // --- Fungsi-fungsi lain bisa Anda tambahkan di sini jika diperlukan ---
    // --- Contoh di bawah ini adalah implementasi standar untuk resource controller ---

    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        // Biasanya ini untuk halaman admin, Anda bisa mengisinya nanti
        // Contoh:
        // $faqs = Faq::latest()->paginate(10);
        // return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logika untuk menyimpan FAQ baru
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        // Logika untuk menampilkan satu FAQ
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        // return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        // Logika untuk update FAQ
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        // Logika untuk hapus FAQ
    }
}
