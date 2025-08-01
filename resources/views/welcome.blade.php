<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal Layanan Pengaduan UMKM</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-800">
        <div class="min-h-screen">
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                                Portal UMKM
                            </a>
                        </div>

                        <nav class="hidden md:flex items-center space-x-8">
                            <a href="{{ route('home') }}" class="font-semibold text-gray-600 hover:text-gray-900">Beranda</a>
                            <a href="#fitur" class="font-semibold text-gray-600 hover:text-gray-900">Fitur</a>
                            {{-- PERBAIKAN: Mengarahkan link ke rute FAQ publik yang baru --}}
                            <a href="{{ route('faq.public') }}" class="font-semibold text-gray-600 hover:text-gray-900">FAQ</a>
                        </nav>

                        <div class="hidden md:flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <main>
                <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
                    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80');">
                        <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
                    </div>
                    <div class="container relative mx-auto">
                        <div class="items-center flex flex-wrap">
                            <div class="w-full lg:w-8/12 px-4 ml-auto mr-auto text-center">
                                <div class="pr-12">
                                    <h1 class="text-white font-semibold text-5xl">
                                        Portal Layanan Pengaduan UMKM
                                    </h1>
                                    <p class="mt-4 text-lg text-gray-300">
                                        Wadah untuk menyampaikan aspirasi, keluhan, dan mendapatkan solusi untuk kemajuan usaha Anda.
                                    </p>
                                    {{-- PERBAIKAN: Arahkan ke halaman login --}}
                                    <a href="{{ route('login') }}" class="inline-block px-8 py-3 text-lg font-semibold text-white bg-indigo-600 rounded-lg shadow-lg hover:bg-indigo-700 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out">
                                    Buat Pengaduan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="fitur" class="py-20 bg-gray-50 -mt-24">
                    <div class="container mx-auto px-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                            {{-- Card 1: Mudah & Cepat --}}
                            <div class="transform transition-transform duration-300 hover:-translate-y-2">
                                <div class="relative flex flex-col min-w-0 break-words bg-white w-full h-full shadow-lg rounded-2xl overflow-hidden">
                                    <div class="px-6 py-8 flex-auto">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-md rounded-full bg-red-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <h6 class="text-xl font-semibold">Mudah & Cepat</h6>
                                        <p class="mt-2 mb-4 text-gray-500">
                                            Laporkan masalah atau berikan masukan dengan beberapa langkah sederhana melalui formulir yang intuitif.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Card 2: Transparan & Terpantau --}}
                            <div class="transform transition-transform duration-300 hover:-translate-y-2">
                                <div class="relative flex flex-col min-w-0 break-words bg-white w-full h-full shadow-lg rounded-2xl overflow-hidden">
                                    <div class="px-6 py-8 flex-auto">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-md rounded-full bg-blue-400">
                                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                        </div>
                                        <h6 class="text-xl font-semibold">Transparan & Terpantau</h6>
                                        <p class="mt-2 mb-4 text-gray-500">
                                            Lacak status pengaduan Anda secara real-time hingga mendapatkan tanggapan dari pihak berwenang.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Card 3: Solusi Tepat Sasaran --}}
                            <div class="transform transition-transform duration-300 hover:-translate-y-2">
                                <div class="relative flex flex-col min-w-0 break-words bg-white w-full h-full shadow-lg rounded-2xl overflow-hidden">
                                    <div class="px-6 py-8 flex-auto">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-md rounded-full bg-green-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2V7a2 2 0 012-2h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V8z"></path></svg>
                                        </div>
                                        <h6 class="text-xl font-semibold">Solusi Tepat Sasaran</h6>
                                        <p class="mt-2 mb-4 text-gray-500">
                                            Dapatkan tanggapan dan solusi langsung dari pihak yang berwenang untuk membantu menyelesaikan masalah Anda.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="bg-white border-t">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-gray-500">
                    <p>&copy; {{ date('Y') }} Portal Layanan Pengaduan UMKM. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>