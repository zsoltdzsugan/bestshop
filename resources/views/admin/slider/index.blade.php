<x-admin-layout>
    @slot('header')
        <h2 class="font-semibold text-xl leading-tight text-on-surface dark:text-on-surface-dark">
            {{ __('Carousels') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Manage HomePage Carousel") }}
        </p>
    @endslot
    @slot('linkTo')
        {{ route('admin.slider.create') }}
    @endslot

    <div class="overflow-hidden w-full px-4 pt-8 pb-4 overflow-x-auto rounded-radius">
        {{ $dataTable->table() }}
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-admin-layout>
