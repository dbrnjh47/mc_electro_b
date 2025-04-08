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
                        <span itemprop="name">Акции</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link off">/</a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link active">
                        <span itemprop="name">Название акции</span>
                    </a>
                    <meta itemprop="position" content="3">
                </li>
            </ul>
        </div>
    </section>

    <section class="promotion promotion__container">
        <div class="product_title app__title">
            <div class="app__title_wrapper">
                <h2 class="app__title_text">Название товара</h2>
                <div class="product_title__statistics">
                    <div>
                        <!-- public\temple\images\company\icon\star.svg -->
                        <svg class="red" width="18" height="17" viewBox="0 0 18 17"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                            </path>
                        </svg>
                        4.6
                    </div>
                    <div>
                        <svg width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z">
                            </path>
                        </svg>
                        10 отзывов
                    </div>
                </div>
            </div>
            <div class="promotion__promotions">
                <button class="app__title_button">Оценить статью</button>
                <div class="share">
                    <div class="share__icon">
                        <img src="{{ Vite::asset('resources/js/custom/share/icons/share.svg') }}" alt="share">
                    </div>
                    <div class="share__menu">
                        <a class="share__item" target="_blank"
                            href="http://www.facebook.com/sharer.php?s=100&amp;p[url]=https://impyrex.com/category/details/765/3">
                            <!-- <img src="/resources/js/custom/share/icons/fb.svg" alt="facebook"> -->
                            <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.25 0C12.7875 0 16.5 3.7125 16.5 8.25C16.5 12.375 13.5094 15.8812 9.38437 16.5V10.6219H11.3438L11.7563 8.25H9.4875V6.70312C9.4875 6.08437 9.79688 5.46562 10.8281 5.46562H11.8594V3.40312C11.8594 3.40312 10.9313 3.19688 10.0031 3.19688C8.14688 3.19688 6.90938 4.33125 6.90938 6.39375V8.25H4.84688V10.6219H6.90938V16.3969C2.99062 15.7781 0 12.375 0 8.25C0 3.7125 3.7125 0 8.25 0Z">
                                </path>
                            </svg>
                        </a>

                        <a class="share__item" target="_blank"
                            href="https://wa.me/?text=https://impyrex.com/category/details/765/3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                <path
                                    d="M17 8.15724V8.82971C16.7894 11.5562 15.6716 13.6966 13.6466 15.2507C10.9581 17.313 7.53251 17.5357 4.4863 16.0042C4.44347 15.9828 4.39493 15.9771 4.34928 15.9883L0.0886214 16.9963C0.0783739 16.9986 0.0676798 16.9983 0.0575923 16.9953C0.0475049 16.9924 0.0383721 16.9869 0.0310936 16.9795C0.0238152 16.9721 0.0186421 16.9629 0.0160839 16.9529C0.0135257 16.9429 0.0136707 16.9324 0.0165046 16.9225L1.11989 12.8356C1.13047 12.7942 1.12614 12.7546 1.10691 12.717C-0.170037 10.274 -0.342156 7.8439 0.590554 5.42685C3.05406 -0.955121 11.5754 -1.91538 15.4913 3.6524C16.4067 4.95396 16.9096 6.45557 17 8.15724ZM9.45803 10.6201C8.12964 10.1501 7.15606 9.23898 6.41614 8.03142C6.382 7.9758 6.36796 7.9101 6.37636 7.84534C6.38476 7.78057 6.4151 7.72067 6.4623 7.67566C6.72769 7.42499 6.93731 7.13624 7.09116 6.8094C7.11327 6.76216 7.11472 6.71443 7.09548 6.66623C6.85702 6.06076 6.60605 5.46108 6.34259 4.86718C6.11325 4.34801 5.21468 4.52299 4.89592 4.85706C4.09399 5.69777 3.93629 6.65707 4.42284 7.73495C5.11804 9.27368 6.56326 10.8847 8.04021 11.7134C8.79696 12.1376 9.59697 12.4177 10.4403 12.5536C11.6547 12.7517 12.9225 11.952 12.8086 10.6042C12.8055 10.5645 12.7918 10.5262 12.769 10.4933C12.7463 10.4603 12.7151 10.4337 12.6788 10.4162L10.8311 9.52821C10.7798 9.50352 10.7217 9.49695 10.6662 9.50955C10.6107 9.52215 10.5611 9.55319 10.5254 9.59763L9.77534 10.529C9.73827 10.5753 9.68779 10.609 9.63093 10.6254C9.57407 10.6417 9.51364 10.6398 9.45803 10.6201Z">
                                </path>
                            </svg>
                        </a>

                        <a class="share__item" target="_blank"
                            href="https://telegram.me/share/url?url=https://impyrex.com/category/details/765/3">
                            <svg width="17" height="14" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.99472 2.07011C8.51694 2.68477 5.56346 3.95696 1.13429 5.88668C0.41506 6.17269 0.038296 6.4525 0.00399727 6.72609C-0.0539679 7.18847 0.525058 7.37054 1.31354 7.61847C1.4208 7.6522 1.53193 7.68714 1.64585 7.72418C2.4216 7.97634 3.46512 8.27135 4.0076 8.28307C4.49968 8.2937 5.0489 8.09083 5.65526 7.67446C9.79358 4.88098 11.9298 3.46902 12.0639 3.43858C12.1585 3.4171 12.2896 3.3901 12.3785 3.46906C12.4673 3.54802 12.4586 3.69756 12.4492 3.73768C12.3918 3.98221 10.1189 6.09529 8.94271 7.18882C8.57602 7.52972 8.31592 7.77154 8.26274 7.82677C8.14363 7.95048 8.02224 8.0675 7.90557 8.17997C7.18489 8.87472 6.64444 9.39572 7.9355 10.2465C8.55593 10.6554 9.0524 10.9935 9.5477 11.3308C10.0886 11.6991 10.6281 12.0665 11.3261 12.5241C11.504 12.6407 11.6738 12.7618 11.8393 12.8797C12.4688 13.3285 13.0343 13.7316 13.733 13.6674C14.139 13.63 14.5584 13.2482 14.7713 12.1097C15.2747 9.41891 16.264 3.58885 16.4927 1.18642C16.5127 0.975931 16.4875 0.706554 16.4673 0.588304C16.447 0.470053 16.4047 0.30157 16.251 0.176848C16.069 0.0291394 15.788 -0.00200902 15.6623 9.75845e-05C15.0908 0.0102717 14.2141 0.31513 9.99472 2.07011Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="promotion__content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            <br><br>
            <img loading="lazy" decoding="async" src="/assets/promotions/previews/1.png" alt=""
                style="width: 300px; float: right;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in
            <br><br>
            <h3>Lorem ipsum</h3>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        </div>
        <div class="promotion__btns">
            <button class="btn">Призыв к действию</button>
        </div>

        <section class="faq">

            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Часто задаваемые вопросы</h2>
                </div>
            </div>


            <div class="faq__selects" itemscope="" itemtype="https://schema.org/FAQPage">

                <div class="faq__select faq__triger">
                    <div class="faq__info" itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
                        <div class="faq__answer">
                            <h1 itemprop="name">Могу ли я доставить эту машину?</h1>
                            <img class="faq__trigger" src="{{ Vite::asset('resources/js/custom/faq/icon/str.svg') }}" alt="arrow">
                        </div>
                        <div class="faq__result" itemprop="text">
                            Аренда роскошных суперкаров предлагает доставку по запросу до
                            вашего местоположения (просмотреть места быстрой доставки) в
                            пределах Дубай. Тем не менее, бесплатный самовывоз из их филиала
                            в г. Шейх Заид Роуд доступен в рабочее время.
                        </div>

                    </div>
                </div>

                <div class="faq__select faq__triger">
                    <div class="faq__info" itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
                        <div class="faq__answer">
                            <h1 itemprop="name">Могу ли я доставить эту машину?</h1>
                            <img class="faq__trigger" src="{{ Vite::asset('resources/js/custom/faq/icon/str.svg') }}"
                                alt="arrow">
                        </div>
                        <div class="faq__result" itemprop="text">
                            Аренда роскошных суперкаров предлагает доставку по запросу до
                            вашего местоположения (просмотреть места быстрой доставки) в
                            пределах Дубай. Тем не менее, бесплатный самовывоз из их филиала
                            в г. Шейх Заид Роуд доступен в рабочее время.
                        </div>

                    </div>
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
    @vite('resources/js/promotion/index.js')
@endsection
