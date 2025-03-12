<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="flex justify-end items-center px-4">
        <x-primary-button :href="route('admin.category.create')">
            <span class="material-symbols-outlined small-icon"> add </span>
            <span>Create New</span>
        </x-primary-button>
    </div>

    <div class="overflow-hidden w-full px-4 overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
        {{ $dataTable->table() }}
    </div>

    @section('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endsection

</x-admin-layout>
