@props([
    'products' => null,
])

<div x-data="{
    products: @js($products),
    slides: [
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
            imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
        },
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
            imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
        },
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
            imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
        },
    ],
    currentSlideIndex: 1,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide
            this.currentSlideIndex = this.slides.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide
            this.currentSlideIndex = 1
        }
    },
}" class="relative w-full overflow-hidden">

    <!-- previous button -->
    <button type="button" class="absolute left-5 top-1/2 z-20 flex rounded-radius -translate-y-6/12 items-center justify-center bg-primary/50 p-2 text-on-primary transition hover:bg-primary/75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:outline-offset-0 dark:bg-primary-dark/50 dark:text-on-primary-dark dark:hover:bg-primary-dark/75 dark:focus-visible:outline-primary-dark" aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>

    <!-- next button -->
    <button type="button" class="absolute right-5 top-1/2 z-20 flex rounded-radius -translate-y-6/12 items-center justify-center bg-primary/50 p-2 text-on-primary transition hover:bg-primary/75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:outline-offset-0 dark:bg-primary-dark/50 dark:text-on-primary-dark dark:hover:bg-primary-dark/75 dark:focus-visible:outline-primary-dark" aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>

    <!-- slides -->
    <!-- Change min-h-[50svh] to your preferred height size -->
    <div class="relative min-h-[55svh] w-full">
        <template x-for="(slide, index) in slides">
            <div x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-16">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
                </div>
            </div>
        </template>
    </div>

</div>
