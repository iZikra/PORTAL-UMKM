<x-layouts.app>
    {{-- Slot untuk header halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Frequently Asked Questions (FAQ)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">

                    {{-- Judul dan deskripsi singkat --}}
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Daftar Pertanyaan</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Temukan jawaban untuk pertanyaan yang paling sering diajukan di bawah ini.</p>
                    </div>

                    {{-- PERBAIKAN: Daftar FAQ dibuat statis (semua terbuka) --}}
                    <div class="space-y-6">
                        @forelse($faqs as $faq)
                            <div class="border-t dark:border-gray-700 pt-4">
                                {{-- Pertanyaan ditampilkan sebagai heading --}}
                                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $faq->pertanyaan }}
                                </h4>
                                
                                {{-- Jawaban langsung ditampilkan di bawah pertanyaan --}}
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
</x-layouts.app>
