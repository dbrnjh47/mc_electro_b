@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <section class="dop_menu_mob dop_menu_mob__container">
        <div class="dop_menu_mob__button">
            <img src="{{ Vite::asset('resources/js/custom/dop_menu/mob/img/filter.svg') }}" alt="filter"> Содержание
        </div>
    </section>
    <section class="agreement__container">
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
                        <span itemprop="name">Пользовательское соглашение</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </section>
        <section class="agreement">
            <div class="dop_menu__bg dop_menu__close"></div>
            <div class="content dop_menu">
                <div class="content__head content__target">
                    <h1>Содержание</h1>
                    <img src="/temple/images/agreement/content/str.svg" alt="icon">
                </div>
                <div class="content__main content__menu">
                    <a href="#agreement_1">
                        1. Пример заголовка с длинным текстом который помещается в 1 строку(в 3 строки просто
                        перено)
                    </a>

                    <div class="content__main_items">
                        <p class="content__target">
                            2. Пример заголовка с длинным текстом который помещается в 1 строку
                            <img src="/temple/images/agreement/content/str.svg" alt="icon">
                        </p>
                        <ul class="content__menu">
                            <li>
                                <a href="#agreement_2_1">
                                    2.1 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="#agreement_2_1_1">
                                    2.1.1 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="#agreement_2_1_2">
                                    2.1.2 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="#agreement_2_1_3">
                                    2.1.3 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="#agreement_2_1_4">
                                    2.1.4 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="#agreement_2_1_5">
                                    2.1.5 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="content__main_items">
                        <p class="content__target">
                            2. Пример заголовка с длинным текстом который помещается в 1 строку
                            <img src="/temple/images/agreement/content/str.svg" alt="icon">
                        </p>
                        <ul class="content__menu">
                            <li>
                                <a href="">
                                    2.1 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.2 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.3 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.4 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.5 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="content__main_items">
                        <p class="content__target">
                            2. Пример заголовка с длинным текстом который помещается в 1 строку
                            <img src="/temple/images/agreement/content/str.svg" alt="icon">
                        </p>
                        <ul class="content__menu">
                            <li>
                                <a href="">
                                    2.1 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.2 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.3 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.4 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.5 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="content__main_items">
                        <p class="content__target">
                            2. Пример заголовка с длинным текстом который помещается в 1 строку
                            <img src="/temple/images/agreement/content/str.svg" alt="icon">
                        </p>
                        <ul class="content__menu">
                            <li>
                                <a href="">
                                    2.1 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.2 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.3 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.4 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    2.5 Пример заголовка с длинным текстом который помещается в 1 строку
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="agreement__content">
                <div class="agreement__items">
                    <a href="#agreement_1" class="agreement__title" id="agreement_1">1. Заголовок первый</a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit
                        anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor
                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                        est
                        laborum.
                    </p>
                </div>
                <div class="agreement__items">
                    <a href="#agreement_1" class="agreement__title" id="agreement_2">2. Заголовок первый</a>
                    <p class="agreement__item" id="agreement_2_1">2.1. Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit, sed
                        do
                        eiusmod tempor incididunt ut</p>
                    <p class="agreement__item" id="agreement_2_1_1">2.1.1 Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit,
                        sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                    <p class="agreement__item" id="agreement_2_1_2">2.1.2. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis
                    </p>
                    <p class="agreement__item" id="agreement_2_1_3">2.1.3. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis
                    </p>
                    <p class="agreement__item" id="agreement_2_1_4">2.1.4. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis
                        nostrud</p>
                    <p class="agreement__item" id="agreement_2_1_5">2.1.5. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit
                        anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor
                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                        est
                        laborum.</p>
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
    @vite('resources/js/agreement/index.js')
@endsection
