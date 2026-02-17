<div class="cart__item_wrapper">
    <div class="cart_block_shipping_method__title">
        <h3>Где и как вы хотите получить заказ?</h3>
        <p>Ваш город: <span class="standart_a">{{ $user_city ? $user_city->name : 'Россия' }}</span></p>
    </div>

    <div class="cart_block_shipping_method">
        <div class="cart_block_shipping_method__info">
            <div class="modal__input_wrapper">
                <h4>Способ получения</h4>
                <select data-delivery-id="{{ $cart->delivery_method_id }}" class="select2_custom" id="cart_shipping_method" data-placeholder="Выбрать">
                    {{-- <option value="" selected disabled>Выбрать</option> --}}
                    <option></option>
                    @foreach ($delivery_methods as $delivery_method)
                        <option value="{{ $delivery_method->id }}" @if ($delivery_method->id == $cart->delivery_method_id) selected @endif>
                            {{ $delivery_method->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="modal__input_wrapper" @if (!$current_delivery) style="display: none;" @endif
                id="shipping_method_info">
                @if ($current_delivery)
                    @switch($current_delivery["slug"])
                        @case('pickup')
                            <h4>Выбранный пункт самовывоза</h4>
                            <p>{{ $current_delivery->default_point->address }}</p>
                            <span>{{ $current_delivery->default_point->operating_mode }}</span>
                            <button class="btn" data-delivery-id="{{ $current_delivery->id }}" onclick="window.getDeliveryModal(this.dataset.deliveryId);">Изменить точку</button>
                        @break
                        @case('courier')
                            <h4>Выбранный адресс</h4>
                            <p>{{ $cart->address }}</p>
                            <span></span>
                            <button class="btn" data-delivery-id="{{ $current_delivery->id }}" onclick="window.getDeliveryModal(this.dataset.deliveryId);">Изменить адресс</button>
                        @break
                    @endswitch
                @else
                    <h4></h4>
                    <p></p>
                    <span></span>
                    <button class="btn" style="display: none" onclick="window.getDeliveryModal(this.dataset.deliveryId);"></button>
                @endif
            </div>
        </div>
        <div class="cart_block_shipping_method__map" id="cart_map"></div>
    </div>
</div>
