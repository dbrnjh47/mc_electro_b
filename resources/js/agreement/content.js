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

window.dop_menu__open_buttons.on("click", function (e) {
    let block = $(".content__head.content__target");
    block.addClass('activ');
    block.siblings('.content__menu').slideDown();
});

//

$(".content a").click(function() {
    if(window.innerWidth <= 650)
    {
        dopMenuClose();
    }
});
