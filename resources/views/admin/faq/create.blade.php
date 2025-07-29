<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah FAQ Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('admin.faq.store') }}" method="POST">
                    @csrf

                    {{-- Input untuk Pertanyaan --}}
                    <div class="mb-4">
                        <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                        <input type="text" name="pertanyaan" id="pertanyaan" value="{{ old('pertanyaan') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                         @error('pertanyaan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Input untuk Jawaban --}}
                    <div class="mb-6">
                        <label for="jawaban" class="block text-sm font-medium text-gray-700">Jawaban</label>
                        <textarea name="jawaban" id="jawaban" rows="5" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('jawaban') }}</textarea>
                        @error('jawaban')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-end space-x-4">
                         <a href="{{ route('admin.faq.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Simpan FAQ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>