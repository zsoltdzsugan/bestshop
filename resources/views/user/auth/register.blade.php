<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-3xl font-extrabold text-center">
            Register you account
        </h2>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="py-8 px-4 sm:px-10">
            <!-- Separator -->
            <div class="relative mb-4">
                <div class="flex absolute inset-0 items-center">
                    <div class="w-full border-t border-outline dark:border-outline-dark"></div>
                </div>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter you name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Enter you email address"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-password-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required autocomplete="password" placeholder="Enter you password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-password-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="password" placeholder="Enter you password again" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <a class="underline text-sm text-on-surface/50 dark:text-on-surface-dark/50 hover:text-primary dark:hover:text-primary-dark rounded-radius focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary focus:ring-offset-primary dark:focus:ring-primary-dark dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
