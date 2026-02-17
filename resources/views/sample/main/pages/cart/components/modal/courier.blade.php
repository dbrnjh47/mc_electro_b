<div class="modal modal_courier" id="modal_shipping">
    <div class="modal__content">
        <div class="modal__header">
            <h2>{{ $delivery_method->title }}</h2>
            <button class="modal__close__btn modal_close"></button>
        </div>
        <div class="modal__body">
            <div class="modal_shipping__info">
                <p class="modal_shipping__info_desc">Условия доставки согласовываются с менеджером при подтверждении
                    заказа.</p>
                <div class="modal__input_wrapper">
                    <label for="modal_shipping_city">Город</label>
                    <input name="city" @if($cart->courier) value="{{ $cart->courier->city }}" @endif type="text" placeholder="Введите город" class="modal__input"
                        id="modal_shipping_city">
                </div>
                <div class="modal__input_wrapper">
                    <label for="modal_shipping_street">Улица</label>
                    <input name="street" @if($cart->courier) value="{{ $cart->courier->street }}" @endif type="text" placeholder="Введите улицу" class="modal__input"
                        id="modal_shipping_street">
                </div>
                <div class="modal__input_wrapper">
                    <label for="modal_shipping_house">Дом</label>
                    <input name="house" @if($cart->courier) value="{{ $cart->courier->house }}" @endif type="text" placeholder="Введите номер дома" class="modal__input"
                        id="modal_shipping_house">
                </div>
                <div class="modal__input_wrapper">
                    <label for="modal_shipping_apartment">Квартира</label>
                    <input name="apartment" @if($cart->courier) value="{{ $cart->courier->apartment }}" @endif type="text" placeholder="Введите номер квартиры" class="modal__input"
                        id="modal_shipping_apartment">
                </div>
                <button class="btn">Подтвердить</button>
            </div>
        </div>
    </div>
</div>
