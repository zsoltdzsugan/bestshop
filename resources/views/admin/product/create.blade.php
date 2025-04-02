<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Product') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </x-slot>

    <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark p-4">
        <section>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <x-input-label :value="__('Preview')" />
                    <img class="w-60 max-h-60" name="new-preview" id="new-preview" />
                    <x-input-error class="mt-2" :messages="$errors->get('new-preview')" />
                </div>
                <div>
                    <x-input-label for="thumb_image" :value="__('Image')" />
                    <x-text-input id="thumb_image" name="thumb_image" type="file" class="mt-1 block w-full p-2"  onchange="previewImage(event)"/>
                    <x-input-error class="mt-2" :messages="$errors->get('thumb_image')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required value="{{ old('name') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="vendor_id" :value="__('Vendor')" />
                    <x-select-input id="vendor_id" name="vendor_id" class="mt-1 block w-full">
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('vendor_id')" />
                </div>
                <div class="flex w-full gap-4 justify-between max-w-sm">
                    <div class="w-full">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <x-select-input id="category_id" name="category_id" type="text" class="mt-1 block w-full p-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('owner')" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="sub_category_id" :value="__('SubCategory')" />
                        <x-select-input id="sub_category_id" name="sub_category_id" class="mt-1 block w-full">
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('sub_category_id')" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="child_category_id" :value="__('ChildCategory')" />
                        <x-select-input id="child_category_id" name="child_category_id" class="mt-1 block w-full">
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('child_category_id')" />
                    </div>
                </div>
                <div>
                    <x-input-label for="brand_id" :value="__('Brand')" />
                    <x-select-input id="brand_id" name="brand_id" class="mt-1 block w-full">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('brand_id')" />
                </div>
                <div>
                    <x-input-label for="sku" :value="__('SKU')" />
                    <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full" value="{{ old('brand') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('sku')" />
                </div>
                <div>
                    <x-input-label for="quantity" :value="__('Quantity')" />
                    <x-text-input id="quantity" name="quantity" type="number" min="0" class="mt-1 block w-full" value="{{ old('brand') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                </div>
                <div>
                    <x-input-label for="short_description" :value="__('Short Description')" />
                    <x-textarea-input id="short_description" name="short_description" type="text" class="mt-1 block w-full">
                    </x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('short_description')" />
                </div>
                <div>
                    <x-input-label for="long_description" :value="__('Short Description')" />
                    <x-textarea-input id="long_description" name="long_description" type="text" class="mt-1 block w-full">
                    </x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('long_description')" />
                </div>
                <div>
                    <x-input-label for="video_link" :value="__('Video Link')" />
                    <x-text-input id="video_link" name="video_link" type="text" class="mt-1 block w-full" value="{{ old('brand') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('video_link')" />
                </div>
                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" value="{{ old('brand') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                </div>
                <div>
                    <x-input-label for="sale_price" :value="__('Sale Price')" />
                    <x-text-input id="sale_price" name="sale_price" type="text" class="mt-1 block w-full" value="{{ old('brand') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('sale_price')" />
                </div>
                <div>
                    <x-date-picker label="Sale Start" id="sale_start" name="sale_start" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('sale_start')" />
                </div>
                <div>
                    <x-date-picker label="Sale End" id="sale_end" name="sale_end" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('sale_end')" />
                </div>
                <div>
                    <x-toggle-input label="Top Product" id="is_top" name="is_top" />
                    <x-input-error class="mt-2" :messages="$errors->get('is_top')" />
                </div>
                <div>
                    <x-toggle-input label="New Product" id="is_new" name="is_new" />
                    <x-input-error class="mt-2" :messages="$errors->get('is_new')" />
                </div>
                <div>
                    <x-toggle-input label="Best Product" id="is_best" name="is_best" />
                    <x-input-error class="mt-2" :messages="$errors->get('is_best')" />
                </div>
                <div>
                    <x-toggle-input label="Featured Product" id="is_featured" name="is_featured" />
                    <x-input-error class="mt-2" :messages="$errors->get('is_featured')" />
                </div>
                <!-- TODO: admin approval for product -->
                <div>
                    <x-toggle-input label="Approved Product" id="is_approved" name="is_approved" disabled />
                    <x-input-error class="mt-2" :messages="$errors->get('is_featured')" />
                </div>
                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <x-select-input id="status" name="status" class="mt-1 block w-full" value="{{ old('status') }}">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>
                <div>
                    <x-input-label for="seo_title" :value="__('Seo Title')" />
                    <x-textarea-input id="seo_title" name="seo_title" type="text" class="mt-1 block w-full">
                    </x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('seo_title')" />
                </div>
                <div>
                    <x-input-label for="seo_description" :value="__('Seo Description')" />
                    <x-textarea-input id="seo_description" name="seo_description" type="text" class="mt-1 block w-full">
                    </x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('long_description')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>

                    @if (session('status') === 'product-created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.product.index')">{{ __('Back') }}</x-secondary-button>
                </div>
            </form>
        </section>
    </div>
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
        @vite('resources/js/categoryDropdown.js')
    @endpush
</x-admin-layout>
