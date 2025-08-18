import "/resources/scss/product/product_menu_blocks/blocks/reviews.scss";


window.startReviewsMiniatureSlider = function() {
    return new Swiper(".product_menu_block__reviews_slider", {
        modules: [SwiperNavigation, SwiperMousewheel],
        slidesPerView: "auto",
        mousewheel: true,
        slidesPerGroup: 5,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

startReviewsMiniatureSlider();

//

$(".product_menu_block__reviews_menu button").click(function () {
    let obj = $(this);
    let wrapper = obj.closest(".product_menu_block__reviews_item");

    wrapper.find(".product_menu_block__reviews_menu button").removeClass("activ");
    wrapper.find(".product_menu_block__reviews_text").slideUp();

    wrapper.find('.product_menu_block__reviews_text[data-type="'+obj.data("type")+'"]').slideDown();
    obj.addClass("activ");
});
