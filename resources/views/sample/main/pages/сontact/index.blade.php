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
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link active">
                        <span itemprop="name">Контакты</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </section>

    <section class="contacts">
        <div class="contacts__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Контакты</h2>
                    <p class="app__title_description">Подразделения компании МК Электро в Челябинске</p>
                </div>
                <div class="app__filters">
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
                </div>

            </div>
            <div class="contacts__content">

                @foreach ($points as $point)
                    <div class="contacts__box">
                        <div class="contact_card">
                            <div class="swiper contact_card__swiper">
                                <div class="swiper-wrapper">

                                    @if (!$point->photos->isEmpty())
                                        @foreach ($point->photos as $photo)
                                            <div class="swiper-slide contact_card__slide">
                                                <img class="contact_card__swiper_image" src="{{ $photo->img }}"
                                                    loading="lazy" decoding="async" alt="{{ $point->locale->address }}" />
                                                <span class="contact_card__swiper_image_cover"
                                                    style="background-image: url('{{ $photo->img }}');"></span>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="swiper-slide contact_card__slide">
                                            <img class="contact_card__swiper_image contact_card__swiper_image_defult" src="{{ \App\Models\Point\Point::DEFULT_PREVIEW_PATH }}" loading="lazy"
                                                decoding="async" alt="{{ $point->locale->address }}" />
                                        </div>
                                    @endif


                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="contact_card__info">
                                <h5 class="contact_card__title">
                                    {{ $point->locale->title }}
                                </h5>
                                <p class="contact_card__item">
                                    <span class="contact_card__item_bold">Адрес:</span>
                                    {{ $point->locale->address }} <br />
                                    @if ($point->locale->comment)
                                        ({{ $point->locale->comment }})
                                    @endif
                                </p>

                                @if ($point->email)
                                    <p class="contact_card__item">
                                        <span class="contact_card__item_bold">Почта:</span>
                                        <a class="contact_card__item_link"
                                            href="mailto:{{ $point->email }}">{{ $point->email }}</a>
                                    </p>
                                @endif

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
                                <a class="btn contact_card__red_button" href="#">Открыть</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
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
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/contacts/index.js')
@endsection
