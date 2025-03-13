<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Child-Category') }}
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

            <form method="post" action="{{ route('admin.child-category.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="category_id" :value="__('Category')" />
                    <x-select-input id="category_id" name="category_id" placeholder="Select Category" class="main-category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                </div>
                <div>
                    <x-input-label for="sub_category_id" :value="__('SubCategory')" />
                    <x-select-input id="sub_category_id" name="sub_category_id" placeholder="Select Subcategory" class="sub-category">
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('sub_category_id')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="Status" :value="__('Status')" />
                    <x-select-input id="status" name="status" placeholder="Select Status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>

                    @if (session('status') === 'child-category-created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Created.') }}</p>
                    @endif

                    <x-secondary-button :href="route('admin.child-category.index')">{{ __('Back') }}</x-secondary-button>
                </div>
            </form>
        </section>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const categorySelect = document.querySelector('#category_id');

                categorySelect.addEventListener('change', function () {
                    let id = this.value;

                    fetch(`{{ route('admin.get-subcategories') }}?id=${id}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("DATA", data);
                        const subCategorySelect = document.querySelector('#sub_category_id');
                        const defaultOption = document.createElement('option');

                        subCategorySelect.innerHTML = '';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        defaultOption.textContent = "Select Subcategory";
                        defaultOption.value = "";
                        subCategorySelect.appendChild(defaultOption);

                        data.forEach(function(item) {

                            const option = document.createElement('option');
                            option.value = item.id;
                            option.textContent = item.name;

                            subCategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        </script>
    @endpush
</x-admin-layout>
