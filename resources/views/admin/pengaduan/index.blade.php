<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Semua Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h3 class="text-lg font-medium mb-4">Daftar Pengaduan UMKM/IKM</h3>

                    <div class="mb-6 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg relative">
                        <form id="filter-form" action="{{ route('admin.pengaduan.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                            {{-- Input Pencarian --}}
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cari Kata Kunci</label>
                                <input type="text" name="search" id="search" value="{{ $search ?? '' }}" placeholder="Cari nama usaha atau kategori..." class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                            </div>
                            {{-- Dropdown Filter Status --}}
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Filter Berdasarkan Status</label>
                                <select name="status" id="status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                                    <option value="">Semua Status</option>
                                    <option value="Baru" {{ ($status ?? '') == 'Baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="Diproses" {{ ($status ?? '') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Selesai" {{ ($status ?? '') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Ditolak" {{ ($status ?? '') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                            {{-- Tombol Aksi --}}
                            <div class="flex space-x-2">
                                <button id="filter-button" type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">
                                    Filter
                                </button>
                                <a href="{{ route('admin.pengaduan.index') }}" class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600">
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="mt-4 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Waktu Pelaporan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Usaha</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prioritas</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="relative px-6 py-3"><span class="sr-only">Aksi</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                
                                @forelse ($pengaduans as $pengaduan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pengaduan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pengaduan->nama_usaha }}</td>
                                        <td class="px-6 py-4">{{ $pengaduan->kategori }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($pengaduan->status == 'Selesai') bg-green-100 text-green-800
                                                @elseif($pengaduan->status == 'Diproses') bg-yellow-100 text-yellow-800
                                                @elseif($pengaduan->status == 'Ditolak') bg-red-100 text-red-800
                                                @else bg-blue-100 text-blue-800 @endif">
                                                {{ $pengaduan->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.pengaduan.show', $pengaduan) }}" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada data pengaduan yang cocok dengan filter.
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
