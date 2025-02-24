import "/resources/scss/landing/companies.scss";


var companies_slider = new Swiper("#companies_slider", {
    modules: [SwiperAutoplay, SwiperMousewheel, SwiperGrid],
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    // loopAddBlankSlides: true,
    // loop: 1,

    mousewheel: true,
    slidesPerView: "auto",
    slidesPerGroup: 1,
    // centeredSlides: 1,
    grid: {
        fill: 'row',
        rows: 2,
      },
    grabCursor: 1,
    spaceBetween: 15,
    keyboard: {
        enabled: 1
    },
    breakpoints: {
        600: { slidesPerGroup: 2, },
    }
});