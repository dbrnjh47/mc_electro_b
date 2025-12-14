// Select2 CSS va JS
import 'select2/dist/css/select2.min.css';
import 'select2/dist/js/select2.min.js';
import './select2.scss'
import './select2-searchInputPlaceholder.js';


$.fn.select2.defaults.set("minimumResultsForSearch", "Infinity");
$.fn.select2.defaults.set("width", "element");

$(document).ready(function () {
    readySelect2($('.select2_custom:not(.off_select2)'));
});

window.readySelect2 = function (obj, d = null) {
    if (!d) {
        d = getDataSelect2();
    }
    obj.select2(d);
};

window.getDataSelect2 = function () {
    let d = {
        // placeholder: "Выбрать",
        searchInputPlaceholder: "Найти...", // data-search-input-placeholder=""
        language: {
            //https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/en.js
            noResults: function (query) {
                return 'Ничего не найдено.';
            },
            searching: function () {
                return "Поиск...";
            },
            inputTooShort: function (args) {
                var remainingChars = args.minimum - args.input.length;

                var message = 'Пожалуйста, введите ' + remainingChars + ' или более символов';

                return message;
            },
            errorLoading: function () {
                return 'Результат не может быть загружен.';
            },
            loadingMore: function () {
                return 'Загружаем ещё…';
            },
        }
    };

    return d;
}

window.setAjaxDataSelect2 = function (d, post_url) {
    d["ajax"] = {
        url: post_url,
        type: "POST",
        dataType: 'json',
        delay: 300,
        cache: true,
        data: function (params) {
            var query = {
                search: params.term,
                page: params.page || 1,
            }

            // Query parameters will be ?search=[term]&page=[page]
            return query;
        },
    };

    d["processResults"] = function (data, params) {
        params.page = params.page || 1;

        console.log(data.results);
        return {
            results: data.results,
            pagination: {
                more: data.next ? true : false
            }
        };
    };
    d["cache"] = true;
    return d;
}
