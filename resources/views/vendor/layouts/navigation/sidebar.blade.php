<aside class="w-72 inset-y-0 left-0 overflow-y-auto flex min-h-screen">
    <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
        <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
        <a class="sr-only" href="#main-content">skip to the main content</a>

        <!-- dark overlay for when the sidebar is open on smaller screens  -->
        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity ></div>

        <nav x-cloak class="fixed left-0 z-30 flex min-h-svh w-60 shrink-0 flex-col border-r border-outline bg-surface-alt p-4 transition-transform duration-300 md:w-72 md:translate-x-0 md:relative dark:border-outline-dark dark:bg-surface-dark-alt" x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
            <!-- logo  -->
            <x-application-logo :href="route('dashboard')" size="8"/>

            <!-- search  -->
            <div class="relative my-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="absolute right-2 top-1/2 size-5 -translate-y-1/2 text-on-surface/50 dark:text-on-surface-dark/50" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>
                <input type="search" class="w-full rounded-radius bg-surface px-2 py-1.5 pl-9 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark/50 dark:focus-visible:outline-primary-dark" name="search" aria-label="Search" placeholder="Search"/>
            </div>

            <!-- sidebar links  -->
            <div class="flex flex-col gap-2 overflow-y-auto pb-6">

                <x-nav-link :href="route('vendor.dashboard')" :active="request()->routeIs('vendor.dashboard')" class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                        <path d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z"/>
                    </svg>
                    <span>Dashboard</span>
                </x-nav-link>

                <!-- Manage Vendor -->
                <x-nav-link :href="route('vendor.vendor-profile.index')" :active="request()->routeIs('vendor.vendor-profile.index')" class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                        <path d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z"/>
                    </svg>
                    <span>Vendor</span>
                </x-nav-link>

                <!-- Manage Products -->
                <div x-data="{ isExpanded: {{ json_encode(setActive(['vendor.product.*'])) }} }" class="flex flex-col">
                    <button type="button" x-on:click="isExpanded = ! isExpanded" id="user-management-btn" aria-controls="user-management" x-bind:aria-expanded="isExpanded ? 'true' : 'false'" class="flex items-center justify-between rounded-radius gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline" x-bind:class="isExpanded ? 'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' : 'text-on-surface hover:bg-primary/5 hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong dark:hover:bg-primary-dark/5'">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                            <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"/>
                        </svg>
                        <span class="mr-auto text-left">Product Management</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="user-management-btn" id="user-management">
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-nav-link href="{{ route('vendor.dashboard') }}" :active="request()->routeIs('admin.brand.*')" class="flex items-center rounded-radius gap-2 px-4 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">Brand</x-nav-link>
                        </li>
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-nav-link href="{{ route('vendor.dashboard') }}" :active="request()->routeIs('admin.brand.*')" class="flex items-center rounded-radius gap-2 px-4 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">Product</x-nav-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</aside>
