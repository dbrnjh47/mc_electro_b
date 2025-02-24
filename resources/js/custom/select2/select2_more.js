import './select2_more.scss'
import './select2_sample_more.scss'

$(document).ready(function () {
    $(".select2_more select.select2_custom").on("select2:close", function (e) { 
        let obj = $(this);
        let value = obj.val();
        let option = obj.find("option:selected");
        let list = obj.closest(".select2_more").find(".select2_more__list");

        if (!value || value == "") {
            return;
        }

        list.append(`
            <div onclick="select2DeliteItemMore(this);" class="select2_more__item" data-value="` + value + `">
                <svg  width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.85799 0L13 11.1429L11.143 13L0.00099164 1.85714L1.85799 0Z" fill="#DE002B"/>
                <path d="M11.142 0L0 11.1429L1.857 13L12.999 1.85714L11.142 0Z" fill="#DE002B"/>
                </svg>
                ` + option.text() + `
            </div>
        `);

        obj.select2('destroy');
        option.remove();
        readySelect2(obj);
     });
});

window.select2DeliteItemMore = function (obj) {
    obj = $(obj);
    let item = obj;
    let select = obj.closest(".select2_more").find("select");

    select.append('<option value="' + item.data("value") + '">' + item.text() + '</option>');
    select.select2('destroy');
    readySelect2(select);
    item.remove();
}