// Select2 CSS va JS
import 'select2/dist/css/select2.min.css';
import 'select2/dist/js/select2.min.js';
import './select2.scss'
import './select2-searchInputPlaceholder.js';


$.fn.select2.defaults.set("minimumResultsForSearch", "Infinity");
$.fn.select2.defaults.set("width", "element");

$(document).ready(function () {
  readySelect2($('.select2_custom'));
});

window.readySelect2 = function(obj)
{
  obj.select2({
    placeholder: "Выбрать",
    searchInputPlaceholder: ($(this).data('search-input-placeholder') ? $(this).data('search-input-placeholder') : "Найти..."),
    language: {
      //https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/en.js
      noResults: function (query) {
        return 'Ничего не найдено.';
      },
      searching: function () {
        return "Поиск...";
      },
    }
  });
};