document.addEventListener('alpine:init', () => {
    Alpine.data('carouselSlides', () => ({
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

    Alpine.data('carouselProducts', () => ({
        products: [],
        currentProductIndex: 0,
        productCount: 3,
        autoplayIntervalTime: 5000,
        autoplayInterval: null,
        isPaused: false,
        initializeProducts() {
            this.products = JSON.parse(this.$el.getAttribute('data-products'));
            this.autoplay();
        },
        previous() {
            if (this.currentProductIndex > 0) {
                this.currentProductIndex = this.currentProductIndex - this.productCount;
            } else {
                // If it's the first set of cards, go to the last set
                this.currentProductIndex = (this.products.length - this.productCount);
            }
        },
        next() {
            if (this.currentProductIndex + this.productCount < this.products.length) {
                this.currentProductIndex = this.currentProductIndex + this.productCount;
            } else {
                // If it's the last set of cards, go to the first set
                this.currentProductIndex = 0;
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
