@props(['products'])

<div x-data="carouselProducts"
    x-init="initializeProducts"
    data-products='@json($products)'
    class="relative w-full overflow-hidden">

    <!-- previous button -->
    <button type="button" class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-primary/40 p-2 text-on-primary transition hover:bg-primary/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:outline-offset-0 dark:bg-primary-dark/40 dark:text-on-primary-dark dark:hover:bg-primary-dark/60 dark:focus-visible:outline-primary-dark cursor-pointer" aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>

    <!-- next button -->
    <button type="button" class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-primary/40 p-2 text-on-primary transition hover:bg-primary/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:outline-offset-0 dark:bg-primary-dark/40 dark:text-on-primary-dark dark:hover:bg-primary-dark/60 dark:focus-visible:outline-primary-dark cursor-pointer" aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>

    <!-- slides -->
    <div class="relative min-h-[50svh] w-full flex">
        <div class="flex justify-between mx-auto w-full">
            <template x-for="(product, index) in products.slice(currentProductIndex, currentProductIndex + productCount)" :key="index">
                <div class="flex justify-center items-center">
                    <x-product-card />
                </div>
            </template>
        </div>
    </div>

</div>

