<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>

    <div class="flex justify-end items-center px-4">
        <x-primary-button :href="route('admin.slider.create')">
            <span class="material-symbols-outlined small-icon"> add </span>
            <span>Create New</span>
        </x-primary-button>
    </div>

    <div class="overflow-hidden overflow-x-auto p-4 shadow-md rounded-md border border-outline dark:border-outline-dark">
        <!--table-->
    </div>
</x-admin-layout>
