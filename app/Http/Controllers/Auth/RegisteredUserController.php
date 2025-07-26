<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nama_usaha' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'nib' => ['required', 'string', 'size:13', 'unique:'.User::class],
            'sektor_usaha' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:15'],
            'alamat_jalan' => ['required', 'string', 'max:255'],
            'alamat_kelurahan' => ['required', 'string', 'max:255'],
            'alamat_kecamatan' => ['required', 'string', 'max:255'],
            'alamat_kota' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'nama_usaha' => $request->nama_usaha,
            'nib' => $request->nib,
            'sektor_usaha' => $request->sektor_usaha,
            'no_telp' => $request->no_telp,
            'alamat_jalan' => $request->alamat_jalan,
            'alamat_kelurahan' => $request->alamat_kelurahan,
            'alamat_kecamatan' => $request->alamat_kecamatan,
            'alamat_kota' => $request->alamat_kota,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
