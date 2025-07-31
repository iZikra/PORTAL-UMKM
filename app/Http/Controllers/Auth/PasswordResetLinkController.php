<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    App::setLocale('id');
    $request->validate([
        'email' => ['required', 'email'],
    ]);

    $status = Password::sendResetLink($request->only('email'));

    // Di sini perubahannya
    if ($status == Password::RESET_LINK_SENT) {
        return back()->with('success', __($status));
    }

    return back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}