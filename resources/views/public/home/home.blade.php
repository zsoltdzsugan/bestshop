<x-public-layout>
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="shadow-sm sm:rounded-md space-y-6">
                <!-- Slides Carousel -->
                <x-slides-carousel :slides="$slides" />

                    <div class="relative flex border-outline border-gray-900 bg-surface-alt p-4 text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark border">
                        <div class="mx-auto flex flex-wrap items-center gap-2 px-6">
                            <p class="sm:text-sm text-pretty text-xs">Flash Sale</p>
                            <button type="button" class="whitespace-nowrap bg-primary px-4 py-1 text-center text-xs font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark rounded-radius">Shop Now</button>
                        </div>
                    </div>

                <x-products-carousel :products="$products" />

                    <section class="overflow-hidden rounded-md shadow md:grid md:grid-cols-3 max-h-80">
                        <img
                        alt=""
                        src="https://images.unsplash.com/photo-1611510338559-2f463335092c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80"
                        class="max-h-80 w-full object-cover"
                        />

                        <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
                            <p class="text-sm font-semibold uppercase tracking-widest">Run with the pack</p>

                            <h2 class="mt-6 font-black uppercase">
                            <span class="text-4xl font-black sm:text-5xl lg:text-6xl"> Get 20% off </span>

                            <span class="mt-2 block text-sm">On your next order over $50</span>
                            </h2>

                            <a
                            class="mt-8 inline-block w-full bg-black py-4 text-sm font-bold uppercase tracking-widest text-white"
                            href="#"
                            >
                            Shop Now
                            </a>

                            <p class="mt-8 text-xs font-medium uppercase text-gray-400">
                            Offer valid until 24th March, 2025 *
                            </p>
                        </div>
                    </section>
                <div class="flex justify-between items-center">
                    <h3 class="text-pretty text-2xl font-medium">Top Categories Of The Month</h3>
                    <ul class="flex gap-4 text-pretty">
                        <li><a href="#" class="px-2.5 py-1 bg-blue-500 rounded-md shadow text-white">Tech</a>
                        <li><a href="#" class="px-2.5 py-1">Clothing</a>
                        <li><a href="#" class="px-2.5 py-1">Speakers</a>
                        <li><a href="#" class="px-2.5 py-1">Cameras</a>
                        <li><a href="#" class="px-2.5 py-1">Watches</a>
                    </ul>
                </div>
                <!-- x-products-promo -->
                <div class="min-h-screen"></div>
            </div>
        </div>
    </div>
</x-public-layout>
