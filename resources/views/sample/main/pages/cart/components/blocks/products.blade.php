<div class="cart_block_product_list__wrapper cart__item_wrapper">
    <div class="cart_block_product_list__title">
        <button class="standart_a">Очистить</button>

        {{-- <x-sample.main.share url="{{ url()->current() }}" text=""></x-sample.main.share> --}}
    </div>

    <div class="cart_block_product_list">
        @foreach ($cart->products as $product)
            @php
                $href = route('product', ['slug' => $product->slug]);
            @endphp
            <div class="cart_block_product_list__item">

                <div class="cart_block_product_list__line_head">
                    <div class="cart_block_product_list__line_head_left">
                        <button class="product_card__favorite">
                            <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                            <svg class="wishlist_action" width="20" height="23" viewBox="0 0 20 23"
                                xmlns="http://www.w3.org/2000/svg" data-product-id="{{ $product->id }}"
                                data-active="{{ $product->wishlist_products_count ? 1 : 0 }}">
                                <path
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
                            </svg>
                        </button>

                        @if (!$product->labels->isEmpty())
                            <div class="product_card__head_tips">
                                @foreach ($product->labels as $label)
                                    <span
                                        class="product_tip product_tip_{{ $label->key }}">{{ $label->title }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="cart_block_product_list__action_buttons">
                        <button>
                            Удалить
                            <!-- public\temple\images\cart\icons\trash.svg -->
                            <svg width="20" height="20" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.6663 3.125C12.0115 3.125 12.2913 2.84518 12.2913 2.5C12.2913 2.15482 12.0115 1.875 11.6663 1.875H8.33301C7.98783 1.875 7.70801 2.15482 7.70801 2.5C7.70801 2.84518 7.98783 3.125 8.33301 3.125L11.6663 3.125Z">
                                </path>
                                <path
                                    d="M17.2913 5C17.2913 5.34518 17.0115 5.625 16.6663 5.625L3.33301 5.625C2.98783 5.625 2.70801 5.34518 2.70801 5C2.70801 4.65482 2.98783 4.375 3.33301 4.375L16.6663 4.375C17.0115 4.375 17.2913 4.65482 17.2913 5Z">
                                </path>
                                <path
                                    d="M4.99967 7.70833C5.34485 7.70833 5.62467 7.98816 5.62467 8.33333V15.8333C5.62467 16.4086 6.09104 16.875 6.66634 16.875H13.333C13.9083 16.875 14.3747 16.4086 14.3747 15.8333V8.33333C14.3747 7.98816 14.6545 7.70833 14.9997 7.70833C15.3449 7.70833 15.6247 7.98816 15.6247 8.33333V15.8333C15.6247 17.099 14.5987 18.125 13.333 18.125H6.66634C5.40069 18.125 4.37467 17.099 4.37467 15.8333V8.33333C4.37467 7.98816 4.6545 7.70833 4.99967 7.70833Z">
                                </path>
                                <path
                                    d="M8.33301 9.375C8.67819 9.375 8.95801 9.65482 8.95801 10V14.1667C8.95801 14.5118 8.67819 14.7917 8.33301 14.7917C7.98783 14.7917 7.70801 14.5118 7.70801 14.1667V10C7.70801 9.65482 7.98783 9.375 8.33301 9.375Z">
                                </path>
                                <path
                                    d="M12.2913 10C12.2913 9.65482 12.0115 9.375 11.6663 9.375C11.3212 9.375 11.0413 9.65482 11.0413 10V14.1667C11.0413 14.5118 11.3212 14.7917 11.6663 14.7917C12.0115 14.7917 12.2913 14.5118 12.2913 14.1667V10Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="cart_block_product_list__line">
                    <div class="cart_block_product_list__miniature">
                        <a href="{{ $href }}" target="_blank">
                            <img src="{{ $product->getPreview() }}" alt="{{ $product->name }}">
                        </a>
                    </div>

                    <div class="cart_block_product_list__info">
                        @if($product->uuid)<p>код: <sup class="copy_button">{{ $product->uuid }}</sup></p>@endif
                        <a href="{{ $href }}" target="_blank" class="standart_a">{{ $product->name }}</a>

                        {{-- <div class="cart_block_product_list__info_tags">
                            <div>
                                Не упусти выгоду
                            </div>
                        </div> --}}

                        <div class="cart_block_product_list__info_avails">
                            @if ($product->point_count >= $product->pivot->count)
                                <p class="green">Полное наличие</p>
                            @elseif ($product->point_count)
                                <p class="orange">Частичное наличие ({{ $product->point_count }} из {{ $product->pivot->count }})</p>
                            @else
                                <p class="red">Нет в наличии</p>
                            @endif
                        </div>

                    </div>
                    {{-- @php
                        dump($product->pivot->count);
                    @endphp --}}
                    <div class="cart_block_product_list__action">
                        <div class="input_count">
                            <button class="input_count__btn input_count_reduce">
                                -
                            </button>
                            <input type="text" value="{{ $product->pivot->count }}" placeholder="{{ $product->id }}" class="input_count__input">
                            <button class="input_count__btn revers input_count_add">
                                +
                            </button>
                        </div>

                        <div class="cart_block_product_list__price">
                            <div>
                                <span class="price_old">{{ \App\Models\Product\Product::getPriceText($product->getLowestPrice()) }} руб.</span>
                                <span class="price_current">{{ \App\Models\Product\Product::getPriceText($product->getLowestPrice() * $product->pivot->count ) }} руб.</span>
                            </div>
                            {{-- <p class="price_benefit">Выгода -<span>43,35 руб.</span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="cart_block_product_list__result">
        <p>Итог: <span>{{ \App\Models\Product\Product::getPriceText($cart_array['product_price_sum']) }} руб.</span></p>
    </div>

</div>
