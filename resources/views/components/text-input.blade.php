@props(['disabled' => false])

<div class="flex w-full max-w-sm flex-col mt-1 gap-1 text-on-surface dark:text-on-surface-dark">
    <input @disabled($disabled) {{ $attributes->merge(['class' => "w-full rounded-radius bg-surface border border-outline dark:border-outline-dark p-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"]) }}>
</div>
