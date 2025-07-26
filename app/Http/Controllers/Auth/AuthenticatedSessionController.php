<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Lakukan proses otentikasi
        $request->authenticate();

        // 2. Regenerate session untuk keamanan
        $request->session()->regenerate();

        // 3. Dapatkan data lengkap user yang sedang login
        $user = Auth::user();

        // 4. Periksa peran (role) user
        //    Pastikan di database, kolomnya bernama 'role' dan nilainya 'admin'
        if ($user->role === 'admin') {
            // Jika admin, arahkan ke rute bernama 'admin.dashboard'
            return redirect()->route('admin.dashboard');
        }

        // 5. Jika bukan admin (berarti user biasa), arahkan ke rute 'dashboard'
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
