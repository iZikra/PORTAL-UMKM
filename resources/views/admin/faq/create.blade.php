<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-plus-circle mr-2"></i>
            {{ __('Tambah FAQ Baru') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">
            
            {{-- Form untuk membuat FAQ baru --}}
            <form action="{{ route('admin.faq.store') }}" method="POST">
                @csrf

                {{-- Input untuk Pertanyaan --}}
                <div>
                    <label for="pertanyaan" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Pertanyaan</label>
                    <input type="text" id="pertanyaan" name="pertanyaan" value="{{ old('pertanyaan') }}" required 
                           class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @error('pertanyaan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Textarea untuk Jawaban --}}
                <div class="mt-6">
                    <label for="jawaban" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Jawaban</label>
                    <textarea id="jawaban" name="jawaban" rows="6" required 
                              class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('jawaban') }}</textarea>
                    @error('jawaban')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex items-center justify-end mt-8">
                    <a href="{{ route('admin.faq.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 font-semibold rounded-lg shadow-md transition duration-300 ease-in-out mr-4">
                        Batal
                    </a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition duration-300 ease-in-out">
                        Simpan FAQ
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-admin-layout>
