let product_review_list = $(".product_menu_block__reviews_list");
let product_review_select_sort_wrapper = $("#select2_product_menu_block__reviews_sort");

let product_review_page = 1;
let is_get_product_review = 1;

product_review_list.on('scroll', function() {
    let $this = $(this);
    let is_end = $this[0].scrollHeight - $this.scrollTop() === $this.outerHeight();

    if (is_end) {
        getProuctReviews();
    }
});


function getProuctReviews()
{
    if(!is_get_product_review){return;}
    console.log("получаем отзывы");

    $.ajax({
        url: window.routes["product.information.review.get"],
        type: "GET",
        data: {
            "page": product_review_page,
            "product_id": product_id,
            "sort": product_review_select_sort_wrapper.find("select").val()
        },
        success: function (results) {
            product_review_page++;
            console.log(results);
        },
        error: function (msg) {
            is_get_product_review = 0;
            console.log("error");
        }
    });
}
