<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Product') }}
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

            <form method="post" action="{{ route('admin.product.variants.update', ['product' => $variant->product_id, 'variant' => $variant->id]) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required value="{{ old('name', $variant->name) }}" />
                    <x-text-input id="product_id" name="product_id" type="text" class="mt-1 block w-full" hidden value="{{ $variant->product_id }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
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
                    <x-primary-button>{{ __('Update') }}</x-primary-button>

                    @if (session('status') === 'product-variant-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.product.variants.index', $product->id)">{{ __('Back') }}</x-secondary-button>
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
        @vite('resources/js/subCategoryDropdown.js')
    @endpush
</x-admin-layout>
