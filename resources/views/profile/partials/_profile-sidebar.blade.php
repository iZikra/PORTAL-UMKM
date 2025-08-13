<aside class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-center">
    <div class="flex flex-col items-center">
        @php
            // Logika untuk membuat inisial nama
            $nameParts = explode(' ', Auth::user()->name);
            $initials = count($nameParts) > 1
                        ? strtoupper(substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1))
                        : strtoupper(substr($nameParts[0], 0, 2));
        @endphp

        {{-- Avatar Placeholder --}}
        <div class="flex items-center justify-center h-24 w-24 rounded-full bg-indigo-500 text-white text-3xl font-bold mb-4 ring-4 ring-indigo-200 dark:ring-indigo-800">
            <span>{{ $initials }}</span>
        </div>

        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ Auth::user()->email }}</p>
    </div>
</aside>