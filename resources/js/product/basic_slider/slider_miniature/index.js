import "./index.scss";

export default function startMiniatureSlider() {
    return new Swiper("#product_basic_slider_miniature", {
        modules: [SwiperNavigation, SwiperMousewheel],
        slidesPerView: "auto",
        mousewheel: true,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        spaceBetween: 10,
        slidesPerGroup: 5,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        direction: "horizontal",
        breakpoints: {
            600: { direction: "vertical" },
        }
    });
}