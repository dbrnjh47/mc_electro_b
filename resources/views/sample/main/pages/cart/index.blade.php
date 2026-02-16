@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=191ddfe2-fb7e-4f2f-86ae-24a528d48803&suggest_apikey=7ec2ec86-048e-4638-809c-0fe8b086f977" type="text/javascript"></script>


@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
    @include('sample.main.pages.cart.components.modal.point')
@endsection

@section('content')
    @php
        dump($cart);
        dump($cart->products[0]);
        $cart->product_sum = 0;
    @endphp
    <button onclick="modal('#modal_shipping');">shipping-points</button>
    <button onclick="">shipping-courier</button>

    <x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>

    <section class="cart cart__container">
        <div class="app__title">
            <div class="app__title_wrapper">
                <h2 class="app__title_text">Корзина</h2>
            </div>
        </div>

        <div class="cart__content">
            <section id="sticky_article" class="cart_blocks">
                @guest
                    <div class="cart_block_guest cart__item_wrapper">
                        <h3>Войдите или зарегистрируйтесь</h3>
                        <p>Вы сможете отслеживать статус заказа и получать персональные предложения</p>
                        <div>
                            <button class="btn" onclick="modal('#modal_login');">Вход</button>
                            <button class="btn btn_upend" onclick="modal('#modal_signup');">Регистрация</button>
                        </div>
                    </div>
                @endguest

                @include("sample.main.pages.cart.components.blocks.products")

                @include("sample.main.pages.cart.components.blocks.user")

                @include("sample.main.pages.cart.components.blocks.delivery_methods.index")

                <div class="cart_block_payment_list__wrapper cart__item_wrapper">
                    <h3>Выберите способ оплаты</h3>
                    <div class="cart_block_payment_list">
                        <div class="cart_block_payment_list__item activ">
                            <input type="checkbox" value="1" checked id="payment_id_5">
                            <label for="payment_id_5" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                    <p>Краткое описание</p>
                                </div>
                                <div class="cart_block_payment_list__item_photo">
                                    <img src="/temple/images/cart/payments/card.png" alt="">
                                </div>
                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_4">
                            <label for="payment_id_4" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                    <p>Краткое описание</p>
                                </div>
                                <div class="cart_block_payment_list__item_photo">
                                    <img src="/temple/images/cart/payments/sbp.png" alt="">
                                </div>
                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_3">
                            <label for="payment_id_3" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                </div>

                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_3">
                            <label for="payment_id_3" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                </div>

                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_3">
                            <label for="payment_id_3" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                </div>

                            </label>
                        </div>
                    </div>
                </div>

            </section>

            <div id="sticky_aside1">
                <section class="cart__item_wrapper cart_info">
                    <div class="cart_info__item">
                        <div>
                            <p>Покупатель</p>
                            <span>Указать</span>
                        </div>
                        <p></p>
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <p>Самовывоз</p>
                            <span>Изменить</span>
                        </div>
                        <p>ул. Газизуллина, д. 2А</p>
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <p>Способ оплаты</p>
                            <span>Изменить</span>
                        </div>
                        <p>Наличными при получении</p>
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <label for="cart_promocode">Промокод</label>
                        </div>
                        <input type="text" id="cart_promocode" class="cart_input" name="p" maxlength="20"
                            placeholder="Введите промокод">
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <label for="cart_comment">Комментарий</label>
                        </div>
                        <textarea name="p2" id="cart_comment" class="cart_input" placeholder="Введите комментарий"></textarea>
                    </div>

                    <hr>

                    <div class="cart_info__result">
                        <p>166 товаров • 149.80 кг</p>
                        <p class="cart_info__result_price">570 309,16 ₽</p>
                    </div>

                    <div class="cart_info__result">
                        <p>Доставка</p>
                        <p class="cart_info__result_price green">Бесплатная</p>
                    </div>


                    <div class="cart_info__result_total">
                        <p>Итог</p>
                        <p>
                            <span>433,51 руб.</span>
                            599 390,16 руб.
                        </p>
                    </div>


                    <button class="btn">Оформить заказ</button>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script>
        window.cart = {
            "sum": {{ $cart->product_sum }},
        };
    </script>
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>

    @include('sample.main.components.wishlist_action')
    @include('sample.main.components.cart_action')
    @vite('resources/js/cart/index.js')
@endsection
