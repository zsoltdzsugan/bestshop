<div class="flex space-x-2">
    <!-- Edit Button -->
    <x-info-button :classType="'info'" :href="route('admin.product.edit', $product->id)">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-info-button>

    <!-- Delete Button -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $product->id }}')"
    >
        <i class="fa-solid fa-trash"></i>
    </x-danger-button>

    <x-settings :product="$product" />

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-product-deletion-{{ $product->id }}" focusable>
        <form method="POST" action="{{ route('admin.product.destroy', $product->id) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this product?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once deleted, this action cannot be undone.') }}
            </p>

            @if ($product->variants->count() > 0)
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('This product has variants, this action will also delete them.') }}
                <ul>
                @foreach($product->variants as $variant)
                    <li>{{ $variant->name }}</li>
                @endforeach
                </ul>
            </p>
            @endif

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
