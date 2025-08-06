<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KnowledgeBase;
use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua artikel dan mengelompokkannya berdasarkan kolom 'category'
    $articles = \App\Models\KnowledgeBase::latest()->get();
        
        // Mengirim data yang sudah dikelompokkan ke view
    return view('admin.knowledge-base.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.knowledge-base.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        KnowledgeBase::create($request->all());

        return redirect()->route('admin.knowledge-base.index')
                         ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KnowledgeBase $knowledgeBase)
    {
        // Biasanya tidak digunakan untuk admin, redirect ke edit
        return redirect()->route('admin.knowledge-base.edit', $knowledgeBase);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KnowledgeBase $knowledge_base)
    {
        return view('admin.knowledge-base.edit', ['article' => $knowledge_base]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KnowledgeBase $knowledge_base)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $knowledge_base->update($request->all());

        return redirect()->route('admin.knowledge-base.index')
                         ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KnowledgeBase $knowledge_base)
    {
        $knowledge_base->delete();

        return redirect()->route('admin.knowledge-base.index')
                         ->with('success', 'Artikel berhasil dihapus.');
    }
}
