new Swiper(".slider", {
  slidesPerView: 2,
  spaceBetween: 15,

  breakpoints: {
    768: {
      slidesPerView: 5,
    },
    600: {
      slidesPerView: 4,
    },
    480: {
        slidesPerView:3
    }
  },
});
