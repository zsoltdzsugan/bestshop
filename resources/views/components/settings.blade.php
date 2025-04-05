@props(['product' => $product, 'owner' => 'null'])
<div x-data="{
        isOpen: false,
        openedWithKeyboard: false,
        dropdownStyle: {
            top: '0px',
            right: '0px'
        },
        initDropdown() {
            const button = this.$refs.button;
            const rect = button.getBoundingClientRect();
            this.dropdownStyle = {
                top: `${rect.bottom + 4}px`,
                right: `${window.innerWidth - rect.right}px`
            };
        }
    }"
    class="relative w-fit"
    x-on:keydown.esc.window="isOpen = false; openedWithKeyboard = false"
    x-on:mousedown.window="e => { if (!$el.contains(e.target)) { isOpen = false; openedWithKeyboard = false; } }"
    x-on:scroll.window="if (isOpen) initDropdown()">
    <!-- Toggle Button -->
    <x-button variant="secondary" type="button"
        x-ref="button"
        x-on:click.stop="isOpen = !isOpen; if (isOpen) initDropdown()"
        aria-haspopup="true"
        x-on:keydown.space.prevent="openedWithKeyboard = true"
        x-on:keydown.enter.prevent="openedWithKeyboard = true"
        x-on:keydown.down.prevent="openedWithKeyboard = true"
        class="text-on-surface-strong dark:text-on-surface-dark-strong"
        x-bind:aria-expanded="isOpen || openedWithKeyboard">
        <span class="material-symbols-outlined information-icon"> settings </span>
    </x-button>
    <!-- Dropdown Menu -->
    <div x-cloak x-show="isOpen || openedWithKeyboard"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        x-trap="openedWithKeyboard"
        x-on:click.stop
        x-bind:style="dropdownStyle"
        class="fixed z-40 py-1 border border-outline dark:border-outline-dark flex w-fit min-w-48 flex-col overflow-hidden rounded-radius bg-secondary dark:bg-secondary-dark"
        role="menu">
        <a href="{{ route($owner . '.product.images.index', $product->id) }}" class="bg-secondary px-4 py-2 text-sm text-on-surface hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden dark:bg-secondary-dark dark:text-on-surface-dark dark:hover:bg-surface-alt/5 dark:hover:text-on-surface-dark-strong dark:focus-visible:bg-surface-alt/10 dark:focus-visible:text-on-surface-dark-strong" role="menuitem">Image Gallery</a>
        <a href="{{ route($owner . '.product.variants.index', $product->id) }}" class="bg-secondary px-4 py-2 text-sm text-on-surface hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden dark:bg-secondary-dark dark:text-on-surface-dark dark:hover:bg-surface-alt/5 dark:hover:text-on-surface-dark-strong dark:focus-visible:bg-surface-alt/10 dark:focus-visible:text-on-surface-dark-strong" role="menuitem">Product Variant</a>
    </div>
</div>
