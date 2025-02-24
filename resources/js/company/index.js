import "/resources/scss/company/index.scss";

import "/resources/js/custom/swiper/swiper.js";
import "/resources/js/custom/slide_menu/index.js";

new Swiper("#company_info__slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    modules: [SwiperPagination, SwiperMousewheel],
    mousewheel: true,
    pagination: {
      el: ".swiper-pagination",
    },
  });