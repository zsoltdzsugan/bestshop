<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Category') }}
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

            <form method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')

                <x-input-label>Preview</x-input-label>
                <div class="flex gap-8">
                    <div>
                        <x-input-label :value="__('Old')" />
                        <span id="old-preview" class="material-symbols-outlined py-2">
                            {{ $category->icon }}
                        </span>
                        <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
                    </div>
                    <div>
                        <x-input-label :value="__('New')" />
                        <span id="new-preview" class="material-symbols-outlined py-2"></span>
                        <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
                    </div>
                </div>
                <div>
                    <div class="flex gap-2">
                        <x-input-label for="icon" :value="__('Icon')" />

                        <x-hover-card>
                            <x-slot:trigger> info </x-slot:trigger>
                            <x-slot:title> Preferred Usage: Google Icons </x-slot:title>
                            <x-slot:description>
                                Use Google icons. You only need to include the "Icon name".
                            </x-slot:description>
                            <x-slot:example> shopping_cart </x-slot:example>
                        </x-hover-card>
                    </div>

                    <x-text-input id="icon" name="icon" type="text" class="mt-1 block w-full" value="{{ old('icon', $category->icon) }}" onchange="previewIcon(event)" autocomplete/>
                    <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $category->name) }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <select id="status" name="status" class="mt-1 block w-full" value="{{ old('status') }}">
                        <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>

                    @if (session('status') === 'category-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.category.index')">{{ __('Back') }}</x-secondary-button>
                </div>
            </form>
        </section>
    </div>
    @push('scripts')
        <script>
            function previewIcon(event) {
                const inputValue = event.target.value;
                const preview = document.getElementById('new-preview');

                preview.textContent = inputValue;
            }
        </script>
    @endpush
</x-admin-layout>
