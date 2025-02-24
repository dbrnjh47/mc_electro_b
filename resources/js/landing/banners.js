import "/resources/scss/landing/banners.scss";

var swiper2 = new Swiper("#main_banners", {
    modules: [SwiperNavigation, SwiperAutoplay, SwiperScrollbar, SwiperMousewheel],
    // autoplay: {
    //     delay: 2000,
    //     disableOnInteraction: false,
    //     pauseOnMouseEnter: true,
    // },
    mousewheel: true,
    slidesPerView: "auto",
    // centeredSlides: 1,
    grabCursor: 1,
    spaceBetween: 20,
    keyboard: {
        enabled: 1
    },
    scrollbar: {
        el: ".swiper-scrollbar"
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: 1
    },
});