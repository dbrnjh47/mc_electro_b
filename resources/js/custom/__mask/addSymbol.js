$(".__mask_add_symbol").on("input", function (e)
{
    let original_val = this.value;
    let cursor = this.selectionStart;

    //
    let symbol = ($(this).data('add-symbol') ? $(this).data('add-symbol') : "@");
    let text = $(this).val();

    if (text != '' && text[0] != symbol)
    {
        $(this).val(symbol + text);

        let cursor_position = cursor + (this.value.length - original_val.length);
        this.setSelectionRange(cursor_position, cursor_position);
    }

});
