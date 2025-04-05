<x-admin-layout>
    @slot('header')
        <h2 class="font-semibold text-xl leading-tight text-on-surface dark:text-on-surface-dark">
            {{ __('Products') }}
        </h2>
        <p class="mt-1 text-sm text-on-surface dark:text-on-surface-dark/50">
        {{ __("Manage Products") }}
        </p>
    @endslot
    @slot('linkTo')
        {{ route('admin.product.create') }}
    @endslot

    <div class="overflow-hidden w-full px-4 pt-8 pb-4 rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
        {{ $dataTable->table() }}
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-admin-layout>
