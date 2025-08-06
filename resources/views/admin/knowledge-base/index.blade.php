<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Basis Pengetahuan') }}
            </h2>
            <a href="{{ route('admin.knowledge-base.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Tambah Artikel Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Pusat Bantuan UMKM</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Temukan panduan, tips, dan solusi untuk pertanyaan umum seputar UMKM.</p>
                </div>
            </div>

            <div class="mt-6 space-y-6">
                {{-- Melakukan perulangan untuk setiap artikel --}}
                @forelse ($articles as $article)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <span class="text-sm font-semibold text-indigo-600 dark:text-indigo-400">{{ $article->category }}</span>
                                    <h4 class="text-xl font-bold mt-1 text-gray-900 dark:text-gray-100">{{ $article->title }}</h4>
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 prose max-w-none">
                                        {!! nl2br(e($article->content)) !!}
                                    </div>
                                </div>
                                <!-- Tombol Aksi untuk Admin -->
                                <div class="flex-shrink-0 ml-4">
                                    <a href="{{ route('admin.knowledge-base.edit', $article->id) }}" class="text-sm text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.knowledge-base.destroy', $article->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                            Belum ada artikel yang ditambahkan. Klik "Tambah Artikel Baru" untuk memulai.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-admin-layout>
