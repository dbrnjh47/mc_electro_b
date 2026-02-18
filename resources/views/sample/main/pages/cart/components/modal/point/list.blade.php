@foreach ($points as $point)
    <div class="modal_courier__item @if (($cart->delivery_method && $cart->delivery_method->slug == "pickup") && $cart->point_id == $point->id) activ @endif " data-id="{{ $point->id }}" data-lon="{{ $point->lon }}" data-lat="{{ $point->lat }}">
        <div class="modal_courier__item_info">
            <p class="modal_courier__item_info_address">{{ $point->address }}</p>
            @if ($point->operating_mode)
                <p>{{ $point->operating_mode }}</p>
            @endif

            @if (!$hasAvailableProducts)
                <p class="modal_courier__item_info_status red">Нет в наличии</p>
            @elseif(!$point->available_positions_count)
                <p class="modal_courier__item_info_status red">Возможно перемещение</p>
            @elseif($point->available_positions_count < $total_count)
                <p class="modal_courier__item_info_status orange">Частичное наличие
                    ({{ $point->available_positions_count }} из {{ $total_count }})<br>
                    <span>Возможно перемещение</span>
                </p>
            @else
                <p class="modal_courier__item_info_status green">Полное наличие</p>
            @endif
        </div>

        @if (($cart->delivery_method && $cart->delivery_method->slug == "pickup") && $cart->point_id == $point->id)
            <button class="btn">Выбран</button>
        @else
            <button class="btn">Выбрать</button>
        @endif
    </div>
@endforeach
