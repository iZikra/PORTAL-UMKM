@if (session('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 5000)"
        class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4"
        role="alert"
    >
        <div class="flex">
            <div class="py-1">
                <svg class="h-6 w-6 text-green-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="font-bold">Berhasil!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif