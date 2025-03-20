<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Vendor') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email description.") }}
        </p>
    </x-slot>

    <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark p-4">
        <section>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('admin.vendor.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <x-input-label :value="__('Preview')" />
                    <img class="w-60 max-h-60" name="new-preview" id="new-preview" />
                    <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
                </div>
                <div>
                    <x-input-label for="banner" :value="__('Logo')" />
                    <x-text-input id="banner" name="banner" type="file" class="mt-1 block w-full p-2" onchange="previewImage(event)"/>
                    <x-input-error class="mt-2" :messages="$errors->get('banner')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full p-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
                <div>
                    <x-input-label for="address" :value="__('Address')" />
                    <x-text-input id="address" name="address" type="text" class="mt-1 block w-full p-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea-input id="description" name="description" type="text" class="mt-1 block w-full p-2" rows="5"/>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <div>
                    <x-input-label for="fb_link" :value="__('Facebook')" />
                    <x-text-input id="fb_link" name="fb_link" type="text" class="mt-1 block w-full p-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('fb_link')" />
                </div>
                <div>
                    <x-input-label for="ig_link" :value="__('Instagram')" />
                    <x-text-input id="ig_link" name="ig_link" type="text" class="mt-1 block w-full p-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('ig_link')" />
                </div>
                <div>
                    <x-input-label for="x_link" :value="__('X (Twitter)')" />
                    <x-text-input id="x_link" name="x_link" type="text" class="mt-1 block w-full p-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('x_link')" />
                </div>
                <div>
                    <x-input-label for="user_id" :value="__('Owner')" />
                    <x-select-input id="user_id" name="user_id" type="text" class="mt-1 block w-full p-2">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('owner')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>

                    @if (session('status') === 'vendor-created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.vendor.index')">{{ __('Back') }}</x-secondary-button>
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
    @endpush
</x-admin-layout>
