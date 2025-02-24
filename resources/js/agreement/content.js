import '/resources/scss/agreement/content.scss';
import '/resources/js/custom/dop_menu/index.js';

let target = $(".content__target");
target.click(function() {
    if ($(this).hasClass('activ')) {
        $(this).removeClass('activ');
        $(this).siblings('.content__menu').slideUp();
    } else {
        $(this).addClass('activ');
        $(this).siblings('.content__menu').slideDown();
    }
});

//

$(".content a").click(function() {
    if(window.innerWidth <= 650)
    {
        dopMenuClose();
    }
});