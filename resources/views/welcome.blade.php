<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portal UMKM') }} - Layanan Pengaduan UMKM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        
        @include('components.layouts.navigation')

        <!-- Konten Utama -->
        <main>
            <!-- Hero Section -->
            {{-- [FIX] Mengganti background gambar gelap dengan gradient yang lebih cerah --}}
            {{-- Kode yang Sudah Diperbaiki --}}
{{-- GANTI BAGIAN SECTION LAMA DENGAN YANG INI --}}
<section class="relative flex content-center items-center justify-center" style="min-height: 90vh;">
    {{-- Latar Belakang Gambar --}}
    <div class="absolute top-0 h-full w-full bg-cover bg-bottom" style="background-image: url('{{ asset('images/3.jpg') }}');">
    </div>
    
    {{-- Lapisan Gelap (Overlay) untuk Kontras --}}
    <div class="absolute top-0 h-full w-full bg-black opacity-50"></div>

    {{-- Konten Teks (diambil dari kode asli Anda) --}}
    <div class="container relative mx-auto">
        <div class="flex flex-wrap items-center">
            <div class="ml-auto mr-auto w-full px-4 text-center lg:w-8/12">
                <h1 class="text-5xl font-semibold text-white">Selamat Datang di Portal UMKM</h1>
                <p class="mt-4 text-lg text-gray-200">Platform terpadu untuk membantu, mendukung, dan memajukan Usaha Mikro, Kecil, dan Menengah di seluruh Indonesia.</p>
                <div class="mt-8">
                    <a href="{{ route('register') }}" class="bg-indigo-500 text-white hover:bg-indigo-600 px-8 py-3 rounded-full text-lg font-semibold transition duration-300">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>

            <!-- Fitur Section -->
            <section id="fitur" class="py-20 bg-gray-50 dark:bg-gray-800">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        
                        <!-- Card 1: Mudah & Cepat -->
                        <div class="transform transition-transform duration-300 hover:-translate-y-2 bg-white dark:bg-gray-900 w-full h-full shadow-lg rounded-2xl overflow-hidden">
                            <div class="px-6 py-8 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-md rounded-full bg-red-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-white">Mudah & Cepat</h6>
                                <p class="mt-2 mb-4 text-gray-600 dark:text-gray-400">
                                    Laporkan masalah atau berikan masukan dengan beberapa langkah sederhana melalui formulir yang intuitif.
                                </p>
                            </div>
                        </div>

                        <!-- Card 2: Transparan & Terpantau -->
                        <div class="transform transition-transform duration-300 hover:-translate-y-2 bg-white dark:bg-gray-900 w-full h-full shadow-lg rounded-2xl overflow-hidden">
                            <div class="px-6 py-8 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-md rounded-full bg-blue-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                </div>
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-white">Transparan & Terpantau</h6>
                                <p class="mt-2 mb-4 text-gray-600 dark:text-gray-400">
                                    Lacak status pengaduan Anda secara real-time hingga mendapatkan tanggapan dari pihak berwenang.
                                </p>
                            </div>
                        </div>

                        <!-- Card 3: Solusi Tepat Sasaran -->
                        <div class="transform transition-transform duration-300 hover:-translate-y-2 bg-white dark:bg-gray-900 w-full h-full shadow-lg rounded-2xl overflow-hidden">
                            <div class="px-6 py-8 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-md rounded-full bg-green-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2V7a2 2 0 012-2h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V8z"></path></svg>
                                </div>
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-white">Solusi Tepat Sasaran</h6>
                                <p class="mt-2 mb-4 text-gray-600 dark:text-gray-400">
                                    Dapatkan tanggapan dan solusi langsung dari pihak yang berwenang untuk membantu menyelesaikan masalah Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500 dark:text-gray-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Portal UMKM') }}. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
