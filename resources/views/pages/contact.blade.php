<x-app-layout>
    <div class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
            <div>
                <h1 class="text-4xl font-extrabold text-white">Contact Us</h1>
                <p class="mt-3 text-neutral-400">Need help with an order or a key? Our team is here for you.</p>

                <div class="mt-8 space-y-6">
                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-red-950/60 text-red-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                        </span>
                        <div>
                            <div class="font-semibold text-white">Email</div>
                            <div class="text-neutral-500">support@keysbeast.com</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-red-950/60 text-red-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM12 12h-.375m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM15.75 12H15m-1.5 6h.008v.008H15v-.008zm-3 0h.008v.008H12v-.008zm-3 0h.008v.008H9v-.008zM3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12z" /></svg>
                        </span>
                        <div>
                            <div class="font-semibold text-white">Live chat</div>
                            <div class="text-neutral-500">Available during business hours</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-red-950/60 text-red-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </span>
                        <div>
                            <div class="font-semibold text-white">Response time</div>
                            <div class="text-neutral-500">We aim to reply within 24 hours</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-8">
                <form
                    x-data="{ sent: false }"
                    @submit.prevent="sent = true"
                >
                    <div x-show="!sent">
                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Your name" required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" placeholder="you@email.com" required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="message" value="Message" />
                            <textarea id="message" name="message" rows="5" required class="mt-1 block w-full rounded-md bg-neutral-900 border-neutral-700 text-white placeholder-neutral-500 focus:border-red-500 focus:ring-red-500 shadow-sm" placeholder="How can we help you?"></textarea>
                        </div>

                        <x-primary-button type="submit" class="mt-6 w-full justify-center py-3 text-sm">
                            Send message
                        </x-primary-button>
                    </div>

                    <div x-show="sent" x-cloak class="flex flex-col items-center py-8 text-center">
                        <svg class="h-10 w-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <p class="mt-3 font-semibold text-white">Thanks for reaching out!</p>
                        <p class="mt-1 text-sm text-neutral-500">This is a demo form — wire it up to a mailer or ticketing system before going live.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
