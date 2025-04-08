@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <section class="breadcrumb">
        <div class="breadcrumb__container">
            <ul class="breadcrumb__lists" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li class="breadcrumb__item" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link start" href="#">
                        <span itemprop="name">Главная</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link off">/</a>
                </li>
                <li class="breadcrumb__item" itemprop="itemListElement" itemscope=""
                    itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link" href="#">
                        <span itemprop="name">Профиль</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link off">/</a>
                </li>
                <li class="breadcrumb__item" itemprop="itemListElement" itemscope=""
                    itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link" href="#">
                        <span itemprop="name">Заказы</span>
                    </a>
                    <meta itemprop="position" content="3">
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link off">/</a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link active">
                        <span itemprop="name">Заказ №4RQNO21149</span>
                    </a>
                    <meta itemprop="position" content="4">
                </li>
            </ul>
        </div>
    </section>

    <section class="order__container">
        <div class="order">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Заказ №4RQNO21149</h2>
                    <div class="app__blocks">
                        <button class="btn activ">О заказе</button>
                        <button class="btn">Статус заказа</button>
                        <button class="btn">Спиок продуктов</button>
                    </div>
                </div>
            </div>

            <div class="order__between">
                <a class="order__between_back" href="#"> &lt; К списку заказов</a>
                <div class="order__between_actions">
                    <button class="btn">Оставить отзыв</button>
                    <button class="btn btn_upend">Повторить заказ</button>
                </div>

            </div>

            <div class="order__blocks">
                <div data-block="2" class="dataTable__wrapper">
                    <table class="table" id="order__tabel">
                    </table>
                </div>

                <div class="order_info" data-block="1">
                    <div>
                        <h3>Данные получателя</h3>
                        <table>
                            <tr>
                                <th>Роль</th>
                                <th>Физ.лицо</th>
                            </tr>
                            <tr>
                                <th>Ф.И.О.</th>
                                <th>Иван Иванович Смирнов</th>
                            </tr>
                            <tr>
                                <th>Эл.почта</th>
                                <th>Example@mail.com</th>
                            </tr>
                            <tr>
                                <th>Телефон</th>
                                <th>+7 000 000 00 00</th>
                            </tr>
                            <tr>
                                <th>Город</th>
                                <th>г. Челябинск</th>
                            </tr>
                            <tr>
                                <th>Доставить в</th>
                                <th>Реальный адрес или ПВЗ</th>
                            </tr>
                        </table>
                    </div>
                    <div class="order_info__tables">
                        <table>
                            <tr>
                                <th>Номер заказа</th>
                                <th><a class="copy_button">4RQNO21149</a></th>
                            </tr>
                            <tr>
                                <th>Статус заказа</th>
                                <th>Отменён</th>
                            </tr>
                            <tr>
                                <th>Детали заказа</th>
                                <th>
                                    <p>Самовывоз улица город дом квартира тексттекст</p>
                                    <p>Будни: 9:00-18:00 Выходные: 9:00-17:00</p>
                                </th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th>Дата заказа</th>
                                <th>04.08.2023</th>
                            </tr>
                            <tr>
                                <th>Последнее обновление</th>
                                <th>04.08.2023</th>
                            </tr>
                            <tr>
                                <th>Способ оплаты</th>
                                <th>текс ттек </th>
                            </tr>
                            <tr>
                                <th>Всего</th>
                                <th>50,71 руб.</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="profile_orders__list" data-block="3">
                    <table>
                        <tbody>
                            <!--  -->
                            <tr class="profile_orders__line_info_wrapper open" data-id="1">
                                <td>
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_info">
                                            <div class="profile_orders__line_info_title">
                                                <p>Заказ V035907<span> от 9 января</span></p>
                                            </div>
                                            <div class="profile_orders__line_info_date">
                                                <p class="profile_orders__line_info_date_mob">Сумма:
                                                    <span>3600₽</span>
                                                </p>
                                                <p class="profile_orders__line_info_date_mob">Статус: <span
                                                        class="green">Получен</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <p class="profile_orders__line_count">1 товар</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_price">
                                            <p>3600<span>₽</span></p>
                                            <div class="profile_orders__line_status">
                                                Получен
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="profile_orders__line_products_wrapper open" data-id="1">
                                <td>
                                    <div class="profile_orders__line profile_orders__line_product">
                                        <a href="#" class="profile_orders__line_product_img">
                                            <img src="/assets/product/miniature/test.png" alt="">
                                        </a>
                                        <div class="profile_orders__line_product_info">
                                            <a href="#">Теплый пол супер качественный теплыйи абалденный</a>
                                            <span>Код товара: 1928374</span>
                                            <p>1 шт.</p>
                                            <p>3600 ₽</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <p class="profile_orders__line_count">1 шт.</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_price">
                                            <p>3600<span>₽</span></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="profile_orders__line_products_wrapper open" data-id="1">
                                <td>
                                    <div class="profile_orders__line profile_orders__line_product">
                                        <a href="#" class="profile_orders__line_product_img">
                                            <img src="/assets/product/miniature/test.png" alt="">
                                        </a>
                                        <div class="profile_orders__line_product_info">
                                            <a href="#">Теплый пол супер качественный теплыйи абалденный</a>
                                            <span>Код товара: 1928374</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <p class="profile_orders__line_count">1 шт.</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_price">
                                            <p>3600<span>₽</span></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="profile_orders__line_products_wrapper open" data-id="1">
                                <td>
                                    <div class="profile_orders__line profile_orders__line_product">
                                        <a href="#" class="profile_orders__line_product_img">
                                            <img src="/assets/product/miniature/test.png" alt="">
                                        </a>
                                        <div class="profile_orders__line_product_info">
                                            <a href="#">Теплый пол супер качественный теплыйи абалденный</a>
                                            <span>Код товара: 1928374</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <p class="profile_orders__line_count">1 шт.</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_price">
                                            <p>3600<span>₽</span></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>

    @vite('resources/js/profile/order/index.js')
@endsection
