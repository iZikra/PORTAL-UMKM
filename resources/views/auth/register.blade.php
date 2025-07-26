<x-layouts.guest>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200">Daftar Akun UMKM/IKM</h2>
        <p class="text-center text-gray-600 dark:text-gray-400 mb-6">Lengkapi data di bawah ini untuk memulai.</p>

        <!-- Nama Pemilik -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap Pemilik')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Nama Usaha -->
        <div class="mt-4">
            <x-input-label for="nama_usaha" :value="__('Nama Usaha')" />
            <x-text-input id="nama_usaha" class="block mt-1 w-full" type="text" name="nama_usaha" :value="old('nama_usaha')" required />
            <x-input-error :messages="$errors->get('nama_usaha')" class="mt-2" />
        </div>
        
        <!-- NIB -->
        <div class="mt-4">
            <x-input-label for="nib" :value="__('Nomor Induk Berusaha (NIB)')" />
            <x-text-input id="nib" class="block mt-1 w-full" type="text" name="nib" :value="old('nib')" required placeholder="Contoh: 1234567890123" />
            <x-input-error :messages="$errors->get('nib')" class="mt-2" />
        </div>

        <!-- Sektor Usaha -->
        <div class="mt-4">
            <x-input-label for="sektor_usaha" :value="__('Sektor Usaha')" />
            <select id="sektor_usaha" name="sektor_usaha" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>
                <option value="" disabled selected>-- Pilih Sektor Usaha --</option>
                <option value="Kuliner" {{ old('sektor_usaha') == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                <option value="Fashion" {{ old('sektor_usaha') == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                <option value="Kerajinan (Kriya)" {{ old('sektor_usaha') == 'Kerajinan (Kriya)' ? 'selected' : '' }}>Kerajinan (Kriya)</option>
                <option value="Jasa" {{ old('sektor_usaha') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                <option value="Agribisnis" {{ old('sektor_usaha') == 'Agribisnis' ? 'selected' : '' }}>Agribisnis</option>
                <option value="Teknologi" {{ old('sektor_usaha') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                <option value="Lainnya" {{ old('sektor_usaha') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <x-input-error :messages="$errors->get('sektor_usaha')" class="mt-2" />
        </div>

        <!-- Nomor Telepon -->
        <div class="mt-4">
            <x-input-label for="no_telp" :value="__('Nomor Telepon / WhatsApp')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required placeholder="Contoh: 081234567890" />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700">

        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Alamat Usaha</h3>

        <!-- Alamat Jalan -->
        <div class="mt-4">
            <x-input-label for="alamat_jalan" :value="__('Jalan / Nama Gedung')" />
            <x-text-input id="alamat_jalan" class="block mt-1 w-full" type="text" name="alamat_jalan" :value="old('alamat_jalan')" required />
            <x-input-error :messages="$errors->get('alamat_jalan')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- Kelurahan / Desa -->
            <div>
                <x-input-label for="alamat_kelurahan" :value="__('Kelurahan / Desa')" />
                <x-text-input id="alamat_kelurahan" class="block mt-1 w-full" type="text" name="alamat_kelurahan" :value="old('alamat_kelurahan')" required />
                <x-input-error :messages="$errors->get('alamat_kelurahan')" class="mt-2" />
            </div>
            <!-- Kecamatan -->
            <div>
                <x-input-label for="alamat_kecamatan" :value="__('Kecamatan')" />
                <x-text-input id="alamat_kecamatan" class="block mt-1 w-full" type="text" name="alamat_kecamatan" :value="old('alamat_kecamatan')" required />
                <x-input-error :messages="$errors->get('alamat_kecamatan')" class="mt-2" />
            </div>
        </div>
        
        <!-- Kota / Kabupaten -->
        <div class="mt-4">
            <x-input-label for="alamat_kota" :value="__('Kota / Kabupaten')" />
            <x-text-input id="alamat_kota" class="block mt-1 w-full" type="text" name="alamat_kota" :value="old('alamat_kota')" required />
            <x-input-error :messages="$errors->get('alamat_kota')" class="mt-2" />
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700">

        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Informasi Akun</h3>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-layouts.guest>
