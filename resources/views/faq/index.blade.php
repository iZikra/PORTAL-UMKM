<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Judul akan berubah tergantung role pengguna --}}
            @auth
                @if(Auth::user()->role == 'admin')
                    {{ __('Manajemen FAQ') }}
                @else
                    {{ __('Frequently Asked Questions (FAQ)') }}
                @endif
            @else
                {{ __('Frequently Asked Questions (FAQ)') }}
            @endauth
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Tombol "Tambah Baru" hanya akan muncul untuk Admin --}}
                    @auth
                        @if(Auth::user()->role == 'admin')
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-semibold">Daftar FAQ</h3>
                                <a href="{{ route('admin.faq.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                    Tambah FAQ Baru
                                </a>
                            </div>
                        @endif
                    @endauth

                    {{-- Notifikasi Sukses hanya untuk Admin --}}
                     @auth
                        @if(Auth::user()->role == 'admin' && session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                    @endauth

                    {{-- Konten Daftar FAQ --}}
                    <div class="space-y-8 mt-4">
                        @forelse($faqs as $faq)
                            <div class="border-b pb-4">
                                <h4 class="text-lg font-semibold text-gray-800">{{ $faq->pertanyaan }}</h4>
                                <p class="mt-2 text-gray-600">{{ $faq->jawaban }}</p>

                                {{-- =============================================== --}}
                                {{-- Tombol Aksi HANYA UNTUK ADMIN MUNCUL DI SINI --}}
                                {{-- =============================================== --}}
                                @auth
                                    @if(Auth::user()->role == 'admin')
                                        <div class="mt-4 text-right space-x-2">
                                            <a href="{{ route('admin.faq.edit', $faq->id) }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                            <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus FAQ ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:text-red-900 font-medium">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                                {{-- =============================================== --}}
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Belum ada FAQ yang tersedia.</p>
                        @endforelse
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>