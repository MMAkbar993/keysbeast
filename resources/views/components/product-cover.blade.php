@props(['product'])

@php
    $palettes = [
        'windows' => ['from' => 'from-sky-900', 'via' => 'via-neutral-950', 'glow' => 'bg-sky-500/20', 'icon' => 'text-sky-400'],
        'office' => ['from' => 'from-orange-900', 'via' => 'via-neutral-950', 'glow' => 'bg-orange-500/20', 'icon' => 'text-orange-400'],
        'game' => ['from' => 'from-purple-900', 'via' => 'via-neutral-950', 'glow' => 'bg-purple-500/20', 'icon' => 'text-purple-400'],
        'other' => ['from' => 'from-neutral-800', 'via' => 'via-neutral-950', 'glow' => 'bg-neutral-500/20', 'icon' => 'text-neutral-400'],
    ];
    $palette = $palettes[$product->type] ?? $palettes['other'];
@endphp

<div {{ $attributes->merge(['class' => 'relative aspect-[4/3] w-full overflow-hidden bg-neutral-950']) }}>
    @if ($product->image)
        <img
            src="{{ Illuminate\Support\Facades\Storage::url($product->image) }}"
            alt="{{ $product->name }}"
            class="h-full w-full object-cover"
            loading="lazy"
        >
    @else
        <div class="flex h-full w-full items-center justify-center bg-gradient-to-br {{ $palette['from'] }} {{ $palette['via'] }} to-black">
            <div class="absolute -top-6 -right-6 h-28 w-28 rounded-full {{ $palette['glow'] }} blur-2xl"></div>

            @switch($product->type)
                @case('windows')
                    <svg class="relative h-14 w-14 {{ $palette['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="4" width="18" height="12" rx="1.5" />
                        <path stroke-linecap="round" d="M8 20h8M12 16v4" />
                    </svg>
                    @break

                @case('office')
                    <svg class="relative h-14 w-14 {{ $palette['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h7l4 4v14a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
                        <path stroke-linecap="round" d="M9 12h6M9 15.5h6M9 8.5h3" />
                    </svg>
                    @break

                @case('game')
                    <svg class="relative h-14 w-14 {{ $palette['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 9h12a3 3 0 013 3v3.5a2.5 2.5 0 01-4.6 1.4L15 15H9l-1.4 1.9A2.5 2.5 0 013 15.5V12a3 3 0 013-3z" />
                        <path stroke-linecap="round" d="M8 11v3M6.5 12.5h3M16.2 12h.01M18.2 14h.01" />
                    </svg>
                    @break

                @default
                    <svg class="relative h-14 w-14 {{ $palette['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8l-9-5-9 5 9 5 9-5zM3 8v8l9 5 9-5V8M12 13v8" />
                    </svg>
            @endswitch
        </div>
    @endif
</div>
