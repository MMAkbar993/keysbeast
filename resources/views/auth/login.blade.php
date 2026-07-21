<x-app-layout>
    <x-auth-card active="login">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <div class="flex items-center justify-between">
                    <x-input-label for="password" :value="__('Password')" />
                    @if (Route::has('password.request'))
                        <a class="text-sm text-red-500 hover:text-red-400" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-neutral-700 bg-neutral-900 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                <label for="remember_me" class="ms-2 text-sm text-neutral-400">{{ __('Remember me') }}</label>
            </div>

            <x-primary-button class="mt-6 w-full justify-center py-3 text-sm">
                {{ __('Sign in') }}
            </x-primary-button>

            <p class="mt-4 text-center text-xs text-neutral-500">
                Use the same email you enter at checkout to see all your purchased keys.
            </p>
        </form>
    </x-auth-card>
</x-app-layout>
