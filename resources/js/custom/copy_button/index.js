import "./index.scss";

$(".copy_button").click(function () {
    copyToClipboard(this);
});

function copyToClipboard(obj) {
    const $temp = $('<input>');
    $("body").append($temp);

    obj = $(obj);
    let textToCopy = (obj.data("copy-text") !== undefined ? obj.data("copy-text") : obj.text());
    $temp.val(textToCopy).select();
    document.execCommand("copy");
    $temp.remove();
}
