$(".__mask_eng_num_punct_set").on("input", function (e)
{
    var text = $(this).val();
    text = text.replace(/[^a-zA-Z0-9@_-]/g, '');
    $(this).val(text);
});
