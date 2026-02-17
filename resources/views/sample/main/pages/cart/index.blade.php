@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
    <script
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=191ddfe2-fb7e-4f2f-86ae-24a528d48803&suggest_apikey=7ec2ec86-048e-4638-809c-0fe8b086f977"
        type="text/javascript"></script>
@endsection

@section('header')
    <script>
        window.routes["cart.delivery_method.modal"] = "{{ route('cart.delivery_method.modal') }}";
    </script>
    <x-sample.main.layout.header></x-sample.main.layout.header>
    {{-- @include('sample.main.pages.cart.components.modal.point') --}}
    <div id="cart_modal_wrapper"></div>
@endsection

@section('content')
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

                @include('sample.main.pages.cart.components.blocks.products')

                @include('sample.main.pages.cart.components.blocks.user')

                @include('sample.main.pages.cart.components.blocks.delivery_methods.index')

                @include('sample.main.pages.cart.components.blocks.payments')

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
        window.cart = @json($cart_array);
        window.delivery_methods = @json($delivery_methods_array);
        window.payments = @json($payments);
    </script>
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>

    @include('sample.main.components.wishlist_action')
    @include('sample.main.components.cart_action')
    @vite('resources/js/cart/index.js')
@endsection
