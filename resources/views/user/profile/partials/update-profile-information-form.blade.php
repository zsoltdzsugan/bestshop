<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="grid sm:grid-cols-1 md:grid-cols-2 grid-rows-1 gap-4">
            <div class="grid sm:grid-cols-1 gap-8 justify-center items-center content-end">
                <header class="md:pb-6 lg:pb-12">
                    <h2 class="text-lg font-medium text-on-surface dark:text-on-surface-dark">
                        {{ __('Profile Information') }}
                    </h2>

                    <p class="mt-1 text-sm text-on-surface dark:text-on-surface-dark">
                    {{ __("Update your account's profile information and email address.") }}
                    </p>
                </header>

                <div class="flex justify-center items-center gap-4 group">
                    <x-input-label for="name" class="border border-outline dark:border-outline-dark p-2.5 rounded-radius mt-2 group-focus-within:outline-2 outline-offset-2 outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:outline-primary-dark">
                        <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-focus-within:fill-primary dark:group-focus-within:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                    </x-input-label>
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autocomplete="name" placeholder="Full name"/>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />

                <div class="flex justify-center items-center gap-4 group">
                    <x-input-label for="username" class="border border-outline dark:border-outline-dark p-2.5 rounded-radius mt-2 group-focus-within:outline-2 outline-offset-2 outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:outline-primary-dark">
                        <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-focus-within:fill-primary dark:group-focus-within:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256l0 32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32l0 80 0 32c0 17.7 14.3 32 32 32s32-14.3 32-32l0-32c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                    </x-input-label>
                    <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autocomplete="username" placeholder="Username" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('username')" />

                <div class="flex justify-center items-center gap-4 group">
                    <x-input-label for="email" class="border border-outline dark:border-outline-dark p-2.5 rounded-radius mt-2 group-focus-within:outline-2 outline-offset-2 outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:outline-primary-dark">
                        <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-focus-within:fill-primary dark:group-focus-within:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    </x-input-label>
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" placeholder="Email address" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-on-surface dark:text-on-surface-dark">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif

                <div class="flex justify-center items-center gap-4 group">
                    <x-input-label for="phone" class="border border-outline dark:border-outline-dark p-2.5 rounded-radius mt-2 group-focus-within:outline-2 outline-offset-2 outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:outline-primary-dark">
                        <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-focus-within:fill-primary dark:group-focus-within:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    </x-input-label>
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autocomplete="phone" placeholder="Phone number" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <div class="flex flex-col gap-4 items-end group">
                <img src="{{ Auth::user()->image ? asset(Auth::user()) : 'https://placehold.co/275x350' }}" alt="profile picture" class="max-w-[275px] max-h-[350px] object-cover"/>
                <div class="flex justify-center items-center gap-4">
                    <x-input-label for="image" class="border border-outline dark:border-outline-dark p-2.5 rounded-radius mt-2 group-focus-within:outline-2 outline-offset-2 outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:outline-primary-dark">
                        <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-focus-within:fill-primary dark:group-focus-within:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M149.1 64.8L138.7 96 64 96C28.7 96 0 124.7 0 160L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64l-74.7 0L362.9 64.8C356.4 45.2 338.1 32 317.4 32L194.6 32c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                    </x-input-label>
                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full max-w-[275px] group-focus-within:outline-2 outline-offset-2 outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:outline-primary-dark" :value="old('image', $user->image)" required autocomplete="image" placeholder="Profile picture" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>
        </div>


        <div class="flex items-center gap-4 pt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
