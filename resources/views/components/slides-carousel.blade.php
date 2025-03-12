@props(['slides'])

<div x-data="carouselSlides"
     x-init="initializeSlides"
     data-slides='@json($slides)'
     class="relative w-full overflow-hidden">

    <div class="relative min-h-[60svh] w-full">
        <template x-for="(slide, index) in slides">
            <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0 text-slate-100" x-transition.opacity.duration.1000ms>
                <!-- Title and description -->
                <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-start justify-center gap-2 bg-linear-to-t from-surface-dark/85 to-transparent px-16 py-12">
                    <h3 class="w-full lg:w-[90%] text-balance text-3xl font-bold text-on-surface-dark-strong" x-text="slide.type" x-bind:aria-describedby="'slide' + (index + 1) + 'Type of Sale'"></h3>
                    <h1 class="lg:w-[90%] w-full text-pretty text-6xl text-on-surface-dark" x-text="slide.title" x-bind:id="'slide' + (index + 1) + 'title'"></h1>
                    <h4 class="w-full lg:w-[90%] text-balance text-xl font-bold text-on-surface-dark-strong" x-bind:aria-describedby="'slide' + (index + 1) + 'starting price'">Starting at $<span x-text="slide.starting_price"></span></h4>
                    <button type="button" x-cloak x-show="slide.btn_url !== null" class="mt-2 whitespace-nowrap rounded-radius border border-on-surface-dark-strong bg-transparent px-4 py-2 text-center text-xs font-medium tracking-wide text-on-surface-dark-strong transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-on-surface-dark-strong active:opacity-100 active:outline-offset-0 md:text-sm">Shop Now</button>
                </div>
                <img class="absolute w-full h-full inset-0 object-cover text-on-surface dark:text-on-surface-dark brightness-50" x-bind:src="'{{ asset('storage') }}' + '/' + slide.banner" x-bind:alt="slide.imgAlt" />
            </div>
        </template>
    </div>

    <!-- indicators -->
    <div class="absolute rounded-radius bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2" role="group" aria-label="slides" >
        <template x-for="(slide, index) in slides">
            <button class="size-2 rounded-full transition" x-on:click="currentSlideIndex = index + 1" x-bind:class="[currentSlideIndex === index + 1 ? 'bg-slate-200' : 'bg-slate-200/50']" x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>
</div>

