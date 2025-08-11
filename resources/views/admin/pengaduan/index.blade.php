<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Semua Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- [FIXED] UI Filter dan Pencarian yang Lebih Baik --}}
                    <div class="mb-6 md:flex md:items-center md:justify-between">
                        {{-- Tombol Filter Status --}}
                        <div class="flex-1 grid grid-cols-2 sm:grid-cols-5 gap-4 mb-4 md:mb-0">
                            <a href="{{ route('admin.pengaduan.index') }}" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition {{ !$status ? 'bg-indigo-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' }}">Semua</a>
                            <a href="{{ route('admin.pengaduan.index', ['status' => 'Baru']) }}" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition {{ $status == 'Baru' ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' }}">Baru</a>
                            <a href="{{ route('admin.pengaduan.index', ['status' => 'Diproses']) }}" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition {{ $status == 'Diproses' ? 'bg-yellow-500 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' }}">Diproses</a>
                            <a href="{{ route('admin.pengaduan.index', ['status' => 'Selesai']) }}" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition {{ $status == 'Selesai' ? 'bg-green-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' }}">Selesai</a>
                            <a href="{{ route('admin.pengaduan.index', ['status' => 'Ditolak']) }}" class="px-4 py-2 text-center rounded-md text-sm font-semibold transition {{ $status == 'Ditolak' ? 'bg-red-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' }}">Ditolak</a>
                        </div>
                        
                        {{-- Form Pencarian --}}
                        <form action="{{ route('admin.pengaduan.index') }}" method="GET">
                            <input type="hidden" name="status" value="{{ $status ?? '' }}">
                            <div class="relative">
                                <input type="text" name="search" placeholder="Cari judul atau nama..." value="{{ $search ?? '' }}" class="w-full md:w-64 pl-10 pr-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 10.35a6.3 6.3 0 11-12.6 0 6.3 6.3 0 0112.6 0z"></path></svg>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Tabel Pengaduan --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">NO</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Waktu Lapor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Pelapor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                                    <th class="relative px-6 py-3"><span class="sr-only">Detail</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($pengaduans as $key => $pengaduan)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $pengaduans->firstItem() + $key }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $pengaduan->created_at->format('d M Y, H:i') }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $pengaduan->judul }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $pengaduan->user->name }}</td>
                                        <td class="px-6 py-4">
                                            {{-- [FIXED] Badge status dengan warna dark mode --}}
                                            <span @class([
                                                'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-200' => $pengaduan->status == 'Baru',
                                                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-200' => $pengaduan->status == 'Diproses',
                                                'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-200' => $pengaduan->status == 'Selesai',
                                                'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200' => $pengaduan->status == 'Ditolak',
                                            ])>
                                                {{ $pengaduan->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                            <a href="{{ route('admin.pengaduan.show', $pengaduan) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada pengaduan yang cocok dengan filter.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- [FIXED] Pagination yang mempertahankan filter --}}
                    <div class="mt-6">
                        {{ $pengaduans->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>