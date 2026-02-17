<div class="cart_block_payment_list__wrapper cart__item_wrapper" @if(!$current_delivery) style="display: none;" @endif>
    <h3>Выберите способ оплаты</h3>
    <div class="cart_block_payment_list">
        @if($current_delivery)
            @foreach ($current_delivery->transform_delivery_payments[((0 && $cart->pupupu) ? "legal" : "individual")] as $payment_id)
            @php
                $payment = $payments[$payment_id];
            @endphp

            {{-- activ --}}
            <div class="cart_block_payment_list__item @if($cart->payment_id == $payment->id) activ @endif">
                <input type="checkbox" value="{{ $payment->id }}" @if($cart->payment_id == $payment->id) checked @endif id="payment_id_{{ $payment->id }}">
                <label for="payment_id_{{ $payment->id }}" class="cart_block_payment_list__item_content">
                    <div>
                        <h6>{{ $payment->title }}</h6>
                        <p>{{ $payment->description }}</p>
                    </div>

                    @if($payment->img)
                    <div class="cart_block_payment_list__item_photo">
                        <img src="{{ $payment->img_url }}" alt="{{$payment->title}}">
                    </div>
                    @endif
                </label>
            </div>
            @endforeach
        @endif
    </div>
</div>
