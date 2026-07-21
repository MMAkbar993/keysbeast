<x-app-layout>
    <section class="border-b border-neutral-800 bg-gradient-to-b from-red-950/40 via-neutral-950 to-neutral-950">
        <div class="mx-auto max-w-3xl px-4 py-20 text-center sm:px-6 lg:px-8">
            <span class="inline-flex items-center rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">About Us</span>
            <h1 class="mt-4 text-4xl font-extrabold text-white sm:text-5xl">
                The digital store that makes <span class="text-red-500">activation simple</span>
            </h1>
            <p class="mt-4 text-lg text-neutral-400">
                {{ config('app.name') }} was created to offer genuine software licenses and game keys, with instant delivery and support that actually answers.
            </p>
        </div>
    </section>

    <section class="border-b border-neutral-800 bg-neutral-950">
        <div class="mx-auto grid max-w-5xl grid-cols-1 items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="flex aspect-square items-center justify-center rounded-2xl border border-neutral-800 bg-neutral-900">
                <svg class="h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z" />
                </svg>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide text-red-400">Our mission</span>
                <h2 class="mt-2 text-2xl font-bold text-white">Digital freedom for everyone, no compromises</h2>
                <p class="mt-4 text-neutral-400">
                    We believe accessing genuine software and games shouldn't be expensive, slow or risky. Our goal is simple: authentic licenses, instant delivery, and real support whenever you need it.
                </p>
                <p class="mt-4 text-neutral-400">
                    Every key we sell comes from a verified source — no shortcuts, no risk, just the software or game you paid for.
                </p>
            </div>
        </div>
    </section>

    <section class="border-b border-neutral-800 bg-neutral-950">
        <div class="mx-auto max-w-5xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <span class="inline-flex items-center rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">What we do</span>
            <h2 class="mt-4 text-3xl font-extrabold text-white">Our digital catalog</h2>
            <p class="mt-2 text-neutral-500">We select and deliver ready-to-use digital licenses and keys, in just a few clicks.</p>

            <div class="mt-10 grid grid-cols-1 gap-6 text-left sm:grid-cols-3">
                @foreach ([
                    ['title' => 'Software licenses', 'desc' => 'Windows, Office and productivity tools at competitive prices.'],
                    ['title' => 'Game keys', 'desc' => 'Steam and other store codes for popular PC titles.'],
                    ['title' => 'Digital delivery', 'desc' => 'Key sent by email within seconds of payment.'],
                ] as $item)
                    <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6">
                        <h3 class="font-semibold text-white">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm text-neutral-500">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-black">
        <div class="mx-auto max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <span class="inline-flex items-center rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">Contact us</span>
            <h2 class="mt-4 text-3xl font-extrabold text-white">Have questions about us?</h2>
            <p class="mt-2 text-neutral-500">Reach out and our team will get back to you.</p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center rounded-md bg-red-600 px-6 py-3 text-sm font-semibold text-white hover:bg-red-500">Contact Us</a>
                <a href="{{ route('shop') }}" class="inline-flex items-center rounded-md border border-neutral-700 px-6 py-3 text-sm font-semibold text-neutral-200 hover:bg-neutral-900">Go to store</a>
            </div>
        </div>
    </section>
</x-app-layout>
