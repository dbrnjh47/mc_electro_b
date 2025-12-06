let product_page = 1;
let product_sort_select = $('select[name="product_sort"]');

window.getProuctFilter = function()
{
    $(".pagination, .product_card, .product_feedback_card").addClass("skeleton");
    $.ajax({
        url: window.routes["product.filter"],
        type: "POST",
        data: getDataProducts(),
        success: function (result) {
            $(".products_list").html(result["products"]);
            $(".pagination").replaceWith(result["paginate"]);

            setEventProductPaginate();
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
        "sort" : product_sort_select.val()
    };
}

function setEventProductPaginate()
{
    $(".pagination a").on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        product_page = $(this).attr("title");
        window.getProuctFilter();

        return false; // Альтернатива preventDefault + stopPropagation
    });
}


//

product_sort_select.on('change', function() {
    window.getProuctFilter();
});
