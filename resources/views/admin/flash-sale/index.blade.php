<x-admin-layout>
    @slot('header')
        <h2 class="font-semibold text-xl leading-tight text-on-surface dark:text-on-surface-dark">
            {{ __('Flash Sale') }}
        </h2>
        <p class="mt-1 text-sm text-on-surface dark:text-on-surface-dark/50">
        {{ __("Manage flash sale configuration.") }}
        </p>

        <div class="space-y-6 mt-6">
            @include('admin.flash-sale.partials.sale_end_information')
            @include('admin.flash-sale.partials.sale_items_selection')
        </div>
    @endslot


    @slot('linkTo')
        {{ route('admin.product.create') }}
    @endslot

    <div class="overflow-hidden w-full px-4 pt-8 pb-4 rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
        {{ $dataTable->table() }}
    </div>

    @push('scripts')
        {{-- composer require yajra/laravel-datatables-buttons:"^12.0" --}}
        {{-- need to publish php artisan vendor:publish --tag=datatables-buttons --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> --}}
        {{-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script> --}}
        {{-- <script src="/vendor/datatables/buttons.server-side.js"></script> --}}
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-admin-layout>
