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
                        <span itemprop="name">Каталог</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </section>

    <section class="categories">
        <div class="categories__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Популярные категории</h2>
                    <p class="app__title_description">Мы собрали для вас лучшие категории, которые есть в нашем магазине</p>
                </div>
                <p class="app__text">Кол-во категорий: <span>21</span></p>
            </div>

            <div class="categories__lists">
                <div class="categories__item activ">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item">
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">Название категssssssssssssssssssssории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            <a href="#" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">Название категории</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        </div>

                        <button class="categories__hover_item_btn">Еще 8</button>

                    </div>
                    <div class="categories__item_title">Lorem ipsum</div>
                    <div class="categories__item_description">Lorem ipsum</div>

                    <img class="categories__item_bg" src="/assets/categories/previews/1.png" loading="lazy"
                        decoding="async" alt="">
                </div>
                <div class="categories__item categories__item_last">
                    <h3>Оставить заявку наподбор техники</h3>
                    <button>Заявка</button>
                </div>
            </div>
        </div>
    </section>

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

    <section class="companies">
        <div class="companies__container">
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
        </div>

    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/categories/index.js')
@endsection
