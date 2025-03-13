<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>

    <div class="flex justify-end items-center px-4">
        <x-primary-button :href="route('admin.slider.create')">
            <span class="material-symbols-outlined small-icon"> add </span>
            <span>Create New</span>
        </x-primary-button>
    </div>

    <div class="overflow-hidden w-full px-4 pt-8 pb-4 overflow-x-auto rounded-radius">
        {{ $dataTable->table() }}
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-admin-layout>
