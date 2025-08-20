let product_review_list = $(".product_menu_block__reviews_list");
let product_review_select_sort_wrapper = $("#select2_product_menu_block__reviews_sort");

let product_review_page = 1;
let is_get_product_review = 1;

product_review_list.on('scroll', function () {
    let $this = $(this);
    let is_end = Math.round($this[0].scrollHeight - $this.scrollTop()) === Math.round($this.outerHeight());
    // console.log("$this.outerHeight()", Math.round($this.outerHeight()));
    // console.log("$this[0].scrollHeight - $this.scrollTop()", Math.round($this[0].scrollHeight - $this.scrollTop()));
    // console.log(is_end);
    if (is_end) {
        getProuctReviews();
    }
});

product_review_select_sort_wrapper.find("select").on('change', function()
{
    clearProductReview();
});

function clearProductReview()
{
    product_review_list.html("");
    is_get_product_review = 1;
    product_review_page = 0;
    getProuctReviews();
}

function getProuctReviews()
{
    if (!is_get_product_review) { return; }
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
            // console.log(results);
            product_review_list.append(results);

            startReviewsMiniatureSlider();
            setEventReviewsMenuButton();
        },
        error: function (msg) {
            is_get_product_review = 0;
            console.log("error");
        }
    });
}
