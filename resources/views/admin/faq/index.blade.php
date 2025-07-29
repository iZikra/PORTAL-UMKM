<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen FAQ') }}
        </h2>
    </x-slot>

    {{-- ====================================================== --}}
    {{--    KOMPONEN MODAL KONFIRMASI HAPUS (DENGAN ALPINE.JS)   --}}
    {{-- ====================================================== --}}
    <div x-data="{ showModal: false, deleteUrl: '' }" @keydown.escape.window="showModal = false" class="relative z-50">
        
        {{-- Latar Belakang Overlay --}}
        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" style="display: none;"></div>

        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed inset-0 z-10 overflow-y-auto" style="display: none;">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div @click.away="showModal = false" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Hapus FAQ</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Anda yakin ingin menghapus FAQ ini? Tindakan ini tidak dapat diurungkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form :action="deleteUrl" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                Ya, Hapus
                            </button>
                        </form>
                        <button @click="showModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================================================== --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold">Daftar FAQ</h3>
                        <a href="{{ route('admin.faq.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Tambah FAQ Baru
                        </a>
                    </div>
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-md relative mb-4" role="alert">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif
                    <div class="space-y-8 mt-4">
                        @forelse($faqs as $faq)
                            <div class="border-b pb-4">
                                <h4 class="text-lg font-semibold text-gray-800">{{ $faq->pertanyaan }}</h4>
                                <p class="mt-2 text-gray-600">{{ $faq->jawaban }}</p>
                                <div class="mt-4 text-right space-x-4">
                                    <a href="{{ route('admin.faq.edit', $faq->id) }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                    
                                    {{-- TOMBOL HAPUS BARU: Memicu Modal --}}
                                    <button @click="showModal = true; deleteUrl = '{{ route('admin.faq.destroy', $faq->id) }}'" type="button" class="text-sm text-red-600 hover:text-red-900 font-medium">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Belum ada FAQ yang tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>