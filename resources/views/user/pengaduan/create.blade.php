<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pengaduan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
                
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                        <strong class="font-bold">Terjadi Kesalahan:</strong>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('user.pengaduan.store') }}">
                    @csrf

                    {{-- INFORMASI USAHA --}}
                    <fieldset class="border rounded-md p-4 mb-6">
                        <legend class="text-lg font-semibold px-2">Informasi Usaha</legend>
                        <div class="space-y-4 pt-2">
                            <div>
                                <label for="nama_pelaku_usaha" class="block font-medium text-sm text-gray-700">{{ __('Nama Pelaku Usaha') }}</label>
                                <input id="nama_pelaku_usaha" name="nama_pelaku_usaha" type="text" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nama_pelaku_usaha', Auth::user()->name) }}" readonly>
                            </div>

                            <div>
                                <label for="nama_usaha" class="block font-medium text-sm text-gray-700">{{ __('Nama Usaha') }}</label>
                                <input id="nama_usaha" name="nama_usaha" type="text" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nama_usaha', Auth::user()->nama_usaha) }}" readonly>
                            </div>

                            <div>
                                <label for="alamat_usaha" class="block font-medium text-sm text-gray-700">{{ __('Alamat Usaha') }}</label>
                                <textarea id="alamat_usaha" name="alamat_usaha" rows="3" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>{{ old('alamat_usaha') }}</textarea>
                            </div>
                        </div>
                    </fieldset>

                    {{-- DETAIL PENGADUAN --}}
                    <fieldset class="border rounded-md p-4">
                        <legend class="text-lg font-semibold px-2">Detail Pengaduan</legend>
                        <div class="space-y-4 pt-2">
                             <div>
                                <label for="judul" class="block font-medium text-sm text-gray-700">{{ __('Judul Pengaduan') }}</label>
                                <input id="judul" name="judul" type="text" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" value="{{ old('judul') }}" required>
                            </div>

                            <div>
                                <label for="kategori" class="block font-medium text-sm text-gray-700">{{ __('Kategori Kendala') }}</label>
                                <select id="kategori" name="kategori" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    <option value="Permodalan" {{ old('kategori') == 'Permodalan' ? 'selected' : '' }}>Permodalan</option>
                                    <option value="Pemasaran" {{ old('kategori') == 'Pemasaran' ? 'selected' : '' }}>Pemasaran & Akses Pasar</option>
                                    <option value="Sumber Daya Manusia" {{ old('kategori') == 'Sumber Daya Manusia' ? 'selected' : '' }}>Sumber Daya Manusia</option>
                                    <option value="Legalitas Usaha" {{ old('kategori') == 'Legalitas Usaha' ? 'selected' : '' }}>Legalitas Usaha</option>
                                    <option value="Produksi dan Teknologi" {{ old('kategori') == 'Produksi dan Teknologi' ? 'selected' : '' }}>Produksi & Teknologi</option>
                                    <option value="Manajemen Keuangan" {{ old('kategori') == 'Manajemen Keuangan' ? 'selected' : '' }}>Manajemen Keuangan</option>
                                </select>
                            </div>

                            <div>
                                <label for="deskripsi" class="block font-medium text-sm text-gray-700">{{ __('Deskripsi Lengkap') }}</label>
                                <textarea id="deskripsi" name="deskripsi" rows="6" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </fieldset>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            {{ __('Kirim Pengaduan') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layouts.app>