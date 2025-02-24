import "./index.scss";

export default function startBasicSlider(swiper) {
    return new Swiper("#product_basic_slider", {
        modules: [SwiperNavigation, SwiperMousewheel, SwiperThumbs, SwiperAutoplay],
        // autoplay: {
        //     delay: 2000,
        //     disableOnInteraction: false,
        //     pauseOnMouseEnter: true,
        // },
        spaceBetween: 20,
        mousewheel: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
}