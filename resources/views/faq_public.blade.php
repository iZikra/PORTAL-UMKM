<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ - Portal Layanan Pengaduan UMKM</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-800">
    <div class="min-h-screen">
        {{-- Menggunakan komponen navigasi yang sama dengan halaman utama --}}
        @include('components.layouts.navigation')

        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">
                            <div class="mb-8">
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Daftar Pertanyaan</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Temukan jawaban untuk pertanyaan yang paling sering diajukan di bawah ini.</p>
                            </div>
                            <div class="space-y-6">
                                @forelse($faqs as $faq)
                                    <div class="border-t dark:border-gray-700 pt-4">
                                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                            {{ $faq->pertanyaan }}
                                        </h4>
                                        <div class="mt-2">
                                            <p class="text-gray-600 dark:text-gray-400">
                                                {{ $faq->jawaban }}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center text-gray-500 py-8">Belum ada FAQ yang tersedia saat ini.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>