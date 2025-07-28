{{-- Pastikan Anda menggunakan layout yang sesuai untuk admin --}}
<x-admin-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Kartu untuk Informasi Profil Admin --}}
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Informasi Profil
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Perbarui informasi profil dan alamat email akun Anda.
                    </p>
                </header>

                <form method="post" action="{{-- route('admin.profile.update') --}}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    {{-- Field untuk Nama --}}
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    {{-- Field untuk Email --}}
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    
                    {{-- Tambahkan field lain khusus admin di sini jika ada, contoh: --}}
                    {{-- <div>
                        <x-input-label for="role" :value="__('Jabatan')" />
                        <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" :value="old('role', $user->role)" />
                    </div> --}}

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                    </div>
                </form>
            </div>

            {{-- Kartu untuk Ubah Kata Sandi Admin --}}
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Ubah Kata Sandi
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.
                    </p>
                </header>
                
                <form method="post" action="{{-- route('admin.password.update') --}}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                     <div>
                        <x-input-label for="current_password" :value="__('Kata Sandi Saat Ini')" />
                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Kata Sandi Baru')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-admin-layout>