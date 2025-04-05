<div class="flex space-x-2">
    <!-- Delete Button -->
    <x-button
        variant="danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $image->id }}')"
    >
        <i class="fa-solid fa-trash"></i>
    </x-button>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-product-deletion-{{ $image->id }}" focusable>
        <form method="POST" action="{{ route('vendor.product.images.destroy', ['product' => $image->product_id, 'image' => $image->id]) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this product?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once deleted, this action cannot be undone.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-button variant="secondary" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button>

                <x-button variant="danger" class="ms-3">
                    {{ __('Delete') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</div>
