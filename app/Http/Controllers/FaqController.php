<?php

// PERBAIKAN: Namespace yang benar
namespace App\Http\Controllers;

use App\Models\Faq;
// PERBAIKAN: use statement yang benar
use Illuminate\Http\Request;
use App\Models\KnowledgeBase;

class FaqController extends Controller
{
    public function index()
    {
    $faqs = Faq::latest()->get();
    // Mengarahkan ke view yang benar di dalam folder admin
    return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Menampilkan form untuk membuat FAQ baru.
     */
    public function create()
    {
    return view('admin.faq.create');
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
        return view('admin.faq.edit', compact('faq'));
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

    public function showPublicFaq()
    {
        $faqs = Faq::latest()->get(); // Ambil semua data FAQ
        return view('faq_public', compact('faqs')); // Kirim data ke view baru 'faq_public.blade.php'
    }
    public function showKnowledgeBase()
    {
    $articles = KnowledgeBase::latest()->get();
    return view('knowledge_base_public', compact('articles'));
    }
}