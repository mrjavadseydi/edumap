const myCarousel = new Carousel(document.querySelector("#myCarousel"), {
    preload: 1
});

Fancybox.assign('[data-fancybox="carousel-gallery"]', {
    closeButton: "top",
    Thumbs: false,
    Carousel: {
        Dots: true,
        on: {
            change: (that) => {
                myCarousel.slideTo(myCarousel.getPageforSlide(that.page), {
                    friction: 0
                });
            }
        }
    }
});