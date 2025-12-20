import Typed from 'typed.js';

let input = $(".header__search_input");
let wrapper = $(".header__search");
let menu = $(".header__search_dropdown");
let hideElement = $(".header__catalog__button, .header__button");
let timerId = null;

input.click(function () {
    if(window.innerWidth > 550){
        wrapper.addClass("show");
        menu.slideDown();
        if(window.innerWidth > 1050){
            hideElement.hide();
        }

        clearTimeout(timerId);
    }
});

$(document).click(function (event) {
    if (!$(event.target).closest('.header__search').length) {
        close();
    }
});

function close() {
    wrapper.removeClass("show");
    menu.slideUp();

    timerId = setTimeout(function tick() {
        if(window.innerWidth > 1050){
            hideElement.show();
        }

    }, 400);
}

// https://github.com/mattboldt/typed.js
if(window.innerWidth > 550){
const typed = new Typed('.header__search_input input', {
    strings: window.search_strings,
    typeSpeed: 50,
    backSpeed: 50,
    attr: 'placeholder',
    bindInputFocusEvents: true,
    loop: true
});
}

input.find("input").change(function() {
    let val = $(this).val();
    if(val != "" && val.length > 1)
    {
        window.location.href = window.routes["search"]+"?search="+val;
    }
});
