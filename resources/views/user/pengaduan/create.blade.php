<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Pengaduan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Oops! Ada yang salah:</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    {{-- Atribut enctype="multipart/form-data" telah dihapus karena tidak ada upload file --}}
                    <form method="POST" action="{{ route('user.pengaduan.store') }}">
                        @csrf

                        {{-- INFORMASI USAHA --}}
                        <h3 class="text-lg font-semibold border-b pb-2 mb-4">Informasi Usaha</h3>

                        <!-- Nama Pelaku Usaha -->
                        <div>
                            <label for="nama_pelaku_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Nama Pelaku Usaha') }}</label>
                            <input id="nama_pelaku_usaha" name="nama_pelaku_usaha" type="text" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ old('nama_pelaku_usaha', Auth::user()->name) }}" required>
                        </div>

                        <!-- Nama Usaha -->
                        <div class="mt-4">
                            <label for="nama_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Nama Usaha') }}</label>
                            <input id="nama_usaha" name="nama_usaha" type="text" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ old('nama_usaha', Auth::user()->nama_usaha) }}" required>
                        </div>

                        <!-- Alamat Usaha -->
                        <div class="mt-4">
                            <label for="alamat_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Alamat Usaha') }}</label>
                            <textarea id="alamat_usaha" name="alamat_usaha" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>{{ old('alamat_usaha') }}</textarea>
                        </div>


                        {{-- DETAIL PENGADUAN --}}
                        <h3 class="text-lg font-semibold border-b pb-2 mt-8 mb-4">Detail Pengaduan</h3>

                        <!-- Judul Pengaduan -->
                        <div>
                            <label for="judul" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Judul Pengaduan') }}</label>
                            <input id="judul" name="judul" type="text" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ old('judul') }}" required>
                        </div>

                        <!-- Kategori (Dropdown) -->
                        <div class="mt-4">
                            <label for="kategori" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Kategori Kendala') }}</label>
                            <select id="kategori" name="kategori" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>
                                <option value="" disabled selected>-- Pilih Kategori Masalah --</option>
                                <option value="Permodalan" {{ old('kategori') == 'Permodalan' ? 'selected' : '' }}>Permodalan (Modal usaha, pinjaman, KUR)</option>
                                <option value="Pemasaran" {{ old('kategori') == 'Pemasaran' ? 'selected' : '' }}>Pemasaran & Akses Pasar (Digital marketing, penjualan)</option>
                                <option value="Sumber Daya Manusia" {{ old('kategori') == 'Sumber Daya Manusia' ? 'selected' : '' }}>Sumber Daya Manusia (Tenaga kerja, keterampilan)</option>
                                <option value="Legalitas Usaha" {{ old('kategori') == 'Legalitas Usaha' ? 'selected' : '' }}>Legalitas Usaha (NIB, PIRT, Sertifikasi)</option>
                                <option value="Produksi dan Teknologi" {{ old('kategori') == 'Produksi dan Teknologi' ? 'selected' : '' }}>Produksi dan Teknologi (Peralatan, efisiensi)</option>
                                <option value="Manajemen Keuangan" {{ old('kategori') == 'Manajemen Keuangan' ? 'selected' : '' }}>Manajemen Keuangan (Pembukuan, laporan usaha)</option>
                                <option value="Inovasi Produk" {{ old('kategori') == 'Inovasi Produk' ? 'selected' : '' }}>Inovasi Produk (Desain, varian, kemasan)</option>
                                <option value="Regulasi dan Perpajakan" {{ old('kategori') == 'Regulasi dan Perpajakan' ? 'selected' : '' }}>Regulasi dan Perpajakan (Aturan, pajak UMKM)</option>
                                <option value="Persaingan Pasar" {{ old('kategori') == 'Persaingan Pasar' ? 'selected' : '' }}>Persaingan Pasar (Harga, produk pabrikan)</option>
                                <option value="Jaringan & Kolaborasi" {{ old('kategori') == 'Jaringan & Kolaborasi' ? 'selected' : '' }}>Jaringan & Kolaborasi (Kemitraan, komunitas)</option>
                            </select>
                        </div>

                        <!-- Deskripsi (Isi Laporan) -->
                        <div class="mt-4">
                            <label for="deskripsi" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Deskripsi Lengkap') }}</label>
                            <textarea id="deskripsi" name="deskripsi" rows="6" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>{{ old('deskripsi') }}</textarea>
                        </div>

                        {{-- Bagian input foto telah dihapus dari sini --}}

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Kirim Pengaduan') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
