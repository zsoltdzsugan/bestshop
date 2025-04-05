<x-vendor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Product variant items') }}
        </h2>
        <p>Product: {{ $product->name }}</p>
    </x-slot>

    <div class="flex justify-end items-center px-4">
        <x-button variant="primary" href="{{ route('vendor.product.variants.items.create', ['product' => $product->id, 'variant' => $variant->id]) }}">
            <span class="material-symbols-outlined small-icon"> add </span>
            <span>Create New</span>
        </x-button>
    </div>

    <div class="overflow-hidden w-full px-4 pt-8 pb-4 overflow-x-auto rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
        {{ $dataTable->table() }}
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-vendor-layout>
