<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-book-open mr-2"></i>
            {{ __('Kelola Basis Pengetahuan') }}
        </h2>
        {{-- Div kosong untuk menjaga konsistensi layout --}}
        <div></div>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            
            {{-- [MODIFIED] Tombol "Tambah Artikel Baru" dipindahkan ke header tabel --}}
            <div class="flex justify-end items-center mb-6">
                <form action="{{ route('admin.knowledge-base.index') }}" method="GET" class="w-full md:w-auto">
                    <div class="relative">
                       <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 10.35a6.3 6.3 0 11-12.6 0 6.3 6.3 0 0112.6 0z"></path></svg>
                        </span>
                        <input type="text" name="search" placeholder="Cari berdasarkan judul..." value="{{ request('search') }}" class="w-full md:w-80 pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-900 focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-900 focus:ring-opacity-50 transition">
                    </div>
                </form>
            </div>

            {{-- Tabel Basis Pengetahuan --}}
            <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Judul
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Kategori
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Tanggal Dibuat
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Aksi
                            </th>
                            {{-- [ADDED] Tombol "Tambah" di dalam header tabel --}}
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                <a href="{{ route('admin.knowledge-base.create') }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md shadow-sm transition duration-300 ease-in-out text-xs">
                                    Tambah
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($articles as $article)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                    {{ $article->judul }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $article->kategori }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $article->created_at->isoFormat('D MMMM Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative inline-block text-left">
                                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 dark:focus:ring-offset-gray-800 focus:ring-indigo-500">
                                            Aksi
                                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <div x-show="open" 
                                             x-transition:enter="transition ease-out duration-100"
                                             x-transition:enter-start="transform opacity-0 scale-95"
                                             x-transition:enter-end="transform opacity-100 scale-100"
                                             x-transition:leave="transition ease-in duration-75"
                                             x-transition:leave-start="transform opacity-100 scale-100"
                                             x-transition:leave-end="transform opacity-0 scale-95"
                                             class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none z-10" 
                                             role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('admin.knowledge-base.edit', $article) }}" class="text-gray-700 dark:text-gray-200 block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600" role="menuitem" tabindex="-1">
                                                    <i class="fas fa-edit w-5 mr-2"></i>Edit
                                                </a>
                                                <form action="{{ route('admin.knowledge-base.destroy', $article) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 dark:text-red-400 block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600" role="menuitem" tabindex="-1">
                                                        <i class="fas fa-trash-alt w-5 mr-2"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- Kolom kosong untuk menyejajarkan dengan tombol Tambah --}}
                                <td class="px-6 py-4"></td>
                            </tr>
                        @empty
                            <tr>
                                {{-- [MODIFIED] Menyesuaikan colspan --}}
                                <td colspan="5" class="px-6 py-16 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <h3 class="mt-2 text-lg font-medium">Belum Ada Artikel</h3>
                                        <p class="mt-1 text-sm">Klik tombol "Tambah" di header tabel untuk memulai.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $articles->appends(request()->query())->links() }}
            </div>

        </div>
    </div>
</x-admin-layout>
