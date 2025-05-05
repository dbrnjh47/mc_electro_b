console.log("contacts_search");
let contacts_search = $("#contacts_search");
let contacts_timer;

contacts_search.on('input', function() {
    clearTimeout(contacts_timer);
    contacts_timer = setTimeout(updateContacts, 500);
});

function getDataContacts() {
    return {
        "search": contacts_search.val()
    };
}

function updateContacts() {
    console.log("start");
    let louder = getLouder();
    $(".contacts__content").append(louder);
    //

    let data = getDataContacts();

    console.log(data);
    $.ajax({
        url: window.routes["contacts.block"],
        type: "POST",
        data: data,
        success: function (results) {
            console.log(results);
            $(".contacts__content").replaceWith(results[0]);
            $(".pagination").html(results[1]);

            setURL(data);
            distroyLouder();
        },
        error: function (msg) {

        }
    });
}
