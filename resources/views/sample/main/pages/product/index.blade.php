@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <section class="product product__container">
        <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb>

        <section class="product_title">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">{{$product->locale->name}}
                        @if($product->uuid)<span class="copy_button" data-copy-text="{{$product->uuid}}">#{{$product->uuid}}</span>@endif
                        @if($product->article)<span class="copy_button" data-copy-text="{{$product->article}}">#{{$product->article}}</span>@endif
                    </h2>
                    @if($product->reviews_count)
                    <div class="product_title__statistics">
                        <div>
                            <!-- public\temple\images\company\icon\star.svg -->
                            <svg class="red" width="18" height="17" viewBox="0 0 18 17"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                </path>
                            </svg>
                            {{round($product->reviews_sum_quantity / $product->reviews_count, 1)}}
                        </div>
                        <div>
                            <svg width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z">
                                </path>
                            </svg>
                            {{$product->reviews_count}} отзывов
                        </div>
                    </div>
                    @endif

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

                    @if(!$product->reviews->isEmpty())
                    <div>Отзывы <span>({{$product->reviews_count}})</span></div>
                    @endif

                    {{-- <div>Вопрос ответ <span>(9)</span></div> --}}

                    @if(!$product->documents->isEmpty())
                        <div>Документация <span>({{$product->documents->count()}})</span></div>
                    @endif
                </section>

                <div class="product_menu_block product_menu_block__container">

                    {{-- <section class="product_menu_block__faq">

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

                    </section> --}}

                    @if(!$product->reviews->isEmpty())
                    <section class="product_menu_block__reviews">
                        <h1 class="product_menu_block__title">Отзывы</h1>
                        @if($product->reviews_count)
                        <div class="product_title__statistics">
                            <div>
                                <!-- public\temple\images\company\icon\star.svg -->
                                <svg class="red" width="18" height="17" viewBox="0 0 18 17"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                    </path>
                                </svg>
                                {{round($product->reviews_sum_quantity / $product->reviews_count, 1)}}
                            </div>
                            <div>
                                <svg width="19" height="16" viewBox="0 0 19 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z">
                                    </path>
                                </svg>
                                {{$product->reviews_count}} отзывов
                            </div>
                        </div>
                        @endif
                        <div class="product_menu_block__reviews_rating">
                            @for($i = 5; $i > 0; $i--)
                            @php
                                $review_statistic = Arr::first($review_statistics, function ($review_statistic) use ($i) {
                                    return $review_statistic->quantity == $i;
                                });
                                $procent = 0;
                                if($review_statistic)
                                {
                                    $procent = round((($review_statistic->count / $product->reviews_count) * 100), 1);
                                }
                            @endphp
                            <div class="product_menu_block__reviews_line">
                                {{$i}}
                                <div><span style="width: {{$procent}}%;"></span></div>
                                {{$procent}}%
                            </div>
                            @endfor
                        </div>
                        <div class="product_menu_block__reviews_sorting">
                            <div id="select2_sort" class="select2_sample_nude">
                                <select class="select2_custom" name="lang" data-dropdown-position="below"
                                    data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort">
                                    <option value="created_at_asc" selected="">Сначала новые</option>
                                    <option value="created_at_desc">Сначала старые</option>
                                </select>
                            </div>
                        </div>

                        <div class="product_menu_block__reviews_list">
                            @foreach ($product->reviews as $review)
                            <div class="product_menu_block__reviews_item">
                                <div class="product_menu_block__reviews_user">
                                    <div class="product_menu_block__reviews_user_name">
                                        {{$review->user->name}}
                                        <div class="product_menu_block__reviews_user_stars">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg @if($review["quantity"] > $i) class="red" @endif viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                                                    </path>
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="product_menu_block__reviews_user_date">
                                        {{$review->created_at->format('d.m.Y')}}
                                    </div>
                                </div>
                                <div class="product_menu_block__reviews_menu">
                                    @foreach ($review->descriptions as $description)
                                        <button @if($loop->first) class="activ" @endif data-type="{{$description["type"]}}">{{ ($description["type"] == "comment" ? "Коментарий" : ($description["type"] == "dignity" ? "Достоинства" : "Недостатки")) }}</button>
                                    @endforeach
                                </div>
                                <div>
                                    <div class="swiper product_menu_block__reviews_slider">
                                        <div class="swiper-wrapper">
                                            @foreach ($review->medias as $media)
                                                <div class="swiper-slide">
                                                    <div class="product_menu_block__reviews_slider_miniature @if($media->is_video()) is_video @endif" data-path="{{$media->path}}">
                                                        <img src="{{$media->miniature}}" alt="{{$product->locale->name}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach ($review->medias as $media)
                                                <div class="swiper-slide">
                                                    <div class="product_menu_block__reviews_slider_miniature @if($media->is_video()) is_video @endif" data-path="{{$media->path}}">
                                                        <img src="{{$media->miniature}}" alt="{{$product->locale->name}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach ($review->medias as $media)
                                                <div class="swiper-slide">
                                                    <div class="product_menu_block__reviews_slider_miniature @if($media->is_video()) is_video @endif" data-path="{{$media->path}}">
                                                        <img src="{{$media->miniature}}" alt="{{$product->locale->name}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach ($review->medias as $media)
                                                <div class="swiper-slide">
                                                    <div class="product_menu_block__reviews_slider_miniature @if($media->is_video()) is_video @endif" data-path="{{$media->path}}">
                                                        <img src="{{$media->miniature}}" alt="{{$product->locale->name}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach ($review->medias as $media)
                                                <div class="swiper-slide">
                                                    <div class="product_menu_block__reviews_slider_miniature @if($media->is_video()) is_video @endif" data-path="{{$media->path}}">
                                                        <img src="{{$media->miniature}}" alt="{{$product->locale->name}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach ($review->medias as $media)
                                                <div class="swiper-slide">
                                                    <div class="product_menu_block__reviews_slider_miniature @if($media->is_video()) is_video @endif" data-path="{{$media->path}}">
                                                        <img src="{{$media->miniature}}" alt="{{$product->locale->name}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                                @foreach ($review->descriptions as $description)
                                <div class="product_menu_block__reviews_text @if($loop->first) activ @endif" data-type="{{$description["type"]}}">
                                    {{$description->text}}
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

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

                            <x-sample.main.share url="{{url()->current()}}" text="{{$product->locale->name}}"></x-sample.main.share>
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

                    <x-company.card :company="$product->company"></x-company.card>
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
