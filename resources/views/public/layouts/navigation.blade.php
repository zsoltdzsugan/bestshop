<section id="main-navigation" class="max-w-screen w-full items-center bg-surface dark:bg-surface-dark">
    <nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="max-w-7xl h-auto mx-auto flex items-center justify-between gap-4 py-1 aria-label="main-menu">
        <div class="flex gap-4 items-center">

            <!-- TODO: Sidebar menu like amazon -->

            <!-- Desktop Menu -->
            <ul class="hidden items-center gap-4 shrink-0 sm:flex">
                <x-menu-item :href="route('home')" active>
                    Products
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
                        @if (Auth::user()->role == 'vendor')
                            <x-primary-button :href="route('vendor.dashboard')">
                            Vendor Dashboard
                            </x-primary-button>
                        @endif
                        @if (Auth::user()->role == 'admin')
                            <x-primary-button :href="route('admin.dashboard')">
                            Admin Dashboard
                            </x-primary-button>
                        @endif

                        <x-primary-button :href="route('dashboard')">
                        Dashboard
                        </x-primary-button>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-secondary-button :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                            </x-secondary-button>
                        </form>
                    @else
                        <x-primary-button :href="route('login')">
                        Login
                        </x-primary-button>

                        <x-secondary-button :href="route('register')">
                        Register
                        </x-secondary-button>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
</section>



