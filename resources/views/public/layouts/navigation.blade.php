<section id="main-navigation" class="max-w-screen w-full items-center bg-surface dark:bg-surface-dark">
    <nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="max-w-7xl h-auto mx-auto flex items-center justify-between gap-4 aria-label="main-menu">
        <div class="flex gap-4 items-center">

            <div x-data="{ sidebarIsOpen: false, mainIsOpen: false, subIsOpen:false }" x-on:click.outside="sidebarIsOpen = false" x-on:keydown.esc.window="sidebarIsOpen = false" class="z-50" x-cloak>
                <!-- toggle button -->
                <button class="inline-flex items-center gap-2 whitespace-nowrap rounded-radius bg-primary dark:bg-primary-dark px-4 py-1.5 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2" x-on:click="sidebarIsOpen = ! sidebarIsOpen">
                    <svg class="size-5 text-on-primary dark:text-on-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
                    </svg>
                    <span class="sr-only">sidenav toggle</span>
                </button>
                    <!-- overlay -->
                    <div x-cloak x-show="sidebarIsOpen" x-bind:class="sidebarIsOpen ? 'display:block' : 'display:none'" @click="sidebarIsOpen = false" id="sidenavOverlay" class="z-10 absolute top-0 left-0 w-full h-full bg-black opacity-50 transition duration-150 ease-in-out"></div>

                <nav x-cloak x-show="sidebarIsOpen" x-trap="sidebarIsOpen" class=" top-0 fixed left-0 z-50 flex h-svh w-80 shrink-0 flex-col bg-surface p-4 transition-transform duration-300 dark:bg-surface-dark" aria-label="side-navigation" x-transition:enter="transition duration-200 ease-out" x-transition:enter-end="translate-x-0" x-transition:enter-start="-translate-x-80" x-transition:leave="transition ease-in duration-200 " x-transition:leave-end="-translate-x-80" x-transition:leave-start="translate-x-0">
                    <!-- sidebar header -->
                    <div class="flex items-center justify-between" id="sidenavHeader">
                        <h3 class="text-lg font-medium text-on-surface-strong dark:text-on-surface-dark-strong">All Products</h3>
                        <button class="text-on-surface dark:text-on-surface-dark" x-on:click="sidebarIsOpen = false">
                            <span class="material-symbols-outlined">
                            close
                            </span>
                            <span class="sr-only">close sidebar</span>
                        </button>
                    </div>

                    <!-- sidebar below header -->
                    <div id="mainContainer">
                        <div class="mt-4 overflow-y-auto h-full w-full">
                            @foreach($categories as $category)
                                <a href="#" class="flex items-center py-3 px-1 justify-between text-on-surface dark:text-white hover:bg-primary dark:hover:bg-primary-dark hover:text-on-primary dark:hover:text-on-primary-dark">
                                    <div class="sidenavContent flex items-center gap-2">
                                        <span class="material-symbols-outlined">{{ $category->icon }}</span>
                                        <span class="text-lg text-pretty">{{ $category->name }}</span>
                                    </div>
                                    @if (count($category->subCategories) > 0)
                                    <div class="flex items-center justify-end">
                                        <span class="material-symbols-outlined"> chevron_right </span>
                                    </div>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>


                </nav>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden items-center gap-4 shrink-0 sm:flex">
                <x-menu-item :href="route('home')" :active="request()->routeIs('home')">
                    Home
                </x-menu-item>
                <x-menu-item :href="route('flash-sale')" :active="request()->routeIs('flash-sale')">
                    Flash Sale
                </x-menu-item>
                <x-menu-item :href="route('home')">
                    Contact
                </x-menu-item>
                <x-menu-item :href="route('home')">
                    FAQ
                </x-menu-item>
            </ul>
            <!-- Mobile Menu Button -->
            <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-on-surface dark:text-on-surface-dark sm:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
                <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <!-- Mobile Menu -->
            <ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col rounded-b-radius bg-surface-alt px-8 pb-6 pt-10 dark:bg-surface-dark-alt sm:hidden">
                <li class="mb-4 border-none">
                    <div class="flex items-center gap-2 py-2">
                        <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="User Profile" class="size-12 rounded-full object-cover"  />
                        <div>
                            <span class="font-medium text-on-surface-strong dark:text-on-surface-dark-strong">Alice Brown</span>
                            <p class="text-sm text-on-surface dark:text-on-surface-dark">alice.brown@gmail.com</p>
                        </div>
                    </div>
                </li>
                <li class="p-2"><a href="#" class="w-full text-lg font-bold text-amber-500 focus:underline dark:text-amber-400" aria-current="page">Products</a></li>
                <li class="p-2"><a href="#" class="w-full text-lg font-medium text-stone-800 focus:underline dark:text-stone-300">Pricing</a></li>
                <li class="p-2"><a href="#" class="w-full text-lg font-medium text-stone-800 focus:underline dark:text-stone-300">Blog</a></li>
                <hr role="none" class="my-2 border-outline dark:border-outline-dark">
                <li class="p-2"><a href="#" class="w-full text-on-surface focus:underline dark:text-on-surface-dark">Dashboard</a></li>
                <li class="p-2"><a href="#" class="w-full text-on-surface focus:underline dark:text-on-surface-dark">Subscription</a></li>
                <li class="p-2"><a href="#" class="w-full text-on-surface focus:underline dark:text-on-surface-dark">Settings</a></li>
                <!-- CTA Button -->
                <li class="mt-4 w-full border-none"><a href="#" class="rounded-radius bg-primary border border-primary px-4 py-2 block text-center font-medium tracking-wide text-on-primary hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark dark:border-primary-dark">Sign Out</a></li>
            </ul>
        </div>
        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                <div class="sm:flex sm:gap-4">
                    @auth
                        @php
                            $dashboard = match(Auth::user()->role) {
                            'admin' => 'admin.dashboard',
                            'vendor' => 'vendor.dashboard',
                            default => 'dashboard',
                            };
                        @endphp

                        <x-button :href="route($dashboard)">
                            Dashboard
                        </x-button>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-outline-button variant="danger" class="brightness-75" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                            </x-outline-button>
                        </form>
                    @else
                        <x-button :href="route('login')">
                        Login
                        </x-button>

                        <x-outline-button variant="secondary" :href="route('register')">
                        Register
                        </x-outline-button>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
</section>



