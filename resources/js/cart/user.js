import '/resources/js/custom/__mask/int.js';
import '/resources/js/custom/__mask/addSymbol.js';

let phone_input = $("#cart_phone");
let name_input = $("#cart_name");

phone_input.change(function() {
    let obj = $(this);
    window.cart["phone"] = obj.val();
});

name_input.change(function() {
    let obj = $(this);
    window.cart["name"] = obj.val();
});
