<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit FAQ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="pertanyaan" class="block text-sm font-medium">Pertanyaan</label>
                        <input type="text" name="pertanyaan" id="pertanyaan" value="{{ old('pertanyaan', $faq->pertanyaan) }}" required class="w-full border-gray-300 rounded mt-1">
                    </div>

                    <div class="mb-4">
                        <label for="jawaban" class="block text-sm font-medium">Jawaban</label>
                        <textarea name="jawaban" id="jawaban" required class="w-full border-gray-300 rounded mt-1">{{ old('jawaban', $faq->jawaban) }}</textarea>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
