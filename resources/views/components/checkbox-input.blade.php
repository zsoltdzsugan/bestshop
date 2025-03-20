@props(['disabled' => false, 'checked' => false, 'label' => 'Notification', 'id' => 'checkbox', 'name' => 'checkbox'])

<label for="{{ $id }}" class="inline-flex min-w-40 items-center justify-between rounded-radius gap-3 border border-outline bg-surface-alt px-4 py-2 text-sm font-medium text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:text-on-surface-dark has-checked:text-on-surface-strong dark:has-checked:text-on-surface-dark-strong has-disabled:opacity-75 has-disabled:cursor-not-allowed">
    <span>{{ $label }}</span>
    <div class="relative flex items-center">
        <input @checked($checked) @disabled($disabled) id="{{ $id }}" name="{{ $name }}" type="checkbox" class="before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-sm border border-outline bg-surface before:absolute before:inset-0 checked:border-primary checked:before:bg-primary focus:outline-2 focus:outline-offset-2 focus:outline-primary checked:focus:outline-primary active:outline-offset-0 disabled:cursor-not-allowed dark:border-outline-dark dark:bg-surface-dark dark:checked:border-primary-dark dark:checked:before:bg-primary-dark dark:focus:outline-primary-dark dark:checked:focus:outline-primary-dark" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-3.5 top-3.5 size-3 -translate-x-1/2 -translate-y-1/2 text-on-primary peer-checked:visible dark:text-on-primary-dark">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
        </svg>
    </div>
</label>

