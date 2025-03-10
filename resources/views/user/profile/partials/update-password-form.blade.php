<section>
    <header class="md:pb-6 lg:pb-12">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="grid sm:grid-cols-1 md:grid-cols-2 grid-rows-1 gap-8 justify-center items-center content-end">
            <div class="grid sm:grid-cols-1 col-span-1 gap-8">
                <div class="flex justify-center items-center gap-4">
                    <label for="update_password_current_password" class="border p-2.5 rounded-md mt-1">
                        <svg class="size-4 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 144c0-44.2 35.8-80 80-80s80 35.8 80 80l0 48c0 17.7 14.3 32 32 32s32-14.3 32-32l0-48C576 64.5 511.5 0 432 0S288 64.5 288 144l0 48L64 192c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-192c0-35.3-28.7-64-64-64l-32 0 0-48z"/></svg>
                    </label>
                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" placeholder="Current Password"/>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                <div class="flex justify-center items-center gap-4">
                    <label for="update_password_password" class="border p-2.5 rounded-md mt-1">
                        <svg class="size-4 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z"/></svg>
                    </label>
                    <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" placeholder="New Password"/>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                <div class="flex justify-center items-center gap-4">
                    <label for="update_password_password_confirmation" class="border p-2.5 rounded-md mt-1">
                        <svg class="size-4 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z"/></svg>
                    </label>
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" placeholder="Confirm New Password"/>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
