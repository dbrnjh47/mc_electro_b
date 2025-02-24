import "/resources/scss/product/product_similar_slider.scss";

new Swiper("#similar_slider", {
    modules: [SwiperNavigation, SwiperMousewheel, SwiperAutoplay],
    // autoplay: {
    //     delay: 2000,
    //     disableOnInteraction: false,
    //     pauseOnMouseEnter: true,
    // },
    slidesPerView: "auto",
    mousewheel: true,
    freeMode: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});