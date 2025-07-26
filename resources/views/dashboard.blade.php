<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- ================================================================== --}}
    {{-- BAGIAN POP-UP (MODAL) UNTUK PESAN SUKSES --}}
    {{-- ================================================================== --}}
    @if (session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show"
            class="fixed inset-0 bg-gray-900 bg-opacity-60 flex items-center justify-center z-50 px-4"
            style="display: none;"
        >
            <div 
                @click.away="show = false"
                class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-sm mx-auto text-center"
            >
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100 mt-4">Pengaduan Terkirim!</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ session('success') }}
                    </p>
                </div>
                <div class="mt-4">
                    <button 
                        @click="show = false"
                        type="button" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm"
                    >
                        Mengerti
                    </button>
                </div>
            </div>
        </div>
    @endif
    {{-- ================================================================== --}}
    {{-- AKHIR DARI BAGIAN POP-UP --}}
    {{-- ================================================================== --}}


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2">Anda dapat membuat pengaduan baru atau melihat riwayat pengaduan Anda di bawah ini.</p>
                    <a href="{{ route('user.pengaduan.create') }}" class="inline-block bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4">
                        Buat Pengaduan Baru
                    </a>
                </div>
            </div>

            {{-- Bagian untuk menampilkan riwayat pengaduan --}}
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Riwayat Pengaduan Anda</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="relative px-6 py-3"><span class="sr-only">Detail</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($pengaduans as $pengaduan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pengaduan->created_at->format('d M Y') }}</td>
                                        <td class="px-6 py-4">{{ $pengaduan->judul }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ $pengaduan->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- PERBAIKI LINK INI --}}
                                            <a href="{{ route('user.pengaduan.show', $pengaduan) }}" class="text-indigo-600 hover:text-indigo-900">Lihat Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            Anda belum pernah membuat pengaduan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
