<?php

namespace App\Http\Controllers;

use App\Models\KnowledgeBase; // Import model KnowledgeBase
use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    /**
     * Menampilkan halaman Basis Pengetahuan untuk publik.
     * Fungsi ini yang seharusnya dipanggil oleh rute 'knowledge-base.public'.
     */
    public function showPublic()
    {
        // 1. Mengambil semua data dari tabel 'knowledge_bases'.
        $articles = KnowledgeBase::latest()->get();

        // 2. Mengirim data tersebut ke view 'knowledge_base_public'.
        return view('knowledge_base_public', compact('articles'));
    }
}