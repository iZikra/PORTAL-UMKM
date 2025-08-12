<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KnowledgeBase;
use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    public function index()
{
    $articles = \App\Models\KnowledgeBase::latest()->paginate(10);
    return view('admin.knowledge-base.index', ['articles' => $articles]);
}

    public function create()
    {
        return view('admin.knowledge-base.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
        ]);

        KnowledgeBase::create($request->all());

        return redirect()->route('admin.knowledge-base.index')
                         ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * [FIXED] Mengubah metode untuk mencari data secara manual.
     * Ini akan mengatasi error 'Undefined variable $knowledgeBase'.
     */
    public function edit($id)
    {
        $knowledgeBase = KnowledgeBase::findOrFail($id);
        return view('admin.knowledge-base.edit', compact('knowledgeBase'));
    }

    public function update(Request $request, KnowledgeBase $knowledgeBase)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
        ]);

        $knowledgeBase->update($request->all());

        return redirect()->route('admin.knowledge-base.index')
                         ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(KnowledgeBase $knowledgeBase)
    {
        $knowledgeBase->delete();

        return redirect()->route('admin.knowledge-base.index')
                         ->with('success', 'Artikel berhasil dihapus.');
    }
}