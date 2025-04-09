<div class="relative border border-outline dark:border-outline-dark w-full px-4 pt-8 pb-4 rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
    <section>
        <h3>{{ __('Add Flash Sale Products') }}
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('admin.flash-sale.update.items') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('patch')

            <div>
                <x-combobox label="Select Product" id="product" name="product" class="mt-1 block w-full" :options="$products" />
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>

            <div>
                <x-toggle-input label="Featured" id="is_featured" name="is_featured" />
                <x-input-error class="mt-2" :messages="$errors->get('is_featured')" />
            </div>
            <div>
                <x-toggle-input label="Status" id="status" name="status" />
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Add') }}</x-primary-button>

                @if (session('status') === 'flash-sale-item-added')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Added.') }}</p>
                @endif
            </div>
        </form>
    </section>
</div>
