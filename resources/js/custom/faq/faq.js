import "./faq.scss";

var faq_list = $(".faq__triger");
var faq_class = "active";
faq_list.on("click", function (e) {
  var is_activ = $(this).hasClass(faq_class);
  faq_list.removeClass(faq_class).find(".faq__result").slideUp();

  if (!is_activ) {
    $(this).addClass(faq_class).find(".faq__result").slideDown();
  }
});