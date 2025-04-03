<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('vendor.product.images.store', $product->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <x-input-label :value="__('Preview')" />
            <img class="w-60 max-h-60" name="new-preview" id="new-preview" />
            <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
        </div>
        <div>
            <x-input-label for="image" :value="__('Images')" />
            <x-text-input id="image" name="image[]" type="file" multiple class="mt-1 block w-full p-2" onchange="previewImage(event)"/>
            <x-text-input hidden id="product_id" name="product_id" type="text" value="{{ old('product_id', $product->id) }}" />
            <x-input-error class="mt-2" :messages="$errors->get('thumb_image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'product-images-added')
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
@push('scripts')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('new-preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
    @vite('resources/js/subCategoryDropdown.js')
    @vite('resources/js/childCategoryDropdown.js')
@endpush
