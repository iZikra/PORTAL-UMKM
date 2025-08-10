<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portal Layanan UMKM') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            <span class="font-semibold text-lg text-gray-800">Portal UMKM</span>
                        </a>
                    </div>

                    <!-- Navigation Links (Desktop) -->
                    <nav class="hidden md:flex items-center space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 transition">Beranda</a>
                        <a href="{{ route('knowledge-base.public') }}" class="text-gray-600 hover:text-blue-600 transition">Basis Pengetahuan</a>
                        <a href="{{ route('faq.public') }}" class="text-gray-600 hover:text-blue-600 transition">FAQ</a>
                    </nav>

                    <!-- Auth Links (Desktop) -->
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Log in</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition shadow-sm">
                            Register
                        </a>
                    </div>
                    
                    <!-- Hamburger (Mobile) -->
                    <div class="md:hidden">
                        {{-- Implementasi hamburger jika diperlukan --}}
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center text-gray-500">
                &copy; {{ date('Y') }} {{ config('app.name', 'Portal Layanan UMKM') }}. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>
