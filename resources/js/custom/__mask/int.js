$(".__mask_int").on("input", function (e) {
    let original_val = this.value;
    let cursor = this.selectionStart;

    //
    let text = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(text);
    //

    let cursor_position = cursor + (this.value.length - original_val.length);
    this.setSelectionRange(cursor_position, cursor_position);

});
