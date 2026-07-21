<footer class="border-t border-neutral-800 bg-black">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <x-application-logo />
                <p class="mt-4 max-w-xs text-sm text-neutral-500">
                    Your digital store for software keys and PC games. Instant delivery, unbeatable prices.
                </p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white">Categories</h3>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="{{ route('shop', ['type' => 'windows']) }}" class="text-neutral-400 hover:text-white">Windows</a></li>
                    <li><a href="{{ route('shop', ['type' => 'office']) }}" class="text-neutral-400 hover:text-white">Office</a></li>
                    <li><a href="{{ route('shop', ['type' => 'game']) }}" class="text-neutral-400 hover:text-white">PC Games</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white">Support</h3>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="{{ route('about') }}" class="text-neutral-400 hover:text-white">About Us</a></li>
                    <li><a href="{{ route('faq') }}" class="text-neutral-400 hover:text-white">FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="text-neutral-400 hover:text-white">Contact</a></li>
                    <li><a href="{{ route('dashboard') }}" class="text-neutral-400 hover:text-white">My Account</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white">Legal</h3>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><span class="text-neutral-600">Privacy</span></li>
                    <li><span class="text-neutral-600">Terms</span></li>
                </ul>
            </div>
        </div>

        <div class="mt-12 border-t border-neutral-800 pt-6 text-center text-sm text-neutral-600">
            &copy; {{ now()->year }} KeysBeast. All rights reserved.
        </div>
    </div>
</footer>
