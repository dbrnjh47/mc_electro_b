@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <section class="about">
        <div class="top__container">
            <div class="top">
                <section class="breadcrumb">
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
                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                            <a itemprop="item" class="breadcrumb__link active">
                                <span itemprop="name">О нас</span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>
                    </ul>
                </section>
                <div class="app__title">
                    <div class="app__title_wrapper">
                        <h2 class="app__title_text"><span>МК</span> Электро - Компания
                            основаная в 2005 году</h2>
                    </div>
                </div>
                <p class="top_text">
                    Основное направление деятельности - оптово-розничная торговля
                    электротехнической продукцией.<br />
                    На сегодняшний день мы работаем по всей России и в странах СНГ
                </p>
                <div class="top_background">
                    <img class="top_background_img" src="/temple/images/about/background.png" loading="lazy" decoding="async" />
                </div>
            </div>
        </div>
        <div class="cards__container">
            <div class="cards">
                <div class="card">
                    <h5 class="card_title">Lorem ipsum</h5>
                    <p class="card_subtitle">Lorem ipsum</p>
                    <img class="card_image" src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async" />
                    <div class="card_bottom">
                        <div class="card_item">
                            <span>Цена</span>
                            <span class="card_item_red">250 ₽</span>
                        </div>
                        <div class="card_item">
                            <span>Кол-во (шт.)</span>
                            <span class="card_item_red">12</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card_title">Lorem ipsum</h5>
                    <p class="card_subtitle">Lorem ipsum</p>
                    <img class="card_image" src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async" />
                    <div class="card_bottom">
                        <div class="card_item">
                            <span>Цена</span>
                            <span class="card_item_red">250 ₽</span>
                        </div>
                        <div class="card_item">
                            <span>Кол-во (шт.)</span>
                            <span class="card_item_red">12</span>
                        </div>
                    </div>
                </div>
                <div></div>
                <div></div>
                <div class="card">
                    <h5 class="card_title">Lorem ipsum</h5>
                    <p class="card_subtitle">Lorem ipsum</p>
                    <img class="card_image" src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async" />
                    <div class="card_bottom">
                        <div class="card_item">
                            <span>Цена</span>
                            <span class="card_item_red">250 ₽</span>
                        </div>
                        <div class="card_item">
                            <span>Кол-во (шт.)</span>
                            <span class="card_item_red">12</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card_title">Lorem ipsum</h5>
                    <p class="card_subtitle">Lorem ipsum</p>
                    <img class="card_image" src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async" />
                    <div class="card_bottom">
                        <div class="card_item">
                            <span>Цена</span>
                            <span class="card_item_red">250 ₽</span>
                        </div>
                        <div class="card_item">
                            <span>Кол-во (шт.)</span>
                            <span class="card_item_red">12</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card_title">Lorem ipsum</h5>
                    <p class="card_subtitle">Lorem ipsum</p>
                    <img class="card_image" src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async" />
                    <div class="card_bottom">
                        <div class="card_item">
                            <span>Цена</span>
                            <span class="card_item_red">250 ₽</span>
                        </div>
                        <div class="card_item">
                            <span>Кол-во (шт.)</span>
                            <span class="card_item_red">12</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card_title">Lorem ipsum</h5>
                    <p class="card_subtitle">Lorem ipsum</p>
                    <img class="card_image" src="/assets/product/miniature/test.png" alt="product" loading="lazy" decoding="async" />
                    <div class="card_bottom">
                        <div class="card_item">
                            <span>Цена</span>
                            <span class="card_item_red">250 ₽</span>
                        </div>
                        <div class="card_item">
                            <span>Кол-во (шт.)</span>
                            <span class="card_item_red">12</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider__container">
            <div class="slider swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slider__slide">
                        <div class="slider__item">
                            <p class="slider__item_top">200 000</p>
                            <p class="slider__item_text">
                                Различных товаров в нашем ассортименте
                            </p>
                            <div class="slider__item_icon">
                                <img class="slider__item_img" src="/temple/images/about/icon/assortment.svg" loading="lazy" decoding="async" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__slide">
                        <div class="slider__item">
                            <p class="slider__item_top">40 000</p>
                            <p class="slider__item_text">
                                Довольных клиентов которые заказали у нас
                            </p>
                            <div class="slider__item_icon">
                                <img class="slider__item_img" src="/temple/images/about/icon/person.svg" loading="lazy" decoding="async" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__slide">
                        <div class="slider__item">
                            <p class="slider__item_top">100</p>
                            <p class="slider__item_text">
                                Компаний с нами сотрудничают
                            </p>
                            <div class="slider__item_icon">
                                <img class="slider__item_img" src="/temple/images/about/icon/document.svg" loading="lazy" decoding="async" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__slide">
                        <div class="slider__item">
                            <p class="slider__item_top">400</p>
                            <p class="slider__item_text">Заказов каждый день</p>
                            <div class="slider__item_icon">
                                <img class="slider__item_img" src="/temple/images/about/icon/basket.svg" loading="lazy" decoding="async" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__slide">
                        <div class="slider__item">
                            <p class="slider__item_top">200</p>
                            <p class="slider__item_text">
                                Доставок по всей России за неделю
                            </p>
                            <div class="slider__item_icon">
                                <img class="slider__item_img" src="/temple/images/about/icon/bus.svg" loading="lazy" decoding="async" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__slide">
                        <div class="slider__item">
                            <p class="slider__item_top">20</p>
                            <p class="slider__item_text">Мы находимся в 20 адресах</p>
                            <div class="slider__item_icon">
                                <img class="slider__item_img" src="/temple/images/about/icon/home.svg" loading="lazy" decoding="async" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="descr__container">
            <div class="descr">
                <div class="descr__left">
                    <ul class="descr__left_list">
                        <li class="descr__left_item">
                            <div class="descr__left_icon">
                                <img class="descr__left_img" src="/temple/images/about/icon/people.svg" loading="lazy" decoding="async" />
                            </div>
                            <p class="descr__left_text">
                                Наши клиенты – в центре <br />
                                всего, что мы делаем
                            </p>
                        </li>
                        <li class="descr__left_item">
                            <div class="descr__left_icon">
                                <img class="descr__left_img" src="/temple/images/about/icon/trust.svg" loading="lazy" decoding="async" />
                            </div>
                            <p class="descr__left_text">
                                Доверие - главное. Мы строим <br />
                                долгосрочные отношения
                            </p>
                        </li>
                        <li class="descr__left_item">
                            <div class="descr__left_icon">
                                <img class="descr__left_img" src="/temple/images/about/icon/dimond.svg" loading="lazy" decoding="async" />
                            </div>
                            <p class="descr__left_text">
                                Во всём, чем занимаемся, <br />
                                стремимся быть экспертами
                            </p>
                        </li>
                        <li class="descr__left_item">
                            <div class="descr__left_icon">
                                <img class="descr__left_img" src="/temple/images/about/icon/suitcase.svg" loading="lazy" decoding="async" />
                            </div>
                            <p class="descr__left_text">
                                Открыты для предложений <br />
                                и улучшений
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="descr__right">
                    <p class="descr__right_text">
                        Приобретайте товары удобно и выгодно
                    </p>
                    <a class="btn" href="#">Совершить покупку</a>
                </div>
            </div>
        </div>
        <section class="companies">
            <div class="companies__container">
                <div class="app__title">
                    <div class="app__title_wrapper">
                        <h2 class="app__title_text">Мы официальные <span>партнеры</span></h2>
                    </div>
                </div>
                <div class="swiper" id="companies_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/1.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/2.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/3.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/4.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/5.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/6.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/7.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/8.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/9.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/10.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/1.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/2.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/3.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/4.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/5.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>

                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/7.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/8.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/9.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                        <div class="swiper-slide company__slide">
                            <img src="/assets/companies/logo/10.svg" alt="imh" loading="lazy" decoding="async" />
                        </div>
                    </div>
                </div>
                <div class="companies__bottom_bg">
                    <img src="/temple/images/about/background.png" loading="lazy" decoding="async" />
                </div>
            </div>

        </section>


    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/about/index.js')
@endsection
