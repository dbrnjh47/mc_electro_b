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
            <img src="{{ Vite::asset('resources/js/custom/dop_menu/mob/img/filter.svg') }}" alt="filter" loading="lazy" decoding="async"> Меню
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
                        <span itemprop="name">Мои организации</span>
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
                        <h2 class="app__title_text">Мои организации</h2>
                    </div>
                    <button class="app__title_button">
                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.30177e-05 8.53381C2.30177e-05 9.12288 0.477595 9.60045 1.06667 9.60045L6.40082 9.60047V14.9333C6.40077 15.5224 6.87835 16 7.46748 16H8.53413C9.12322 16 9.60079 15.5225 9.60077 14.9334L9.60075 9.60047H14.9333C15.5224 9.60043 16 9.1229 16 8.53378L16 7.46711C16 6.87802 15.5224 6.40047 14.9333 6.40045L9.60077 6.40047V1.06669C9.60079 0.47755 9.12324 0 8.5341 2.30178e-05L7.46744 0C6.87837 0 6.4008 0.477573 6.4008 1.06665L6.40082 6.40045H1.06669C0.477595 6.40042 2.30177e-05 6.878 0 7.46714L2.30177e-05 8.53381Z" />
                        </svg>

                        Добавить организацию
                    </button>
                </div>

                <div class="user_companies_not_found">
                    <img src="/temple/images/profile/user_companies/company.svg" alt="icon company" loading="lazy" decoding="async">
                    <h3>Пока нет привязанных организаций</h3>
                    <p>Добавьте организацию, чтобы совершать покупки как юрлицо</p>
                    <button class="btn">
                        <!-- /temple/images/profile/user_companies/add.svg -->
                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.30177e-05 8.53381C2.30177e-05 9.12288 0.477595 9.60045 1.06667 9.60045L6.40082 9.60047V14.9333C6.40077 15.5224 6.87835 16 7.46748 16H8.53413C9.12322 16 9.60079 15.5225 9.60077 14.9334L9.60075 9.60047H14.9333C15.5224 9.60043 16 9.1229 16 8.53378L16 7.46711C16 6.87802 15.5224 6.40047 14.9333 6.40045L9.60077 6.40047V1.06669C9.60079 0.47755 9.12324 0 8.5341 2.30178e-05L7.46744 0C6.87837 0 6.4008 0.477573 6.4008 1.06665L6.40082 6.40045H1.06669C0.477595 6.40042 2.30177e-05 6.878 0 7.46714L2.30177e-05 8.53381Z" />
                        </svg>

                        Добавить организацию
                    </button>
                </div>

                <div class="user_companies_add">
                    <h3>Добавление организации</h3>
                    <div class="user_companies_add__form">
                        <div>
                            <p>Название организации</p>
                            <input type="text" class="input" placeholder="Введите название организации">
                        </div>
                        <div>
                            <p>Юридический адрес</p>
                            <input type="text" class="input" placeholder="Введите юредический адрес">
                        </div>
                        <div>
                            <p>ИНН</p>
                            <input type="text" class="input" placeholder="Введите ИНН">
                        </div>
                        <div>
                            <p>КПП</p>
                            <input type="text" class="input" placeholder="Введите КПП">
                        </div>
                        <div>
                            <p>ОГРН</p>
                            <input type="text" class="input" placeholder="Введите ОГРН">
                        </div>
                        <div>
                            <p>Наименование банка</p>
                            <input type="text" class="input" placeholder="Введите наименование банка">
                        </div>
                        <div>
                            <p>Расчетный счет</p>
                            <input type="text" class="input" placeholder="Введите расчетный счет">
                        </div>
                        <div>
                            <p>БИК банка</p>
                            <input type="text" class="input" placeholder="Введите БИК банка">
                        </div>
                        <div>
                            <p>Корреспондентский счет</p>
                            <input type="text" class="input" placeholder="Введите корреспондентский счет">
                        </div>
                    </div>
                    <div class="user_companies_add__actions">
                        <button class="btn">Добавить организацию</button>
                        <button class="btn btn_upend">Отменить</button>
                    </div>
                </div>

                <div class="user_companies_lists">
                    <div class="user_companies_lists__item">
                        <h3>ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ ”НАЗВАНИЕ”</h3>
                        <p>ИНН 1349583745</p>
                        <p>КПП 1349583745</p>
                        <p>Как я понял тут адресс тоже пример адресса в 2 строчки</p>
                        <button class="btn">Редактировать</button>
                    </div>
                    <div class="user_companies_lists__item">
                        <h3>ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ ”НАЗВАНИЕ”</h3>
                        <p>ИНН 1349583745</p>
                        <p>КПП 1349583745</p>
                        <p>Как я понял тут адресс тоже пример адресса в 2 строчки</p>
                        <button class="btn">Редактировать</button>
                    </div>
                    <div class="user_companies_lists__item">
                        <h3>ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ ”НАЗВАНИЕ”</h3>
                        <p>ИНН 1349583745</p>
                        <p>КПП 1349583745</p>
                        <p>Как я понял тут адресс тоже пример адресса в 2 строчки</p>
                        <button class="btn">Редактировать</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/profile/index.js')
    @vite('resources/js/profile/user_companies/index.js')
@endsection
