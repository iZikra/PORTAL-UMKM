<x-layouts.app>
    {{-- Slot untuk Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Area konten utama dengan padding --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

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
                            <p class="font-bold">Pengaduan Terkirim!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            {{-- ================================================================== --}}
            {{-- AKHIR DARI BAGIAN BANNER --}}
            {{-- ================================================================== --}}

            {{-- 1. Kartu untuk Sambutan dan Tombol Aksi Utama --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800">Selamat datang, {{ Auth::user()->name }}!</h2>
                <p class="mt-2 text-gray-600">
                    Siap untuk melaporkan masalah atau memberikan masukan? Klik tombol di bawah ini untuk memulai.
                </p>
                <a href="{{ route('user.pengaduan.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4 transition-transform transform hover:scale-105 shadow-lg">
                    {{-- Ikon Plus dari Heroicons --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Buat Pengaduan Baru
                </a>
            </div>

            {{-- 2. Kartu untuk Tabel Riwayat Pengaduan --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Riwayat Pengaduan Anda</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="relative px-6 py-3"><span class="sr-only">Detail</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($pengaduans as $pengaduan)
                                {{-- Menambahkan efek hover pada baris tabel --}}
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $pengaduan->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pengaduan->judul }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- Logika untuk warna status yang berbeda --}}
                                        @if($pengaduan->status == 'Baru')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                Baru
                                            </span>
                                        @elseif($pengaduan->status == 'Diproses')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Diproses
                                            </span>
                                        @elseif($pengaduan->status == 'Selesai')
                                             <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Selesai
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                {{ $pengaduan->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('user.pengaduan.show', $pengaduan) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Lihat Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Anda belum pernah membuat pengaduan. Mulai buat sekarang!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>