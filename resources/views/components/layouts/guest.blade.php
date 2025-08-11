<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased animate-page-enter">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            
            {{-- PERUBAHAN: Menambahkan opacity pada lapisan background --}}
            <div 
                class="absolute inset-0 w-full h-full bg-cover bg-center" 
                style="background-image: url('{{ asset('images/1.jpg') }}')">
            </div>

            {{-- Lapisan Form Login --}}
            <div class="relative w-full sm:max-w-md mt-6 px-6 py-8 bg-white/90 dark:bg-gray-800/90 shadow-2xl rounded-lg overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>