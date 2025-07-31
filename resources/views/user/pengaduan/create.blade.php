<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Pengaduan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{-- Tambahkan enctype untuk upload file --}}
            <form method="POST" action="{{ route('user.pengaduan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 md:p-8 space-y-6">

                        {{-- INFORMASI USAHA (Read Only) --}}
                        <fieldset class="border dark:border-gray-700 rounded-md p-4">
                            <legend class="text-lg font-semibold px-2 dark:text-gray-200">Informasi Pelapor</legend>
                            <div class="space-y-4 pt-2">
                                <div>
                                    <label for="nama_pelaku_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Nama Pelaku Usaha') }}</label>
                                    <input id="nama_pelaku_usaha" name="nama_pelaku_usaha" type="text" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm bg-gray-100" value="{{ old('nama_pelaku_usaha', Auth::user()->name) }}" readonly>
                                </div>

                                <div>
                                    <label for="nama_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Nama Usaha') }}</label>
                                    <input id="nama_usaha" name="nama_usaha" type="text" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm bg-gray-100" value="{{ old('nama_usaha', Auth::user()->nama_usaha) }}" readonly>
                                </div>

                                <div>
                                    <label for="alamat_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Alamat Usaha (Lengkap)') }}</label>
                                    <textarea id="alamat_usaha" name="alamat_usaha" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required placeholder="Contoh: Jl. Sudirman No. 123, Kel. Suka Maju, Kec. Tampan, Kota Pekanbaru">{{ old('alamat_usaha') }}</textarea>
                                    <x-input-error :messages="$errors->get('alamat_usaha')" class="mt-2" />
                                </div>
                            </div>
                        </fieldset>

                        {{-- DETAIL PENGADUAN --}}
                        <fieldset class="border dark:border-gray-700 rounded-md p-4">
                            <legend class="text-lg font-semibold px-2 dark:text-gray-200">Detail Pengaduan</legend>
                            <div class="space-y-4 pt-2">
                                <div>
                                    <label for="judul" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Judul Pengaduan') }}</label>
                                    <input id="judul" name="judul" type="text" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ old('judul') }}" required>
                                    <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                                </div>

                                <div>
                                    <label for="kategori" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Kategori Kendala') }}</label>
                                    <select id="kategori" name="kategori" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>
                                        <option value="" disabled selected>-- Pilih Kategori --</option>
                                        <option value="Permodalan" {{ old('kategori') == 'Permodalan' ? 'selected' : '' }}>Permodalan</option>
                                        <option value="Pemasaran" {{ old('kategori') == 'Pemasaran' ? 'selected' : '' }}>Pemasaran & Akses Pasar</option>
                                        <option value="Sumber Daya Manusia" {{ old('kategori') == 'Sumber Daya Manusia' ? 'selected' : '' }}>Sumber Daya Manusia</option>
                                        <option value="Legalitas Usaha" {{ old('kategori') == 'Legalitas Usaha' ? 'selected' : '' }}>Legalitas Usaha</option>
                                        <option value="Produksi dan Teknologi" {{ old('kategori') == 'Produksi dan Teknologi' ? 'selected' : '' }}>Produksi & Teknologi</option>
                                        <option value="Manajemen Keuangan" {{ old('kategori') == 'Manajemen Keuangan' ? 'selected' : '' }}>Manajemen Keuangan</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                                </div>

                                <div>
                                    {{-- PERUBAHAN LABEL DI SINI --}}
                                    <label for="deskripsi" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Deskripsi') }}</label>
                                    <textarea id="deskripsi" name="deskripsi" rows="6" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required placeholder="Jelaskan kendala yang Anda hadapi secara rinci...">{{ old('deskripsi') }}</textarea>
                                    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                </div>
                            </div>
                        </fieldset>

                        {{-- PERUBAHAN LOKASI: Lampiran Bukti dipindah ke sini --}}
                        <div class="border dark:border-gray-700 rounded-md p-4">
                            <label for="bukti" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Lampirkan Bukti (Opsional)') }}</label>
                            <input type="file" id="bukti" name="bukti" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 focus:outline-none dark:placeholder-gray-400">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format yang diizinkan: JPG, PNG, atau PDF (Maks. 2MB).</p>
                            <x-input-error :messages="$errors->get('bukti')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">
                                {{ __('Kirim Pengaduan') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>