<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Frequently Asked Questions (FAQ)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">

                    @if($faqs->isEmpty())
                        <p>Belum ada pertanyaan yang tersedia saat ini.</p>
                    @else
                        @foreach ($faqs as $faq)
                            <div class="border-b pb-4">
                                <h3 class="text-lg font-bold text-gray-900">
                                    {{ $faq->pertanyaan }}
                                </h3>
                                <p class="mt-2 text-base text-gray-600">
                                    {{ $faq->jawaban }}
                                </p>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>