<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-white">My Licenses</h1>
        <p class="mt-2 text-neutral-500">Every key you've purchased, in one place.</p>

        <div class="mt-8 overflow-hidden rounded-lg border border-neutral-800 bg-neutral-900">
            @if ($orders->isEmpty())
                <div class="p-8 text-neutral-400">
                    You haven't purchased any licenses yet. <a href="{{ route('shop') }}" class="text-red-500 hover:text-red-400">Browse the shop &rarr;</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-neutral-800">
                        <thead class="bg-black/40">
                            <tr class="text-left text-xs font-medium uppercase tracking-wider text-neutral-500">
                                <th class="py-3 pl-6 pr-4">Product</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">License Key</th>
                                <th class="px-4 py-3">Purchased</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-800">
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="py-4 pl-6 pr-4 font-medium text-white">{{ $order->product->name }}</td>
                                    <td class="px-4 py-4">
                                        @if ($order->status === 'fulfilled')
                                            <span class="rounded-full bg-green-950 px-2 py-1 text-xs text-green-400">Fulfilled</span>
                                        @elseif ($order->status === 'paid')
                                            <span class="rounded-full bg-yellow-950 px-2 py-1 text-xs text-yellow-400">Processing</span>
                                        @else
                                            <span class="rounded-full bg-neutral-800 px-2 py-1 text-xs text-neutral-400">{{ ucfirst($order->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4">
                                        @if ($order->licenseKey)
                                            <div class="flex items-center gap-2">
                                                <code class="license-key-value rounded border border-neutral-700 bg-black px-2 py-1 font-mono text-sm text-white">{{ $order->licenseKey->key_value }}</code>
                                                <button
                                                    type="button"
                                                    x-data="{ copied: false }"
                                                    @click="navigator.clipboard.writeText($el.previousElementSibling.innerText.trim()); copied = true; setTimeout(() => copied = false, 2000)"
                                                    class="rounded bg-red-600 px-2 py-1 text-xs text-white hover:bg-red-500"
                                                >
                                                    <span x-show="!copied">Copy</span>
                                                    <span x-show="copied" x-cloak>Copied!</span>
                                                </button>
                                            </div>
                                        @else
                                            <span class="text-neutral-600">—</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-neutral-500">{{ $order->created_at->format('M j, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
