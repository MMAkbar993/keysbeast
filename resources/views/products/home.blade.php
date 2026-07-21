<x-app-layout>
    {{-- Hero --}}
    <section class="relative overflow-hidden border-b border-neutral-800 bg-gradient-to-b from-red-950/40 via-neutral-950 to-neutral-950">
        <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">
                        Digital store &middot; Software &amp; Gaming
                    </span>

                    <h1 class="mt-6 text-5xl font-extrabold leading-[1.05] tracking-tight text-white sm:text-6xl">
                        POWERING<br>
                        <span class="text-red-500">DIGITAL FREEDOM</span>
                    </h1>

                    <p class="mt-6 max-w-lg text-lg text-neutral-400">
                        Genuine Windows, Office &amp; PC game keys, delivered instantly at the lowest online price.
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 rounded-md bg-red-600 px-6 py-3 text-sm font-semibold text-white hover:bg-red-500">
                            Shop now
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-2 rounded-md border border-neutral-700 px-6 py-3 text-sm font-semibold text-neutral-200 hover:bg-neutral-900">
                            Learn more
                        </a>
                    </div>

                    <div class="mt-10 flex flex-wrap gap-x-6 gap-y-2 text-xs font-medium uppercase tracking-wide text-neutral-500">
                        <span>&#9670; Instant delivery</span>
                        <span>&#9670; Guaranteed activation</span>
                        <span>&#9670; 24/7 support</span>
                    </div>
                </div>

                <div class="relative mx-auto hidden aspect-square w-full max-w-md items-center justify-center lg:flex">
                    <div class="absolute inset-8 rounded-full bg-red-600/20 blur-3xl"></div>
                    <div class="relative flex h-64 w-64 items-center justify-center rounded-3xl border border-neutral-800 bg-neutral-900 shadow-2xl">
                        <svg class="h-24 w-24 text-red-500" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 3 14h7l-1 8 11-13h-7l0-7z" /></svg>
                    </div>
                    <div class="absolute -left-4 top-6 rounded-lg border border-neutral-800 bg-neutral-900 px-4 py-2 text-xs text-neutral-300 shadow-lg">
                        Windows &amp; Office<br><span class="text-neutral-500">Genuine keys</span>
                    </div>
                    <div class="absolute -right-2 bottom-8 rounded-lg border border-neutral-800 bg-neutral-900 px-4 py-2 text-xs text-neutral-300 shadow-lg">
                        <span class="text-red-400">&#9889;</span> Instant Delivery
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden border-t border-neutral-800 bg-black py-3">
            <div class="flex flex-wrap justify-center gap-x-8 gap-y-1 px-4 text-xs font-semibold uppercase tracking-widest text-neutral-500">
                <span>Windows 11 Pro</span>
                <span class="text-red-600">&#9670;</span>
                <span>Genuine license</span>
                <span class="text-red-600">&#9670;</span>
                <span>Instant activation</span>
                <span class="text-red-600">&#9670;</span>
                <span>Secure checkout</span>
                <span class="text-red-600">&#9670;</span>
                <span>Guaranteed delivery</span>
            </div>
        </div>
    </section>

    {{-- Trust badges --}}
    <section class="border-b border-neutral-800 bg-neutral-950">
        <div class="mx-auto grid max-w-7xl grid-cols-2 gap-6 px-4 py-10 sm:px-6 lg:grid-cols-4 lg:px-8">
            @foreach ([
                ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Instant delivery', 'desc' => 'Key delivered by email in seconds'],
                ['icon' => 'M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z', 'title' => '100% genuine keys', 'desc' => 'Verified, authentic licenses'],
                ['icon' => 'M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75', 'title' => 'Unbeatable prices', 'desc' => 'Up to 70% off retail'],
                ['icon' => 'M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => '24/7 support', 'desc' => 'Real help, always available'],
            ] as $badge)
                <div class="flex items-start gap-3 rounded-lg border border-neutral-800 bg-neutral-900 p-4">
                    <svg class="h-6 w-6 shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $badge['icon'] }}" />
                    </svg>
                    <div>
                        <div class="text-sm font-semibold text-white">{{ $badge['title'] }}</div>
                        <div class="text-xs text-neutral-500">{{ $badge['desc'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Main categories --}}
    <section class="border-b border-neutral-800 bg-neutral-950">
        <div class="mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <span class="inline-flex items-center rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">Explore</span>
            <h2 class="mt-4 text-3xl font-extrabold text-white">Main categories</h2>
            <p class="mt-2 text-neutral-500">Find your key in a few clicks, with guaranteed instant delivery.</p>

            <div class="mt-10 grid grid-cols-1 gap-6 text-left sm:grid-cols-3">
                @foreach ([
                    ['type' => 'windows', 'label' => 'Windows', 'desc' => 'Genuine Windows 10 & 11 Pro licenses'],
                    ['type' => 'office', 'label' => 'Office', 'desc' => 'Microsoft Office Professional keys'],
                    ['type' => 'game', 'label' => 'PC Games', 'desc' => 'Steam & PC game keys, instant delivery'],
                ] as $category)
                    <a href="{{ route('shop', ['type' => $category['type']]) }}" class="group rounded-lg border border-neutral-800 bg-neutral-900 p-6 hover:border-red-800">
                        <div class="flex items-center justify-between">
                            <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-950/60 text-red-500">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" /></svg>
                            </span>
                            <span class="rounded bg-neutral-800 px-2 py-0.5 text-[10px] font-semibold uppercase text-neutral-400">
                            {{ $categoryCounts->get($category['type'], 0) }} {{ \Illuminate\Support\Str::plural('product', $categoryCounts->get($category['type'], 0)) }}
                        </span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-white">{{ $category['label'] }}</h3>
                        <p class="mt-1 text-sm text-neutral-500">{{ $category['desc'] }}</p>
                        <span class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-red-500 group-hover:text-red-400">
                            Go to category
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Best sellers --}}
    <section class="bg-neutral-950">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <span class="inline-flex items-center rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">Top sellers</span>
                    <h2 class="mt-4 text-3xl font-extrabold text-white">Best-selling software</h2>
                    <p class="mt-2 text-neutral-500">Our customers' favorite keys, always in stock and ready for delivery.</p>
                </div>
                <a href="{{ route('shop') }}" class="inline-flex items-center gap-1 text-sm font-medium text-red-500 hover:text-red-400">
                    View all products
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>

            @if ($bestSellers->isEmpty())
                <p class="mt-10 text-neutral-500">No products available yet — check back soon.</p>
            @else
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($bestSellers as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Secure checkout --}}
    <section class="border-t border-neutral-800 bg-black">
        <div class="mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <span class="inline-flex items-center rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">Payments</span>
            <h2 class="mt-4 text-3xl font-extrabold text-white">Pay with total peace of mind</h2>
            <p class="mx-auto mt-2 max-w-xl text-neutral-500">Every transaction is processed securely — your card details never touch our servers.</p>

            <div class="mx-auto mt-10 max-w-md rounded-lg border border-neutral-800 bg-neutral-900 p-8">
                <div class="text-lg font-semibold text-white">Powered by Stripe</div>
                <p class="mt-1 text-sm text-neutral-500">The same checkout technology trusted by millions of businesses worldwide.</p>

                <ul class="mt-6 space-y-2 text-left text-sm text-neutral-400">
                    <li class="flex items-center gap-2"><svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> SSL encrypted connection</li>
                    <li class="flex items-center gap-2"><svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> PCI DSS compliant</li>
                    <li class="flex items-center gap-2"><svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Credit &amp; debit cards accepted</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="border-t border-neutral-800 bg-gradient-to-b from-neutral-950 to-red-950/30">
        <div class="mx-auto max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white">Ready to unlock everything?</h2>
            <p class="mt-2 text-neutral-400">Genuine keys ready for delivery. Instant checkout, zero waiting.</p>
            <a href="{{ route('shop') }}" class="mt-8 inline-flex items-center gap-2 rounded-md bg-red-600 px-6 py-3 text-sm font-semibold text-white hover:bg-red-500">
                Go to store
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </section>
</x-app-layout>
