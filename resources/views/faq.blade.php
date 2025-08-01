<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- PERBAIKAN: Judul dibuat aman untuk tamu dan dinamis untuk admin --}}
            @if(auth()->user()?->role == 'admin')
                {{ __('Manajemen FAQ') }}
            @else
                {{ __('Frequently Asked Questions (FAQ)') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">

                    {{-- Tombol "Tambah Baru" hanya akan muncul untuk Admin --}}
                    @if(auth()->user()?->role == 'admin')
                        <div class="flex justify-end items-center mb-6">
                            <a href="{{ route('admin.faq.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition-colors duration-200">
                                Tambah FAQ Baru
                            </a>
                        </div>
                    @endif

                    {{-- Notifikasi Sukses --}}
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-md relative mb-6" role="alert">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- PERBAIKAN: Tampilan daftar FAQ diubah menjadi Accordion --}}
                    <div x-data="{ open: null }" class="space-y-4">
                        @forelse($faqs as $faq)
                            <div class="border dark:border-gray-700 rounded-lg overflow-hidden">
                                <button @click="open = (open === {{ $faq->id }} ? null : {{ $faq->id }})" class="w-full flex justify-between items-center p-4 text-left transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $faq->pertanyaan }}</h4>
                                    {{-- Ikon panah (chevron) --}}
                                    <svg :class="{'rotate-180': open === {{ $faq->id }}}" class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                
                                {{-- Konten jawaban yang bisa disembunyikan/ditampilkan --}}
                                <div x-show="open === {{ $faq->id }}" x-collapse>
                                    <div class="p-4 pt-0">
                                        <p class="text-gray-600 dark:text-gray-400">{{ $faq->jawaban }}</p>

                                        {{-- Tombol Aksi HANYA UNTUK ADMIN --}}
                                        @if(auth()->user()?->role == 'admin')
                                            <div class="mt-4 pt-4 border-t dark:border-gray-700 text-right space-x-3">
                                                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="text-sm text-indigo-500 hover:text-indigo-700 font-medium">Edit</a>
                                                <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus FAQ ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-8">Belum ada FAQ yang tersedia.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>