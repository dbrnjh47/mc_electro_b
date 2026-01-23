<div class="modal modal_shipping modal_courier" id="modal_shipping">
    <div class="modal__content">
        <div class="modal__header">
            <h2>Доставка</h2>
            <button class="modal__close__btn modal_close"></button>
        </div>
        <div class="modal__body">
            <div class="modal_courier__info">
                <h6>Челябинск</h6>
                <p class="modal_shipping__info_desc">8 магазинов</p>
                <input type="text" placeholder="Введите адресс" class="modal__input">
                <div class="modal_courier__list">

                    <div class="modal_courier__item" data-key="0">
                        <div class="modal_courier__item_info">
                            <p class="modal_courier__item_info_address">ул. Полярная, 57</p>
                            <p>пн-пт 9:00-18:00</p>
                            <p>сб-вс 9:00-17:00</p>
                            <p class="modal_courier__item_info_status green">Полное наличие</p>
                        </div>
                        <button class="btn">Выбрать</button>
                    </div>


                    <div class="modal_courier__item activ" data-key="0">
                        <div class="modal_courier__item_info">
                            <p class="modal_courier__item_info_address">ул. Полярная, 57</p>
                            <p>пн-пт 9:00-18:00</p>
                            <p>сб-вс 9:00-17:00</p>
                            <p class="modal_courier__item_info_status orange">Частичное наличие (1 из 2)<br>
                                <span>Возможно перемещение</span>
                            </p>
                        </div>
                        <button class="btn">Выбран!</button>
                    </div>


                    <div class="modal_courier__item" data-key="0">
                        <div class="modal_courier__item_info">
                            <p class="modal_courier__item_info_address">ул. Полярная, 57</p>
                            <p>пн-пт 9:00-18:00</p>
                            <p>сб-вс 9:00-17:00</p>
                            <p class="modal_courier__item_info_status red">Возможно перемещение</p>
                        </div>
                        <button class="btn">Выбрать</button>
                    </div>

                    <div class="modal_courier__item" data-key="0">
                        <div class="modal_courier__item_info">
                            <p class="modal_courier__item_info_address">ул. Полярная, 57</p>
                            <p>пн-пт 9:00-18:00</p>
                            <p>сб-вс 9:00-17:00</p>
                            <p class="modal_courier__item_info_status green">Полное наличие</p>
                        </div>
                        <button class="btn">Выбрать</button>
                    </div>

                    <div class="modal_courier__item" data-key="0">
                        <div class="modal_courier__item_info">
                            <p class="modal_courier__item_info_address">ул. Полярная, 57</p>
                            <p>пн-пт 9:00-18:00</p>
                            <p>сб-вс 9:00-17:00</p>
                            <p class="modal_courier__item_info_status green">Полное наличие</p>
                        </div>
                        <button class="btn">Выбрать</button>
                    </div>

                    <div class="modal_courier__item" data-key="0">
                        <div class="modal_courier__item_info">
                            <p class="modal_courier__item_info_address">ул. Полярная, 57</p>
                            <p>пн-пт 9:00-18:00</p>
                            <p>сб-вс 9:00-17:00</p>
                            <p class="modal_courier__item_info_status green">Полное наличие</p>
                        </div>
                        <button class="btn">Выбрать</button>
                    </div>
                </div>
            </div>
            <div class="modal_shipping__info" style="display: none;">
                <p class="modal_shipping__info_desc">Условия доставки согласовываются с менеджером при подтверждении
                    заказа.</p>
                <div class="modal__input_wrapper">
                    <label for="modal_shipping_street">Улица</label>
                    <input name="street" type="text" placeholder="Введите улицу" class="modal__input"
                        id="modal_shipping_street">
                </div>
                <div class="modal__input_wrapper">
                    <label for="modal_shipping_home">Дом</label>
                    <input name="home" type="text" placeholder="Введите номер дома" class="modal__input"
                        id="modal_shipping_home">
                </div>
                <div class="modal__input_wrapper">
                    <label for="modal_shipping_apartment">Квартира</label>
                    <input name="apartment" type="text" placeholder="Введите номер квартиры" class="modal__input"
                        id="modal_shipping_apartment">
                </div>
                <button class="btn">Подтвердить</button>
            </div>
            <div class="modal_shipping__map">

            </div>
        </div>
    </div>
</div>


{{-- @vite('resources/js/cart/index.js') --}}
