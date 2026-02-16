<div class="cart_block_recipient__wrapper cart__item_wrapper">
    <h3>Укажите данные поулчателя заказа</h3>
    <div class="cart_block_recipient">
        <div>
            <select class="select2_custom">
                <option value="individual" selected>Физическое лицо</option>
                <option value="legal" disabled>Юредическое лицо</option>
            </select>
        </div>

        <div>

        </div>

        <div class="modal__input_wrapper">
            <div>
                <label for="cart_phone">Номер телефона</label>
            </div>
            <input type="text" id="cart_phone" class="modal__input __mask_int __mask_add_symbol" data-add-symbol="+" name="p"
                @auth value="{{ $u->phone }}" @endauth
                placeholder="Введите номер телефона">
        </div>

        <div class="modal__input_wrapper">
            <div>
                <label for="cart_name">Имя и фамилия</label>
            </div>
            <input type="text" id="cart_name" class="modal__input" name="p"
                @auth value="{{ $u->name }}" @endauth
                placeholder="Введите имя и фамилия">
        </div>
    </div>

</div>

@vite('resources/js/cart/user.js')
