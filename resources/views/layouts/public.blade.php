<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Portal UMKM')</title>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- AlpineJS Collapse Plugin -->
        <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="antialiased font-sans bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Header Tunggal -->
            <header class="flex justify-between items-center mb-8 pb-4 border-b dark:border-gray-700">
                <a href="/" class="flex items-center">
                    <x-application-logo class="block h-10 w-auto" />
                    <span class="ml-3 text-xl font-semibold text-gray-800 dark:text-gray-200">Portal UMKM</span>
                </a>
                <nav>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">Register</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </header>

            <!-- Konten Halaman akan Muncul di Sini -->
            <main>
                @yield('content')
            </main>

             <!-- Footer -->
            <footer class="py-16 text-center text-sm text-gray-500 dark:text-gray-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Portal UMKM') }}. All Rights Reserved.</p>
            </footer>

        </div>
    </body>
</html>
