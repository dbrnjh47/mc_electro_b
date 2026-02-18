// https://yandex.ru/dev/jsapi-v2-1/doc/ru/v2-1/dg/concepts/geocoding/searchControl

let cart_map = $("#cart_map");
let cartPlacemark, cartMapClusterer;
window.cartMap = null;

function initMap() {
    try {
        ymaps.ready(init);
    } catch (error) {
        cart_map.html(`
        <div class="basket_loader_error">
            <h1>404</h1>
            <h2>Не удалось загрузить карту</h2>
        </div>`);
    }
}

initMap();

function init() {
    cart_map.html('');
    // Создаем карту
    window.cartMap = new ymaps.Map("cart_map", {
        center: [window.customerLocation.lat, window.customerLocation.lon],
        zoom: 14,
        controls: ['zoomControl', 'typeSelector'],
    }, {
        // searchControlProvider: 'yandex#search',
    });

    var cartMapClusterer = new ymaps.Clusterer({
        clusterBalloonContentLayout: "cluster#balloonAccordion",
        preset: "islands#redClusterIcons"
    });

    cartMapClusterer.options.set({
        gridSize: 50
    });

    window.createOrUpdateCartPlacemark("");
}

window.setCenterCartMap = function(zoom = 16)
{
    window.cartMap.setCenter(
        [
            window.customerLocation.lat,
            window.customerLocation.lon
        ],
        zoom
    );
}

window.createOrUpdateCartPlacemark = function(text) {
    // Если метка уже создана – просто передвигаем ее.
    let coords = [
        window.customerLocation.lat,
        window.customerLocation.lon
    ];

    if (cartPlacemark) {
        cartPlacemark.geometry.setCoordinates(coords);
    }
    // Если нет – создаем.
    else {
        cartPlacemark = createPlacemark(coords);
        window.cartMap.geoObjects.add(cartPlacemark);
    }

    cartPlacemark.properties.set('iconCaption', text);
}

function createPlacemark(coords) {
    return new ymaps.Placemark(coords, {
        iconCaption: 'Поиск...'
    }, {
        preset: 'islands#redDotIconWithCaption',
        draggable: false
    });
}

//


// var mySearchControl = new ymaps.control.SearchControl({
//     options: {
//         // Пусть элемент управления будет в виде поисковой строки.
//         size: 'large',
//         // Включим возможность искать не только топонимы, но и организации.
//         provider: 'yandex#map',
//         // Отключить создание метки
//         noPlacemark: true,
//         // noPopup: true,
//         // noSuggestPanel: true
//     }
// });
// window.cartMap.controls.add(mySearchControl);
