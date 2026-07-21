<x-app-layout>
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-8">
            @if ($order->status === 'fulfilled' && $order->licenseKey)
                <div class="flex items-center gap-2 text-green-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                    <span class="font-semibold">Payment successful!</span>
                </div>
                <p class="mt-3 text-neutral-400">Here is your license key for <strong class="text-white">{{ $order->product->name }}</strong>:</p>

                <div class="mt-4 flex items-center gap-3">
                    <code id="license-key" class="flex-1 block rounded-md border border-neutral-700 bg-black px-4 py-3 font-mono text-lg text-white">{{ $order->licenseKey->key_value }}</code>
                    <button
                        type="button"
                        x-data="{ copied: false }"
                        @click="navigator.clipboard.writeText(document.getElementById('license-key').innerText.trim()); copied = true; setTimeout(() => copied = false, 2000)"
                        class="inline-flex items-center rounded-md bg-red-600 px-4 py-3 text-xs font-semibold uppercase tracking-widest text-white hover:bg-red-500"
                    >
                        <span x-show="!copied">Copy</span>
                        <span x-show="copied" x-cloak>Copied!</span>
                    </button>
                </div>

                <p class="mt-4 text-sm text-neutral-500">We've also emailed this key to {{ $order->customer_email }}.</p>
            @else
                <div class="text-yellow-400 font-semibold">Payment received — processing your order...</div>
                <p class="mt-3 text-neutral-400">Your key is being assigned and will appear here shortly. Refresh this page in a few seconds.</p>
            @endif

            <div class="mt-8">
                <a href="{{ route('dashboard') }}" class="text-red-500 hover:text-red-400">View all my licenses &rarr;</a>
            </div>
        </div>
    </div>
</x-app-layout>
