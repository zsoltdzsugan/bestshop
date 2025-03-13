<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Slider') }}
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

            <form method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <x-input-label :value="__('Preview')" />
                    <img class="w-60 max-h-60" name="new-preview" id="new-preview" />
                    <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
                </div>
                <div>
                    <x-input-label for="banner" :value="__('Banner')" />
                    <x-text-input id="banner" name="banner" type="file" class="mt-1 block w-full p-2" autofocus onchange="previewImage(event)"/>
                    <x-input-error class="mt-2" :messages="$errors->get('banner')" />
                </div>
                <div>
                    <x-input-label for="type" :value="__('Type')" />
                    <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" value="{{ old('type') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                </div>
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required value="{{ old('title') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
                <div>
                    <x-input-label for="starting_price" :value="__('Starting Price')" />
                    <x-text-input id="starting_price" name="starting_price" type="text" class="mt-1 block w-full" value="{{ old('starting_price') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('starting_price')" />
                </div>
                <div>
                    <x-input-label for="btn_url" :value="__('Button Url')" />
                    <x-text-input id="btn_url" name="btn_url" type="text" class="mt-1 block w-full" value="{{ old('btn_url') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('btn_url')" />
                </div>
                <div>
                    <x-input-label for="serial" :value="__('serial')" />
                    <x-text-input id="serial" name="serial" type="text" class="mt-1 block w-full" value="{{ old('serial') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('serial')" />
                </div>
                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <select id="status" name="status" class="mt-1 block w-full" value="{{ old('status') }}">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>

                    @if (session('status') === 'slider-created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.slider.index')">{{ __('Back') }}</x-secondary-button>
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
