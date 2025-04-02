@props(['disabled' => false, 'checked' => false, 'label' => 'label', 'id' => 'toggle', 'name' => 'toggle'])

<label for="{{ $name }}" class="inline-flex min-w-52 items-center justify-between gap-3 rounded-radius bg-surface-alt px-4 py-1.5 dark:bg-surface-dark-alt">
    <input id="{{ $id }}" name="{{ $name }}" type="checkbox" class="peer sr-only" role="switch" @checked($checked) @disabled($disabled) />
    <span class="trancking-wide text-sm font-medium text-on-surface peer-checked:text-on-surface-strong peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-on-surface-dark dark:peer-checked:text-on-surface-dark-strong">{{ $label }}</span>
    <div class="relative h-6 w-11 after:h-5 after:w-5 peer-checked:after:translate-x-5 rounded-full   bg-surface after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-on-surface after:transition-all after:content-[''] peer-checked:bg-primary peer-checked:after:bg-on-primary peer-focus:outline-2 peer-focus:outline-outline-strong peer-focus:peer-checked:outline-primary peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-outline-dark dark:bg-surface-dark dark:after:bg-on-surface-dark dark:peer-checked:bg-primary-dark dark:peer-checked:after:bg-on-primary-dark dark:peer-focus:outline-outline-dark-strong dark:peer-focus:peer-checked:outline-primary-dark" aria-hidden="true"></div>
</label>

