// https://yandex.ru/dev/jsapi-v2-1/doc/ru/v2-1/dg/concepts/geocoding/searchControl

let cart_map = $("#cart_map");
let customerLocation = {
    lat: 55.160283,
    lon: 61.400856
};
let myPlacemark, myMapClusterer;
window.myMap = null;

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
    var mySearchControl = new ymaps.control.SearchControl({
        options: {
            // Пусть элемент управления будет в виде поисковой строки.
            size: 'large',
            // Включим возможность искать не только топонимы, но и организации.
            provider: 'yandex#map',
            // Отключить создание метки
            noPlacemark: true,
            // noPopup: true,
            // noSuggestPanel: true
        }
    });

    // Создаем карту
    window.myMap = new ymaps.Map("cart_map", {
        center: [customerLocation.lat, customerLocation.lon],
        // Коэффициент масштабирования (чем больше, тем ближе)
        zoom: 14,
        // Дополнительные опции
        controls: ['zoomControl', 'typeSelector'], // элементы управления
    }, {
        // searchControlProvider: 'yandex#search',
    });
    var myMapClusterer = new ymaps.Clusterer({
        clusterBalloonContentLayout: "cluster#balloonAccordion",
        preset: "islands#redClusterIcons"
    });

    myMapClusterer.options.set({
        gridSize: 50
    });
    // window.myMap.controls.add(mySearchControl);
    createOrUpdatePlacemark([customerLocation.lat, customerLocation.lon]);
}

function createOrUpdatePlacemark(coords) {
    // Если метка уже создана – просто передвигаем ее.
    if (myPlacemark) {
        myPlacemark.geometry.setCoordinates(coords);
    }
    // Если нет – создаем.
    else {
        myPlacemark = createPlacemark(coords);
        window.myMap.geoObjects.add(myPlacemark);
    }
}

function createPlacemark(coords) {
    return new ymaps.Placemark(coords, {
        iconCaption: 'Поиск...'
    }, {
        preset: 'islands#redDotIconWithCaption',
        draggable: false
    });
}
