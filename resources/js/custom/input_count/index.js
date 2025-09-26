import "./index.scss";

let input_count_reduce_items = $(".input_count_reduce");
let input_count_add_items = $(".input_count_add");
let input_count_items = $(".input_count__input");

input_count_add_items.click(function () {
    inputCountAdd(1, $(this));
});

input_count_reduce_items.click(function () {
    inputCountAdd(-1, $(this));
});

function inputCountAdd(n, obj) {
    let input_count = obj.closest(".input_count").find(".input_count__input");
    let current = Number(input_count.val());
    let result = (current + n);
    if(result < 1){
        result = 1;
    }
    input_count.val(result);
}

input_count_items.on("input", function (e) {
    var text = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(text);
});
