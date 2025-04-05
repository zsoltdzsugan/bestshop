@props(['href' => '#', 'icon' => null, 'active' => false])

<a href="{{ $href }}"
   {{ $attributes->merge([
       'class' => 'group flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong' . ($active ? ' text-on-surface-strong dark:text-on-surface-dark-strong' : '')
   ]) }}>
    @if($icon)
    <span class="material-symbols-outlined">
        {{ $icon }}
    </span>
    @endif
    <span class="{{ $active ? 'ml-1' : '' }} group-hover:ml-1 transition-all duration-300 ease-in-out">
        {{ $slot }}
    </span>
</a>
