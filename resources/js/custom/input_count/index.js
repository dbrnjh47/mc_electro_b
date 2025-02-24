import "./index.scss";

let input_count_reduce = $("#input_count_reduce");
let input_count_add = $("#input_count_add");
let input_count = $("#input_count");

input_count_add.click(function () {
    inputCountAdd(1);
});

input_count_reduce.click(function () {
    inputCountAdd(-1);
});

function inputCountAdd(n) {  
    let current = Number(input_count.val());
    let result = (current + n);
    if(result < 1){
        result = 1;
    }
    input_count.val(result);
}

input_count.on("input", function (e) {
    var text = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(text);
});