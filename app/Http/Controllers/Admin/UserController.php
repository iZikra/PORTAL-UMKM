<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Import model User
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index(Request $request)
{
    $query = \App\Models\User::query();

    // [MODIFIED] Jadikan 'user' sebagai peran default jika tidak ada filter yang dipilih
    $role = $request->input('role', 'user');
    $query->where('role', $role);

    // Pencarian berdasarkan nama atau email
    if ($request->filled('search')) {
        $searchTerm = $request->search;
        $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'like', "%{$searchTerm}%")
              ->orWhere('email', 'like', "%{$searchTerm}%");
        });
    }

    $users = $query->paginate(10);
    
    return view('admin.users.index', compact('users'));
}
}   