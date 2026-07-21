<x-app-layout>
    <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
            <div class="overflow-hidden rounded-lg border border-neutral-800">
                <x-product-cover :product="$product" />
            </div>

            <div>
                <span class="inline-flex items-center rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">
                    {{ $product->type }}
                </span>

                <h1 class="mt-4 text-3xl font-extrabold text-white">{{ $product->name }}</h1>
                <p class="mt-4 text-neutral-400">{{ $product->description }}</p>

                <div class="mt-8 flex items-center justify-between">
                    <span class="text-3xl font-bold text-white">${{ number_format($product->price, 2) }}</span>

                    @if ($availableKeys > 0)
                        <span class="rounded-full bg-green-950 px-3 py-1 text-sm text-green-400">{{ $availableKeys }} available</span>
                    @else
                        <span class="rounded-full bg-neutral-800 px-3 py-1 text-sm text-neutral-400">Out of stock</span>
                    @endif
                </div>

                <div class="mt-8">
                    @auth
                        @if ($availableKeys > 0)
                            <form method="POST" action="{{ route('checkout.store', $product) }}">
                                @csrf
                                <x-primary-button class="px-8 py-3 text-sm">{{ __('Buy Now') }}</x-primary-button>
                            </form>
                        @else
                            <x-secondary-button disabled class="px-8 py-3 text-sm">{{ __('Out of Stock') }}</x-secondary-button>
                        @endif
                    @else
                        <a href="{{ route('login') }}">
                            <x-primary-button class="px-8 py-3 text-sm">{{ __('Log in to Buy') }}</x-primary-button>
                        </a>
                    @endauth
                </div>

                <ul class="mt-10 space-y-2 text-sm text-neutral-500">
                    <li class="flex items-center gap-2"><svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Instant email delivery</li>
                    <li class="flex items-center gap-2"><svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Genuine, single-use license key</li>
                    <li class="flex items-center gap-2"><svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Secure checkout via Stripe</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
