@props([
    'image' => null,
    'images' => [],
])

@php
    $slides = collect($images)->map(function ($image) {
        return [
            'imgSrc' => asset('storage/' . $image->image),
            'imgAlt' => $image->alt_text,
        ];
    });
@endphp

<div x-cloak x-data="{
    slides: @js($slides),
    modalIsOpen: false,
    currentSlideIndex: 1,
    openModal(index) {
        this.currentSlideIndex = index;
        this.modalIsOpen = true;
    },
    previous() {
        this.currentSlideIndex = (this.currentSlideIndex - 1) || this.slides.length;
    },
    next() {
        this.currentSlideIndex = (this.currentSlideIndex % this.slides.length) + 1;
    }
}">
    <!-- Trigger: Carousel Thumbnail -->
    <div class="relative w-full overflow-hidden cursor-pointer" @click="openModal(1)">
        <img class="w-full h-auto object-cover object-center" src="{{ asset('storage/'.$image) }}" :alt="">
    </div>

    <!-- Modal Lightbox -->
    <div
        x-show="modalIsOpen"
        x-cloak
        x-transition.opacity
        x-trap.inert.noscroll="modalIsOpen"
        @keydown.escape.window="modalIsOpen = false"
        @click.self="modalIsOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4">
        <div class="relative w-full max-w-5xl mx-auto overflow-hidden">
            <!-- Previous Button -->
            <button @click.stop="previous" class="absolute left-4 top-1/2 transform -translate-y-1/2 z-20">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Image -->
            <div class="relative aspect-video bg-black">
                <template x-for="(slide, index) in slides" :key="index">
                    <img
                        x-show="currentSlideIndex === index + 1"
                        x-transition.opacity.duration.300ms
                        class="absolute inset-0 w-full h-full object-contain object-center"
                        :src="slide.imgSrc"
                        :alt="slide.imgAlt">
                </template>
            </div>

            <!-- Next Button -->
            <button @click.stop="next" class="absolute right-4 top-1/2 transform -translate-y-1/2 z-20">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Close Button -->
            <button @click="modalIsOpen = false" class="absolute top-4 right-4 text-white text-xl font-bold">
                &times;
            </button>
        </div>
    </div>
</div>

