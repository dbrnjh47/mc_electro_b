let contacts_wrapper = $(".contacts");
let contacts_search = contacts_wrapper.find("#contacts_search");
let contacts_timer;
let contacts_filter = contacts_wrapper.find('select[name="city_id"]');


contacts_search.on('input', function() {
    clearTimeout(contacts_timer);
    contacts_timer = setTimeout(updateContacts, 500);
});

contacts_filter.on('change', function() {
    clearTimeout(contacts_timer);
    updateContacts();
});

function getDataContacts() {
    return {
        "search": contacts_search.val(),
        "city_id": contacts_filter.val()
    };
}

function updateContacts() {
    console.log("start");
    // let louder = getLouder();
    // $(".contacts__content").append(louder);
    $(".contacts__content>*").addClass("skeleton");
    contacts_wrapper.find(".pagination__container").addClass("skeleton");
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
            // distroyLouder();
            startSliderContact();
            $(".contacts__content>*").removeClass("skeleton");
        },
        error: function (msg) {

        }
    });
}
