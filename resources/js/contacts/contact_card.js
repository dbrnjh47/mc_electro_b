import "/resources/scss/contacts/contact_card.scss";

new Swiper(".contact_card__swiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    modules: [SwiperPagination, SwiperMousewheel],
    mousewheel: true,
    pagination: {
      el: ".swiper-pagination",
    },
  });