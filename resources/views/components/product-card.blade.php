@props(['product'])

<div class="group flex flex-col overflow-hidden rounded-lg border border-neutral-800 bg-neutral-900 transition hover:border-neutral-700">
    <a href="{{ route('products.show', $product) }}" class="relative block">
        <x-product-cover :product="$product" />

        <span class="absolute left-3 top-3 inline-flex items-center gap-1 rounded bg-black/70 px-2 py-1 text-[11px] font-semibold uppercase tracking-wide text-red-400">
            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 3 14h7l-1 8 11-13h-7l0-7z" /></svg>
            Instant
        </span>
    </a>

    <div class="flex flex-1 flex-col p-4">
        <a href="{{ route('products.show', $product) }}" class="font-semibold text-white hover:text-red-400">
            {{ $product->name }}
        </a>

        <p class="mt-1 flex-1 text-sm text-neutral-400 line-clamp-2">{{ $product->description }}</p>

        <div class="mt-4 flex items-center justify-between">
            <span class="text-lg font-bold text-white">${{ number_format($product->price, 2) }}</span>

            @if ($product->available_keys_count > 0)
                <a href="{{ route('products.show', $product) }}" class="inline-flex items-center justify-center rounded-md bg-red-600 p-2 text-white hover:bg-red-500" aria-label="View {{ $product->name }}">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 1.907-4.706 2.298-7.184a1.125 1.125 0 00-1.11-1.316H5.436m2.064 8.5L5.436 5.25M7.5 14.25L5.436 5.25M9.75 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </a>
            @else
                <span class="rounded bg-neutral-800 px-2 py-1 text-xs text-neutral-500">Sold out</span>
            @endif
        </div>
    </div>
</div>
