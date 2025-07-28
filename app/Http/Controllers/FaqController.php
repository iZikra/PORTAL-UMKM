<?php

// PERBAIKAN: Namespace yang benar
namespace App\Http\Controllers;

use App\Models\Faq;
// PERBAIKAN: use statement yang benar
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Menampilkan halaman FAQ untuk publik.
     * Mengarah ke: /faq
     * Menggunakan file: resources/views/faq.blade.php
     */
    public function showPublicPage()
    {
        $faqs = Faq::latest()->get();
        return view('faq', compact('faqs'));
    }

    /**
     * Menampilkan halaman MANAJEMEN FAQ untuk admin.
     * Mengarah ke: /admin/faq
     * Menggunakan file: resources/views/faq/index.blade.php
     */
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('faq.index', compact('faqs'));
    }

    /**
     * Menampilkan form untuk membuat FAQ baru.
     */
    public function create()
    {
        return view('faq.create');
    }

    /**
     * Menyimpan FAQ baru.
     */
    public function store(Request $request)
    {
        $request->validate(['pertanyaan' => 'required', 'jawaban' => 'required']);
        Faq::create($request->all());
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit FAQ.
     */
    public function edit(Faq $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    /**
     * Memperbarui FAQ.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate(['pertanyaan' => 'required', 'jawaban' => 'required']);
        $faq->update($request->all());
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    /**
     * Menghapus FAQ.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}