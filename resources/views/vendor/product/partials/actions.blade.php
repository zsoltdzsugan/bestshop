<div class="flex space-x-2">
    <!-- Edit Button -->
    <x-button variant="secondary" :classType="'info'" :href="route('vendor.product.edit', $product->id)">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-button>

    <!-- Delete Button -->
    <x-button
        variant="danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $product->id }}')"
    >
        <i class="fa-solid fa-trash"></i>
    </x-button>

    <x-settings :product="$product" :owner="auth()->user()->role" />

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-product-deletion-{{ $product->id }}" focusable>
        <form method="POST" action="{{ route('vendor.product.destroy', $product->id) }}" class="p-6">
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
