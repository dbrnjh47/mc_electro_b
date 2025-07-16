@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <section class="product product__container">
        <section class="breadcrumb">
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
                        <span itemprop="name">Категории</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link off">/</a>
                </li>
                <li class="breadcrumb__item" itemprop="itemListElement" itemscope=""
                    itemtype="https://schema.org/ListItem">
                    <a itemprop="item" class="breadcrumb__link" href="#">
                        <span itemprop="name">Категория</span>
                    </a>
                    <meta itemprop="position" content="3">
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
        </section>

        <section class="product_title">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">{{$product->locale->name}}
                        @if($product->uuid)<span class="copy_button" data-copy-text="{{$product->uuid}}">#{{$product->uuid}}</span>@endif
                        @if($product->article)<span class="copy_button" data-copy-text="{{$product->article}}">#{{$product->article}}</span>@endif
                    </h2>
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
            </div>
        </section>

        <div class="product__wrapper">
            <section id="sticky_article" class="product_info">
                <section class="product_basic_sliders">

                    @if(!$product->medias->isEmpty())
                    <div class="product_basic_slider_miniature">
                        <div class="swiper" id="product_basic_slider_miniature">
                            <div class="swiper-wrapper">
                                @foreach ($product->medias as $media)
                                <div class="swiper-slide">
                                    <img src="{{$media->miniature}}" alt="{{$product->locale->name}}" />
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    @endif

                    <div class="swiper product_basic_slider" id="product_basic_slider">
                        <div class="product_info__tips">
                            <span>Хит</span>
                            <span class="recommend">Советуем</span>
                        </div>

                        <div class="swiper-wrapper">
                            @if($product->medias->isEmpty())
                            @php
                                $defult_media = \App\Models\Product\ProductMedia::getDefult();
                            @endphp
                            <div class="swiper-slide">
                                <div class="product_basic_slider__slide">
                                    <img src="{{$defult_media->path}}" alt="defult" loading="lazy" decoding="async">
                                </div>
                            </div>
                            @else

                            @foreach ($product->medias as $media)
                            <div class="swiper-slide">
                                <div class="product_basic_slider__slide">
                                    <img src="{{$media->path}}" alt="{{$product->locale->name}}" loading="lazy" decoding="async">
                                    <span class="product_basic_slider__slide_cover"
                                        style="background-image: url('{{$media->path}}');"></span>
                                </div>
                            </div>
                            @endforeach

                            @endif
                        </div>

                    </div>


                </section>

                <section class="product_menu_blocks product_menu_blocks__container">
                    @if($product->description)
                    <div class="activ">Описание</div>
                    @endif
                    @if(!$product->characteristics->isEmpty())
                        <div>Характеристики</div>
                    @endif
                    <div>Отзывы <span>(9)</span></div>
                    <div>Вопрос ответ <span>(9)</span></div>
                    @if(!$product->documents->isEmpty())
                        <div>Документация <span>({{$product->documents->count()}})</span></div>
                    @endif
                </section>

                <div class="product_menu_block product_menu_block__container">

                    <section class="product_menu_block__faq">

                        <div class="app__title">
                            <div class="app__title_wrapper">
                                <h2 class="app__title_text product_menu_block__title">Вопрос ответ</h2>
                            </div>
                            <div class="product_menu_block__faq_actions">
                                <div id="select2_sort" class="select2_sample_nude">
                                    <select class="select2_custom" name="lang" data-dropdown-position="below"
                                        data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort">
                                        <option value="1" selected="">Сначала новые</option>
                                        <option value="10">1</option>
                                        <option value="2">Сначала старые</option>
                                        <option value="3">Сначала дорогие</option>
                                        <option value="3">Сначала дешевые</option>
                                    </select>
                                </div>
                                <button class="app__title_button">Задать вопрос</button>
                            </div>
                        </div>
                        <div class="product_menu_block__faq_list">
                            <div class="product_menu_block__faq_item">
                                <div class="product_menu_block__faq_user">
                                    <div class="product_menu_block__faq_user_name">
                                        Username
                                    </div>
                                    <div class="product_menu_block__faq_user_date">
                                        15.11.2024
                                    </div>
                                </div>
                                <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut </p>
                                <div class="product_menu_block__faq_answers">
                                    <div class="product_menu_block__faq_answer">
                                        <div class="product_menu_block__faq_user">
                                            <div class="product_menu_block__faq_user_name">
                                                Username
                                            </div>
                                            <div class="product_menu_block__faq_user_date">
                                                15.11.2024
                                            </div>
                                        </div>
                                        <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut </p>
                                    </div>
                                    <div class="product_menu_block__faq_answer">
                                        <div class="product_menu_block__faq_user">
                                            <div class="product_menu_block__faq_user_name">
                                                Username
                                            </div>
                                            <div class="product_menu_block__faq_user_date">
                                                15.11.2024
                                            </div>
                                        </div>
                                        <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut </p>
                                    </div>
                                    <div class="product_menu_block__faq_answer">
                                        <div class="product_menu_block__faq_user">
                                            <div class="product_menu_block__faq_user_name">
                                                Username
                                            </div>
                                            <div class="product_menu_block__faq_user_date">
                                                15.11.2024
                                            </div>
                                        </div>
                                        <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut </p>
                                    </div>
                                    <div class="product_menu_block__faq_answer">
                                        <div class="product_menu_block__faq_user">
                                            <div class="product_menu_block__faq_user_name">
                                                Username
                                            </div>
                                            <div class="product_menu_block__faq_user_date">
                                                15.11.2024
                                            </div>
                                        </div>
                                        <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut </p>
                                    </div>
                                    <div class="product_menu_block__faq_answer">
                                        <div class="product_menu_block__faq_user">
                                            <div class="product_menu_block__faq_user_name">
                                                Username
                                            </div>
                                            <div class="product_menu_block__faq_user_date">
                                                15.11.2024
                                            </div>
                                        </div>
                                        <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut </p>
                                    </div>
                                    <div class="product_menu_block__faq_answer">
                                        <div class="product_menu_block__faq_user">
                                            <div class="product_menu_block__faq_user_name">
                                                Username
                                            </div>
                                            <div class="product_menu_block__faq_user_date">
                                                15.11.2024
                                            </div>
                                        </div>
                                        <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut </p>
                                    </div>
                                </div>
                                <div class="product_menu_block__faq_input">
                                    <input class="input" type="text" placeholder="Введите ответ на вопрос">
                                    <button class="btn">Отправить</button>
                                </div>
                            </div>

                            <div class="product_menu_block__faq_item">
                                <div class="product_menu_block__faq_user">
                                    <div class="product_menu_block__faq_user_name">
                                        Username
                                    </div>
                                    <div class="product_menu_block__faq_user_date">
                                        15.11.2024
                                    </div>
                                </div>
                                <p class="product_menu_block__faq_question">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut </p>
                                <div class="product_menu_block__faq_count">8 Ответов <button>Показать</button></div>
                                <div class="product_menu_block__faq_input">
                                    <input class="input" type="text" placeholder="Введите ответ на вопрос">
                                    <button class="btn">Отправить</button>
                                </div>
                            </div>
                        </div>

                    </section>

                    <section class="product_menu_block__reviews">
                        <h1 class="product_menu_block__title">Отзывы</h1>
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
                                <svg width="19" height="16" viewBox="0 0 19 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z">
                                    </path>
                                </svg>
                                10 отзывов
                            </div>
                        </div>
                        <div class="product_menu_block__reviews_rating">
                            <div class="product_menu_block__reviews_line">
                                5
                                <div><span style="width: 67%;"></span></div>
                                67%
                            </div>
                            <div class="product_menu_block__reviews_line">
                                4
                                <div><span style="width: 0%;"></span></div>
                                0%
                            </div>
                            <div class="product_menu_block__reviews_line">
                                3
                                <div><span style="width: 3%;"></span></div>
                                3%
                            </div>
                            <div class="product_menu_block__reviews_line">
                                2
                                <div><span style="width: 30%;"></span></div>
                                30%
                            </div>
                            <div class="product_menu_block__reviews_line">
                                1
                                <div><span style="width: 0%;"></span></div>
                                0%
                            </div>
                        </div>
                        <div class="product_menu_block__reviews_sorting">
                            <div id="select2_sort" class="select2_sample_nude">
                                <select class="select2_custom" name="lang" data-dropdown-position="below"
                                    data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort">
                                    <option value="1" selected="">Сначала новые</option>
                                    <option value="10">1</option>
                                    <option value="2">Сначала старые</option>
                                    <option value="3">Сначала дорогие</option>
                                    <option value="3">Сначала дешевые</option>
                                </select>
                            </div>
                        </div>
                        <div class="product_menu_block__reviews_list">
                            <div class="product_menu_block__reviews_item">
                                <div class="product_menu_block__reviews_user">
                                    <div class="product_menu_block__reviews_user_name">
                                        Username
                                        <div class="product_menu_block__reviews_user_stars">
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="product_menu_block__reviews_user_date">
                                        15.11.2024
                                    </div>
                                </div>
                                <div class="product_menu_block__reviews_menu">
                                    <button class="activ">Коментарий</button>
                                    <button>Достоинства</button>
                                    <button>Недостатки</button>
                                </div>
                                <div>
                                    <div class="swiper product_menu_block__reviews_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>

                                            <div class="swiper-slide">
                                                <img src="/assets/product/miniature/test.png" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                                <div class="product_menu_block__reviews_text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut
                                </div>
                            </div>

                            <div class="product_menu_block__reviews_item">
                                <div class="product_menu_block__reviews_user">
                                    <div class="product_menu_block__reviews_user_name">
                                        Username
                                        <div class="product_menu_block__reviews_user_stars">
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="product_menu_block__reviews_user_date">
                                        15.11.2024
                                    </div>
                                </div>
                                <div class="product_menu_block__reviews_menu">
                                    <button class="activ">Коментарий</button>
                                    <button>Достоинства</button>
                                    <button>Недостатки</button>
                                </div>

                                <div class="product_menu_block__reviews_text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut
                                </div>
                            </div>

                            <div class="product_menu_block__reviews_item">
                                <div class="product_menu_block__reviews_user">
                                    <div class="product_menu_block__reviews_user_name">
                                        Username
                                        <div class="product_menu_block__reviews_user_stars">
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg class="red" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                            <svg viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="product_menu_block__reviews_user_date">
                                        15.11.2024
                                    </div>
                                </div>
                                <div class="product_menu_block__reviews_menu">
                                    <button class="activ">Коментарий</button>
                                    <button>Достоинства</button>
                                    <button>Недостатки</button>
                                </div>

                                <div class="product_menu_block__reviews_text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut
                                </div>
                            </div>
                        </div>
                    </section>

                    @if($product->description)
                    <section class="product_menu_block__description">
                        <h1 class="product_menu_block__title">Описание</h1>
                        <div class="product_menu_block__description_content">
                            {!! $product->description->text !!}
                        </div>
                    </section>
                    @endif

                    @if(!$product->characteristics->isEmpty())
                    <section class="product_menu_block__characteristics">
                        <h1 class="product_menu_block__title">Характеристики</h1>
                        <div class="product_menu_block__characteristics_contents">
                            @foreach ($product->characteristics as $characteristic_category)
                            <div class="product_menu_block__characteristics_content">
                                <h3 class="product_menu_block__characteristics_title">
                                    {{$characteristic_category['category']->locale->title}}
                                </h3>
                                @foreach ($characteristic_category['items'] as $characteristic)
                                    <div class="product_menu_block__characteristics_line">
                                        <div class="product_menu_block__characteristics_name">
                                            {{$characteristic->title->locale->text}}
                                        </div>
                                        <span></span>
                                        <div class="product_menu_block__characteristics_value">
                                            {{($characteristic->value != null ? "{$characteristic->getValueProccess()} {$characteristic->getValueName()}" : $characteristic->locale->text)}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>

                    </section>
                    @endif

                    @if(!$product->documents->isEmpty())
                    <section class="product_menu_block__documentations">
                        <h1 class="product_menu_block__title">Документация</h1>
                        <div class="product_menu_block__documentations_content">
                            <div class="product_menu_block__documentations_list">
                                {{-- <h3>Название</h3> --}}
                                <!-- temple\images\product\icon\download.svg -->
                                @foreach ($product->documents as $document)
                                <a href="{{$document->path}}" target="_blank" alt="{{$document->title}}"> <svg width="15" height="17" viewBox="0 0 15 17"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.65882 0H6.34118C6.00981 0 5.74118 0.262453 5.74118 0.586206V5.40287H1.94833C1.59445 5.40287 1.41488 5.81882 1.66186 6.06643L7.0703 11.4887C7.3058 11.7248 7.6942 11.7248 7.9297 11.4887L13.3381 6.06643C13.5851 5.81882 13.4056 5.40287 13.0517 5.40287H9.25882V0.586207C9.25882 0.262454 8.9902 0 8.65882 0Z" />
                                    <path
                                        d="M0 14.2644C0 14.0485 0.179086 13.8736 0.4 13.8736H14.6C14.8209 13.8736 15 14.0485 15 14.2644V16.6092C15 16.825 14.8209 17 14.6 17H0.4C0.179086 17 0 16.825 0 16.6092V14.2644Z" />
                                </svg>
                                {{$document->title}}</a>
                                @endforeach
                            </div>

                            {{-- x3 --}}


                        </div>
                    </section>
                    @endif
                </div>
            </section>

            <div id="sticky_aside1">


                <section class="product_result">
                    <div class="product_result__price_wrapper">
                        <p class="product_result__price">₽ 999 <span>2000</span></p>
                        <div class="product_result__top_actions">
                            <button class="btn">
                                <svg width="14" height="17" viewBox="0 0 14 17"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.20799C0 0.540836 0.535728 0 1.19658 0H12.8034C13.4643 0 14 0.540836 14 1.20799V16.5564C14 16.9041 13.6212 17.1162 13.329 16.9321L7.23225 13.0919C7.09011 13.0024 6.90988 13.0024 6.76775 13.0919L0.670995 16.9321C0.378757 17.1162 0 16.9041 0 16.5564V1.20799Z" />
                                </svg>
                                В избранное
                            </button>

                            <div class="share">
                                <div class="share__icon">
                                    <img src="{{ Vite::asset('resources/js/custom/share/icons/share.svg') }}" alt="share">
                                </div>
                                <div class="share__menu">
                                    <a class="share__item" target="_blank"
                                        href="http://www.facebook.com/sharer.php?s=100&amp;p[url]=https://impyrex.com/category/details/765/3">
                                        <!-- <img src="/resources/js/custom/share/icons/fb.svg" alt="facebook"> -->
                                        <svg width="17" height="17" viewBox="0 0 17 17"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.25 0C12.7875 0 16.5 3.7125 16.5 8.25C16.5 12.375 13.5094 15.8812 9.38437 16.5V10.6219H11.3438L11.7563 8.25H9.4875V6.70312C9.4875 6.08437 9.79688 5.46562 10.8281 5.46562H11.8594V3.40312C11.8594 3.40312 10.9313 3.19688 10.0031 3.19688C8.14688 3.19688 6.90938 4.33125 6.90938 6.39375V8.25H4.84688V10.6219H6.90938V16.3969C2.99062 15.7781 0 12.375 0 8.25C0 3.7125 3.7125 0 8.25 0Z" />
                                        </svg>
                                    </a>

                                    <a class="share__item" target="_blank"
                                        href="https://wa.me/?text=https://impyrex.com/category/details/765/3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                            viewBox="0 0 17 17">
                                            <path
                                                d="M17 8.15724V8.82971C16.7894 11.5562 15.6716 13.6966 13.6466 15.2507C10.9581 17.313 7.53251 17.5357 4.4863 16.0042C4.44347 15.9828 4.39493 15.9771 4.34928 15.9883L0.0886214 16.9963C0.0783739 16.9986 0.0676798 16.9983 0.0575923 16.9953C0.0475049 16.9924 0.0383721 16.9869 0.0310936 16.9795C0.0238152 16.9721 0.0186421 16.9629 0.0160839 16.9529C0.0135257 16.9429 0.0136707 16.9324 0.0165046 16.9225L1.11989 12.8356C1.13047 12.7942 1.12614 12.7546 1.10691 12.717C-0.170037 10.274 -0.342156 7.8439 0.590554 5.42685C3.05406 -0.955121 11.5754 -1.91538 15.4913 3.6524C16.4067 4.95396 16.9096 6.45557 17 8.15724ZM9.45803 10.6201C8.12964 10.1501 7.15606 9.23898 6.41614 8.03142C6.382 7.9758 6.36796 7.9101 6.37636 7.84534C6.38476 7.78057 6.4151 7.72067 6.4623 7.67566C6.72769 7.42499 6.93731 7.13624 7.09116 6.8094C7.11327 6.76216 7.11472 6.71443 7.09548 6.66623C6.85702 6.06076 6.60605 5.46108 6.34259 4.86718C6.11325 4.34801 5.21468 4.52299 4.89592 4.85706C4.09399 5.69777 3.93629 6.65707 4.42284 7.73495C5.11804 9.27368 6.56326 10.8847 8.04021 11.7134C8.79696 12.1376 9.59697 12.4177 10.4403 12.5536C11.6547 12.7517 12.9225 11.952 12.8086 10.6042C12.8055 10.5645 12.7918 10.5262 12.769 10.4933C12.7463 10.4603 12.7151 10.4337 12.6788 10.4162L10.8311 9.52821C10.7798 9.50352 10.7217 9.49695 10.6662 9.50955C10.6107 9.52215 10.5611 9.55319 10.5254 9.59763L9.77534 10.529C9.73827 10.5753 9.68779 10.609 9.63093 10.6254C9.57407 10.6417 9.51364 10.6398 9.45803 10.6201Z">
                                            </path>
                                        </svg>
                                    </a>

                                    <a class="share__item" target="_blank"
                                        href="https://telegram.me/share/url?url=https://impyrex.com/category/details/765/3">
                                        <svg width="17" height="14" viewBox="0 0 17 14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.99472 2.07011C8.51694 2.68477 5.56346 3.95696 1.13429 5.88668C0.41506 6.17269 0.038296 6.4525 0.00399727 6.72609C-0.0539679 7.18847 0.525058 7.37054 1.31354 7.61847C1.4208 7.6522 1.53193 7.68714 1.64585 7.72418C2.4216 7.97634 3.46512 8.27135 4.0076 8.28307C4.49968 8.2937 5.0489 8.09083 5.65526 7.67446C9.79358 4.88098 11.9298 3.46902 12.0639 3.43858C12.1585 3.4171 12.2896 3.3901 12.3785 3.46906C12.4673 3.54802 12.4586 3.69756 12.4492 3.73768C12.3918 3.98221 10.1189 6.09529 8.94271 7.18882C8.57602 7.52972 8.31592 7.77154 8.26274 7.82677C8.14363 7.95048 8.02224 8.0675 7.90557 8.17997C7.18489 8.87472 6.64444 9.39572 7.9355 10.2465C8.55593 10.6554 9.0524 10.9935 9.5477 11.3308C10.0886 11.6991 10.6281 12.0665 11.3261 12.5241C11.504 12.6407 11.6738 12.7618 11.8393 12.8797C12.4688 13.3285 13.0343 13.7316 13.733 13.6674C14.139 13.63 14.5584 13.2482 14.7713 12.1097C15.2747 9.41891 16.264 3.58885 16.4927 1.18642C16.5127 0.975931 16.4875 0.706554 16.4673 0.588304C16.447 0.470053 16.4047 0.30157 16.251 0.176848C16.069 0.0291394 15.788 -0.00200902 15.6623 9.75845e-05C15.0908 0.0102717 14.2141 0.31513 9.99472 2.07011Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_result_count">
                        <div class="product_result_count__select">
                            <p>В наличии: 59 шт.</p>
                            <span>Посмотреть все</span>
                        </div>
                        <ul class="product_result_count__list">
                            <li>
                                <!-- public\temple\images\product\icon\suc.svg -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                </svg>
                                <p>Полярная, 57</p> <span>17 ед.</span>
                            </li>
                            <li class="red">
                                <!-- temple\images\product\icon\cross.svg -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path
                                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                </svg>
                                <p>Полярная, 57</p> <span>17 ед.</span>
                            </li>
                            <li class="oreng">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                </svg>
                                <p>Полярная, 57</p> <span>17 ед.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="product_result_processing">
                        <div class="input_count">
                            <button class="input_count__btn" id="input_count_reduce">
                                <img src="{{ Vite::asset('resources/js/custom/input_count/icon/arrow.svg') }}" alt="arrow">
                            </button>
                            <input type="text" val="1" placeholder="1" class="input_count__input"
                                id="input_count">
                            <button class="input_count__btn revers" id="input_count_add">
                                <img src="{{ Vite::asset('resources/js/custom/input_count/icon/arrow.svg') }}" alt="arrow">
                            </button>
                        </div>
                        <div class="product_result_processing__actions">
                            <button class="btn">Купить</button>
                            <button class="btn btn_upend" onclick="getProductPhone();">Позвонить</button>
                            <div class="product_result_processing__actions_phone copy_button">
                                <!-- temple\images\product\icon\phone.svg -->
                                <svg width="22" height="22" viewBox="0 0 22 22"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.986" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.01297 0.0183455C4.83339 -0.0757563 5.50644 0.192157 6.03212 0.822085C6.6475 1.8502 7.22186 2.90398 7.75513 3.98346C8.13204 4.60861 8.50894 5.2337 8.88585 5.85885C9.20477 6.54042 9.20477 7.2191 8.88585 7.89499C8.75124 8.10037 8.58072 8.27007 8.37433 8.40403C7.97707 8.60721 7.56425 8.76796 7.13592 8.88627C6.80688 9.18633 6.77996 9.51672 7.05516 9.87755C8.5538 11.7261 10.2319 13.3962 12.0896 14.8875C12.4708 15.2119 12.8388 15.203 13.1934 14.8607C13.6783 12.9251 14.818 12.416 16.6125 13.3336C18.1376 14.1638 19.6453 15.0212 21.1353 15.9056C22.1072 16.8318 22.2598 17.8767 21.593 19.0402C20.9786 19.8661 20.2876 20.6252 19.52 21.3174C18.472 22.019 17.3412 22.1797 16.1279 21.7997C8.48622 18.7854 3.16466 13.4718 0.163132 5.85885C-0.18785 4.60486 0.0275262 3.46178 0.80926 2.42956C1.543 1.66341 2.34169 0.975765 3.20532 0.366633C3.46737 0.217989 3.73659 0.101897 4.01297 0.0183455Z" />
                                </svg>

                                <input class="input" type="text" value="+7 900 000 00 00" disabled>
                            </div>

                        </div>
                    </div>
                    <div class="company_card">
                        <div class="company_card__content">
                            <div class="company_card__miniature">
                                <img src="/assets/companies/logo/1.svg" alt="">
                                <span class="company_card__miniature_cover"
                                    style="background-image: url('/assets/companies/logo/1.svg');"></span>
                            </div>
                            <div class="company_card__info">
                                <div class="company_card__name">
                                    Название компании
                                </div>
                                <p>
                                    <span>
                                        <svg class="red" width="18" height="17" viewBox="0 0 18 17"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                            </path>
                                        </svg>
                                        4.6
                                    </span>
                                    <span>
                                        <svg width="19" height="16" viewBox="0 0 19 16"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z">
                                            </path>
                                        </svg> 300 отзывов</span>
                                </p>
                                <p>
                                    Кол-во товаров: <span>200</span>
                                </p>
                            </div>
                        </div>
                        <div class="company_card__description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut
                        </div>
                        <a href="#" class="btn">
                            Показать товары компании
                        </a>
                    </div>
                </section>

            </div>
        </div>

        <section class="product_similar_slider">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">С этим товаром часто покупают</h2>
                </div>
            </div>
            <div class="swiper" id="similar_slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>

                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                    <div class="swiper-slide">
                        <div class="product_card">
                            <div class="product_card__buttons">

                                <button class="btn">Подробнее</button>
                                <button class="btn btn_upend">Купить в один клик</button>

                            </div>

                            <button class="product_card__favorite">
                                <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                <svg width="20" height="23" viewBox="0 0 20 23"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <img src="/assets/product/miniature/test.png" alt="img">
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
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

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

            </div>
        </section>
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/product/index.js')
@endsection
