import '/resources/scss/layout/menu_categories.scss';

let burgerCategoryMenu = $(".menu_categories__main");
let burgerCategoryMenuBG = $(".menu_categories__bg");
let menuCategoriesListButtons = $(".menu_categories__list_button");
let menuCategoriesListBasics = $(".menu_categories__list_items_wrapper .menu_categories__list_basic");
let menuCategoriesSecond = $(".menu_categories__second");
let menuCategoriesButton  = $(".menu_categories__list>.menu_categories__list_basic");
window.dataCategories = {
    1 : {
        "title" : "test1",
        "href" : "/fin",
        "categories" : [
            {
                "title" : "test1",
                "href" : "/test1"
            },
            {
                "title" : "test2",
                "href" : "/test2"
            },
            {
                "title" : "test3",
                "href" : "/test3"
            },
            {
                "title" : "test4",
                "href" : "/test4"
            },
            {
                "title" : "test5",
                "href" : "/test5"
            },
        ]
    },
    2 : {
        "title" : "тест",
        "href" : "/fin2",
        "categories" : [
            {
                "title" : "тест1",
                "href" : "/test1"
            },
           
        ]
    },
    3 : {
        "title" : "тест",
        "href" : "/fin3",
        "categories" : [
            {
                "title" : "тест1",
                "href" : "/test1"
            },
           
        ]
    },
    4 : {

    },
    5 : {

    },
};
window.openCategoryMenu = function()
{
    burgerCategoryMenu.css("display", "block");
    setTimeout(function() {
        burgerCategoryMenu.addClass("activ");
    }, 100);
    burgerCategoryMenuBG.fadeIn(300);
}

menuCategoriesListButtons.click(function (event) {
    $(this).fadeOut(0);
    let height = $(this).closest(".menu_categories__list").find(".menu_categories__list_items")[0].scrollHeight;
    $(this).closest(".menu_categories__list").find(".menu_categories__list_items").css("max-height", height);
});

menuCategoriesListBasics.mouseenter(function(){
    setCategories(this);
});

function setCategories(obj) {  
    menuCategoriesListBasics.removeClass("activ");
    $(obj).addClass("activ");
    let categoriesId = $(obj).data("id");

    let category = dataCategories[categoriesId];
    menuCategoriesSecond.css("display", "block");
    setTimeout(function() {
        menuCategoriesSecond.addClass("activ");
    }, 100);
    menuCategoriesSecond.find(".menu_categories__second_title").text(category["title"]).attr("href", category["href"]);
    
    let h = "";

    category["categories"].forEach(c => {
        h += `<a href="`+c["href"]+`" class="menu_categories__second_item">`+c["title"]+`</a>`;
    });
    menuCategoriesSecond.find(".menu_categories__second_list").html(h);
    console.log(dataCategories);
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