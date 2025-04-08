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
                    <span itemprop="name">Компании</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li class="breadcrumb__item">
                <a class="breadcrumb__link off">/</a>
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <a itemprop="item" class="breadcrumb__link active">
                    <span itemprop="name">Название компании</span>
                </a>
                <meta itemprop="position" content="3">
            </li>
        </ul>
    </div>
</section>

<section class="company__container">
    <div class="company">
        <div class="company_info">
            <div class="swiper company_info__slider" id="company_info__slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide company_info__slider_slide">
                        <img src="/assets/contacts/photo/1.png" alt="image" loading="lazy" decoding="async" />
                        <span class="company_info__slider_slide_cover" style="background-image: url('/assets/contacts/photo/1.png');"></span>
                    </div>
                    <div class="swiper-slide company_info__slider_slide">
                        <img src="/assets/contacts/photo/1.png" alt="image" loading="lazy" decoding="async" />
                        <span class="company_info__slider_slide_cover" style="background-image: url('/assets/contacts/photo/1.png');"></span>
                    </div>
                    <div class="swiper-slide company_info__slider_slide">
                        <img src="/assets/contacts/photo/1.png" alt="image" loading="lazy" decoding="async" />
                        <span class="company_info__slider_slide_cover" style="background-image: url('/assets/contacts/photo/1.png');"></span>
                    </div>
                    <div class="swiper-slide company_info__slider_slide">
                        <img src="/assets/contacts/photo/1.png" alt="image" loading="lazy" decoding="async" />
                        <span class="company_info__slider_slide_cover" style="background-image: url('/assets/contacts/photo/1.png');"></span>
                    </div>
                    <div class="swiper-slide company_info__slider_slide">
                        <img src="/assets/contacts/photo/1.png" alt="image" loading="lazy" decoding="async" />
                        <span class="company_info__slider_slide_cover" style="background-image: url('/assets/contacts/photo/1.png');"></span>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="company_info__block">
                <div class="company_info__name">
                    <h1>Название компании</h1>
                    <div>
                        <!-- public\temple\images\company\icon\star.svg -->
                        <svg class="red" width="18" height="17" viewBox="0 0 18 17"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z" />
                        </svg>
                        4.6
                    </div>
                    <div>
                        <svg width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z" />
                        </svg>
                        10 отзывов
                    </div>
                    <div>230 Товаров</div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut </p>
                <p>Контактный телефон: <a href="tel:+70000000000" class="standart_a">+7 000 000 00 00</a>
                </p>
                <p>Контактный почтовый адрес: <a href="mail:Example@mail.ru"
                        class="standart_a">Example@mail.ru</a></p>
            </div>
        </div>
        <div class="slide_menu">
            <button class="activ">
                Товары
            </button>
            <button>
                Отзывы <span>(10)</span>
            </button>
        </div>

        <div class="app__title">
            <div class="app__title_wrapper">
              <h2 class="app__title_text">Товары компании</h2>
            </div>
            <div class="app__filters">
              <div id="select2_sort" class="select2_sample_nude">
                <select class="select2_custom" name="lang" data-dropdown-position="below"
                  data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort"
                  data-search-input-placeholder="Введите город">
                  <option value="1" selected="">Сортировка по категории</option>
                  <option value="10">Москва</option>
                  <option value="2">Новосибирск</option>
                  <option value="3">Москва</option>
                  <option value="3">Москва</option>
                </select>
              </div>
              <div class="app__search">
                <input type="text" placeholder="Введите название">
              </div>
            </div>

        </div>

        <section class="products_list">
            <div class="product_card">
                <div class="product_card__buttons">

                    <button class="btn">Подробнее</button>
                    <button class="btn btn_upend">Купить в один клик</button>

                </div>

                <button class="product_card__favorite">
                    <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
                    <svg width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg">
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
                    <img src="/assets/product/miniature/test.png" alt="img" loading="lazy" decoding="async">
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
        </section>
        <section class="pagination">
            <div class="pagination__container">
                <p>Показано 10 из 84</p>
                <div class="pagination__items">
                    <a class="pagination__arrow" href="#" title="">
                        <img src="/temple/images/component/pagination/arrow.svg" alt="arrow">
                    </a>

                    <span class="page">
                        <a href="#" title="1">
                            1
                        </a>
                    </span>

                    <p class="pagination__activ">2</p>

                    <span class="page">
                        <a href="#" title="1">
                            1
                        </a>
                    </span>
                    <span class="page">
                        <a href="#" title="1">
                            1
                        </a>
                    </span>
                    <span class="page">
                        <a href="#" title="1">
                            1
                        </a>
                    </span>
                    <span class="page">
                        <a href="#" title="1">
                            1
                        </a>
                    </span>
                    <span class="page">
                        <a href="#" title="1">
                            1
                        </a>
                    </span>

                    <a class="pagination__arrow right" href="#" title="">
                        <img src="/temple/images/component/pagination/arrow.svg" alt="arrow">
                    </a>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/company/index.js')
@endsection
