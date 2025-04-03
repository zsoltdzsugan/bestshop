<x-vendor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="flex justify-end items-center px-4">
        @if (!$shop)
            <x-primary-button :href="route('vendor.shop.create')">
                <span class="material-symbols-outlined small-icon"> add </span>
                <span>Create New</span>
            </x-primary-button>
        @else
            <x-info-button :href="route('vendor.shop.edit', $shop->id)">
                <span class="material-symbols-outlined small-icon"> add </span>
                <span>Edit</span>
            </x-info-button>
            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >{{ __('Delete Account') }}</x-danger-button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('vendor.shop.destroy', $shop->id) }}" class="p-6 bg-surface-alt dark:bg-surface-dark-alt">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-on-surface dark:text-on-surface-dark">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-on-surface dark:text-on-surface-dark/75">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}"
                        />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        @endif
    </div>

    <div class="overflow-hidden w-full px-4 pt-8 pb-4 overflow-x-auto rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
    </div>

    @push('scripts')
    @endpush
</x-vendor-layout>
