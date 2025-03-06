<nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="flex items-center justify-between border-b border-outline ml-2 py-4 dark:border-outline-dark" aria-label="penguin ui menu">
	<!-- Desktop Menu -->
	<ul class="hidden items-center gap-4 md:flex">
		<li><a href="#" class="font-bold text-primary underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark" aria-current="page">Home</a></li>
		<li><a href="#" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Shop</a></li>
		<li><a href="#" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Vendor</a></li>
		<li><a href="#" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Blog</a></li>
	</ul>
	<ul class="hidden items-center gap-4 md:flex">
		<li><a href="#" class="font-bold text-primary underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark" aria-current="page">Contact</a></li>
        @if (Auth::user())
            <li><x-nav-link href="#" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Account</x-nav-link></li>
        @else
            <li><x-nav-link :href="route('login')" class="font-medium text-on-surface underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark">Login</x-nav-link></li>
        @endif
	</ul>
	<!-- Mobile Menu Button -->
	<button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-on-surface dark:text-on-surface-dark md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
		<svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
		</svg>
		<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
		</svg>
	</button>
	<!-- Mobile Menu -->
	<ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-outline rounded-b-radius border-b border-outline bg-surface-alt px-6 pb-6 pt-20 dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark-alt md:hidden">
		<li class="py-4"><a href="#" class="w-full text-lg font-bold text-primary focus:underline dark:text-primary-dark" aria-current="page">Products</a></li>
		<li class="py-4"><a href="#" class="w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark">Pricing</a></li>
		<li class="py-4"><a href="#" class="w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark">Blog</a></li>
		<li class="py-4"><a href="#" class="w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark">Login</a></li>
	</ul>
</nav>

