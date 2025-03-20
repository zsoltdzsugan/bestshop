<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit User') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </x-slot>

    <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-outline dark:border-outline-dark p-4">
        <section>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')

                <x-input-label>Preview</x-input-label>
                <div class="flex gap-8">
                    <div>
                        <x-input-label :value="__('Old')" />
                        <img class="w-60 max-h-60" name="old-preview" id="old-preview" src="{{ asset('storage/' . $user->image) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('old-preview')" />
                    </div>
                    <div>
                        <x-input-label :value="__('New')" />
                        <img class="w-60 max-h-60" name="new-preview" id="new-preview" />
                        <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
                    </div>
                </div>
                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full p-2" autofocus onchange="previewImage(event)"/>
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required value="{{ old('name', $user->name) }}"/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" name="username" type="username" class="mt-1 block w-full" required value="{{ old('username', $user->username) }}"/>
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required value="{{ old('email', $user->email) }}"/>
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="flex items-center gap-4">
                        <x-password-input id="password" name="password" type="text" class="mt-1 block w-full" required />
                        <button type="button" id="generatePasswordBtn" class="w-fit border border-outline dark:border-outline-dark p-2.5 rounded-radius mt-2 group-focus-within:outline-2 outline-offset-2 outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:outline-primary-dark" x-on:click="generateRandomPassword()">
                            <svg class="size-4 fill-on-surface dark:fill-on-surface-dark group-focus-within:fill-primary dark:group-focus-within:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M142.9 142.9c-17.5 17.5-30.1 38-37.8 59.8c-5.9 16.7-24.2 25.4-40.8 19.5s-25.4-24.2-19.5-40.8C55.6 150.7 73.2 122 97.6 97.6c87.2-87.2 228.3-87.5 315.8-1L455 55c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 128c0 13.3-10.7 24-24 24l-8.4 0c0 0 0 0 0 0L344 224c-9.7 0-18.5-5.8-22.2-14.8s-1.7-19.3 5.2-26.2l41.1-41.1c-62.6-61.5-163.1-61.2-225.3 1zM16 312c0-13.3 10.7-24 24-24l7.6 0 .7 0L168 288c9.7 0 18.5 5.8 22.2 14.8s1.7 19.3-5.2 26.2l-41.1 41.1c62.6 61.5 163.1 61.2 225.3-1c17.5-17.5 30.1-38 37.8-59.8c5.9-16.7 24.2-25.4 40.8-19.5s25.4 24.2 19.5 40.8c-10.8 30.6-28.4 59.3-52.9 83.8c-87.2 87.2-228.3 87.5-315.8 1L57 457c-6.9 6.9-17.2 8.9-26.2 5.2S16 449.7 16 440l0-119.6 0-.7 0-7.6z"/></svg>
                        </button>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full p-2" value="{{ old('phone', $user->phone) }}"/>
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
                <div>
                    <x-input-label for="role" :value="__('Role')" />
                    <x-select-input id="role" name="role" type="text" class="mt-1 block w-full p-2">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ old('role', $user->role) == $role ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('role')" />
                </div>
                <div>
                    <x-input-label for="Status" :value="__('Status')" />
                    <x-select-input id="status" name="status" placeholder="Select Status">
                        <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>

                    @if (session('status') === 'user-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.user.index')">{{ __('Back') }}</x-secondary-button>
                </div>
            </form>
        </section>
    </div>
    @push('scripts')
        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('new-preview');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
        <script>
            function generateRandomPassword(length = 12) {
                const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&_+";
                let password = "";
                for (let i = 0; i < length; i++) {
                    password += chars.charAt(Math.floor(Math.random() * chars.length));
                }

                return password;
            }

            document.getElementById('generatePasswordBtn').addEventListener('click', function () {
                document.getElementById('password').value = generateRandomPassword();
            });
        </script>
    @endpush
</x-admin-layout>
