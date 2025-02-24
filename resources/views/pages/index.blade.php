<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preload" href="/temple/fonts/SFProDisplay/SF-Pro-Display-Regular.otf" as="font" type="font/woff2" crossorigin="">

    <meta name="og:site_name" content="{{ $settings->name }}">
    <title itemprop="headline">{{ $settings->name }}</title>
    <meta property="og:title" content="{{ $settings->name }}">
    <meta name="twitter:title" content="{{ $settings->name }}">

    {{-- <meta itemprop="description" name="description" content="{{ $description }}">
  <meta name="twitter:description" content="{{ $description }}">
  <meta property="og:description" content="{{ $description }}"> --}}

    <meta name="language" content="ru">
    <meta property="og:locale" content="ru">
    <meta name="author" content="{{ $settings->name }}, {{ $settings->email }}">
    <meta name="og:email" content="{{ $settings->email }}" />

    <meta name="keywords" content="">

    <!--  -->

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta name="og:image" content="/favicon.ico" />

    <link rel="icon" href="/temple/images/layout/logo/logo16x16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="/temple/images/layout/logo/logo32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/temple/images/layout/logo/logo64x64.png" sizes="64x64" type="image/png">
    <link rel="icon" href="/temple/images/layout/logo/logo96x96.png" sizes="96x96" type="image/png">
    <link rel="icon" href="/temple/images/layout/logo/logo128x128.png" sizes="128x128" type="image/png">
    <link rel="icon" href="/temple/images/layout/logo/logo152x152.png" sizes="152x152" type="image/png">
    <link rel="icon" href="/temple/images/layout/logo/logo192x192.png" sizes="192x192" type="image/png">

    <link rel="apple-touch-icon-precomposed" sizes="16x16" href="/temple/images/layout/logo/logo16x16.png">
    <link rel="apple-touch-icon-precomposed" sizes="32x32" href="/temple/images/layout/logo/logo32x32.png">
    <link rel="apple-touch-icon-precomposed" sizes="64x64" href="/temple/images/layout/logo/logo64x64.png">
    <link rel="apple-touch-icon-precomposed" sizes="128x128" href="/temple/images/layout/logo/logo128x128.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/temple/images/layout/logo/logo152x152.png">

    <link rel="icon" href="/temple/images/layout/logo/favicon32x32.svg" sizes="any" type="image/svg+xml">

    <!--  -->

    <meta name="og:region" content="ar" />
    <meta http-equiv="Cache-Control" content="yes-cache">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    {{-- <link rel="alternate" href="{{ route('lang_home', ['lang_slug' => 'ru']) }}" hreflang="ru-ae">
    <link rel="alternate" href="{{ route('lang_home', ['lang_slug' => 'en']) }}" hreflang="en-ae"> --}}

    <!--  -->
    @vite('resources/js/_jquery.js')
    @vite('resources/js/layout/layout.js')
    @vite('resources/js/layout/location.js')
</head>

