@php
    $titles = [
        'windows' => 'Windows',
        'office' => 'Office',
        'game' => 'PC Games',
        null => 'All products',
    ];
    $subtitles = [
        'windows' => 'Genuine Windows 10 & 11 Pro licenses, instant activation.',
        'office' => 'Microsoft Office Professional keys, instant delivery.',
        'game' => 'Steam and other store codes for the most sought-after PC titles.',
        null => 'Browse the genuine software keys available on KeysBeast.',
    ];
@endphp

<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-white">{{ $titles[$type] ?? ucfirst($type) }}</h1>
        <p class="mt-2 text-neutral-500">{{ $subtitles[$type] ?? '' }}</p>

        @if ($products->isEmpty())
            <p class="mt-12 text-neutral-500">No products available in this category yet.</p>
        @else
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
