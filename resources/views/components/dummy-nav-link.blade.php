@props(['icon' => null])

<div
   {{ $attributes->merge([
       'class' => 'pointer-events-none flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface focus:outline-hidden dark:text-on-surface-dark'
   ]) }}>
    @if($icon)
    <span class="material-symbols-outlined underline-none">
        {{ $icon }}
    </span>
    @endif
    <span class="transition-all duration-300 ease-in-out no-underline group-focus-visible:no-underline">
        {{ $slot }}
    </span>
</div>
