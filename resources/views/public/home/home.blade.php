<x-public-layout>
    @push('styles')
    <style>
        /*
         *  This is the marquee animation styles.
         *  Instead of adding this CSS you may wish to implement in your tailwind config.
         *  Learn more in the marquee Tailwind Config section
         */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        .animate-marquee {
            animation: marquee 20s linear infinite;
        }
    </style>
    <style>
        /*
         *  This is a container query used for the demo that does not need to be included
         */
        .container-block {
            container-type: inline-size;
        }
        @container (max-width: 1100px) {
            .container-block svg:nth-child(3),
            .container-block svg:nth-child(4) {
                display: none;
            }
        }
    </style>
    @endpush
    <section id="carousel">
        <x-slides-carousel :slides="$sliders" />
    </section>
    <section id="flash-sale">
        <!-- TODO:Dynamic sale date -->
        <div class="relative flex bg-surface px-4 text-on-surface-strong dark:bg-surface-dark dark:text-on-surface-dark-strong">
            <div class="w-full flex flex-wrap items-center px-6 gap-2 h-auto justify-between">
                <div>
                    <h2 class="text-4xl text-on-secondary">Flash Sale</h2>
                </div>
                <div class="flex gap-4 py-6">
                    <div class="flex flex-col py-2 px-2 justify-center min-w-24 items-center gap-2 bg-surface-alt dark:bg-surface-dark-alt">
                        <p class="remaining-day text-5xl text-pretty px-2 "><p>
                        <div class="w-full border-t border-outline-dark dark:border-outline pt-2.5">
                            <p class="text-xs text-pretty uppercase text-center">days</p>
                        </div>
                    </div>
                    <div class="flex flex-col py-2 px-2 justify-center min-w-24 items-center gap-2 bg-surface-alt dark:bg-surface-dark-alt">
                        <p class="remaining-hour text-5xl text-pretty px-2"><p>
                        <div class="w-full border-t border-outline-dark dark:border-outline pt-2.5">
                            <p class="text-xs text-pretty uppercase text-center">hours</p>
                        </div>
                    </div>
                    <div class="flex flex-col py-2 px-2 justify-center min-w-24 items-center gap-2 bg-surface-alt dark:bg-surface-dark-alt">
                        <p class="remaining-minute text-5xl text-pretty px-2"><p>
                        <div class="w-full border-t border-outline-dark dark:border-outline pt-2.5">
                            <p class="text-xs text-pretty uppercase text-center">minutes</p>
                        </div>
                    </div>
                    <div class="flex flex-col py-2 px-2 justify-center min-w-24 items-center gap-2 bg-surface-alt dark:bg-surface-dark-alt">
                        <p class="remaining-second text-5xl text-pretty px-2"><p>
                        <div class="w-full border-t border-outline-dark dark:border-outline pt-2.5">
                            <p class="text-xs text-pretty uppercase text-center">seconds</p>
                        </div>
                    </div>
                </div>
                <div>
                    <x-primary-button>Check it out</x-primary-button>
                </div>
            </div>
        </div>
    </section>
    <section id="flash-sale-products">
        <!-- TODO:Dynamic products -->
            <x-products-carousel :products="$products" />
    </section>
    <section id="promo">
        <!-- TODO:Dynamic banner -->
        <div class="overflow-hidden rounded-radius shadow-sm md:grid md:grid-cols-3 max-h-80 bg-surface dark:bg-surface-dark text-on-surface dark:text-on-surface-dark">
            <img
            alt=""
            src="https://images.unsplash.com/photo-1611510338559-2f463335092c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80"
            class="max-h-80 w-full object-cover brightness-75"
            />
            <div class="flex flex-col justify-between p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
                <p class="text-sm font-semibold uppercase tracking-widest">Run with the pack</p>
                <h2 class="uppercase">
                    <span class="text-4xl font-black sm:text-5xl lg:text-6xl"> Get 20% off </span>
                    <span class="my-6 block text-sm">On your next order over $50</span>
                </h2>
                <x-primary-button class="w-full py-2.5">
                    Don't miss out
                </x-primary-button>
                <p class="text-xs font-medium text-center text-outline-dark dark:text-outline">Offer valid until 24th March, 2025*</p>
            </div>
        </div>
    </section>

    <section id="top-category">
        <!-- TODO:Dynamic nav-links -->
        <div class="flex justify-between items-center text-on-surface dark:text-on-surface-dark">
            <h3 class="text-pretty text-2xl font-semibold">Top Categories Of The Month</h3>
            <ul class="flex gap-2 text-pretty">
                <li> <x-nav-link active> Shoes </x-nav-link> </li>
                <li> <x-nav-link> Clothing </x-nav-link> </li>
                <li> <x-nav-link> Phones </x-nav-link> </li>
                <li> <x-nav-link> Watches </x-nav-link> </li>
                <li> <x-nav-link> Cameras </x-nav-link> </li>
                <li> <x-nav-link> Speakers </x-nav-link> </li>
            </ul>
        </div>
    </section>
    <section id="top-category-products">
        <!-- TODO:Dynamic product-cards -->
        <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-6 justify-center gap-8 justify-items-center">
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
            <x-compact-product-card />
        </div>
    </section>

    <section id="marquee">
        <!-- FIX: move to component -->
        <div
            x-data
            x-init="
                    $nextTick(() => {
                        const content = $refs.content;
                        const item = $refs.item;
                        const clone = item.cloneNode(true);
                        content.appendChild(clone);
                    });
            "
            class="relative w-full container-block rounded-radius"
            >
            <div class="relative w-full py-3 mx-auto overflow-hidden text-lg italic tracking-wide uppercase bg-surface dark:bg-surface-dark max-w-7xl sm:text-xs md:text-sm lg:text-base xl:text-xl 2xl:text-2xl rounded-md">
                <div class="absolute left-0 z-20 w-40 h-full bg-gradient-to-r from-surface dark:from-surface-dark to-transparent"></div>
                <div class="absolute right-0 z-20 w-40 h-full bg-gradient-to-l from-surface dark:from-surface-dark to-transparent"></div>
                <div x-ref="content" class="flex animate-marquee">
                    <div x-ref="item" class="flex items-center justify-around flex-shrink-0 w-full py-2 space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path fill-rule="evenodd" d="M 6.40625 16.800781 C 3.152344 20.621094 0 25.234375 0 28.902344 C 0 31.019531 1.78125 33.996094 6.132813 33.996094 C 8.484375 33.996094 10.820313 33.050781 12.648438 32.320313 C 15.730469 31.085938 49.789063 16.296875 49.789063 16.296875 C 50.117188 16.132813 50.058594 15.925781 49.644531 16.027344 C 49.480469 16.070313 12.566406 26.074219 12.566406 26.074219 C 11.855469 26.273438 11.128906 26.382813 10.421875 26.382813 C 7.230469 26.382813 5.078125 24.851563 5.078125 21.503906 C 5.078125 20.207031 5.484375 18.640625 6.40625 16.800781 Z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path d="M 24.8125 6.53125 C 20.890625 11.007813 18.839844 18.421875 19.09375 25.75 L 30.5 25.75 C 30.851563 18.273438 28.796875 10.890625 24.8125 6.53125 Z M 0 16.03125 C 0.386719 19.785156 1.167969 22.820313 2.4375 25.75 L 16.3125 25.75 C 12.652344 20.25 7.136719 17.300781 0 16.03125 Z M 50 16.0625 C 42.746094 17.164063 37.148438 20.265625 33.25 25.75 L 47.375 25.75 C 48.703125 22.859375 49.546875 19.730469 50 16.0625 Z M 3.5 28.5625 C 3.878906 29.386719 4.5 30.417969 5.03125 31.15625 L 44.6875 31.125 C 45.265625 30.316406 45.785156 29.484375 46.1875 28.5625 Z M 6.875 33.78125 C 7.695313 34.867188 8.382813 35.308594 9.40625 36.125 L 40.125 36.125 C 40.984375 35.453125 41.886719 34.660156 42.6875 33.78125 Z M 12.6875 38.28125 C 15.308594 39.902344 18.382813 40.964844 21.875 41.6875 L 21.46875 38.28125 Z M 22.3125 38.28125 C 22.988281 39.6875 23.859375 40.867188 24.84375 42 C 25.8125 40.847656 26.441406 39.667969 27.125 38.28125 Z M 28.15625 38.28125 L 27.625 41.5 C 31.132813 40.855469 34.222656 39.835938 36.90625 38.28125 Z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path d="M32.68,8C29.92,8,27.31,8.65,25,9.81C22.68,8.65,20.08,8,17.32,8C7.75,8,0,15.84,0,25.5C0,35.16,7.75,43,17.32,43 c2.75,0,5.37-0.66,7.68-1.81c2.31,1.16,4.92,1.81,7.68,1.81C42.25,43,50,35.16,50,25.5C50,15.84,42.25,8,32.68,8z M32.68,38.55 c-0.74,0-1.47-0.07-2.19-0.19c2.98-3.09,4.79-7.03,5.12-11.28L35.7,26H26v5.38h2.85c-0.91,1.81-2.23,3.4-3.84,4.61 c-1.62-1.22-2.95-2.81-3.86-4.61H24V26h-9.7l0.09,1.08c0.34,4.28,2.12,8.23,5.06,11.29c-0.7,0.12-1.41,0.18-2.13,0.18 c-7.11,0-12.9-5.86-12.9-13.05s5.79-13.05,12.9-13.05c0.75,0,1.48,0.06,2.18,0.18c-2.25,2.35-3.85,5.24-4.48,8.16L14.76,22h5.46 l0.23-0.68c0.83-2.5,2.43-4.71,4.54-6.3c2.12,1.59,3.73,3.8,4.56,6.3L29.78,22h5.46l-0.26-1.21c-0.64-2.98-2.2-5.81-4.46-8.15 c0.71-0.12,1.43-0.19,2.16-0.19c7.11,0,12.9,5.86,12.9,13.05S39.79,38.55,32.68,38.55z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path d="M25.565,9.785c-0.123,0.077-3.051,1.702-3.051,5.305c0.138,4.109,3.695,5.55,3.756,5.55 c-0.061,0.077-0.537,1.963-1.947,3.94C23.204,26.283,21.962,28,20.076,28c-1.794,0-2.438-1.135-4.508-1.135 c-2.223,0-2.852,1.135-4.554,1.135c-1.886,0-3.22-1.809-4.4-3.496c-1.533-2.208-2.836-5.673-2.882-9 c-0.031-1.763,0.307-3.496,1.165-4.968c1.211-2.055,3.373-3.45,5.734-3.496c1.809-0.061,3.419,1.242,4.523,1.242 c1.058,0,3.036-1.242,5.274-1.242C21.394,7.041,23.97,7.332,25.565,9.785z M15.001,6.688c-0.322-1.61,0.567-3.22,1.395-4.247 c1.058-1.242,2.729-2.085,4.17-2.085c0.092,1.61-0.491,3.189-1.533,4.339C18.098,5.937,16.488,6.872,15.001,6.688z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path d="M39,4H11c-3.855,0-7,3.145-7,7v28c0,3.855,3.145,7,7,7h28c3.855,0,7-3.145,7-7V11C46,7.145,42.855,4,39,4z M23,34h-4V23h4	V34z M31,34h-4V23c0-1.66-1.34-3-3-3h-9v14h-4V16h14c3.31,0,6,2.69,6,6V34z M39,34h-4V16h4V34z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path d="M 25 2 C 12.296875 2 2 12.296875 2 25 C 2 37.703125 12.296875 48 25 48 C 37.703125 48 48 37.703125 48 25 C 48 12.296875 37.703125 2 25 2 Z M 22.28125 19.125 L 24.125 20.5625 L 19.5625 24.125 L 20.4375 24.8125 L 25 21.25 L 26.84375 22.6875 L 22.28125 26.28125 L 23.15625 26.96875 L 27.71875 23.375 L 27.71875 20.09375 L 31 20.09375 L 31 26.78125 L 34.3125 26.78125 L 34.3125 29.5625 L 27.71875 29.5625 L 27.71875 26.28125 L 22.28125 30.53125 L 17.3125 26.625 C 16.597656 28.347656 14.875 29.5625 12.875 29.5625 L 8.625 29.5625 L 8.625 20.09375 L 12.875 20.09375 C 15.105469 20.09375 16.710938 21.519531 17.3125 23.03125 Z M 35.1875 20.09375 L 38.46875 20.09375 L 38.46875 26.78125 L 41.78125 26.78125 L 41.78125 29.5625 L 35.1875 29.5625 Z M 11.8125 22.8125 L 11.8125 26.84375 L 12.53125 26.84375 C 13.648438 26.84375 14.59375 26.214844 14.59375 24.8125 C 14.59375 23.527344 13.730469 22.8125 12.53125 22.8125 Z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path d="M 25.205078 2.0078125 L 20.150391 16 L 23.394531 16 C 25.514531 16 26.657641 17.631953 25.931641 19.626953 L 20.492188 34.001953 L 16.574219 34 L 22.150391 19 L 18.964844 19 L 13.388672 34 L 9.1503906 34 L 20.798828 2.3945312 C 20.327828 2.4815313 19.860391 2.5793125 19.400391 2.6953125 C 9.4163906 5.2023125 2.0019531 14.250953 2.0019531 25.001953 C 2.0019531 35.382953 8.9149062 44.174391 18.378906 47.025391 C 18.699906 47.122391 19.024562 47.215828 19.351562 47.298828 L 20.042969 45.386719 L 24.068359 34.257812 L 24.070312 34.257812 L 30.589844 16 L 38.392578 16 C 40.514578 16 41.656641 17.631953 40.931641 19.626953 L 36.183594 32.314453 C 35.845594 33.241453 34.762391 34 33.775391 34 L 28.150391 34 L 23.826172 45.941406 L 23.111328 47.917969 C 23.403328 47.941969 23.695234 47.964562 23.990234 47.976562 C 24.326234 47.991563 24.662953 48.001953 25.001953 48.001953 C 37.683953 48.001953 48.001953 37.684953 48.001953 25.001953 C 48.000953 12.609953 38.148187 2.4814375 25.867188 2.0234375 C 25.647188 2.0154375 25.426078 2.0098125 25.205078 2.0078125 z M 33.964844 19 L 29.455078 31 L 32.640625 31 L 37.150391 19 L 33.964844 19 z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="fill-on-surface dark:fill-on-surface-dark size-20">
                        <path d="M 5 4 C 4.448 4 4 4.447 4 5 L 4 24 L 24 24 L 24 4 L 5 4 z M 26 4 L 26 24 L 46 24 L 46 5 C 46 4.447 45.552 4 45 4 L 26 4 z M 4 26 L 4 45 C 4 45.553 4.448 46 5 46 L 24 46 L 24 26 L 4 26 z M 26 26 L 26 46 L 45 46 C 45.552 46 46 45.553 46 45 L 46 26 L 26 26 z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="banners-sale">
        <!-- FIX:BG imgages, might be too much primary color -->
        <div class="flex w-full h-auto gap-8 rounded-radius">
            <!-- Left Image -->
            <div class="relative w-1/2 h-auto min-h-[280px] max-h-[560px] bg-cover bg-center"
                 style="background-image: url('{{ asset("storage/home/banners/category_sale_1.jpg") }}');">
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-60"></div>
                <!-- Text -->
                <div class="relative flex flex-col justify-center items-center h-full p-4">
                    <h1 class="text-8xl font-bold text-primary dark:text-primary-dark">35% Off</h1>
                    <p class="text-5xl text-on-surface dark:text-on-surface-dark font-bold">Women's clothing</p>
                    <x-primary-button class="mt-6">
                        Shop Now
                    </x-primary-button>
                </div>
            </div>

            <!-- Right Side (Two Images) -->
            <div class="flex flex-col gap-8 w-1/2">
                <!-- Top Image -->
                <div class="relative w-full bg-cover min-h-[248px]"
                     style="background-image: url('{{ asset("storage/home/banners/category_sale_2.jpg") }}');">
                    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
                    <div class="relative flex flex-col justify-center items-start h-full px-16 font-bold text-on-surface dark:text-on-surface-dark">
                        <p class="text-xl">New Collection</p>
                        <p class="text-4xl">Kid's Fashion</p>
                        <x-primary-button class="mt-6">
                            Shop Now
                        </x-primary-button>
                    </div>
                </div>

                <!-- Bottom Image -->
                <div class="relative w-full bg-contain bg-center min-h-[248px]"
                     style="background-image: url('{{ asset("storage/home/banners/category_sale_3.jpg") }}');">
                    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
                    <div class="relative flex flex-col justify-center items-start h-full px-16 font-bold">
                        <h1 class="text-5xl text-primary dark:text-primary-dark">20% Off</h1>
                        <p class="text-3xl text-on-surface dark:text-on-surface-dark font-bold">SmartWatch</p>
                        <x-primary-button class="mt-6">
                            Shop Now
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="information">
        <!-- shipping support guarantee online paymnt -->
        <div class="flex w-full items-center gap-8 mt-6">
            <div class="border border-outline dark:border-outline-dark bg-surface dark:bg-surface-dark shadow-sm w-full text-center flex flex-col justify-center items-center">
                <div class="bg-primary dark:bg-primary-dark rounded-radius border border-outline dark:border-outline-dark shadow-sm flex items-center justify-center size-16 -translate-y-8">
                    <span class="material-symbols-outlined text-on-primary large-icon">
                        local_shipping
                    </span>
                </div>
                <div class="pb-4 -mt-4 flex flex-col gap-2 text-on-surface dark:text-on-surface-dark">
                    <p class="text-pretty text-bold text-xl">Free Worldwide Shipping</p>
                    <p class="text-sm">Free shipping cost for any country</p>
                </div>
            </div>
            <div class="border border-outline dark:border-outline-dark bg-surface dark:bg-surface-dark shadow-sm w-full text-center flex flex-col justify-center items-center">
                <div class="bg-primary dark:bg-primary-dark rounded-radius border border-outline dark:border-outline-dark shadow-sm flex items-center justify-center size-16 -translate-y-8">
                    <span class="material-symbols-outlined text-on-primary large-icon">
                        support_agent
                    </span>
                </div>
                <div class="pb-4 -mt-4 flex flex-col gap-2 text-on-surface dark:text-on-surface-dark">
                    <p class="text-pretty text-bold text-xl">24/7 Customer Support</p>
                    <p class="text-sm">Fast and Friendly support</p>
                </div>
            </div>
            <div class="border border-outline dark:border-outline-dark bg-surface dark:bg-surface-dark shadow-sm w-full text-center flex flex-col justify-center items-center">
                <div class="bg-primary dark:bg-primary-dark rounded-radius border border-outline dark:border-outline-dark shadow-sm flex items-center justify-center size-16 -translate-y-8">
                    <span class="material-symbols-outlined text-on-primary large-icon">
                        sync_alt
                    </span>
                </div>
                <div class="pb-4 -mt-4 flex flex-col gap-2 text-on-surface dark:text-on-surface-dark">
                    <p class="text-pretty text-bold text-xl">Money Back Guarantee</p>
                    <p class="text-sm">We return money within 30 days</p>
                </div>
            </div>
            <div class="border border-outline dark:border-outline-dark bg-surface dark:bg-surface-dark shadow-sm w-full text-center flex flex-col justify-center items-center">
                <div class="bg-primary dark:bg-primary-dark rounded-radius border border-outline dark:border-outline-dark shadow-sm flex items-center justify-center size-16 -translate-y-8">
                    <span class="material-symbols-outlined text-on-primary large-icon">
                        credit_card
                    </span>
                </div>
                <div class="pb-4 -mt-4 flex flex-col gap-2 text-on-surface dark:text-on-surface-dark">
                    <p class="text-pretty text-bold text-xl">Secure Online Payment</p>
                    <p class="text-sm">Pay with credit/debit card with ease</p>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function getTimeRemaining(targetDate) {
                const now = new Date();
                const timeLeft = targetDate - now;

                if (timeLeft <= 0) {
                    return { days: 0, hours: 0, minutes: 0, seconds: 0, expired: true };
                }

                return {
                    days: Math.floor(timeLeft / (1000 * 60 * 60 * 24)),
                    hours: Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
                    minutes: Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60)),
                    seconds: Math.floor((timeLeft % (1000 * 60)) / 1000),
                    expired: false,
                }
            }

            function updateCountDownDisplay(timeLeft) {
                const dayElement = document.querySelector('.remaining-day');
                const hourElement = document.querySelector('.remaining-hour');
                const minuteElement = document.querySelector('.remaining-minute');
                const secondElement = document.querySelector('.remaining-second');

                dayElement.innerHTML = timeLeft.days;
                hourElement.innerHTML = timeLeft.hours;
                minuteElement.innerHTML = timeLeft.minutes;
                secondElement.innerHTML = timeLeft.seconds;
            }

            function tick(targetDate, interval) {
                const timeLeft = getTimeRemaining(targetDate);
                updateCountDownDisplay(timeLeft);

                if (timeLeft.expired) {
                    clearInterval(interval);
                }
            }

            function startCountDown(days) {
                const targetDate = new Date();
                targetDate.setDate(targetDate.getDate() + days);

                tick(targetDate);
                const interval = setInterval(() => tick(targetDate, interval), 1000);
            }

            startCountDown(1);
        </script>
    @endpush
</x-public-layout>
