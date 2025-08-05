<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal Layanan Pengaduan UMKM</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-800">
        <div class="min-h-screen">
            <header x-data="{ open: false }" class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                {{-- Tautan Portal UMKM ini sudah benar dan seharusnya bisa diklik --}}
                                <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                                    Portal UMKM
                                </a>
                            </div>

                            {{-- [FIXED] Navigasi Desktop dengan logika yang lebih rapi --}}
                            <div class="hidden md:flex items-center space-x-8 ml-10">
                                @php
                                    $baseClasses = 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out';
                                    $activeClasses = 'border-indigo-400 text-gray-900 focus:outline-none focus:border-indigo-700';
                                    $inactiveClasses = 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300';
                                @endphp

                                @auth
                                    {{-- Navigasi untuk Pengguna yang Sudah Login --}}
                                    <a href="{{ route('home') }}" class="{{ $baseClasses }} {{ request()->routeIs('home') ? $activeClasses : $inactiveClasses }}">Beranda</a>
                                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="{{ $baseClasses }} {{ request()->routeIs('admin.dashboard', 'dashboard') ? $activeClasses : $inactiveClasses }}">Dashboard</a>
                                    <a href="{{ route('knowledge-base.public') }}" class="{{ $baseClasses }} {{ request()->routeIs('knowledge-base.public') ? $activeClasses : $inactiveClasses }}">Basis Pengetahuan</a>
                                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.faq.index') : route('faq.public') }}" class="{{ $baseClasses }} {{ request()->routeIs('admin.faq.*', 'faq.public') ? $activeClasses : $inactiveClasses }}">
                                        {{ auth()->user()->role === 'admin' ? 'Kelola FAQ' : 'FAQ' }}
                                    </a>
                                @else
                                    {{-- Navigasi untuk Tamu (Belum Login) --}}
                                    <a href="{{ route('home') }}" class="{{ $baseClasses }} {{ request()->routeIs('home') ? $activeClasses : $inactiveClasses }}">Beranda</a>
                                    <a href="{{ route('knowledge-base.public') }}" class="{{ $baseClasses }} {{ request()->routeIs('knowledge-base.public') ? $activeClasses : $inactiveClasses }}">Basis Pengetahuan</a>
                                    <a href="{{ route('faq.public') }}" class="{{ $baseClasses }} {{ request()->routeIs('faq.public') ? $activeClasses : $inactiveClasses }}">FAQ</a>
                                @endauth
                            </div>
                        </div>

                        {{-- Tombol Login/Register atau User Dropdown --}}
                        <div class="hidden md:flex items-center space-x-4">
                            @auth
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>
                                            <div class="ml-1"><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Register</a>
                                @endif
                            @endauth
                        </div>

                        {{-- Tombol Hamburger untuk Mobile --}}
                        <div class="md:hidden flex items-center">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Menu Dropdown Mobile --}}
                <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        @auth
                            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50">Beranda</a>
                            <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Dashboard</a>
                            <a href="{{ route('knowledge-base.public') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Basis Pengetahuan</a>
                            <a href="{{ auth()->user()->role === 'admin' ? route('admin.faq.index') : route('faq.public') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">
                                {{ auth()->user()->role === 'admin' ? 'Kelola FAQ' : 'FAQ' }}
                            </a>
                        @else
                             <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50">Beranda</a>
                             <a href="{{ route('knowledge-base.public') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Basis Pengetahuan</a>
                             <a href="{{ route('faq.public') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">FAQ</a>
                        @endauth
                    </div>
                    <div class="pt-4 pb-3 border-t border-gray-200">
                        @auth
                             <div class="px-4">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="mt-3 space-y-1">
                                <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">
                                        Log Out
                                    </a>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </header>

            <main>
                <div class="relative flex content-center items-center justify-center" style="min-height: 75vh;">
                    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('{{ asset('images/login-bg.jpg') }}');">
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
                                    <a href="{{ auth()->check() ? route('user.pengaduan.create') : route('login') }}" class="inline-block mt-6 px-8 py-3 text-lg font-semibold text-white bg-indigo-600 rounded-lg shadow-lg hover:bg-indigo-700 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out">
                                    Buat Pengaduan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="fitur" class="py-20 bg-gray-50">
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
