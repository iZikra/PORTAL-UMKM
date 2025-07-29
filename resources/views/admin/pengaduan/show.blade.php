<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pengaduan: ') . $pengaduan->kode_unik }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- ================================================================== --}}
            {{-- BAGIAN BANNER NOTIFIKASI BARU --}}
            {{-- ================================================================== --}}
            @if (session('success'))
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md"
                    role="alert"
                >
                    <div class="flex">
                        <div class="py-1">
                            <svg class="h-6 w-6 text-green-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">Perubahan Disimpan!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            {{-- ================================================================== --}}
            {{-- AKHIR DARI BAGIAN BANNER --}}
            {{-- ================================================================== --}}

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100 space-y-6">

                    <div class="mb-6">
                        {{-- TOMBOL KEMBALI YANG SUDAH DIPERBAIKI --}}
                        <a href="{{ route('admin.pengaduan.index', request()->only(['search', 'status'])) }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            &larr; Kembali ke Daftar Pengaduan
                        </a>
                    </div>
                    
                    {{-- Informasi Usaha --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Pelapor</h3>
                        <div class="mt-4 space-y-2">
                            <p><strong>Nama Pelaku Usaha:</strong> {{ $pengaduan->nama_pelaku_usaha }}</p>
                            <p><strong>Nama Usaha:</strong> {{ $pengaduan->nama_usaha }}</p>
                            <p><strong>Alamat Usaha:</strong> {{ $pengaduan->alamat_usaha }}</p>
                        </div>
                    </div>

                    {{-- Detail Pengaduan --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2 mt-6">Detail Laporan</h3>
                        <div class="mt-4 space-y-2">
                            <p><strong>Waktu Laporan:</strong> {{ $pengaduan->created_at->timezone('Asia/Jakarta')->format('d F Y, H:i') }} WIB</p>
                            <p><strong>Judul:</strong> {{ $pengaduan->judul }}</p>
                            <p><strong>Kategori:</strong> {{ $pengaduan->kategori }}</p>
                            <p><strong>Status Saat Ini:</strong> 
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($pengaduan->status == 'Selesai') bg-green-100 text-green-800
                                    @elseif($pengaduan->status == 'Diproses') bg-yellow-100 text-yellow-800
                                    @elseif($pengaduan->status == 'Ditolak') bg-red-100 text-red-800
                                    @else bg-blue-100 text-blue-800 @endif">
                                    {{ $pengaduan->status }}
                                </span>
                            </p>
                            <div class="prose dark:prose-invert max-w-none">
                                <p><strong>Deskripsi:</strong></p>
                                <blockquote>{{ $pengaduan->deskripsi }}</blockquote>
                            </div>
                        </div>
                    </div>

                    {{-- Riwayat Tanggapan --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 pb-2">Riwayat Tanggapan</h3>
                        <div class="space-y-4 mt-4">
                            @forelse (($pengaduan->tanggapans ?? []) as $tanggapan)
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm font-semibold">{{ $tanggapan->user->name }} ({{ $tanggapan->user->role }})</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $tanggapan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</p>
                                    </div>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $tanggapan->tanggapan }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">Belum ada tanggapan untuk pengaduan ini.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- Form Tanggapan & Update Status --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 pb-2">Beri Tanggapan & Update</h3>
                        
                        {{-- FORM DENGAN INPUT HIDDEN UNTUK FILTER --}}
                        <form method="POST" action="{{ route('admin.pengaduan.tanggapi', $pengaduan) }}">
                            @csrf
                            @method('PATCH')

                            {{-- Input tersembunyi untuk MENYIMPAN filter LAMA --}}
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="filter_status" value="{{ request('status') }}">

                            <div class="mt-4">
                                <label for="status_select" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Ubah Status') }}</label>
                                <select id="status_select" name="status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>
                                    <option value="Baru" {{ $pengaduan->status == 'Baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="Diproses" {{ $pengaduan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Ditolak" {{ $pengaduan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="tanggapan" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Tulis Tanggapan (Opsional)') }}</label>
                                <textarea id="tanggapan" name="tanggapan" rows="5" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"></textarea>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">
                                    {{ __('Simpan Perubahan') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>