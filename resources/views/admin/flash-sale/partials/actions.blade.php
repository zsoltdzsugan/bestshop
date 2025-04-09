<div class="flex justify-between items-center gap-2">
    <!-- Delete Button -->
    <x-button
        variant="danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-flashSaleItem-deletion-{{ $flashSaleItem->id }}')"
    >
        <span class="material-symbols-outlined information-icon"> delete </span>
    </x-button>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-flashSaleItem-deletion-{{ $flashSaleItem->id }}" focusable>
        <form method="POST" action="{{ route('admin.flash-sale.destroy', $flashSaleItem->id) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this item?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once deleted, this action cannot be undone.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-button variant="secondary" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button>

                <x-button variant="danger" type="submit" class="ms-3">
                    {{ __('Delete')  }}
                </x-button>
            </div>
        </form>
    </x-modal>
</div>
