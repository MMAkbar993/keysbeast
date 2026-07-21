@props(['active' => 'login'])

<div class="mx-auto max-w-2xl px-4 py-16 text-center sm:px-6 lg:px-8">
    <span class="inline-flex items-center gap-2 rounded-full border border-red-900 bg-red-950/50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-red-400">
        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Customer area
    </span>

    <h1 class="mt-4 text-4xl font-extrabold text-white">My Account</h1>
    <p class="mx-auto mt-2 max-w-md text-neutral-500">
        {{ $active === 'login'
            ? "Sign in to view and manage every license key you've purchased."
            : 'Create an account to start purchasing and tracking your license keys.' }}
    </p>

    <div class="mx-auto mt-10 max-w-md rounded-lg border border-neutral-800 bg-neutral-900 p-8 text-left">
        <div class="grid grid-cols-2 gap-2 rounded-md bg-black p-1">
            <a href="{{ route('login') }}" class="rounded-md py-2 text-center text-sm font-semibold transition {{ $active === 'login' ? 'bg-red-600 text-white' : 'text-neutral-400 hover:text-white' }}">
                Sign in
            </a>
            <a href="{{ route('register') }}" class="rounded-md py-2 text-center text-sm font-semibold transition {{ $active === 'register' ? 'bg-red-600 text-white' : 'text-neutral-400 hover:text-white' }}">
                Create account
            </a>
        </div>

        <div class="mt-6">
            {{ $slot }}
        </div>
    </div>
</div>
