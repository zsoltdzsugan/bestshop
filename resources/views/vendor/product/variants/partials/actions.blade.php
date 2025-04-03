<div class="flex space-x-2">
    <!-- Edit Button -->
    <x-info-button :classType="'info'" :href="route('vendor.product.variants.items.index', ['product' => $variant->product_id, 'variant' => $variant->id])">
        Manage Variants
    </x-info-button>

    <!-- Edit Button -->
    <x-info-button :classType="'info'" :href="route('vendor.product.variants.edit', ['product' => $variant->product_id, 'variant' => $variant->id])">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-info-button>

    <!-- Delete Button -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $variant->id }}')"
    >
        <i class="fa-solid fa-trash"></i>
    </x-danger-button>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-product-deletion-{{ $variant->id }}" focusable>
        <form method="POST" action="{{ route('vendor.product.variants.destroy', ['product' => $variant->product_id, 'variant' => $variant->id]) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this product?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once deleted, this action cannot be undone.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>
