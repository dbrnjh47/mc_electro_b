import "./index.scss";

$(".copy_button").click(function () {
    copyToClipboard(this);
});

function copyToClipboard(obj) {
    obj = $(obj);
    let textToCopy = (obj.data("copy-text") !== undefined ? obj.data("copy-text") : obj.text());
    copyText(textToCopy);

    miniAlert("Текст успешно скопирован");
}

function copyText(text)
{
    const $temp = $('<input>');
    $("body").append($temp);

    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
}
