import "/resources/scss/contacts/contact_card.scss";

window.startSliderContact = function() {
    new Swiper(".contact_card__swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true,
        modules: [SwiperPagination, SwiperMousewheel],
        mousewheel: true,
        pagination: {
          el: ".swiper-pagination",
        },
      });
}

startSliderContact();
