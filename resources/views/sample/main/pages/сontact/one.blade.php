@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
<x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>

    <section class="contact">
        <div class="contact__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">{{$point->locale->title}}</h2>
                    @if($point->locale->description)
                        <p class="app__title_description">{{$point->locale->description}}</p>
                    @endif
                </div>
            </div>

            <div class="contact__block">
                @include("sample.main.pages.сontact.components.card", ["is_card" => 1])

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
                        @if ($point->yandex_widget_href)
                            <iframe src="{{$point->yandex_widget_href}}&lang={{$user_local->slug}}" frameborder="0"></iframe>
                        @else

                        @endif
                        {{-- <img src="/temple/images/contact/map.png" alt="map"> --}}
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