<body>

    <div class="main_wrapper">

        <div class="menu_categories">
            <div class="menu_categories__bg menu_categories__close"></div>

            <div class="menu_categories__main">
                <div class="menu_categories__list activ start">
                    <div class="menu_categories__title">
                        <a href="#">Каталог</a>
                        <svg class="close menu_categories__close" width="15" height="15" viewBox="0 0 15 15"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.23334 1.22848C0.935229 1.52543 0.660942 1.80387 0.447115 2.02273C0.196487 2.27925 0.197379 2.68721 0.448081 2.94366C0.878267 3.38371 1.57724 4.09588 2.36252 4.88484C3.66192 6.19031 4.77307 7.31102 4.83181 7.37521L4.9386 7.49199L2.48019 9.95126C1.64812 10.7836 0.904998 11.5351 0.456446 11.9901C0.206495 12.2436 0.201478 12.6477 0.447797 12.9048C0.666371 13.1329 0.950745 13.4259 1.26283 13.7378L2.05439 14.5289C2.31476 14.7891 2.73675 14.789 2.99705 14.5288L4.98563 12.5403C6.33851 11.1875 7.4632 10.0748 7.48484 10.0676C7.50653 10.0603 8.62656 11.1535 9.97378 12.4968C10.805 13.3257 11.5572 14.0649 12.0115 14.5096C12.2636 14.7565 12.6636 14.7623 12.9199 14.5198C13.2119 14.2436 13.5962 13.8727 13.9291 13.5275L14.531 12.9225C14.7902 12.662 14.7897 12.2408 14.5298 11.9809L10.0392 7.49029L10.3869 7.1385C10.5782 6.945 11.6656 5.85168 12.8033 4.70889C13.588 3.92065 14.3036 3.19484 14.6721 2.82033C14.8346 2.65516 14.8639 2.43104 14.7149 2.25356C14.555 2.06304 14.2785 1.75876 13.8011 1.27947C13.4716 0.948739 13.1518 0.636915 12.9149 0.40829C12.6889 0.190242 12.3507 0.175477 12.1179 0.386248C11.7608 0.709631 11.1159 1.31822 9.98715 2.44508C8.6354 3.79452 7.51995 4.90749 7.50836 4.91828C7.49673 4.92913 6.37544 3.82696 5.01655 2.46898C4.17751 1.63053 3.41756 0.886203 2.95891 0.439417C2.70522 0.192296 2.30362 0.188955 2.04778 0.433843C1.82357 0.648455 1.53684 0.926174 1.23334 1.22848Z">
                            </path>
                        </svg>
                    </div>
                    <div class="menu_categories__list_basic">
                        <p>Товары</p>
                        <svg width="15" height="8" viewBox="0 0 15 8" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.7017 1.63282L8.22017 7.71985C7.82243 8.09338 7.17757 8.09338 6.77983 7.71985L0.298304 1.63282C-0.0994349 1.25929 -0.0994349 0.653678 0.298304 0.280147C0.696042 -0.0933833 1.3409 -0.0933832 1.73864 0.280147L7.5 5.69084L13.2614 0.280148C13.6591 -0.0933827 14.304 -0.0933827 14.7017 0.280148C15.0994 0.653679 15.0994 1.25929 14.7017 1.63282Z">
                            </path>
                        </svg>
                    </div>
                    <div class="menu_categories__list_items_wrapper">
                        <div class="menu_categories__list_items">
                            <div class="menu_categories__list_basic menu_categories__item" data-id="1">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item" data-id="2">
                                <p>Ковёр <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item" data-id="3">
                                <p>Автомат <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item" data-id="4">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item" data-id="5">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item" data-id="6">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item" data-id="7">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item" data-id="8">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>

                        </div>
                        <button class="menu_categories__list_button">Показать еще 5</button>
                    </div>
                </div>

                <div class="menu_categories__list">
                    <div class="menu_categories__list_basic">
                        <p>Товары</p>
                        <svg width="15" height="8" viewBox="0 0 15 8" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.7017 1.63282L8.22017 7.71985C7.82243 8.09338 7.17757 8.09338 6.77983 7.71985L0.298304 1.63282C-0.0994349 1.25929 -0.0994349 0.653678 0.298304 0.280147C0.696042 -0.0933833 1.3409 -0.0933832 1.73864 0.280147L7.5 5.69084L13.2614 0.280148C13.6591 -0.0933827 14.304 -0.0933827 14.7017 0.280148C15.0994 0.653679 15.0994 1.25929 14.7017 1.63282Z">
                            </path>
                        </svg>
                    </div>
                    <div class="menu_categories__list_items_wrapper">
                        <div class="menu_categories__list_items">
                            <div class="menu_categories__list_basic menu_categories__item activ">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item">
                                <p>Ковёр <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item">
                                <p>Автомат <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>
                            <div class="menu_categories__list_basic menu_categories__item">
                                <p>Сортировальная техника <span>(0000)</span></p>
                                <img src="/temple/images/layout/menu_categories/str.svg" alt="str"
                                    loading="lazy" decoding="async">
                            </div>

                        </div>
                        <button class="menu_categories__list_button">Показать еще 5</button>
                    </div>
                </div>
            </div>

            <div class="menu_categories__second">
                <div class="menu_categories__title">
                    <a href="#" class="menu_categories__second_title">Строительная техника</a>
                    <svg class="close menu_categories__back" width="15" height="15" viewBox="0 0 15 15"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.23334 1.22848C0.935229 1.52543 0.660942 1.80387 0.447115 2.02273C0.196487 2.27925 0.197379 2.68721 0.448081 2.94366C0.878267 3.38371 1.57724 4.09588 2.36252 4.88484C3.66192 6.19031 4.77307 7.31102 4.83181 7.37521L4.9386 7.49199L2.48019 9.95126C1.64812 10.7836 0.904998 11.5351 0.456446 11.9901C0.206495 12.2436 0.201478 12.6477 0.447797 12.9048C0.666371 13.1329 0.950745 13.4259 1.26283 13.7378L2.05439 14.5289C2.31476 14.7891 2.73675 14.789 2.99705 14.5288L4.98563 12.5403C6.33851 11.1875 7.4632 10.0748 7.48484 10.0676C7.50653 10.0603 8.62656 11.1535 9.97378 12.4968C10.805 13.3257 11.5572 14.0649 12.0115 14.5096C12.2636 14.7565 12.6636 14.7623 12.9199 14.5198C13.2119 14.2436 13.5962 13.8727 13.9291 13.5275L14.531 12.9225C14.7902 12.662 14.7897 12.2408 14.5298 11.9809L10.0392 7.49029L10.3869 7.1385C10.5782 6.945 11.6656 5.85168 12.8033 4.70889C13.588 3.92065 14.3036 3.19484 14.6721 2.82033C14.8346 2.65516 14.8639 2.43104 14.7149 2.25356C14.555 2.06304 14.2785 1.75876 13.8011 1.27947C13.4716 0.948739 13.1518 0.636915 12.9149 0.40829C12.6889 0.190242 12.3507 0.175477 12.1179 0.386248C11.7608 0.709631 11.1159 1.31822 9.98715 2.44508C8.6354 3.79452 7.51995 4.90749 7.50836 4.91828C7.49673 4.92913 6.37544 3.82696 5.01655 2.46898C4.17751 1.63053 3.41756 0.886203 2.95891 0.439417C2.70522 0.192296 2.30362 0.188955 2.04778 0.433843C1.82357 0.648455 1.53684 0.926174 1.23334 1.22848Z">
                        </path>
                    </svg>
                </div>
                <div class="menu_categories__second_list">
                    <a href="#" class="menu_categories__second_item activ">Авто</a>
                    <a href="#" class="menu_categories__second_item">Авто</a>
                    <a href="#" class="menu_categories__second_item">Авто</a>
                    <a href="#" class="menu_categories__second_item">Авто</a>
                    <a href="#" class="menu_categories__second_item">Авто</a>
                    <a href="#" class="menu_categories__second_item">Авто</a>
                </div>
            </div>
        </div>

        <div class="burger_menu">
            <div class="burger_menu__bg burger_menu_close"></div>

            <div class="burger_menu__main">
                <div class="burger_menu__main__content">
                    <div class="burger_menu__main__content_info">
                        <a href="/" class="header__logo">
                            <span class="header__logo_icon">МК</span>
                            <div class="header__logo_content">
                                <span class="header__logo_name">ЭЛЕКТРО</span>
                                <span class="header__logo_title">электротовары здесь</span>
                            </div>
                        </a>


                        <svg class="close burger_menu_close" width="15" height="15" viewBox="0 0 15 15"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.23334 1.22848C0.935229 1.52543 0.660942 1.80387 0.447115 2.02273C0.196487 2.27925 0.197379 2.68721 0.448081 2.94366C0.878267 3.38371 1.57724 4.09588 2.36252 4.88484C3.66192 6.19031 4.77307 7.31102 4.83181 7.37521L4.9386 7.49199L2.48019 9.95126C1.64812 10.7836 0.904998 11.5351 0.456446 11.9901C0.206495 12.2436 0.201478 12.6477 0.447797 12.9048C0.666371 13.1329 0.950745 13.4259 1.26283 13.7378L2.05439 14.5289C2.31476 14.7891 2.73675 14.789 2.99705 14.5288L4.98563 12.5403C6.33851 11.1875 7.4632 10.0748 7.48484 10.0676C7.50653 10.0603 8.62656 11.1535 9.97378 12.4968C10.805 13.3257 11.5572 14.0649 12.0115 14.5096C12.2636 14.7565 12.6636 14.7623 12.9199 14.5198C13.2119 14.2436 13.5962 13.8727 13.9291 13.5275L14.531 12.9225C14.7902 12.662 14.7897 12.2408 14.5298 11.9809L10.0392 7.49029L10.3869 7.1385C10.5782 6.945 11.6656 5.85168 12.8033 4.70889C13.588 3.92065 14.3036 3.19484 14.6721 2.82033C14.8346 2.65516 14.8639 2.43104 14.7149 2.25356C14.555 2.06304 14.2785 1.75876 13.8011 1.27947C13.4716 0.948739 13.1518 0.636915 12.9149 0.40829C12.6889 0.190242 12.3507 0.175477 12.1179 0.386248C11.7608 0.709631 11.1159 1.31822 9.98715 2.44508C8.6354 3.79452 7.51995 4.90749 7.50836 4.91828C7.49673 4.92913 6.37544 3.82696 5.01655 2.46898C4.17751 1.63053 3.41756 0.886203 2.95891 0.439417C2.70522 0.192296 2.30362 0.188955 2.04778 0.433843C1.82357 0.648455 1.53684 0.926174 1.23334 1.22848Z">
                            </path>
                        </svg>

                        <div class="burger_menu__main__buttons">
                            <a class="button" href="">
                                Login
                            </a>
                            <a class="button button_two" href="">
                                Register
                            </a>
                        </div>

                    </div>

                    <ul class="burger_menu__main__navigations">
                        <li>
                            <a class="navigation" onclick="openCategoryMenu();">
                                Каталог
                            </a>
                        </li>
                        <li>
                            <a class="navigation">
                                <!-- <img src="/sample/v1/temple/images/header/menu/car.svg" alt="car"> -->
                                Распродажа
                                <!-- <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M11.8047 0.18794C12.0651 0.438526 12.0651 0.844807 11.8047 1.09539L6.4714 6.81206C6.21105 7.06265 5.78894 7.06265 5.5286 6.81206L0.195262 1.09539C-0.0650874 0.844807 -0.0650873 0.438526 0.195262 0.187939C0.455612 -0.0626471 0.877722 -0.0626471 1.13807 0.187939L6 5.45088L10.8619 0.18794C11.1223 -0.0626467 11.5444 -0.0626466 11.8047 0.18794Z"
                    fill="white"></path>
                </svg> -->

                            </a>
                        </li>

                        <li>
                            <a class="navigation" itemprop="url" href="">
                                Акции
                            </a>
                        </li>

                        <li>
                            <a class="navigation">
                                <!-- <img src="/sample/v1/temple/images/header/menu/boat.svg" alt="boat"> -->
                                О компании
                                <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.8047 0.18794C12.0651 0.438526 12.0651 0.844807 11.8047 1.09539L6.4714 6.81206C6.21105 7.06265 5.78894 7.06265 5.5286 6.81206L0.195262 1.09539C-0.0650874 0.844807 -0.0650873 0.438526 0.195262 0.187939C0.455612 -0.0626471 0.877722 -0.0626471 1.13807 0.187939L6 5.45088L10.8619 0.18794C11.1223 -0.0626467 11.5444 -0.0626466 11.8047 0.18794Z"
                                        fill="white"></path>
                                </svg>

                            </a>

                            <div class="navigation_list">
                                <a class="navigation" itemprop="url" href="">Краткая информация</a>
                                <a class="navigation" itemprop="url" href="">История</a>
                                <a class="navigation" itemprop="url" href="">Реквизиты</a>
                                <a class="navigation" itemprop="url" href="">Новости</a>
                                <a class="navigation" itemprop="url" href="">Адреса магазинов</a>
                                <a class="navigation" itemprop="url" href="">Отзывы</a>
                            </div>
                        </li>

                        <li>
                            <a class="navigation" itemprop="url" href="">
                                Доставка
                            </a>
                        </li>

                        <li>
                            <a class="navigation" itemprop="url" href="">
                                Контакты
                            </a>
                        </li>
                    </ul>

                    <div class="burger_menu__main__settings">
                        <div class="setting_wrapper">
                            <p class="title">Город</p>

                            <div class="setting_items_wrapper">
                                <div class="setting_item_select">
                                    Москва
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6"
                                        viewBox="0 0 9 6" fill="none">
                                        <path
                                            d="M5.23715 5.19583C4.84082 5.6282 4.15918 5.6282 3.76285 5.19583L0.536082 1.67573C-0.0518696 1.03432 0.40313 7.72592e-08 1.27323 1.25169e-07L7.72676 4.80514e-07C8.59687 5.28424e-07 9.05187 1.03432 8.46392 1.67572L5.23715 5.19583Z"
                                            fill="white"></path>
                                    </svg>
                                </div>

                                <div class="setting_items">
                                    <a class="setting_item " href="">
                                        Москва
                                    </a>
                                    <a class="setting_item activ" href="">
                                        Москва
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="setting_wrapper">
                            <p class="title">Язык</p>

                            <div class="setting_items_wrapper">
                                <div class="setting_item_select">
                                    <img src="/temple/languages/united-kingdom.svg" alt="en">
                                    English
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6"
                                        viewBox="0 0 9 6" fill="none">
                                        <path
                                            d="M5.23715 5.19583C4.84082 5.6282 4.15918 5.6282 3.76285 5.19583L0.536082 1.67573C-0.0518696 1.03432 0.40313 7.72592e-08 1.27323 1.25169e-07L7.72676 4.80514e-07C8.59687 5.28424e-07 9.05187 1.03432 8.46392 1.67572L5.23715 5.19583Z"
                                            fill="white"></path>
                                    </svg>
                                </div>

                                <div class="setting_items">
                                    <a class="setting_item " href="">
                                        <img src="/temple/languages/russian-federation.svg" alt="ru">
                                        Русский
                                    </a>
                                    <a class="setting_item  activ " href="">
                                        <img src="/temple/languages/united-kingdom.svg" alt="en">
                                        English
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="setting_wrapper">
                            <p class="title">Валюта</p>

                            <div class="setting_items_wrapper">
                                <div class="setting_item_select">
                                    <img src="/temple/currencies/aed_10x12.svg" alt="AED">
                                    AED
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6"
                                        viewBox="0 0 9 6" fill="none">
                                        <path
                                            d="M5.23715 5.19583C4.84082 5.6282 4.15918 5.6282 3.76285 5.19583L0.536082 1.67573C-0.0518696 1.03432 0.40313 7.72592e-08 1.27323 1.25169e-07L7.72676 4.80514e-07C8.59687 5.28424e-07 9.05187 1.03432 8.46392 1.67572L5.23715 5.19583Z"
                                            fill="white"></path>
                                    </svg>
                                </div>

                                <div class="setting_items">
                                    <a class="setting_item  activ " onclick="setCurrencie(1)">
                                        <img src="/temple/currencies/aed_10x12.svg" alt="AED">
                                        AED
                                    </a>
                                    <a class="setting_item " onclick="setCurrencie(2)">
                                        <img src="/temple/currencies/rub_10x12.svg" alt="RUB">
                                        RUB
                                    </a>
                                    <a class="setting_item " onclick="setCurrencie(3)">
                                        <img src="/temple/currencies/usd_10x12.svg" alt="USD">
                                        USD
                                    </a>
                                    <a class="setting_item " onclick="setCurrencie(4)">
                                        <img src="/temple/currencies/eur_10x12.svg" alt="EUR">
                                        EUR
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="burger_menu__main__contact">
                        <p class="title">Контакты</p>
                        <a class="phone" href="tel:+971568463945">+971568463945</a>
                        <a class="mail" href="mailto:manager@impyrex.com">manager@impyrex.com</a>

                        <ul class="burger_menu__main__contacts">
                            <li>
                                <a href="#">
                                    <img src="/temple/images/layout/icon/social/tg.svg" alt="tg">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/temple/images/layout/icon/social/yt.svg" alt="yt">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/temple/images/layout/icon/social/vk.svg" alt="vk">
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>

        <div class="header_two__container">
            <div class="header_two">


                <ul class="header_two__menu">
                    <li id="city_select">
                        <select class="select2_custom" data-placholder="Введите текст"
                            data-dropdown-parent="#city_select" data-minimum-results-for-search="2" name="state">
                            <option value="AL">Москва</option>
                            <option value="WY">Свердловск</option>
                            <option value="WY">Екатеринбург</option>
                            <option value="WY">Самара</option>
                            <option value="WY">Краснодар</option>
                        </select>

                        <div class="location">
                            <h2 class="location__text">Ваш город <span>Москва?</span></h2>
                            <div class="location__inner">
                                <button class="btn">Все верно</button>
                                <button class="btn btn_upend">Сменить город</button>
                            </div>
                        </div>

                    </li>
                    <li><a href="#" class="header_two__menu_link">Распродажа</a></li>
                    <li><a href="#" class="header_two__menu_link">Акции</a></li>
                    <li>
                        <div class="header_two__sub_menu">
                            <button class="header_two__menu_link header_two__sub_menu_title">
                                О компании
                                <!-- /temple/images/layout/icon/str.svg -->
                                <svg width="15" height="8" viewBox="0 0 15 8"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.7017 1.63282L8.22017 7.71985C7.82243 8.09338 7.17757 8.09338 6.77983 7.71985L0.298304 1.63282C-0.0994349 1.25929 -0.0994349 0.653678 0.298304 0.280147C0.696042 -0.0933833 1.3409 -0.0933832 1.73864 0.280147L7.5 5.69084L13.2614 0.280148C13.6591 -0.0933827 14.304 -0.0933827 14.7017 0.280148C15.0994 0.653679 15.0994 1.25929 14.7017 1.63282Z" />
                                </svg>
                            </button>
                            <div class="header_two__sub_menu_wrapper">
                                <a href="#" class="header_two__sub_menu_wrapper_link">Краткая информация</a>
                                <a href="#" class="header_two__sub_menu_wrapper_link">История</a>
                                <a href="#" class="header_two__sub_menu_wrapper_link">Реквизиты</a>
                                <a href="#" class="header_two__sub_menu_wrapper_link">Новости</a>
                                <a href="#" class="header_two__sub_menu_wrapper_link">Адреса магазинов</a>
                                <a href="#" class="header_two__sub_menu_wrapper_link">Отзывы</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#" class="header_two__menu_link">Доставка</a></li>
                    <li><a href="#" class="header_two__menu_link">Контакты</a></li>
                </ul>

                <div class="header_two__contacts_wrapper">
                    <ul class="header_two__contacts">
                        <li>
                            <a href="#">
                                <img src="/temple/images/layout/icon/social/tg.svg" alt="tg">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/temple/images/layout/icon/social/yt.svg" alt="yt">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/temple/images/layout/icon/social/vk.svg" alt="vk">
                            </a>
                        </li>
                    </ul>

                    <img src="/temple/images/layout/icon/social/phone.svg" alt="phone">
                    <div class="header_two__phones">
                        <a href="tel:+88001005441">+8 800 100-54-41</a>,<br>
                        <a href="tel:+89847079798">+8 984 707-97-98</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom_menu">

            <a href="#" class="bottom_menu__item activ">
                <!-- public\temple\images\layout\icon\favorite.svg -->
                <svg width="18" height="21" viewBox="0 0 18 21" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 1.49222C0 0.668092 0.688793 0 1.53846 0H16.4615C17.3112 0 18 0.668091 18 1.49222V20.452C18 20.8815 17.513 21.1436 17.1373 20.9162L9.29861 16.1724C9.11586 16.0618 8.88414 16.0618 8.70139 16.1724L0.862708 20.9162C0.486973 21.1436 0 20.8815 0 20.452V1.49222Z">
                    </path>
                </svg>
                Избранное
            </a>
            <a href="#" class="bottom_menu__item">
                <!-- public\temple\images\layout\icon\basket.svg -->
                <svg width="23" height="21" viewBox="0 0 23 21" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.91299 3.10869L0.780596 2.15859C0.200337 1.98259 -0.128051 1.36729 0.0471219 0.784288C0.222295 0.201285 0.834692 -0.128656 1.41495 0.0473447L5.8757 1.40035L7.71315 13.6029H18.0253C18.103 13.6029 18.1722 13.5536 18.1979 13.48L18.6839 12.0883C18.7252 11.9703 18.6395 11.8463 18.515 11.8437L11.2281 11.6953C10.6221 11.683 10.1408 11.1794 10.1531 10.5705C10.1654 9.96167 10.6666 9.47809 11.2726 9.49043L19.4 9.65595C19.479 9.65756 19.5501 9.60799 19.5763 9.53306L20.0431 8.1963C20.0849 8.07679 19.9966 7.95168 19.8705 7.95168H11.7536C11.1475 7.95168 10.6561 7.45799 10.6561 6.849C10.6561 6.24001 11.1475 5.74633 11.7536 5.74633H22.4508C22.829 5.74633 23.0938 6.12167 22.9686 6.48021L19.9042 15.255C19.7885 15.5864 19.477 15.8082 19.1275 15.8082H6.53323C6.12619 15.8082 5.78027 15.5093 5.71938 15.1049L3.91299 3.10869Z">
                    </path>
                    <path
                        d="M10.5647 19.1622C10.5647 20.1772 9.74575 21 8.73555 21C7.72534 21 6.9064 20.1772 6.9064 19.1622C6.9064 18.1472 7.72534 17.3244 8.73555 17.3244C9.74575 17.3244 10.5647 18.1472 10.5647 19.1622Z">
                    </path>
                    <path
                        d="M18.6129 19.1622C18.6129 20.1772 17.794 21 16.7838 21C15.7736 21 14.9546 20.1772 14.9546 19.1622C14.9546 18.1472 15.7736 17.3244 16.7838 17.3244C17.794 17.3244 18.6129 18.1472 18.6129 19.1622Z">
                    </path>
                </svg>

                Корзина
            </a>
            <a class="bottom_menu__item">
                <!-- public\temple\images\layout\icon\user.svg -->
                <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.5158 4.96201C13.5158 7.70246 11.2464 9.92402 8.44688 9.92402C5.64738 9.92402 3.37794 7.70246 3.37794 4.96201C3.37794 2.22157 5.64738 0 8.44688 0C11.2464 0 13.5158 2.22157 13.5158 4.96201Z">
                    </path>
                    <path
                        d="M0 17.0447C0 13.9773 2.5402 11.4906 5.6737 11.4906H12.1429C14.8254 11.4906 17 13.6194 17 16.2453V21H0V17.0447Z">
                    </path>
                </svg>

                Войти
            </a>
        </div>



        <header class="header_wrapper">
            <div class="header header__container">
                <a href="/" class="header__logo">
                    <span class="header__logo_icon">МК</span>
                    <div class="header__logo_content">
                        <span class="header__logo_name">ЭЛЕКТРО</span>
                        <span class="header__logo_title">электротовары здесь</span>
                    </div>
                </a>

                <div class="header__search">
                    <div class="header__search_input">
                        <input type="text" placeholder="">

                        <!-- public\temple\images\layout\icon\search.svg -->
                        <svg class="header__search_input_icon" width="20" height="20" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.0338 12.4L20 17.4375L17.5 20L12.4062 15.03C11.1215 15.8295 9.63816 16.2522 8.125 16.25C3.6375 16.25 0 12.6038 0 8.125C0 3.6375 3.64625 0 8.125 0C12.6125 0 16.25 3.64625 16.25 8.125C16.2523 9.63569 15.8309 11.1167 15.0338 12.4ZM2.49625 8.065C2.49625 11.165 5.01375 13.69 8.12125 13.69C11.2213 13.69 13.7463 11.1713 13.7463 8.065C13.7463 4.965 11.2275 2.44 8.12125 2.44C5.02125 2.44 2.49625 4.9575 2.49625 8.065Z" />
                        </svg>


                    </div>

                    <div class="header__search_dropdown">
                        <div class="header__search_dropdown_wrapper">
                            <div class="header__search_lookings">
                                <div class="header__search__lookings_title">Ранее искали</div>
                                <div class="header__search__looking">Лампочка дневного света</div>
                            </div>

                            <div class="header__search_results">
                                <div class="header__search__results_title">Результаты поиска</div>
                                <div class="header__search__result active"><img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAYAAADgKtSgAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMxSURBVHgBpZXLaxNBHMd/M/vetOk2QmwFhZD20IPailB70fbgxYM3PVsvPXhSL70V8WIvijdBUPsXFLx5seKDgq/QCpaimFSi0Hceu9lkn/5mNvSgSbaYX5gNu7Pzmd985zu/JRATubX8pCjALUrpuO8Hac/zdrC9tmv2woWJM887jSXtOhaXckZmMHk/1ZecVhQZPNeHqlWDhuuC7/ng+z54vv/g3OjIbUJI2IohtoNnB417x4+lp2VJZBDwKMV/BeEOhOwXIi8Mb775sGLg69cPnfm7T6vXRrKZp5oqA2OUzRqUqha4mDWbSKACNgIBdpbKFVxFMDU1Mfbqbw5tBT/S339DRXCA4L2yCfsVk4OZFAFbhecBFQRQUa6+3h7wQ3+uFecf+FIuZ2DGZ30km7U6NjuCBgFvbCXsni+bEEgkEgABTC4uLhmx8OpWpV8SRQ6q2XUuwwEcyawhFUK8FzB7Ea0kCBRUQ42H9yaToeN64OPguhNpHE3AMg/5JiEbkw155hyCm121XSsWjhtTaDSckudHMgRNMJuAOYR7jl1wItbf3IfC1Uvnt2PhkZj0oYWeprhcxjmwVBhlzi4E3eLixlbQRQSEJy0xrR7m83nDdEkeHWI0mVymSAIClFCQJJHLhFEAURs/PTSwdSg4i9XvGzO7O3uPNre2wbZtrqskSaBpGuiqCqqqQA86RRLE6VMjmWetGLQd/GT2xGMj2VvSEcaiXq+D40ReF9Ahuq7hBPKPduCOcHRCoCnqQhIPiSTJ/BnbTmZTTVF49rquzkOHoJ06NV1725PQgRUuriBKLCJcQTh7FtBwudN4sVOnDPSjhtrKsgRNS/NDwzYTD06YGTj6Bf43c0Fwd1imsihxj3seHiost2wCQugKxERHeDqdNnf3K3fZYWHFyjRNrOUeVLFKFn/9nouDi3EvrH9b/2z0Gdzs62tfIaGpwMQvFDeXu8qcxXB2uC+hKWBaFhSLP7kNTTy9VtlKdA0XiFBl7qhZKInv4UciGkIazn7XcDWlvnQdr8ArYBiVAjyV87OzM+Wu4WOZTGmvsTFKU5UXQxOpcMN8f+fK5YuzcIj4A5rGkZyBEemOAAAAAElFTkSuQmCC"
                                        alt="">
                                    Лампочка холодного света</div>
                                <div class="header__search__result"><img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAYAAADgKtSgAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMxSURBVHgBpZXLaxNBHMd/M/vetOk2QmwFhZD20IPailB70fbgxYM3PVsvPXhSL70V8WIvijdBUPsXFLx5seKDgq/QCpaimFSi0Hceu9lkn/5mNvSgSbaYX5gNu7Pzmd985zu/JRATubX8pCjALUrpuO8Hac/zdrC9tmv2woWJM887jSXtOhaXckZmMHk/1ZecVhQZPNeHqlWDhuuC7/ng+z54vv/g3OjIbUJI2IohtoNnB417x4+lp2VJZBDwKMV/BeEOhOwXIi8Mb775sGLg69cPnfm7T6vXRrKZp5oqA2OUzRqUqha4mDWbSKACNgIBdpbKFVxFMDU1Mfbqbw5tBT/S339DRXCA4L2yCfsVk4OZFAFbhecBFQRQUa6+3h7wQ3+uFecf+FIuZ2DGZ30km7U6NjuCBgFvbCXsni+bEEgkEgABTC4uLhmx8OpWpV8SRQ6q2XUuwwEcyawhFUK8FzB7Ea0kCBRUQ42H9yaToeN64OPguhNpHE3AMg/5JiEbkw155hyCm121XSsWjhtTaDSckudHMgRNMJuAOYR7jl1wItbf3IfC1Uvnt2PhkZj0oYWeprhcxjmwVBhlzi4E3eLixlbQRQSEJy0xrR7m83nDdEkeHWI0mVymSAIClFCQJJHLhFEAURs/PTSwdSg4i9XvGzO7O3uPNre2wbZtrqskSaBpGuiqCqqqQA86RRLE6VMjmWetGLQd/GT2xGMj2VvSEcaiXq+D40ReF9Ahuq7hBPKPduCOcHRCoCnqQhIPiSTJ/BnbTmZTTVF49rquzkOHoJ06NV1725PQgRUuriBKLCJcQTh7FtBwudN4sVOnDPSjhtrKsgRNS/NDwzYTD06YGTj6Bf43c0Fwd1imsihxj3seHiost2wCQugKxERHeDqdNnf3K3fZYWHFyjRNrOUeVLFKFn/9nouDi3EvrH9b/2z0Gdzs62tfIaGpwMQvFDeXu8qcxXB2uC+hKWBaFhSLP7kNTTy9VtlKdA0XiFBl7qhZKInv4UciGkIazn7XcDWlvnQdr8ArYBiVAjyV87OzM+Wu4WOZTGmvsTFKU5UXQxOpcMN8f+fK5YuzcIj4A5rGkZyBEemOAAAAAElFTkSuQmCC"
                                        alt=""> Лампочка
                                    теплого света</div>
                            </div>
                        </div>
                        <button class="header__search_dropdown__button">Показать все результаты поиска</button>
                    </div>

                </div>

                <button class="header__catalog__button" onclick="openCategoryMenu();">
                    <img src="/temple/images/layout/icon/burger.svg" alt="burger">
                    Каталог</button>

                <a href="#" class="header__button">Свяжитесь с нами</a>

                <div class="header__actions">
                    <a href="#" class="header__action header__action_hover">
                        <!-- public\temple\images\layout\icon\favorite.svg -->
                        <svg width="18" height="21" viewBox="0 0 18 21" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 1.49222C0 0.668092 0.688793 0 1.53846 0H16.4615C17.3112 0 18 0.668091 18 1.49222V20.452C18 20.8815 17.513 21.1436 17.1373 20.9162L9.29861 16.1724C9.11586 16.0618 8.88414 16.0618 8.70139 16.1724L0.862708 20.9162C0.486973 21.1436 0 20.8815 0 20.452V1.49222Z" />
                        </svg>
                        Избранное
                    </a>
                    <a href="#" class="header__action header__action_hover">
                        <!-- public\temple\images\layout\icon\basket.svg -->
                        <svg width="23" height="21" viewBox="0 0 23 21" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.91299 3.10869L0.780596 2.15859C0.200337 1.98259 -0.128051 1.36729 0.0471219 0.784288C0.222295 0.201285 0.834692 -0.128656 1.41495 0.0473447L5.8757 1.40035L7.71315 13.6029H18.0253C18.103 13.6029 18.1722 13.5536 18.1979 13.48L18.6839 12.0883C18.7252 11.9703 18.6395 11.8463 18.515 11.8437L11.2281 11.6953C10.6221 11.683 10.1408 11.1794 10.1531 10.5705C10.1654 9.96167 10.6666 9.47809 11.2726 9.49043L19.4 9.65595C19.479 9.65756 19.5501 9.60799 19.5763 9.53306L20.0431 8.1963C20.0849 8.07679 19.9966 7.95168 19.8705 7.95168H11.7536C11.1475 7.95168 10.6561 7.45799 10.6561 6.849C10.6561 6.24001 11.1475 5.74633 11.7536 5.74633H22.4508C22.829 5.74633 23.0938 6.12167 22.9686 6.48021L19.9042 15.255C19.7885 15.5864 19.477 15.8082 19.1275 15.8082H6.53323C6.12619 15.8082 5.78027 15.5093 5.71938 15.1049L3.91299 3.10869Z" />
                            <path
                                d="M10.5647 19.1622C10.5647 20.1772 9.74575 21 8.73555 21C7.72534 21 6.9064 20.1772 6.9064 19.1622C6.9064 18.1472 7.72534 17.3244 8.73555 17.3244C9.74575 17.3244 10.5647 18.1472 10.5647 19.1622Z" />
                            <path
                                d="M18.6129 19.1622C18.6129 20.1772 17.794 21 16.7838 21C15.7736 21 14.9546 20.1772 14.9546 19.1622C14.9546 18.1472 15.7736 17.3244 16.7838 17.3244C17.794 17.3244 18.6129 18.1472 18.6129 19.1622Z" />
                        </svg>

                        Корзина
                    </a>
                    <a class="header__action header__action_hover">
                        <!-- public\temple\images\layout\icon\user.svg -->
                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5158 4.96201C13.5158 7.70246 11.2464 9.92402 8.44688 9.92402C5.64738 9.92402 3.37794 7.70246 3.37794 4.96201C3.37794 2.22157 5.64738 0 8.44688 0C11.2464 0 13.5158 2.22157 13.5158 4.96201Z" />
                            <path
                                d="M0 17.0447C0 13.9773 2.5402 11.4906 5.6737 11.4906H12.1429C14.8254 11.4906 17 13.6194 17 16.2453V21H0V17.0447Z" />
                        </svg>

                        Войти
                    </a>

                    <div class="header__world_dropdown header__action_hover">

                        <!-- public\temple\images\layout\icon\world.svg -->
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.0312 0.0126667C10.4451 -0.0505081 10.6091 0.122629 10.5233 0.532078C8.88104 2.0561 7.57637 3.82682 6.60929 5.84424C5.12776 5.92186 3.64339 5.93764 2.15616 5.89146C1.87669 5.77789 1.80638 5.58118 1.94522 5.30122C3.91734 2.42688 6.61266 0.664036 10.0312 0.0126667Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.6406 0.0126579C17.2162 0.549516 20.0209 2.31236 22.0547 5.30121C22.2025 5.58679 22.1322 5.7835 21.8438 5.89145C20.3565 5.93763 18.8722 5.92186 17.3906 5.84423C16.4236 3.82681 15.1189 2.05609 13.4766 0.532069C13.4139 0.313541 13.4686 0.140404 13.6406 0.0126579Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.2032 0.957031C11.3684 0.949754 11.5012 1.01271 11.6016 1.14591C11.6329 2.67266 11.6329 4.19942 11.6016 5.72617C11.5398 5.81999 11.4538 5.8751 11.3438 5.89144C10.169 5.93728 8.99708 5.92156 7.82816 5.84422C7.6611 5.70284 7.622 5.53757 7.71097 5.34841C8.60586 3.6678 9.76991 2.20401 11.2032 0.957031Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.6094 0.957038C12.7465 0.95514 12.8715 0.994492 12.9844 1.07509C14.4066 2.3539 15.5316 3.84918 16.3594 5.56091C16.3311 5.67745 16.2686 5.77188 16.1719 5.84422C15.003 5.92157 13.8311 5.93729 12.6563 5.89144C12.5706 5.87855 12.5003 5.83917 12.4454 5.77339C12.3679 4.25068 12.3523 2.72392 12.3985 1.19313C12.4465 1.08987 12.5169 1.01117 12.6094 0.957038Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 11.4397C0 11.2036 0 10.9675 0 10.7314C0.142049 9.52979 0.446736 8.36503 0.914062 7.2372C0.998484 7.04318 1.10004 6.86219 1.21875 6.69418C2.77841 6.61651 4.34091 6.60074 5.90625 6.64696C6.09431 6.68705 6.18806 6.8051 6.1875 7.00111C5.73047 8.42953 5.45705 9.89333 5.36719 11.3925C5.33039 11.4768 5.27573 11.5477 5.20312 11.605C3.53125 11.6365 1.85938 11.6365 0.1875 11.605C0.10077 11.5724 0.0382704 11.5173 0 11.4397Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.31249 6.62335C8.65635 6.61546 10.0001 6.62335 11.3437 6.64696C11.4538 6.6633 11.5397 6.7184 11.6016 6.81223C11.6328 8.35474 11.6328 9.8972 11.6016 11.4397C11.5625 11.5105 11.5078 11.5656 11.4375 11.605C9.73438 11.6365 8.03123 11.6365 6.32812 11.605C6.28518 11.5873 6.24609 11.5637 6.21093 11.5341C6.16931 9.88615 6.46617 8.29642 7.10156 6.76501C7.1676 6.70452 7.23792 6.6573 7.31249 6.62335Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.6563 6.62333C14.0499 6.60086 15.4405 6.62447 16.8281 6.69416C16.9147 6.78973 16.9771 6.8999 17.0156 7.0247C17.5656 8.48353 17.8234 9.98671 17.7891 11.5341C17.7539 11.5637 17.7148 11.5873 17.6719 11.605C15.9688 11.6365 14.2656 11.6365 12.5625 11.605C12.5078 11.5499 12.4532 11.4948 12.3984 11.4397C12.3672 9.89718 12.3672 8.35472 12.3984 6.81221C12.4688 6.71924 12.5547 6.65629 12.6563 6.62333Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24 10.6842C24 10.9518 24 11.2193 24 11.4869C23.9445 11.5343 23.8821 11.5737 23.8125 11.605C22.1406 11.6365 20.4688 11.6365 18.7969 11.605C18.7243 11.5477 18.6696 11.4768 18.6328 11.3925C18.5512 9.89182 18.2778 8.42802 17.8125 7.00111C17.8119 6.8051 17.9057 6.68705 18.0938 6.64696C19.6591 6.60074 21.2216 6.61651 22.7813 6.69418C23.1112 7.28121 23.369 7.90295 23.5547 8.55934C23.7493 9.26432 23.8977 9.97261 24 10.6842Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 13.3285C0 13.0609 0 12.7933 0 12.5258C0.0554415 12.4783 0.117941 12.439 0.1875 12.4077C1.85938 12.3762 3.53125 12.3762 5.20312 12.4077C5.27573 12.465 5.33039 12.5359 5.36719 12.6202C5.45705 14.1194 5.73047 15.5831 6.1875 17.0116C6.18806 17.2076 6.09431 17.3256 5.90625 17.3657C4.34091 17.4119 2.77841 17.3962 1.21875 17.3185C0.888778 16.7315 0.630966 16.1097 0.445312 15.4533C0.250724 14.7484 0.102287 14.0401 0 13.3285Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.32812 12.3841C8.03133 12.3762 9.73444 12.3841 11.4375 12.4077C11.4922 12.4628 11.5469 12.5179 11.6016 12.573C11.6328 14.1155 11.6328 15.6579 11.6016 17.2004C11.5397 17.2943 11.4538 17.3494 11.3437 17.3657C9.95025 17.4118 8.55961 17.3961 7.17187 17.3185C7.09964 17.2439 7.04494 17.1573 7.00781 17.0588C6.46889 15.6113 6.18764 14.116 6.16406 12.573C6.19641 12.4856 6.25106 12.4226 6.32812 12.3841Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.5625 12.3841C14.2657 12.3762 15.9688 12.3841 17.6719 12.4077C17.8322 12.5094 17.8947 12.6589 17.8594 12.8563C17.7773 14.3006 17.4882 15.7015 16.9922 17.0588C16.9551 17.1573 16.9004 17.2439 16.8281 17.3185C15.4404 17.3961 14.0498 17.4118 12.6563 17.3657C12.5462 17.3494 12.4603 17.2943 12.3984 17.2004C12.3672 15.6579 12.3672 14.1155 12.3984 12.573C12.4501 12.5045 12.5048 12.4416 12.5625 12.3841Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24 12.573C24 12.8091 24 13.0452 24 13.2813C23.858 14.4829 23.5533 15.6476 23.0859 16.7755C23.0015 16.9695 22.8999 17.1505 22.7813 17.3185C21.2216 17.3962 19.6591 17.4119 18.0938 17.3657C17.9057 17.3256 17.8119 17.2076 17.8125 17.0116C18.2695 15.5831 18.543 14.1194 18.6328 12.6202C18.6696 12.5359 18.7243 12.465 18.7969 12.4077C20.4688 12.3762 22.1406 12.3762 23.8125 12.4077C23.8992 12.4403 23.9618 12.4953 24 12.573Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.15619 18.0976C3.6435 18.075 5.12788 18.0986 6.60931 18.1684C7.57639 20.1859 8.88106 21.9566 10.5234 23.4806C10.6123 23.7904 10.503 23.9636 10.1953 24C7.00086 23.4621 4.40713 21.9197 2.414 19.3725C2.22987 19.1114 2.05799 18.8439 1.89838 18.5698C1.85154 18.3333 1.93748 18.1759 2.15619 18.0976Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.96875 18.0976C9.09384 18.0897 10.2188 18.0976 11.3437 18.1212C11.4295 18.1341 11.4998 18.1735 11.5547 18.2393C11.6321 19.762 11.6477 21.2887 11.6016 22.8195C11.4487 23.0648 11.2534 23.1042 11.0156 22.9376C9.59348 21.6587 8.46848 20.1635 7.64062 18.4518C7.69622 18.2779 7.80558 18.1598 7.96875 18.0976Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.6563 18.0976C13.7814 18.0897 14.9064 18.0976 16.0313 18.1212C16.2032 18.1684 16.3125 18.2786 16.3594 18.4518C15.5315 20.1635 14.4065 21.6587 12.9844 22.9376C12.7689 23.0963 12.5736 23.0727 12.3984 22.8668C12.3672 21.3557 12.3672 19.8447 12.3984 18.3337C12.4503 18.2103 12.5363 18.1316 12.6563 18.0976Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.5313 18.0976C18.9688 18.0897 20.4063 18.0976 21.8438 18.1212C22.1226 18.2361 22.1929 18.4329 22.0547 18.7115C20.0898 21.585 17.3945 23.34 13.9688 23.9764C13.5521 24.0604 13.3881 23.8951 13.4766 23.4806C15.0873 22.0005 16.353 20.2691 17.2734 18.2865C17.3438 18.1935 17.4297 18.1306 17.5313 18.0976Z" />
                        </svg>


                        <div class="header__world_dropdown__menu">
                            <div class="header__world_dropdown__menu_items_wrapper">
                                <div class="header__world_dropdown__menu_items">
                                    <div class="header__world_dropdown__menu_item active">Русский</div>
                                    <div class="header__world_dropdown__menu_item">English</div>
                                    <div class="header__world_dropdown__menu_item">English</div>
                                    <div class="header__world_dropdown__menu_item">English</div>
                                    <div class="header__world_dropdown__menu_item">English</div>
                                    <div class="header__world_dropdown__menu_item">English</div>
                                </div>
                                <div class="header__world_dropdown__menu_items">
                                    <div class="header__world_dropdown__menu_item">₽</div>
                                    <div class="header__world_dropdown__menu_item">$</div>
                                    <div class="header__world_dropdown__menu_item">$</div>
                                    <div class="header__world_dropdown__menu_item">$</div>
                                    <div class="header__world_dropdown__menu_item">$</div>
                                    <div class="header__world_dropdown__menu_item">$</div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="header__burger_menu">
                    <div class="rect"></div>
                    <div class="rect"></div>
                    <div class="rect"></div>
                </div>
            </div>
        </header>

        <main class="main">

            <section class="banners">
                <div class="banners__container">
                    <div class="banner-block">

                        <div class="swiper" id="main_banners">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="/assets/banners/1.webp" alt="1.webp" loading="lazy"
                                        decoding="async" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="/assets/banners/2.webp" alt="2.webp" loading="lazy"
                                        decoding="async" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="/assets/banners/3.webp" alt="3.webp" loading="lazy"
                                        decoding="async" />
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="categories categories_one_line">
                <div class="categories__container">

                    <!-- <img class="categories__bg" src="/temple/images/landing/bg/1.svg" alt="news bg"> -->
                    <div class="categories__bg">
                        <!-- public\temple\images\landing\bg\bg.svg -->
                        <svg class="bg_flicker" width="711" height="427" viewBox="0 0 711 427" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 427H0.5L0.5 426.5H71V427H71.5V426.5H142V427H142.5V426.5H213V427H213.5V426.5H284V427H284.5V426.5H355V427H355.5V426.5H426V427H426.5V426.5H497V427H497.5V426.5H568V427H568.5V426.5H639V427H639.5V426.5H710V427H710.5V0H1.86648e-05L0 427ZM710 426V355.5H639.5V426H710ZM639 426V355.5H568.5V426H639ZM568 426V355.5H497.5L497.5 426H568ZM497 426L497 355.5H426.5L426.5 426H497ZM426 426L426 355.5H355.5L355.5 426H426ZM355 426L355 355.5H284.5L284.5 426H355ZM284 426L284 355.5H213.5L213.5 426H284ZM213 426L213 355.5H142.5L142.5 426H213ZM142 426L142 355.5H71.5L71.5 426H142ZM71 426L71 355.5H0.500003L0.5 426H71ZM71 355H0.500003L0.500006 284.5H71V355ZM142 355H71.5V284.5H142V355ZM213 355H142.5V284.5H213V355ZM284 355H213.5V284.5H284V355ZM355 355H284.5V284.5H355V355ZM426 355H355.5V284.5H426V355ZM497 355H426.5V284.5H497V355ZM568 355H497.5V284.5H568V355ZM639 355H568.5V284.5H639V355ZM710 355H639.5V284.5H710V355ZM710 284V213.5H639.5V284H710ZM639 284V213.5H568.5V284H639ZM568 284V213.5H497.5V284H568ZM497 284V213.5H426.5V284H497ZM426 284V213.5H355.5V284H426ZM355 284V213.5H284.5V284H355ZM284 284V213.5H213.5V284H284ZM213 284V213.5H142.5V284H213ZM142 284V213.5H71.5L71.5 284H142ZM71 284L71 213.5H0.500009L0.500006 284H71ZM71 213H0.500009L0.500012 142.5H71V213ZM142 213H71.5V142.5H142V213ZM213 213H142.5V142.5H213V213ZM284 213H213.5V142.5H284V213ZM355 213H284.5V142.5H355V213ZM426 213H355.5V142.5H426V213ZM497 213H426.5V142.5H497V213ZM568 213H497.5V142.5H568V213ZM639 213H568.5V142.5H639V213ZM710 213H639.5V142.5H710V213ZM710 142V71.5H639.5V142H710ZM639 142V71.5H568.5V142H639ZM568 142V71.5H497.5V142H568ZM497 142V71.5H426.5V142H497ZM426 142V71.5H355.5V142H426ZM355 142V71.5H284.5V142H355ZM284 142V71.5H213.5V142H284ZM213 142V71.5H142.5V142H213ZM142 142V71.5H71.5V142H142ZM71 142V71.5H0.500016L0.500012 142H71ZM71 71H0.500016L0.500019 0.5H71V71ZM142 71H71.5V0.5H142V71ZM213 71H142.5V0.5H213V71ZM284 71H213.5V0.5H284V71ZM355 71H284.5V0.5H355V71ZM426 71H355.5V0.5H426V71ZM497 71H426.5V0.5H497V71ZM568 71H497.5V0.5H568V71ZM639 71H568.5V0.5H639V71ZM710 71H639.5V0.5H710V71Z"
                                fill="url(#paint0_radial_655_2)" />
                            <rect x="71.2617" y="63.7344" width="10.667" height="10.667"
                                transform="rotate(45 71.2617 63.7344)" class="bg_flicker_element" fill="#DE002B" />
                            <rect x="284.242" y="134.732" width="10.667" height="10.667"
                                transform="rotate(45 284.242 134.732)" class="bg_flicker_element" fill="#DE002B" />
                            <rect x="568.266" y="205.711" width="10.667" height="10.667"
                                transform="rotate(45 568.266 205.711)" class="bg_flicker_element" fill="#DE002B" />
                            <path d="M646.801 142.286L639.258 134.743L631.715 142.286L639.258 149.829L646.801 142.286Z"
                                class="bg_flicker_element2" fill="#DE002B" />
                            <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                                d="M639.258 122.414L659.129 142.285L639.258 162.157L619.387 142.285L639.258 122.414ZM639.258 123.121L658.422 142.285L639.258 161.45L620.094 142.285L639.258 123.121Z"
                                fill="#DE002B" />
                            <path d="M149.785 284.27L142.242 276.728L134.7 284.27L142.242 291.813L149.785 284.27Z"
                                class="bg_flicker_element2" fill="#DE002B" />
                            <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                                d="M142.242 264.398L162.114 284.27L142.242 304.141L122.371 284.27L142.242 264.398ZM142.242 265.106L161.407 284.27L142.242 303.434L123.078 284.27L142.242 265.106Z"
                                fill="#DE002B" />
                            <defs>
                                <radialGradient id="paint0_radial_655_2" cx="0" cy="0" r="1"
                                    gradientUnits="userSpaceOnUse"
                                    gradientTransform="translate(355.25 213.5) rotate(90) scale(213.5 355.25)">
                                    <stop stop-color="#DE002B" />
                                    <stop offset="1" stop-color="#DE002B" stop-opacity="0" />
                                </radialGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="app__title">
                        <div class="app__title_wrapper">
                            <h2 class="app__title_text">Популярные категории</h2>
                            <p class="app__title_description">Мы собрали для вас лучшие категории, которые есть в нашем
                                магазине</p>
                        </div>
                        <button class="app__title_button">Смотреть все</button>
                    </div>

                    <div class="categories__lists">
                        <div class="categories__item activ">
                            <div class="categories__hover">
                                <div class="categories__hover_items">
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title bold">Название
                                            категssssssssssssssssssssории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                </div>

                                <button class="categories__hover_item_btn">Еще 8</button>

                            </div>
                            <div class="categories__item_title">Lorem ipsum</div>
                            <div class="categories__item_description">Lorem ipsum</div>

                            <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                                decoding="async" alt="">
                        </div>
                        <div class="categories__item">
                            <div class="categories__hover">
                                <div class="categories__hover_items">
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title bold">Название
                                            категssssssssssssssssssssории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                </div>

                                <button class="categories__hover_item_btn">Еще 8</button>

                            </div>
                            <div class="categories__item_title">Lorem ipsum</div>
                            <div class="categories__item_description">Lorem ipsum</div>

                            <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                                decoding="async" alt="">
                        </div>
                        <div class="categories__item">
                            <div class="categories__hover">
                                <div class="categories__hover_items">
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title bold">Название
                                            категssssssssssssssssssssории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                </div>

                                <button class="categories__hover_item_btn">Еще 8</button>

                            </div>
                            <div class="categories__item_title">Lorem ipsum</div>
                            <div class="categories__item_description">Lorem ipsum</div>

                            <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                                decoding="async" alt="">
                        </div>
                        <div class="categories__item">
                            <div class="categories__hover">
                                <div class="categories__hover_items">
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title bold">Название
                                            категssssssssssssssssssssории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                    <a href="#" class="categories__hover_item">
                                        <h4 class="categories__hover_item_title">Название категории</h4>
                                        <div class="categories__hover_item_line"></div>
                                        <p class="categories__hover_item_count">5</p>
                                    </a>
                                </div>

                                <button class="categories__hover_item_btn">Еще 8</button>

                            </div>
                            <div class="categories__item_title">Lorem ipsum</div>
                            <div class="categories__item_description">Lorem ipsum</div>

                            <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                                decoding="async" alt="">
                        </div>
                        <div class="categories__item categories__item_last">
                            <h3>Оставить заявку наподбор техники</h3>
                            <button>Заявка</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="companies">
                <div class="companies__container">
                    <!-- <img class="categories__bg" src="/temple/images/landing/bg/1.svg" alt="news bg"> -->
                    <div class="companies__bg">
                        <!-- public\temple\images\landing\bg\bg.svg -->
                        <svg class="bg_flicker" width="711" height="427" viewBox="0 0 711 427" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 427H0.5L0.5 426.5H71V427H71.5V426.5H142V427H142.5V426.5H213V427H213.5V426.5H284V427H284.5V426.5H355V427H355.5V426.5H426V427H426.5V426.5H497V427H497.5V426.5H568V427H568.5V426.5H639V427H639.5V426.5H710V427H710.5V0H1.86648e-05L0 427ZM710 426V355.5H639.5V426H710ZM639 426V355.5H568.5V426H639ZM568 426V355.5H497.5L497.5 426H568ZM497 426L497 355.5H426.5L426.5 426H497ZM426 426L426 355.5H355.5L355.5 426H426ZM355 426L355 355.5H284.5L284.5 426H355ZM284 426L284 355.5H213.5L213.5 426H284ZM213 426L213 355.5H142.5L142.5 426H213ZM142 426L142 355.5H71.5L71.5 426H142ZM71 426L71 355.5H0.500003L0.5 426H71ZM71 355H0.500003L0.500006 284.5H71V355ZM142 355H71.5V284.5H142V355ZM213 355H142.5V284.5H213V355ZM284 355H213.5V284.5H284V355ZM355 355H284.5V284.5H355V355ZM426 355H355.5V284.5H426V355ZM497 355H426.5V284.5H497V355ZM568 355H497.5V284.5H568V355ZM639 355H568.5V284.5H639V355ZM710 355H639.5V284.5H710V355ZM710 284V213.5H639.5V284H710ZM639 284V213.5H568.5V284H639ZM568 284V213.5H497.5V284H568ZM497 284V213.5H426.5V284H497ZM426 284V213.5H355.5V284H426ZM355 284V213.5H284.5V284H355ZM284 284V213.5H213.5V284H284ZM213 284V213.5H142.5V284H213ZM142 284V213.5H71.5L71.5 284H142ZM71 284L71 213.5H0.500009L0.500006 284H71ZM71 213H0.500009L0.500012 142.5H71V213ZM142 213H71.5V142.5H142V213ZM213 213H142.5V142.5H213V213ZM284 213H213.5V142.5H284V213ZM355 213H284.5V142.5H355V213ZM426 213H355.5V142.5H426V213ZM497 213H426.5V142.5H497V213ZM568 213H497.5V142.5H568V213ZM639 213H568.5V142.5H639V213ZM710 213H639.5V142.5H710V213ZM710 142V71.5H639.5V142H710ZM639 142V71.5H568.5V142H639ZM568 142V71.5H497.5V142H568ZM497 142V71.5H426.5V142H497ZM426 142V71.5H355.5V142H426ZM355 142V71.5H284.5V142H355ZM284 142V71.5H213.5V142H284ZM213 142V71.5H142.5V142H213ZM142 142V71.5H71.5V142H142ZM71 142V71.5H0.500016L0.500012 142H71ZM71 71H0.500016L0.500019 0.5H71V71ZM142 71H71.5V0.5H142V71ZM213 71H142.5V0.5H213V71ZM284 71H213.5V0.5H284V71ZM355 71H284.5V0.5H355V71ZM426 71H355.5V0.5H426V71ZM497 71H426.5V0.5H497V71ZM568 71H497.5V0.5H568V71ZM639 71H568.5V0.5H639V71ZM710 71H639.5V0.5H710V71Z"
                                fill="url(#paint0_radial_655_2)" />
                            <rect x="71.2617" y="63.7344" width="10.667" height="10.667"
                                transform="rotate(45 71.2617 63.7344)" class="bg_flicker_element" fill="#DE002B" />
                            <rect x="284.242" y="134.732" width="10.667" height="10.667"
                                transform="rotate(45 284.242 134.732)" class="bg_flicker_element" fill="#DE002B" />
                            <rect x="568.266" y="205.711" width="10.667" height="10.667"
                                transform="rotate(45 568.266 205.711)" class="bg_flicker_element" fill="#DE002B" />
                            <path d="M646.801 142.286L639.258 134.743L631.715 142.286L639.258 149.829L646.801 142.286Z"
                                class="bg_flicker_element2" fill="#DE002B" />
                            <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                                d="M639.258 122.414L659.129 142.285L639.258 162.157L619.387 142.285L639.258 122.414ZM639.258 123.121L658.422 142.285L639.258 161.45L620.094 142.285L639.258 123.121Z"
                                fill="#DE002B" />
                            <path d="M149.785 284.27L142.242 276.728L134.7 284.27L142.242 291.813L149.785 284.27Z"
                                class="bg_flicker_element2" fill="#DE002B" />
                            <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                                d="M142.242 264.398L162.114 284.27L142.242 304.141L122.371 284.27L142.242 264.398ZM142.242 265.106L161.407 284.27L142.242 303.434L123.078 284.27L142.242 265.106Z"
                                fill="#DE002B" />
                            <defs>
                                <radialGradient id="paint0_radial_655_2" cx="0" cy="0" r="1"
                                    gradientUnits="userSpaceOnUse"
                                    gradientTransform="translate(355.25 213.5) rotate(90) scale(213.5 355.25)">
                                    <stop stop-color="#DE002B" />
                                    <stop offset="1" stop-color="#DE002B" stop-opacity="0" />
                                </radialGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="swiper" id="companies_slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/1.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/2.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/3.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/4.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/5.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/6.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/7.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/8.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/9.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/10.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/1.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/2.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/3.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/4.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/5.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>

                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/7.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/8.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/9.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                            <div class="swiper-slide company__slide">
                                <img src="/assets/companies/logo/10.svg" alt="imh" loading="lazy"
                                    decoding="async" />
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="produtcs">
                <div class="produtcs__container">
                    <div class="app__title">
                        <div class="app__title_wrapper">
                            <h2 class="app__title_text">Наши товары</h2>
                            <div class="app__blocks">
                                <button class="btn activ">Распродажа</button>
                                <button class="btn">Хиты</button>
                                <button class="btn">Товары по акции</button>
                                <button class="btn">Новинки</button>
                            </div>
                        </div>
                        <div class="produtcs__actions">
                            <div id="select2_sort" class="select2_sample_nude">
                                <select class="select2_custom" name="lang" data-dropdown-position="below"
                                    data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort">
                                    <option value="1" selected="">Сначала новые</option>
                                    <option value="10">1</option>
                                    <option value="2">Сначала старые</option>
                                    <option value="3">Сначала дорогие</option>
                                    <option value="3">Сначала дешевые</option>
                                </select>
                            </div>
                            <button class="app__title_button">Смотреть все</button>
                        </div>

                    </div>
                    <div class="produtcs__lists">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
                                </svg>
                            </button>

                            <div class="product_card__head">
                                <div class="product_card__head_tips">
                                    <span>Хит</span>
                                    <span class="recommend">Советуем</span>
                                </div>

                                <h4 class="product_card__head_name">Lorem, ipsum.</h4>
                                <p class="product_card__head_description">Lorem ipsum</p>
                            </div>

                            <div class="product_card__img">
                                <img src="/assets/product/miniature/test.png" alt="img">
                            </div>

                            <div class="product_card__info">
                                <div class="product_card__info_price">
                                    <span>Цена</span>
                                    <p>250 ₽</p>
                                </div>
                                <div class="product_card__info_price">
                                    <span>Кол-во (шт.)</span>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="news">
                <div class="news__container">
                    <div class="news__bg">
                        <!-- public\temple\images\landing\bg\bg.svg -->
                        <svg class="bg_flicker" width="711" height="427" viewBox="0 0 711 427"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 427H0.5L0.5 426.5H71V427H71.5V426.5H142V427H142.5V426.5H213V427H213.5V426.5H284V427H284.5V426.5H355V427H355.5V426.5H426V427H426.5V426.5H497V427H497.5V426.5H568V427H568.5V426.5H639V427H639.5V426.5H710V427H710.5V0H1.86648e-05L0 427ZM710 426V355.5H639.5V426H710ZM639 426V355.5H568.5V426H639ZM568 426V355.5H497.5L497.5 426H568ZM497 426L497 355.5H426.5L426.5 426H497ZM426 426L426 355.5H355.5L355.5 426H426ZM355 426L355 355.5H284.5L284.5 426H355ZM284 426L284 355.5H213.5L213.5 426H284ZM213 426L213 355.5H142.5L142.5 426H213ZM142 426L142 355.5H71.5L71.5 426H142ZM71 426L71 355.5H0.500003L0.5 426H71ZM71 355H0.500003L0.500006 284.5H71V355ZM142 355H71.5V284.5H142V355ZM213 355H142.5V284.5H213V355ZM284 355H213.5V284.5H284V355ZM355 355H284.5V284.5H355V355ZM426 355H355.5V284.5H426V355ZM497 355H426.5V284.5H497V355ZM568 355H497.5V284.5H568V355ZM639 355H568.5V284.5H639V355ZM710 355H639.5V284.5H710V355ZM710 284V213.5H639.5V284H710ZM639 284V213.5H568.5V284H639ZM568 284V213.5H497.5V284H568ZM497 284V213.5H426.5V284H497ZM426 284V213.5H355.5V284H426ZM355 284V213.5H284.5V284H355ZM284 284V213.5H213.5V284H284ZM213 284V213.5H142.5V284H213ZM142 284V213.5H71.5L71.5 284H142ZM71 284L71 213.5H0.500009L0.500006 284H71ZM71 213H0.500009L0.500012 142.5H71V213ZM142 213H71.5V142.5H142V213ZM213 213H142.5V142.5H213V213ZM284 213H213.5V142.5H284V213ZM355 213H284.5V142.5H355V213ZM426 213H355.5V142.5H426V213ZM497 213H426.5V142.5H497V213ZM568 213H497.5V142.5H568V213ZM639 213H568.5V142.5H639V213ZM710 213H639.5V142.5H710V213ZM710 142V71.5H639.5V142H710ZM639 142V71.5H568.5V142H639ZM568 142V71.5H497.5V142H568ZM497 142V71.5H426.5V142H497ZM426 142V71.5H355.5V142H426ZM355 142V71.5H284.5V142H355ZM284 142V71.5H213.5V142H284ZM213 142V71.5H142.5V142H213ZM142 142V71.5H71.5V142H142ZM71 142V71.5H0.500016L0.500012 142H71ZM71 71H0.500016L0.500019 0.5H71V71ZM142 71H71.5V0.5H142V71ZM213 71H142.5V0.5H213V71ZM284 71H213.5V0.5H284V71ZM355 71H284.5V0.5H355V71ZM426 71H355.5V0.5H426V71ZM497 71H426.5V0.5H497V71ZM568 71H497.5V0.5H568V71ZM639 71H568.5V0.5H639V71ZM710 71H639.5V0.5H710V71Z"
                                fill="url(#paint0_radial_655_2)" />
                            <rect x="71.2617" y="63.7344" width="10.667" height="10.667"
                                transform="rotate(45 71.2617 63.7344)" class="bg_flicker_element"
                                fill="#DE002B" />
                            <rect x="284.242" y="134.732" width="10.667" height="10.667"
                                transform="rotate(45 284.242 134.732)" class="bg_flicker_element"
                                fill="#DE002B" />
                            <rect x="568.266" y="205.711" width="10.667" height="10.667"
                                transform="rotate(45 568.266 205.711)" class="bg_flicker_element"
                                fill="#DE002B" />
                            <path d="M646.801 142.286L639.258 134.743L631.715 142.286L639.258 149.829L646.801 142.286Z"
                                class="bg_flicker_element2" fill="#DE002B" />
                            <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                                d="M639.258 122.414L659.129 142.285L639.258 162.157L619.387 142.285L639.258 122.414ZM639.258 123.121L658.422 142.285L639.258 161.45L620.094 142.285L639.258 123.121Z"
                                fill="#DE002B" />
                            <path d="M149.785 284.27L142.242 276.728L134.7 284.27L142.242 291.813L149.785 284.27Z"
                                class="bg_flicker_element2" fill="#DE002B" />
                            <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                                d="M142.242 264.398L162.114 284.27L142.242 304.141L122.371 284.27L142.242 264.398ZM142.242 265.106L161.407 284.27L142.242 303.434L123.078 284.27L142.242 265.106Z"
                                fill="#DE002B" />
                            <defs>
                                <radialGradient id="paint0_radial_655_2" cx="0" cy="0" r="1"
                                    gradientUnits="userSpaceOnUse"
                                    gradientTransform="translate(355.25 213.5) rotate(90) scale(213.5 355.25)">
                                    <stop stop-color="#DE002B" />
                                    <stop offset="1" stop-color="#DE002B" stop-opacity="0" />
                                </radialGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="app__title">
                        <div class="app__title_wrapper">
                            <h2 class="app__title_text">Новости</h2>
                        </div>
                        <button class="app__title_button">Все новости</button>
                    </div>

                    <div class="news__lists">
                        <div class="news__item">
                            <h3 class="news__item_title">
                                <p>23.10.2024</p>
                                <a href="#">Loresadasdasdasdasdasdm ipsum dolor amet, co
                                    sddddddddddddddddddddddddddddddddddddddddd
                                    nsectetur adipiscing elit</a>
                            </h3>
                            <div class="news__item_img">
                                <img src="/assets/news/preview/1.png" alt="News image">
                            </div>
                        </div>

                        <div class="news__item">
                            <h3 class="news__item_title">
                                <p>23.10.2024</p>
                                <a href="#">Lorem </a>
                            </h3>
                            <div class="news__item_img">
                                <img src="/assets/news/preview/1.png" alt="News image">
                            </div>
                        </div>

                        <div class="news__item">
                            <h3 class="news__item_title">
                                <p>23.10.2024</p>
                                <a href="#">Lorem ipsum dolor amet, consectetur adipiscing elit</a>
                            </h3>
                            <div class="news__item_img">
                                <img src="/assets/news/preview/1.png" alt="News image">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <footer class="footer">
            <div class="footer__container">
                <div class="footer__content">
                    <div class="footer__logo">
                        <a href="/" class="header__logo">
                            <span class="header__logo_icon">МК</span>
                            <div class="header__logo_content">
                                <span class="header__logo_name">ЭЛЕКТРО</span>
                                <span class="header__logo_title">электротовары здесь</span>
                            </div>
                        </a>

                        <p>Оптово-розничная сеть и интернет-магазин электротехнической продукции с доставкой по РФ и
                            СНГ.</p>
                        <div class="footer__socials">
                            <a href="#">
                                <img src="/temple/images/layout/footer/icon/email.svg" alt="email">
                            </a>
                            <a href="#">
                                <img src="/temple/images/layout/footer/icon/tg.svg" alt="tg">
                            </a>
                            <a href="#">
                                <img src="/temple/images/layout/footer/icon/yt.svg" alt="yt">
                            </a>
                            <a href="#">
                                <img src="/temple/images/layout/footer/icon/vk.svg" alt="vk">
                            </a>
                            <a href="#">
                                <img src="/temple/images/layout/footer/icon/in.svg" alt="in">
                            </a>
                        </div>
                    </div>

                    <div class="footer__menu">
                        <h4>Информация</h4>
                        <ul>
                            <li><a href="#">Способы оплаты</a></li>
                            <li><a href="#">Пользовательское <br> соглашение</a></li>
                            <li><a href="#">Политика <br> конфиденциальности</a></li>
                            <li><a href="#">Статьи и обзоры</a></li>
                            <li><a href="#">Производители и бренды</a></li>
                            <li><a href="#">Архив товаров</a></li>
                        </ul>
                    </div>

                    <div class="footer__menu">
                        <h4>Сервисы</h4>
                        <ul>
                            <li><a href="#">Корзина</a></li>
                            <li><a href="#">Авторизация</a></li>
                            <li><a href="#">Настройки аккаунта</a></li>
                            <li><a href="#">Мой адрес</a></li>
                            <li><a href="#">Мои заказы</a></li>
                            <li><a href="#">Поиск на сайте</a></li>
                            <li><a href="#">Карта сайта</a></li>
                        </ul>
                    </div>

                    <div class="footer__menu">
                        <h4>Компания</h4>
                        <ul>
                            <li><a href="#">Краткая информация</a></li>
                            <li><a href="#">История</a></li>
                            <li><a href="#">Реквизиты</a></li>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">Адреса магазинов</a></li>
                            <li><a href="#">Отзывы</a></li>
                        </ul>
                    </div>

                    <div class="footer__menu footer__menu__numbers">
                        <h4>Контакты</h4>
                        <a href="tel:88001005441" class="footer__menu__number">8 800 100-54-41</a>
                        <a href="tel:88001005441" class="footer__menu__number">8 984 707-97-98</a>
                    </div>
                </div>

                <div class="footer__bottom">
                    <p>© 2012-2024 МК ЭЛЕКТРО.</p>
                </div>
            </div>

            @vite('resources/js/landing/index.js')
        </footer>

        <div class="cookies_conteiner">
            <div class="cookies">
                <p>Мк электро использует cookie, чтобы повысить удобство пользованиясайтом.
                    <a href="#">Политика конфиденциальности.</a>
                </p>
                <button>Все верно</button>
            </div>
        </div>

        <div class="support_button">
            <img src="/temple/images/chat/chat.svg" alt="chat">
        </div>

        <button class="go_top go_top__hidden">
            <span class="go_top__inner">
                <img src="{{ Vite::asset('resources/js/custom/go_top/img/str.svg') }}" alt="button up">
            </span>
        </button>

    </div>
</body>

</html>
