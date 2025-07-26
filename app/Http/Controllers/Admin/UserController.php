<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Import model User
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua pengguna yang terdaftar.
     */
    public function index()
    {
        // Ambil semua data pengguna, urutkan dari yang terbaru
        $users = User::latest()->get();

        // Kirim data ke view
        return view('admin.users.index', compact('users'));
    }
}
