<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            
            {{-- [FIXED] Menambahkan Navigasi di Layout Tamu --}}
            <nav class="w-full bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div>
                            <a href="/" class="flex items-center">
                                <x-application-logo class="w-12 h-12 fill-current text-gray-500" />
                                <span class="ml-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    Portal UMKM
                                </span>
                            </a>
                        </div>
                        <div class="flex items-center">
                            @if (Route::has('login'))
                                <div class="space-x-4">
                                    @auth
                                        {{-- Jika sudah login, tampilkan tombol Dashboard --}}
                                        <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    @else
                                        {{-- Tombol Login dan Register untuk Tamu --}}
                                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 dark:text-gray-400 hover:underline">Log in</a>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 inline-block px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition-colors">Register</a>
                                    @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            {{-- Konten utama (form login, register, dll) --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
