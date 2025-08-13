<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">

                {{-- Kolom Sidebar (3/12) --}}
                <div class="lg:col-span-4 xl:col-span-3">
                    @include('profile.partials._profile-sidebar')
                </div>

                {{-- Kolom Konten Utama (9/12) --}}
                <div class="lg:col-span-8 xl:col-span-9 space-y-6 mt-6 lg:mt-0">
                    {{-- Kartu untuk Informasi Profil --}}
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    {{-- Kartu untuk Ubah Password --}}
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    {{-- Kartu untuk Hapus Akun --}}
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>