<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Basis Pengetahuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if($articles->isEmpty())
                        <p>Belum ada artikel yang tersedia saat ini.</p>
                    @else
                        <div class="space-y-6">
                            @foreach($articles as $article)
                                <article class="p-4 border-b dark:border-gray-700 last:border-b-0">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $article->title }}</h3>
                                    
                                    @if($article->category)
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Kategori: {{ $article->category }}</p>
                                    @endif

                                    <div class="prose dark:prose-invert max-w-none">
                                        {!! $article->content !!}
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>