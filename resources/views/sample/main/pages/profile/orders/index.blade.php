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
            <img src="{{ Vite::asset('resources/js/custom/dop_menu/mob/img/filter.svg') }}" alt="filter"> Меню
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
            <div class="profile__menu dop_menu">
                <div class="profile__user_wrapper">
                    <a href="#" class="profile__user">
                        <div class="profile__user_avatar">
                            <img src="/assets/user/avatar/defult.svg" alt="avatar">
                        </div>
                        <p class="profile__user_balance">12,000₽</p>
                    </a>
                    <div class="profile__user_name">
                        <p>Example usename</p>
                        <span>ID:02912834</span>
                        <svg class="close dop_menu__close" width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.23334 1.22848C0.935229 1.52543 0.660942 1.80387 0.447115 2.02273C0.196487 2.27925 0.197379 2.68721 0.448081 2.94366C0.878267 3.38371 1.57724 4.09588 2.36252 4.88484C3.66192 6.19031 4.77307 7.31102 4.83181 7.37521L4.9386 7.49199L2.48019 9.95126C1.64812 10.7836 0.904998 11.5351 0.456446 11.9901C0.206495 12.2436 0.201478 12.6477 0.447797 12.9048C0.666371 13.1329 0.950745 13.4259 1.26283 13.7378L2.05439 14.5289C2.31476 14.7891 2.73675 14.789 2.99705 14.5288L4.98563 12.5403C6.33851 11.1875 7.4632 10.0748 7.48484 10.0676C7.50653 10.0603 8.62656 11.1535 9.97378 12.4968C10.805 13.3257 11.5572 14.0649 12.0115 14.5096C12.2636 14.7565 12.6636 14.7623 12.9199 14.5198C13.2119 14.2436 13.5962 13.8727 13.9291 13.5275L14.531 12.9225C14.7902 12.662 14.7897 12.2408 14.5298 11.9809L10.0392 7.49029L10.3869 7.1385C10.5782 6.945 11.6656 5.85168 12.8033 4.70889C13.588 3.92065 14.3036 3.19484 14.6721 2.82033C14.8346 2.65516 14.8639 2.43104 14.7149 2.25356C14.555 2.06304 14.2785 1.75876 13.8011 1.27947C13.4716 0.948739 13.1518 0.636915 12.9149 0.40829C12.6889 0.190242 12.3507 0.175477 12.1179 0.386248C11.7608 0.709631 11.1159 1.31822 9.98715 2.44508C8.6354 3.79452 7.51995 4.90749 7.50836 4.91828C7.49673 4.92913 6.37544 3.82696 5.01655 2.46898C4.17751 1.63053 3.41756 0.886203 2.95891 0.439417C2.70522 0.192296 2.30362 0.188955 2.04778 0.433843C1.82357 0.648455 1.53684 0.926174 1.23334 1.22848Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="profile__list">
                    <a href="#">Список заказов</a>
                    <a href="#">Избранное</a>
                    <a href="#">Организации</a>
                    <a href="#">История баланса</a>
                    <a href="#">Пополнить баланс</a>
                    <a href="#" class="red">Выход</a>
                </div>
            </div>
            <div class="profile__right">
                <div class="app__title">
                    <div class="app__title_wrapper">
                        <h2 class="app__title_text">Заказы</h2>
                    </div>
                </div>
                <div class="profile_orders__grade_wrapper">
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product">
                        <div class="profile_orders__grade__action">
                            <p>Как вам товар?</p>
                            <button class="btn">
                                <img src="/temple/images/profile/orders/star.svg" alt="star">
                                Оценить товар
                            </button>
                        </div>
                    </div>
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product">
                        <div class="profile_orders__grade__action">
                            <p>Как вам товар?</p>
                            <button class="btn">
                                <img src="/temple/images/profile/orders/star.svg" alt="star">
                                Оценить товар
                            </button>
                        </div>
                    </div>
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product">
                        <div class="profile_orders__grade__action">
                            <p>Как вам товар?</p>
                            <button class="btn">
                                <img src="/temple/images/profile/orders/star.svg" alt="star">
                                Оценить товар
                            </button>
                        </div>
                    </div>
                    <div class="profile_orders__grade">
                        <img src="/assets/product/miniature/test.png" alt="product">
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
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/profile/index.js')
    @vite('resources/js/profile/orders/index.js')
@endsection
