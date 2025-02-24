import "./index.scss";
$("body").scroll(function () {
    var header = $(".dop_menu_mob");
    if ($("body").scrollTop() >= ($(".header_two").height() + $(".header_two").scrollTop())) {
        header.addClass("fixed");
    } else {
        header.removeClass("fixed");
    }
});