@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <div class="dop_menu__bg dop_menu__close"></div>
    <section class="dop_menu_mob dop_menu_mob__container profile_menu_mob dop_menu__open">
        <div class="dop_menu_mob__button">
            <img src="{{ Vite::asset('resources/js/custom/dop_menu/mob/img/filter.svg') }}" alt="filter" loading="lazy" decoding="async"> Меню
        </div>
    </section>

    <section class="breadcrumb">
        <div class="breadcrumb__container">
            <ul class="breadcrumb__lists" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li class="breadcrumb__item" itemprop="itemListElement" itemscope=""
                    itemtype="https://schema.org/ListItem">
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
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link active">
                        <span itemprop="name">Заказы</span>
                    </a>
                    <meta itemprop="position" content="3">
                </li>
            </ul>
        </div>
    </section>

    <section class="profile__container">
        <div class="profile">

            <x-sample.main.user.profile.menu></x-sample.main.user.profile.menu>

            <div class="profile__right">
                <div class="app__title">
                    <div class="app__title_wrapper">
                        <h2 class="app__title_text">Заказы</h2>
                    </div>
                </div>
                <div class="profile_orders__grade_wrapper">
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async">
                        <div class="profile_orders__grade__action">
                            <p>Как вам товар?</p>
                            <button class="btn">
                                <img src="/temple/images/profile/orders/star.svg" alt="star" loading="lazy" decoding="async">
                                Оценить товар
                            </button>
                        </div>
                    </div>
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async">
                        <div class="profile_orders__grade__action">
                            <p>Как вам товар?</p>
                            <button class="btn">
                                <img src="/temple/images/profile/orders/star.svg" alt="star">
                                Оценить товар
                            </button>
                        </div>
                    </div>
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async">
                        <div class="profile_orders__grade__action">
                            <p>Как вам товар?</p>
                            <button class="btn">
                                <img src="/temple/images/profile/orders/star.svg" alt="star">
                                Оценить товар
                            </button>
                        </div>
                    </div>
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async">
                        <div class="profile_orders__grade__action">
                            <p>Как вам товар?</p>
                            <button class="btn">
                                <img src="/temple/images/profile/orders/star.svg" alt="star">
                                Оценить товар
                            </button>
                        </div>
                    </div>
                </div>

                <div class="profile_orders__list">
                    <table>
                        <tbody>
                            <!--  -->
                            <tr class="profile_orders__line_info_wrapper open" data-id="1">
                                <td>
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_info">
                                            <div class="profile_orders__line_info_title">
                                                <img src="/temple/images/profile/orders/str.svg" alt="str">
                                                <p>Заказ V035907<span> от 9 января</span></p>
                                            </div>
                                            <div class="profile_orders__line_info_date">
                                                <p>Заказ получен: <span>9 января</span></p>
                                                <p>Можно получить: <span>9 января после 15:00</span></p>
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
                            <tr class="profile_orders__line_actions_wrapper open" data-id="1">
                                <td colspan="3">
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_actions">
                                            <button class="btn">Повторить заказ</button>
                                            <button class="btn btn_upend">Больше информации</button>
                                            <button class="profile_orders__line_actions_review">Оставить
                                                отзыв</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <!--  -->


                            <!--  -->
                            <tr class="profile_orders__line_info_wrapper" data-id="2">
                                <td>
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_info">
                                            <div class="profile_orders__line_info_title">
                                                <img src="/temple/images/profile/orders/str.svg" alt="str">
                                                <p>Заказ V035907<span> от 9 января</span></p>
                                            </div>
                                            <div class="profile_orders__line_info_date">
                                                <p>Заказ получен: <span>9 января</span></p>
                                                <p>Можно получить: <span>9 января после 15:00</span></p>
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
                            <tr class="profile_orders__line_products_wrapper" data-id="2">
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
                            <tr class="profile_orders__line_products_wrapper" data-id="2">
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
                            <tr class="profile_orders__line_products_wrapper" data-id="2">
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
                            <tr class="profile_orders__line_actions_wrapper" data-id="2">
                                <td colspan="3">
                                    <div class="profile_orders__line">
                                        <div class="profile_orders__line_actions">
                                            <button class="btn">Повторить заказ</button>
                                            <button class="btn btn_upend">Больше информации</button>
                                            <button class="profile_orders__line_actions_review">Оставить
                                                отзыв</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <!--  -->

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/profile/index.js')
    @vite('resources/js/profile/orders/index.js')
@endsection
