<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-danger border border-outline dark:border-outline-dark rounded-radius font-semibold text-xs text-on-danger uppercase tracking-widest hover:bg-surface-alt hover:border-danger dark:hover:bg-surface-dark-alt dark:hover:border-danger active:bg-danger focus:outline-none focus:ring-1 focus:ring-danger focus:ring-offset-1 focus:ring-offset-danger transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
