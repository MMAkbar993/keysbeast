@php
    $faqs = [
        ['q' => 'How do I receive my key?', 'a' => 'Immediately after a successful payment, your license key is emailed to you and also shown on the order confirmation page. It\'s always available afterward from "My Licenses" in your account.'],
        ['q' => 'Are the keys genuine?', 'a' => 'Yes. Every key sold is a single-use, genuine license. Once a key is sold it\'s marked as used and is never sold again.'],
        ['q' => 'How do I activate the product?', 'a' => 'Enter the key in the corresponding software or platform (e.g. Windows Settings, Microsoft Office, or Steam) exactly as it appears on your confirmation page or email.'],
        ['q' => 'Which payment methods do you accept?', 'a' => 'Checkout is processed securely through Stripe, supporting major credit and debit cards.'],
        ['q' => 'Can I get a refund?', 'a' => 'Because keys are delivered instantly and are single-use, we\'re unable to offer refunds once a key has been revealed. Contact support if you believe there\'s an issue with your order.'],
        ['q' => 'Are the licenses lifetime?', 'a' => 'License terms depend on the product — check the individual product page for details before purchasing.'],
    ];
@endphp

<x-app-layout>
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-white">Frequently Asked Questions</h1>
        <p class="mt-2 text-neutral-500">Everything you need to know before and after purchase.</p>

        <div class="mt-10 divide-y divide-neutral-800 border-t border-neutral-800">
            @foreach ($faqs as $faq)
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="py-5">
                    <button @click="open = !open" class="flex w-full items-center justify-between text-left">
                        <span class="font-semibold" :class="open ? 'text-red-400' : 'text-white'">{{ $faq['q'] }}</span>
                        <svg class="h-5 w-5 shrink-0 text-neutral-500 transition-transform" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <p
                        x-show="open"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="mt-3 text-sm text-neutral-400"
                    >{{ $faq['a'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
