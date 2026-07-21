<x-app-layout>
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-8">
            <h2 class="text-xl font-semibold text-white">Checkout cancelled</h2>
            <p class="mt-3 text-neutral-400">Your checkout was cancelled and you have not been charged.</p>
            <a href="{{ route('shop') }}" class="mt-6 inline-block text-red-500 hover:text-red-400">&larr; Back to shop</a>
        </div>
    </div>
</x-app-layout>
