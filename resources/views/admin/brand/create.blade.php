<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Brand') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </x-slot>

    <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark p-4">
        <section>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <x-input-label :value="__('Preview')" />
                    <img class="w-60 max-h-60" name="new-preview" id="new-preview" />
                    <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
                </div>
                <div>
                    <x-input-label for="logo" :value="__('Logo')" />
                    <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full p-2" autofocus onchange="previewImage(event)"/>
                    <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                </div>
                <div>
                    <x-input-label for="type" :value="__('Type')" />
                    <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" value="{{ old('type') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required value="{{ old('name') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="brand_url" :value="__('Brand Url')" />
                    <x-text-input id="brand_url" name="brand_url" type="text" class="mt-1 block w-full" value="{{ old('brand_url') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('brand_url')" />
                </div>
                <div>
                    <x-input-label for="featured" :value="__('Featured')" />
                    <x-select-input id="featured" name="featured" class="mt-1 block w-full" value="{{ old('featured') }}">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('featured')" />
                </div>
                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <x-select-input id="status" name="status" class="mt-1 block w-full" value="{{ old('status') }}">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>

                    @if (session('status') === 'brand-created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.brand.index')">{{ __('Back') }}</x-secondary-button>
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
