@props(['disabled' => false])

<div class="flex w-full flex-col mt-1 gap-1 text-on-surface dark:text-on-surface-dark">
    <input @disabled($disabled) {{ $attributes->merge(['class' => "w-full rounded-radius bg-surface px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark dark:focus-visible:outline-primary-dark"]) }}>
</div>
