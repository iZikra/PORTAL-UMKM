<?php

namespace App\Http\Controllers;

use App\Models\Faq; // <-- Pastikan ini ada
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Menampilkan halaman FAQ.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('faq.index', compact('faqs'));
    }
}