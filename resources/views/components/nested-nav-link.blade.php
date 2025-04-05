@props([
    'href',
    'icon' => null,
    'active' => false,
])

<li {{ $attributes->class([
    'group px-1 py-0.5 border-l',
    'border-l-on-surface-strong dark:border-l-on-surface-dark-strong' => $active,
    'border-l-outline dark:border-l-outline-dark hover:border-l-on-surface-strong dark:hover:border-l-on-surface-dark-strong' => !$active,
]) }}>
    <a href="{{ $href }}"
        class="{{ $active
            ? 'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface-strong dark:text-on-surface-dark-strong underline-offset-2'
            : 'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong underline-offset-2' }}">
        @if($icon)
            <span class="material-symbols-outlined">
                {{ $icon }}
            </span>
        @endif
        <span class="{{ $active ? 'ml-1' : '' }} group-hover:ml-1 group-active:ml-1 transition-all duration-300 ease-in-out">
            {{ $slot }}
        </span>
    </a>
</li>
