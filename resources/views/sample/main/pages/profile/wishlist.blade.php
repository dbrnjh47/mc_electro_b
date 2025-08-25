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
                        <span itemprop="name">Избранное</span>
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
                        <h2 class="app__title_text">Избранное</h2>
                        {{-- <div class="app__blocks">
                            <button class="btn activ">Все (1)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                            <button class="btn">Лампы (2)</button>
                        </div> --}}
                    </div>
                    {{-- <div class="app__filters">
                        <div id="select2_sort" class="select2_sample_nude">
                            <select class="select2_custom" name="lang" data-dropdown-position="below"
                                data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort"
                                data-search-input-placeholder="Введите город">
                                <option value="1" selected="">Челябинск</option>
                                <option value="10">Москва</option>
                                <option value="2">Новосибирск</option>
                                <option value="3">Москва</option>
                                <option value="3">Москва</option>
                            </select>
                        </div>
                        <div class="app__search">
                            <input type="text" placeholder="Введите адресс">
                        </div>
                    </div> --}}

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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
                                    d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                </path>
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
        </div>
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/profile/wishlist/index.js')
@endsection
