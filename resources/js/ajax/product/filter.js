let product_page = 1;
let sort_select = $('select[name="product_sort"]');
let search_input = $('.filter input[name="search"]');

window.getProuctFilter = function()
{
    $(".pagination__wrapper, .product_card, .product_feedback_card").addClass("skeleton");
    $.ajax({
        url: window.routes["product.filter"],
        type: "POST",
        data: getDataProducts(),
        success: function (result) {
            $(".products_list").find(".product_card").remove();
            $(".products_list").prepend(result["products"]);
            $(".pagination__wrapper").html(result["paginate"]);

            $(".product_feedback_card, .pagination__wrapper").removeClass("skeleton");
            setEventProductPaginate();
            window.setWishlistEvent();
        },
        error: function (msg) {
            // is_get_product_review = 0;
            // console.log("error");
        }
    });
}

function getDataProducts() {
    return {
        "page": product_page,
        "category_ids": category_ids,
        "sort" : sort_select.val(),
        "category_slug": category_slug,
        "search": search_input.val()
    };
}

function setEventProductPaginate()
{
    $(".pagination__wrapper a").on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        product_page = $(this).attr("title");
        window.getProuctFilter();

        return false; // Альтернатива preventDefault + stopPropagation
    });
}


//

sort_select.on('change', function() {
    window.getProuctFilter();
});


search_input.change(function() {
    product_page = 1;
    window.getProuctFilter();
});
