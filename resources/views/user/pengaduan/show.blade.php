<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pengaduan: ') . $pengaduan->kode_unik }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100 space-y-6">

                    {{-- Tombol Kembali --}}
                    <div class="mb-6">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            &larr; Kembali ke Dashboard
                        </a>
                    </div>
                    
                    {{-- Informasi Pelapor --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Pelapor</h3>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <p><strong>Nama Pelaku Usaha:</strong><br>{{ $pengaduan->nama_pelaku_usaha }}</p>
                            <p><strong>Nama Usaha:</strong><br>{{ $pengaduan->nama_usaha }}</p>
                            <p class="md:col-span-2"><strong>Alamat Usaha:</strong><br>{{ $pengaduan->alamat_usaha }}</p>
                        </div>
                    </div>

                    {{-- Detail Laporan Pengaduan --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2">Detail Laporan</h3>
                        <div class="mt-4 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <p><strong>Waktu Laporan:</strong><br>{{ $pengaduan->created_at->timezone('Asia/Jakarta')->format('d F Y, H:i') }} WIB</p>
                                <p><strong>Status Saat Ini:</strong><br>
                                    @if($pengaduan->status == 'Selesai')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    @elseif($pengaduan->status == 'Diproses')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    @elseif($pengaduan->status == 'Ditolak')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    @else
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    @endif
                                        {{ $pengaduan->status }}
                                    </span>
                                </p>
                                <p><strong>Judul:</strong><br>{{ $pengaduan->judul }}</p>
                                <p><strong>Kategori:</strong><br>{{ $pengaduan->kategori }}</p>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="prose dark:prose-invert max-w-none">
                                <p><strong>Deskripsi:</strong></p>
                                <blockquote class="border-l-4 border-gray-300 dark:border-gray-600 pl-4">{{ $pengaduan->deskripsi }}</blockquote>
                            </div>
                            
                            {{-- Bukti Terlampir --}}
                            @if ($pengaduan->bukti)
                            <div class="mt-4">
                                <p><strong>Bukti Terlampir:</strong></p>
                                @php
                                    $fileExtension = pathinfo($pengaduan->bukti, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <a href="{{ asset('storage/' . $pengaduan->bukti) }}" target="_blank" class="mt-2 inline-block">
                                        <img src="{{ asset('storage/' . $pengaduan->bukti) }}" alt="Bukti Pengaduan" class="rounded-lg border dark:border-gray-700 max-w-sm hover:opacity-90 transition-opacity">
                                    </a>
                                @else
                                    <a href="{{ asset('storage/' . $pengaduan->bukti) }}" target="_blank" class="mt-2 inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600">
                                        Lihat Dokumen ({{ strtoupper($fileExtension) }})
                                    </a>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Riwayat Tanggapan --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 pb-2">Riwayat Tanggapan</h3>
                        <div class="space-y-4 mt-4">
                            @forelse (($pengaduan->tanggapans ?? []) as $tanggapan)
                                <div class="{{ $tanggapan->user->role == 'admin' ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800' }} p-4 rounded-lg shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm font-semibold">
                                            @if($tanggapan->user->role == 'admin')
                                                {{ $tanggapan->user->name }} (Petugas)
                                            @else
                                                Anda (Pelapor)
                                            @endif
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $tanggapan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</p>
                                    </div>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $tanggapan->tanggapan }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">Belum ada tanggapan dari petugas.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- Form Balasan untuk User (Hanya jika status belum Selesai/Ditolak) --}}
                    @if(!in_array($pengaduan->status, ['Selesai', 'Ditolak']))
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 pb-2">Kirim Balasan</h3>
                            <form method="POST" action="{{ route('user.pengaduan.balas', $pengaduan) }}">
                                @csrf
                                <textarea name="tanggapan" rows="5" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" placeholder="Tulis balasan atau informasi tambahan di sini..." required></textarea>
                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">
                                        Kirim Balasan
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                         <div class="border-t border-gray-200 dark:border-gray-700 pt-6 text-center">
                             <p class="text-sm text-gray-500">Diskusi untuk pengaduan ini telah ditutup.</p>
                         </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>