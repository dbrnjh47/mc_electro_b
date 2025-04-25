@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb>

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

                                @if (!$point->phones->isEmpty())
                                <p class="contact_card__item">
                                    <span class="contact_card__item_bold"> Телефон:</span>
                                    @foreach ($point->phones as $phone)
                                    <a class="contact_card__item_link" href="tel:{{$phone->phone->number}}">{{$phone->phone->text}}</a>@if(!$loop->last), @endif
                                    @endforeach
                                </p>
                                @endif

                                <div class="contact_card__buttons">
                                    @if (!$point->links->isEmpty())
                                        @foreach ($point->links as $link)
                                            <a href="{{$link->url}}" class="contact_card__button contact_card__button--{{$link->category->type}}">
                                                {{$link->category->title}}
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                                <a class="btn contact_card__red_button" href="{{ route("contact", ["id" => $point->id]) }}">Открыть</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        {{ $points->appends(request()->input())->onEachSide(1)->links() }}

    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/contacts/index.js')
@endsection
