<section id="searchbar" class="max-w-screen w-full items-center bg-surface-alt dark:bg-surface-dark-alt">
    <div class="flex max-w-7xl mx-auto items-center py-4 space-x-12 justify-between rounded-radius">
        <div>
            <!-- Brand Logo -->
            <x-application-logo :href="route('home')" />
        </div>
        <!-- Search -->
        <div class="relative flex mx-auto w-full max-w-xl flex-col gap-1 bg-surface dark:bg-surface-dark text-on-surface dark:text-on-surface-dark p-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-on-surface/50 dark:text-on-surface-dark/50">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="search" name="search" placeholder="Search" aria-label="search" class="w-full rounded-radius bg-surface py-2.5 pl-10 pr-2 text-sm focus-visible:outline focus-visible:outline-offset-1 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark dark:focus-visible:outline-primary-dark" />
        </div>
        <div class="flex items-center gap-2 text-on-surface dark:text-on-surface-dark">
            <span class="material-symbols-outlined large-icon">
            support_agent
            </span>
            <div>
                <p class="text-sm">support@test.com</p>
                <p class="text-sm text-right">+123456789</p>
            </div>
        </div>
        <div class="flex gap-6 items-center text-on-surface dark:text-on-surface-dark">
            <span class="material-symbols-outlined large-icon p-2 cursor-pointer">
            favorite
            </span>
            <span class="material-symbols-outlined large-icon p-2 cursor-pointer">
            notifications
            </span>
            <span class="material-symbols-outlined large-icon p-2 cursor-pointer">
            shopping_bag
            </span>
        </div>
    </div>
</section>
