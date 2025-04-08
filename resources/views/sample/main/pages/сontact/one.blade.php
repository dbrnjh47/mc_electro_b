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
                        <span itemprop="name">Контакты</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link off">/</a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link active">
                        <span itemprop="name">Контакт</span>
                    </a>
                    <meta itemprop="position" content="3">
                </li>
            </ul>
        </div>
    </section>

    <section class="contact">
        <div class="contact__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Контакт</h2>
                    <p class="app__title_description">Подразделения компании МК Электро в Челябинске
                    </p>
                </div>
            </div>

            <div class="contact__block">
                <div class="contact_card">
                    <div class="swiper contact_card__swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide contact_card__slide">
                                <img class="contact_card__swiper_image" src="/assets/contacts/photo/1.png" alt="image" />
                                <!-- <span class="contact_card__swiper_image_cover" style="background-image: url('/assets/contacts/photo/1.png');"></span> -->
                            </div>
                            <div class="swiper-slide contact_card__slide">
                                <img class="contact_card__swiper_image" src="/assets/contacts/photo/1.png" alt="image" />
                            </div>
                            <div class="swiper-slide contact_card__slide">
                                <img class="contact_card__swiper_image" src="/assets/contacts/photo/1.png" alt="image" />
                            </div>
                            <div class="swiper-slide contact_card__slide">
                                <img class="contact_card__swiper_image" src="/assets/contacts/photo/1.png" alt="image" />
                            </div>
                            <div class="swiper-slide contact_card__slide">
                                <img class="contact_card__swiper_image" src="/assets/contacts/photo/1.png" alt="image" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="contact_card__info">
                        <h5 class="contact_card__title">
                            Центральный офис и склад
                        </h5>
                        <p class="contact_card__item">
                            <span class="contact_card__item_bold">Адрес:</span>
                            ул. Полярная, 57, Челябинск <br />(вход/въезд с пр.
                            Победы)
                        </p>
                        <p class="contact_card__item">
                            <span class="contact_card__item_bold">Почта:</span>
                            <a class="contact_card__item_link" href="mailto:office@mkelektro.ru">
                                office@mkelektro.ru</a>
                        </p>
                        <p class="contact_card__item">
                            <span class="contact_card__item_bold">Режим работы склада:</span>
                            пн-пт <br />
                            9:00-18:00, сб-вс 9:00-17:00
                        </p>

                        <p class="contact_card__item">
                            <span class="contact_card__item_bold"> Телефон:</span>
                            <a class="contact_card__item_link" href="tel:88001005441"> 8 800 100-54-41</a>,
                            <a class="contact_card__item_link" href="tel:89847079798"> 8 984 707-97-98</a>
                        </p>
                        <div class="contact_card__buttons">
                            <button class="contact_card__button contact_card__button--gis">
                                2GIS
                            </button>
                            <button class="contact_card__button contact_card__button--yandex">
                                Яндекс
                            </button>
                            <button class="contact_card__button contact_card__button--google">
                                Google
                            </button>
                        </div>
                    </div>
                </div>
                <div class="contact__wrapper">
                    <div class="contact__info">
                        <h5 class="contact__info_title">Отдел оптовых продаж</h5>
                        <div class="contact__info_items">
                            <div class="contact__info_item_wrapper">
                                <p class="contact__info_item">
                                    Фомин Александр Александрович
                                </p>
                                <p class="contact__info_item">
                                    Режим работы: пн-пт 9:00-17:30
                                </p>
                            </div>
                            <div class="contact__info_item_wrapper">
                                <p class="contact__info_item">
                                    <span> Почта:</span>
                                    <a class="standart_a" href="mailto:mkelektro@list.ru">mkelektro@list.ru</a>
                                </p>
                            </div>
                        </div>
                        <button class="btn">Отправить заявку</button>
                    </div>
                    <div class="contact__map">
                        <img src="/temple/images/contact/map.png" alt="map">
                    </div>
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
    @vite('resources/js/contact/index.js')
@endsection
