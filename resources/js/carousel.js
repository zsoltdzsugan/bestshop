document.addEventListener('alpine:init', () => {
    Alpine.data('carouselData', () => ({
        slides: [],
        currentSlideIndex: 1,
        autoplayIntervalTime: 4000,
        autoplayInterval: null,
        isPaused: false,
        initializeSlides() {
            this.slides = JSON.parse(this.$el.getAttribute('data-slides'));
            this.autoplay();
        },
        previous() {
            if (this.currentSlideIndex > 1) {
                this.currentSlideIndex = this.currentSlideIndex - 1;
            } else {
                this.currentSlideIndex = this.slides.length;
            }
        },
        next() {
            if (this.currentSlideIndex < this.slides.length) {
                this.currentSlideIndex = this.currentSlideIndex + 1;
            } else {
                this.currentSlideIndex = 1;
            }
        },
        autoplay() {
            this.autoplayInterval = setInterval(() => {
                if (!this.isPaused) {
                    this.next();
                }
            }, this.autoplayIntervalTime);
        },
        setAutoplayInterval(newIntervalTime) {
            clearInterval(this.autoplayInterval);
            this.autoplayIntervalTime = newIntervalTime;
            this.autoplay();
        },
    }));
});
