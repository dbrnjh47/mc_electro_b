import '/resources/scss/profile/orders/index.scss';

$(".profile_orders__line_info_wrapper").click(function (e) {
    let id = $(this).data("id");
    
    if($(this).hasClass("open"))
    {
        closeOrder(id);
    } else {
        openOrder(id);
    }
});

function openOrder(id) {
    $('.profile_orders__list tr[data-id="'+id+'"]').addClass("open");
}

function closeOrder(id) {
    $('.profile_orders__list tr[data-id="'+id+'"]').removeClass("open");
}