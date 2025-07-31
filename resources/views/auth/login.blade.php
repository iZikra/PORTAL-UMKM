<x-layouts.guest>
    {{-- PERUBAHAN: Menambahkan Judul dan Subjudul --}}
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Selamat Datang Kembali</h2>
        <p class="text-gray-600 dark:text-gray-400">Silakan masuk ke akun Anda</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <div class="mt-6">
            {{-- PERUBAHAN: Tombol dibuat full-width dan diletakkan di dalam div terpisah --}}
            <x-primary-button class="w-full justify-center">
                {{ __('Log In') }}
            </x-primary-button>
        </div>

        {{-- PERUBAHAN: Menambahkan link ke halaman Register --}}
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="underline font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-200">
                    Daftar di sini
                </a>
            </p>
        </div>
    </form>
</x-layouts.guest>