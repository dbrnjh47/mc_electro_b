$(".__mask_add_symbol").on("input", function (e)
{
    var symbol = ($(this).data('add-symbol') ? $(this).data('add-symbol') : "@");
    var text = $(this).val();

    if (text != '' && text[0] != symbol)
    {
        $(this).val(symbol + text);
    }
});
