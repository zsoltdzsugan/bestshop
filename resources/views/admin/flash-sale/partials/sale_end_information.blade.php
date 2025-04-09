<div class="relative border border-outline dark:border-outline-dark w-full px-4 pt-8 pb-4 rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
    <section>
        <h3>{{ __('Flash Sale End') }}
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('admin.flash-sale.update.date') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('patch')

            <div>
                <x-date-picker label="Sale End" id="sale_end" name="sale_end" class="mt-1 block w-full" value="{{ old('sale_end', $flashSaleDate->sale_end) }}" />
                <x-input-error class="mt-2" :messages="$errors->get('sale_end')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'flash-sale-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Upload.') }}</p>
                @endif
            </div>
        </form>
    </section>
</div>
