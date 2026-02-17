<div class="modal modal_shipping" id="modal_shipping">
    <div class="modal__content">
        <div class="modal__header">
            <h2>{{ $delivery_method->title }}</h2>
            <button class="modal__close__btn modal_close"></button>
        </div>
        <div class="modal__body">
            <div class="modal_courier__info">
                <h6>Челябинск</h6>
                <p class="modal_shipping__info_desc">{{ trans_choice("page/cart/modal/point.count", $points->total()) }}</p>
                <input type="text" placeholder="Введите адресс" class="modal__input">
                <div class="modal_courier__list">
                    @foreach ($points as $point)
                    <div class="modal_courier__item" data-id="{{ $point->id }}">
                        <div class="modal_courier__item_info">
                            <p class="modal_courier__item_info_address">{{ $point->address }}</p>
                            @if($point->operating_mode)
                                <p>{{ $point->operating_mode }}</p>
                            @endif
                            <p class="modal_courier__item_info_status green">Полное наличие</p>
                        </div>
                        <button class="btn">Выбрать</button>
                    </div>
                    @endforeach

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
                </div>
            </div>
            <div class="modal_shipping__map">

            </div>
        </div>
    </div>
</div>
