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
                    @foreach ($products as $product)
                        <x-sample.main.product.card :product="$product"></x-sample.main.product.card>
                    @endforeach
                </section>

                {{ $pagination->appends(request()->input())->onEachSide(1)->links() }}
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
