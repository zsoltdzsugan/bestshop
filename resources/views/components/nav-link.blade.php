@props(['href' => '#', 'icon' => null, 'active' => false])

<a href="{{ $href }}"
   {{ $attributes->merge([
       'class' => 'group flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface hover:text-on-surface-strong focus:outline-hidden dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong' . ($active ? ' text-primary dark:text-primary-dark hover:text-primary dark:hover:text-primary-dark' : '')
   ]) }}>
    @if($icon)
    <span class="material-symbols-outlined no-underline">
        {{ $icon }}
    </span>
    @endif
    <span class="{{ $active ? 'ml-1' : '' }} group-hover:ml-1 transition-all duration-300 ease-in-out underline-offset-2 group-focus-visible:underline">
        {{ $slot }}
    </span>
</a>
