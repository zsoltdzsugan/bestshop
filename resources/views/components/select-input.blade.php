@props([
    'id' => null,
    'name' => 'select_name',
    'placeholder' => 'Please Select',
    'selected' => null,
])

<div class="relative flex mt-1 w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">

    <span class="absolute pointer-events-none right-5 top-2 material-symbols-outlined">
        keyboard_arrow_down
    </span>

    <select id="{{ $id }}" name="{{ $name }}" class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
        <option disabled {{ is_null($selected) ? 'selected' : '' }} value="">{{ $placeholder }}</option>
        {{ $slot }}
    </select>
</div>

