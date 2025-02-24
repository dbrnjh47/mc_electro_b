
$('.__mask_limited_input').on('input', function() {
    var maxCount = 1; // Максимальное количество символов "/"
    var text = $(this).val();
    var count = (text.match(/\@/g) || []).length; // Подсчет количества символов "/"
    if (count > maxCount) {
        // Удаление лишних символов "/"
        var newText = text.replace(/\@/g, (_, i) => i < maxCount ? "@" : "");
        $(this).val(newText);
    }
});

