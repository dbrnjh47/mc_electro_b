$(".__mask_int").on("input", function (e) {
    var text = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(text);
});
