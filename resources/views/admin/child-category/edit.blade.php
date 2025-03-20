<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Child-Category') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </x-slot>

    <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-outline dark:border-outline-dark p-4">
        <section>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('admin.child-category.update', $childCategory->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')


                <div>
                    <x-input-label for="category" :value="__('Category')" class="w-fit pl-0.5 text-sm"/>
                    <x-select-input id="category" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $childCategory->category_id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('category')" />
                </div>

                <div>
                    <x-input-label for="sub-category" :value="__('SubCategory')" class="w-fit pl-0.5 text-sm"/>
                    <x-select-input id="sub-category" name="sub-category">
                        @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ $subCategory->id == old('sub_category_id', $childCategory->sub_category_id) ? 'selected' : '' }}>
                                {{ $subCategory->name }}
                            </option>
                        @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('sub_category')" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $childCategory->name) }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>

                    <x-select-input label="Status" id="status" name="status">
                        <option value="1" {{ old('status', $childCategory->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $childCategory->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </x-select-input>
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>

                    @if (session('status') === 'child-category-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Updated.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.child-category.index')">{{ __('Back') }}</x-secondary-button>
                </div>
            </form>
        </section>
    </div>
    @push('scripts')
        @vite('resources/js/subCategoryDropdown.js')
    @endpush
</x-admin-layout>
