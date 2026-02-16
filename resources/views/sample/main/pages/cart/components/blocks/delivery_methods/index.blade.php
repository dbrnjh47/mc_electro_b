<div class="cart__item_wrapper">
    <div class="cart_block_shipping_method__title">
        <h3>Где и как вы хотите получить заказ?</h3>
        <p>Ваш город: <span class="standart_a">{{ ($user_city ? $user_city->name : "Россия") }}</span></p>
    </div>

    <div class="cart_block_shipping_method">
        <div class="cart_block_shipping_method__info">
            <div class="modal__input_wrapper">
                <h4>Способ получения</h4>
                <select class="select2_custom" id="cart_shipping_method">
                    @foreach ($delivery_methods as $delivery_method)
                        <option value="{{ $delivery_method->id }}">{{ $delivery_method->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="modal__input_wrapper" id="shipping_method_info">
                <h4>Выбранный пункт самовывоза</h4>
                <p>Город, улица,дом , строение</p>
                <span>пн. - вс. : с 10:00 до 20:00</span>
                <button class="btn">Изменить адресс</button>
            </div>
        </div>
        <div class="cart_block_shipping_method__map" id="cart_map"></div>
    </div>
</div>
