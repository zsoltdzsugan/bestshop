<aside class="inset-y-0 left-0 overflow-y-auto flex min-h-screen">
    <div x-data="{ showSidebar: false }" class="relative flex w-full flex-col md:flex-row">
        <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
        <a class="sr-only" href="#main-content">skip to the main content</a>

        <!-- dark overlay for when the sidebar is open on smaller screens  -->
        <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>

        <nav x-cloak class="fixed left-0 z-20 flex h-svh w-60 shrink-0 flex-col bg-surface-alt p-4 transition-transform duration-300 ease-in-out md:w-64 md:translate-x-0 md:relative dark:bg-surface-dark-alt" x-bind:class="showSidebar ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
            <!-- logo  -->
            <x-application-logo :href="route('dashboard')" class="ml-2 w-fit text-2xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong block h-9 fill-current"/>

            <!-- search  -->
            <div class="relative my-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <span class="material-symbols-outlined absolute left-2 top-2/4 size-5 -translate-y-3/5 text-on-surface/50 dark:text-on-surface-dark/50">
                    search
                </span>
                <input type="search" class="w-full rounded-radius bg-surface px-2 py-1.5 pl-10 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark/50 dark:focus-visible:outline-primary-dark" name="search" aria-label="Search" placeholder="Search"/>
            </div>

            <!-- sidebar links  -->
            <div class="flex flex-col gap-2 overflow-y-auto pb-6 hide-scrollbar">

                <x-nav-link
                    :href="route('admin.dashboard')"
                    :active="request()->routeIs('admin.dashboard')"
                    icon="dashboard">
                    Dashboard
                </x-nav-link>

                <x-nav-link
                    class="pointer-events-none"
                    icon="group">
                    User Management
                </x-nav-link>
                <ul class="pl-4.5">
                    <x-nested-nav-link
                        :href="route('admin.user.index')"
                        :active="request()->routeIs('admin.user.*')">
                        Users
                    </x-nested-nav-link>
                </ul>

                <x-nav-link
                    class="pointer-events-none"
                    icon="tabs">
                    Site Management
                </x-nav-link>
                <ul class="pl-4.5">
                    <x-nav-link class="pl-0 font-semibold pointer-events-none">
                        Carousels
                    </x-nav-link>
                    <x-nested-nav-link
                        :href="route('admin.slider.index')"
                        :active="request()->routeIs('admin.slider.*')">
                        Home Carousel
                    </x-nested-nav-link>
                    <x-nav-link class="pl-0 font-semibold pointer-events-none">
                        Categories
                    </x-nav-link>
                    <x-nested-nav-link
                        :href="route('admin.category.index')"
                        :active="request()->routeIs('admin.category.*')">
                        Main Categories
                    </x-nested-nav-link>
                    <x-nested-nav-link
                        :href="route('admin.sub-category.index')"
                        :active="request()->routeIs('admin.sub-category.*')">
                        Sub Categories
                    </x-nested-nav-link>
                    <x-nested-nav-link
                        :href="route('admin.child-category.index')"
                        :active="request()->routeIs('admin.child-category.*')">
                        Child Categories
                    </x-nested-nav-link>
                </ul>

                <x-nav-link
                    :href="route('admin.shop.index')"
                    :active="request()->routeIs('admin.shop.*')"
                    icon="storefront">
                    Shops
                </x-nav-link>
                <x-nav-link
                    :href="route('admin.brand.index')"
                    :active="request()->routeIs('admin.brand.*')"
                    icon="brand_family">
                    Brands
                </x-nav-link>

                <x-nav-link
                    class="pointer-events-none"
                    icon="package_2">
                    Products
                </x-nav-link>
                <ul class="pl-4.5">
                    <x-nested-nav-link
                        :href="route('admin.product.index')"
                        :active="request()->routeIs('admin.product.*') && !request()->routeIs('admin.product.pending.*')">
                        Approved
                    </x-nested-nav-link>
                    <x-nested-nav-link
                        :href="route('admin.product.pending.index')"
                        :active="request()->routeIs('admin.product.pending.*')">
                        Pending
                    </x-nested-nav-link>
                    <x-nested-nav-link
                        :href="route('admin.product.index')"
                        :active="request()->routeIs('admin.product.*') && !request()->routeIs('admin.product.pending.*')">
                        Rejected
                    </x-nested-nav-link>
                </ul>

                <!-- collapsible item  -->
                <div x-data="{ isExpanded: false }" class="flex flex-col">
                    <button type="button" x-on:click="isExpanded = ! isExpanded" id="orders-btn" aria-controls="orders" x-bind:aria-expanded="isExpanded ? 'true' : 'false'" class="flex items-center justify-between rounded-radius gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline" x-bind:class="isExpanded ? 'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' :  'text-on-surface hover:bg-primary/5 hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong dark:hover:bg-primary-dark/5'">
                        <span class="material-symbols-outlined">
                            local_shipping
                        </span>
                        <span class="mr-auto text-left">Orders</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="orders-btn" id="orders">
                        <li class="px-1 py-0.5 first:mt-2">
                            <a href="#" class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
                                <span>Pending</span>
                                <span class="ml-auto font-bold">3</span>
                            </a>
                        </li>
                        <li class="px-1 py-0.5 first:mt-2">
                            <a href="#" class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
                                <span>Shipped</span>
                                <span class="ml-auto font-bold">12</span>
                            </a>
                        </li>
                        <li class="px-1 py-0.5 first:mt-2">
                            <a href="#" class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
                                <span>Completed</span>
                                <span class="ml-auto font-bold">38</span>
                            </a>
                        </li>
                        <li class="px-1 py-0.5 first:mt-2">
                            <a href="#" class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
                                <span>Returns</span>
                                <span class="ml-auto font-bold">2</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <a href="#" class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                    </svg>
                    <span>Settings</span>
                </a>
            </div>

            <!-- Top fade -->
            <div class="fixed top-28 left-0 z-30 h-10 w-64 pointer-events-none bg-surface-alt dark:bg-surface-dark-alt [mask-image:linear-gradient(to_bottom,var(--color-surface-dark-alt),transparent)]"></div>

            <!-- Bottom fade -->
            <div class="fixed bottom-0 left-0 z-30 h-10 w-64 pointer-events-none bg-surface dark:bg-surface-dark-alt [mask-image:linear-gradient(to_top,var(--color-surface-dark-alt),transparent)]"></div>


        </nav>

        <!-- toggle button for small screen  -->
        <button class="fixed inline-flex items-center text-center right-4 top-4 z-20 rounded-full bg-primary p-4 md:hidden text-on-primary dark:bg-primary-dark dark:text-on-primary-dark" x-on:click="showSidebar = ! showSidebar">
            <span class="material-symbols-outlined m-0 p-0" x-show="showSidebar">
            close
            </span>
            <span class="material-symbols-outlined m-0 p-0" x-show="! showSidebar">
            side_navigation
            </span>
            <span class="sr-only">sidebar toggle</span>
        </button>
    </div>
</aside>
