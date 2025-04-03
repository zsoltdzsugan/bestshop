<x-vendor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Product Variant Item') }}
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

            <form method="post" action="{{ route('vendor.product.variants.items.update', ['product' => $item->variant->product->id, 'variant' => $item->variant->id, 'item' => $item->id]) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="variant_name" :value="__('Variant Name')" />
                    <x-text-input id="variant_name" name="variant_name" type="text" class="mt-1 block w-full" value="{{ $variant->name }}" readonly />
                    <x-text-input id="variant_id" name="variant_id" type="text" hidden value="{{ $item->variant->id }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('variant_name')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required value="{{ old('name', $item->name) }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                </div>
                <div>
                    <x-toggle-input label="Default Variant" id="is_default" name="is_default" />
                    <x-input-error class="mt-2" :messages="$errors->get('is_default')" />
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

                    @if (session('status') === 'product-variant-item-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('vendor.product.variants.items.index', ['product' => $item->variant->product->id, 'variant' => $item->variant->id])">{{ __('Back') }}</x-secondary-button>
                </div>
            </form>
        </section>
    </div>
</x-vendor-layout>
