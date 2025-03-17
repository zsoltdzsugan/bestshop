<x-guest-layout>
    <div class="flex flex-col justify-center min-h-64">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-3xl font-extrabold text-center">
                Sign in to your account
            </h2>
            <p class="mt-2 text-sm text-center text-on-surface/50 dark:text-on-surface-dark/50">
                Or
                <a href="{{ route('register') }}" class="font-medium text-primary dark:text-primary-dark hover:opacity-75">
                    create an account
                </a>
            </p>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="py-8 px-4 sm:px-10">
                <!-- Separator -->
                <div class="relative mb-4">
                    <div class="flex absolute inset-0 items-center">
                        <div class="w-full border-t border-outline dark:border-outline-dark"></div>
                    </div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="email" :value="__('Email')"
                            class="block text-sm font-medium text-on-surface dark:text-on-surface-dark" />
                        <div class="mt-1">
                            <x-text-input id="email" name="email" type="email" autocomplete="email"
                                placeholder="Enter your email address"
                                :value="old('email')" required
                                class="w-full rounded-radius bg-surface px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark dark:focus-visible:outline-primary-dark" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')"
                            class="block text-sm font-medium text-on-surface dark:text-on-surface-dark" />
                        <div class="mt-1">
                            <x-password-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required autocomplete="password" placeholder="Enter you password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="block mt-2">
                            <label for="remember_me" class="flex items-center gap-2 text-xs font-medium text-on-surface dark:text-on-surface-dark has-checked:text-on-surface-strong dark:has-checked:text-on-surface-dark-strong has-disabled:cursor-not-allowed has-disabled:opacity-75">
                                <div class="relative flex items-center">
                                    <input id="remember_me" type="checkbox" class="before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-radius bg-surface before:absolute before:inset-0 checked:before:bg-primary focus:outline-2 focus:outline-offset-2 focus:outline-primary checked:focus:outline-primary active:outline-offset-0 disabled:cursor-not-allowed dark:bg-surface-dark dark:checked:before:bg-primary-dark dark:focus:outline-primary-dark dark:checked:focus:outline-primary-dark border-1 border-outline dark:border-outline-dark focus:border-0" />
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-on-primary peer-checked:visible dark:text-on-primary-dark">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                    </svg>
                                </div>
                                <span>Remember me</span>
                            </label>
                        </div>

                        <div class="flex justify-end items-center mt-2">
                            @if (Route::has('password.request'))
                                <a class="text-xs text-on-surface dark:text-on-surface-dark underline rounded-radius hover:opacity-75 hover:text-primary focus:ring-1 focus:ring-primary focus:ring-offset-2 focus:ring-offset-primary focus:outline-none dark:hover:text-primary-dark dark:focus:ring-offset-primary-dark"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div>
                        <x-primary-button class="w-full">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
                <div class="mt-6">

                    <div class="relative">
                        <div class="flex absolute inset-0 items-center">
                            <div class="w-full border-t border-outline dark:border-outline-dark"></div>
                        </div>
                        <div class="flex relative justify-center text-sm">
                            <span class="px-2 text-on-surface/50 dark:text-on-surface-dark/50 bg-outline dark:bg-outline-dark rounded-radius">
                                Or continue with
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-6">
                        <div>
                            <a href="#"
                                class="flex justify-center items-center py-3 w-full text-sm font-medium focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 bg-surface dark:bg-surface-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark transition ease-in-out duration-150 cursor-pointer group">

                                <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-hover:fill-primary dark:group-hover:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>

                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="flex justify-center items-center py-3 w-full text-sm font-medium focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 bg-surface dark:bg-surface-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark transition ease-in-out duration-150 cursor-pointer group">

                                <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-hover:fill-primary dark:group-hover:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="flex justify-center items-center py-3 w-full text-sm font-medium focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 bg-surface dark:bg-surface-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark transition ease-in-out duration-150 cursor-pointer group">

                                <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-hover:fill-primary dark:group-hover:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
