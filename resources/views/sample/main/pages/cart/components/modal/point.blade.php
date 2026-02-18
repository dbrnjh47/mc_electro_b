<div class="modal modal_shipping point_modal" id="modal_shipping">
    <div class="modal__content">
        <div class="modal__header">
            <h2>{{ $delivery_method->title }}</h2>
            <button class="modal__close__btn modal_close"></button>
        </div>
        <div class="modal__body">
            <div class="modal_courier__info">
                <h6>{{ $user_city->name }}</h6>
                <p class="modal_shipping__info_desc">{{ trans_choice("page/cart/modal/point.count", $points->total()) }}</p>
                <input type="text" placeholder="Введите адресс" class="modal__input" name="point_search">
                <div class="modal_courier__list">
                    @include('sample.main.pages.cart.components.modal.point.list')
                </div>
            </div>
            {{-- <div class="modal_shipping__map">

            </div> --}}
        </div>
    </div>
</div>
