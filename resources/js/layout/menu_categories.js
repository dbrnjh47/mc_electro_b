import '/resources/scss/layout/menu_categories.scss';
import '/resources/js/ajax/layout/categories.js';

let burgerCategoryMenu = $(".menu_categories__main");
let burgerCategoryMenuBG = $(".menu_categories__bg");
let menuCategoriesListButtons = $(".menu_categories__list_button");
let menuCategoriesListBasics = $(".menu_categories__list_items_wrapper .menu_categories__list_basic");
let menuCategoriesSecond = $(".menu_categories__second");
let menuCategoriesButton  = $(".menu_categories__list>.menu_categories__list_basic");

window.dataCategories = null;

window.startMenuCategories = function()
{
    let h = `
        <div class="menu_categories__list_items_wrapper">
            <div class="menu_categories__list_items">
    `;

    window.dataCategories.forEach((c, i) => {
        if(c["child_categories"].length === 0)
        {
            h += `
            <a href="`+window.routes["category"]+"/"+c["slug"]+`" class="menu_categories__list_basic menu_categories__item">
                <p>`+c["name"]+` <span>`+(c["products_count"] ? "("+c["products_count"]+")" : "")+`</span></p>
            </a>
        `;
        } else {
            h += `
            <div class="menu_categories__list_basic menu_categories__item" data-id="`+i+`">
                <p>`+c["name"]+` <span>`+(c["products_count"] ? "("+c["products_count"]+")" : "")+`</span></p>
                <img src="/temple/images/layout/menu_categories/str.svg" alt="str" loading="lazy" decoding="async">
            </div>
        `;
        }
    });

    h += `
            </div>
            <!-- <button class="menu_categories__list_button">Показать еще 5</button> -->
        </div>
    `;

    burgerCategoryMenu.find(".menu_categories__list").append(h);

    // установка евентов
    setEventMenuCategoriesListBasics();
    burgerCategoryMenu.removeClass('skeleton');
}

//

window.openCategoryMenu = function()
{
    burgerCategoryMenu.css("display", "block");
    setTimeout(function() {
        burgerCategoryMenu.addClass("activ");
    }, 100);
    burgerCategoryMenuBG.fadeIn(300);
}

// menuCategoriesListButtons.click(function (event) {
//     $(this).fadeOut(0);
//     let height = $(this).closest(".menu_categories__list").find(".menu_categories__list_items")[0].scrollHeight;
//     $(this).closest(".menu_categories__list").find(".menu_categories__list_items").css("max-height", height);
// });

function setEventMenuCategoriesListBasics()
{
    menuCategoriesListBasics = $(".menu_categories__list_items_wrapper .menu_categories__list_basic");
    menuCategoriesListBasics.mouseenter(function(){
        setCategory(this);
    });
}


function setCategory(obj) {
    menuCategoriesListBasics.removeClass("activ");
    $(obj).addClass("activ");

    let categoriesId = $(obj).data("id");
    // console.log(categoriesId);
    if(categoriesId === undefined)
    {
        closeMenuSecendCategories();
        return;
    }

    let category = dataCategories[categoriesId];
    let href = window.routes["category"]+"/"+category["slug"];
    // console.log(category);

    menuCategoriesSecond.css("display", "block");
    setTimeout(function() {
        menuCategoriesSecond.addClass("activ");
    }, 100);
    menuCategoriesSecond.find(".menu_categories__second_title").text(category["name"]).attr("href", href);

    let h = "";

    category["child_categories"].forEach(c => {
        h += `<a href="`+(href+"/"+c["slug"])+`" class="menu_categories__second_item">`+c["name"]+` <span>`+(c["products_count"] ? "("+c["products_count"]+")" : "")+`</span></a>`;
    });
    menuCategoriesSecond.find(".menu_categories__second_list").html(h);
    // console.log(dataCategories);
}

//

menuCategoriesButton.click(function (event) {
    let fater = $(this).closest(".menu_categories__list");
    if(fater.hasClass("activ"))
    {
        fater.removeClass("activ");
        fater.find(".menu_categories__list_items_wrapper").slideUp();
    } else {
        fater.addClass("activ");
        fater.find(".menu_categories__list_items_wrapper").slideDown();
    }
});

$(".menu_categories__close").click(function (event) {
    closeMenuCategories();
});

$(".menu_categories__back").click(function (event) {
    closeMenuSecendCategories();
});

function closeMenuCategories() {
    closeMenuSecendCategories();

    setTimeout(function() {
        burgerCategoryMenu.removeClass("activ");
        burgerCategoryMenuBG.fadeOut(300);

        menuCategoriesSecond.css("display", "none");

        setTimeout(function() {
            burgerCategoryMenu.css("display", "none");
        }, 100);
    }, 300);
}

function closeMenuSecendCategories() {
    menuCategoriesSecond.removeClass("activ");
}
