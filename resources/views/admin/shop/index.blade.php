<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="flex justify-end items-center px-4">
        <x-primary-button :href="route('admin.shop.create')">
            <span class="material-symbols-outlined small-icon"> add </span>
            <span>Create New</span>
        </x-primary-button>
    </div>

    <div class="overflow-hidden w-full px-4 pt-8 pb-4 overflow-x-auto rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
        {{ $dataTable->table() }}
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-admin-layout>
