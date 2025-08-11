<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen FAQ') }}
        </h2>
    </x-slot>

    {{-- WRAPPER UTAMA UNTUK ALPINE.JS --}}
    <div x-data="{ showModal: false, deleteUrl: '' }">

        {{-- Komponen Modal Konfirmasi Hapus --}}
        <x-confirm-delete-modal />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- [FIXED] Menambahkan class dark mode pada kartu utama --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Daftar FAQ</h3>
                            {{-- [FIXED] Menambahkan class dark mode pada tombol --}}
                            <a href="{{ route('admin.faq.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition-colors">
                                Tambah FAQ Baru
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-md relative mb-4" role="alert">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <div class="space-y-8 mt-4">
                            @forelse($faqs as $faq)
                                {{-- [FIXED] Menambahkan class dark mode pada elemen FAQ --}}
                                <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $faq->pertanyaan }}</h4>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $faq->jawaban }}</p>
                                    <div class="mt-4 text-right space-x-4">
                                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 font-medium">Edit</a>
                                        <button 
                                            @click="$dispatch('open-delete-modal', { url: '{{ route('admin.faq.destroy', $faq->id) }}' })" 
                                            type="button" 
                                            class="text-sm text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 font-medium"
                                        >
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-gray-500 dark:text-gray-400">Belum ada FAQ yang tersedia.</p>
                            @endforelse
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-6">
                            {{ $faqs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>