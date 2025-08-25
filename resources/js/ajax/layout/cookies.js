let cookies_conteiner = $(".cookies_conteiner");

cookies_conteiner.find("button").click(function () {
    $.ajax({
        url: window.routes["cookie.agreement"],
        type: "POST",
        success: function () {
            cookies_conteiner.remove();
        },
        error: function (msg) {
        }
    });
});
