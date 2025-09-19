
window.getCategories = function()
{
    openCategoryMenu();
    if(!window.dataCategories)
    {
        $.ajax({
            url: window.routes["categories.list"],
            type: "POST",
            success: function (list) {
                console.log(list);

                window.dataCategories = list;
                startMenuCategories();
            },
            error: function (msg) {
            }
        });
    }
}
