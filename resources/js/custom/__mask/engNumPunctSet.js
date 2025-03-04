$(".__mask_eng_num_punct_set").on("input", function (e)
{
    let original_val = this.value;
    let cursor = this.selectionStart;

    //
    var text = $(this).val();
    text = text.replace(/[^a-zA-Z0-9@_-]/g, '');
    $(this).val(text);
    //

    let cursor_position = cursor + (this.value.length - original_val.length);
    this.setSelectionRange(cursor_position, cursor_position);
});
