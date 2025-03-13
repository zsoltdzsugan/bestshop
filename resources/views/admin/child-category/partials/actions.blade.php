<div class="flex space-x-2">
    <!-- Edit Button -->
    <x-info-button :href="route('admin.child-category.edit', $childCategory->id)">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-info-button>

    <!-- Delete Button -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-child-category-deletion-{{ $childCategory->id }}')"
    >
        <i class="fa-solid fa-trash"></i>
    </x-danger-button>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-child-category-deletion-{{ $childCategory->id }}" focusable>
        <form method="POST" action="{{ route('admin.child-category.destroy', $childCategory->id) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this child-category?') }}
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
