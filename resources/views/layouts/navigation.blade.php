@php
    $navLinks = [
        ['label' => 'All', 'route' => 'shop', 'params' => []],
        ['label' => 'Windows', 'route' => 'shop', 'params' => ['type' => 'windows']],
        ['label' => 'Office', 'route' => 'shop', 'params' => ['type' => 'office']],
        ['label' => 'PC Games', 'route' => 'shop', 'params' => ['type' => 'game']],
        ['label' => 'About Us', 'route' => 'about', 'params' => []],
        ['label' => 'FAQ', 'route' => 'faq', 'params' => []],
        ['label' => 'Contact', 'route' => 'contact', 'params' => []],
    ];

    $isActive = function (array $link) {
        if (! request()->routeIs($link['route'])) {
            return false;
        }

        return ($link['params']['type'] ?? null) === request()->query('type');
    };
@endphp

<nav x-data="{ open: false }" class="border-b border-neutral-800 bg-black">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo />
                    </a>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">
                    @foreach ($navLinks as $link)
                        <x-nav-link :href="route($link['route'], $link['params'])" :active="$isActive($link)">
                            {{ $link['label'] }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:gap-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center rounded-md p-2 text-neutral-300 hover:text-white focus:outline-none" aria-label="Account">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('My Licenses') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center rounded-md p-2 text-neutral-300 hover:text-white" aria-label="My Account">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                @endauth

                <span class="inline-flex items-center rounded-md p-2 text-neutral-500" aria-hidden="true" title="Checkout is one product at a time — no cart needed">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 1.907-4.706 2.298-7.184a1.125 1.125 0 00-1.11-1.316H5.436m2.064 8.5L5.436 5.25M7.5 14.25L5.436 5.25M9.75 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </span>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-md p-2 text-neutral-400 hover:bg-neutral-900 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            @foreach ($navLinks as $link)
                <x-responsive-nav-link :href="route($link['route'], $link['params'])" :active="$isActive($link)">
                    {{ $link['label'] }}
                </x-responsive-nav-link>
            @endforeach
        </div>

        <div class="border-t border-neutral-800 pb-1 pt-4">
            @auth
                <div class="px-4">
                    <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-neutral-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')">
                        {{ __('My Licenses') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('login')">{{ __('Log in') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">{{ __('Register') }}</x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
