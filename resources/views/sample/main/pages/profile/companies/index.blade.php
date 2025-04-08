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
            <div class="profile__menu dop_menu">
                <div class="profile__user_wrapper">
                    <a href="#" class="profile__user">
                        <div class="profile__user_avatar">
                            <img src="/assets/user/avatar/defult.svg" alt="avatar" loading="lazy" decoding="async">
                        </div>
                        <p class="profile__user_balance">12,000₽</p>
                    </a>
                    <div class="profile__user_name">
                        <p>Example usename</p>
                        <span>ID:02912834</span>
                        <svg class="close dop_menu__close" width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.23334 1.22848C0.935229 1.52543 0.660942 1.80387 0.447115 2.02273C0.196487 2.27925 0.197379 2.68721 0.448081 2.94366C0.878267 3.38371 1.57724 4.09588 2.36252 4.88484C3.66192 6.19031 4.77307 7.31102 4.83181 7.37521L4.9386 7.49199L2.48019 9.95126C1.64812 10.7836 0.904998 11.5351 0.456446 11.9901C0.206495 12.2436 0.201478 12.6477 0.447797 12.9048C0.666371 13.1329 0.950745 13.4259 1.26283 13.7378L2.05439 14.5289C2.31476 14.7891 2.73675 14.789 2.99705 14.5288L4.98563 12.5403C6.33851 11.1875 7.4632 10.0748 7.48484 10.0676C7.50653 10.0603 8.62656 11.1535 9.97378 12.4968C10.805 13.3257 11.5572 14.0649 12.0115 14.5096C12.2636 14.7565 12.6636 14.7623 12.9199 14.5198C13.2119 14.2436 13.5962 13.8727 13.9291 13.5275L14.531 12.9225C14.7902 12.662 14.7897 12.2408 14.5298 11.9809L10.0392 7.49029L10.3869 7.1385C10.5782 6.945 11.6656 5.85168 12.8033 4.70889C13.588 3.92065 14.3036 3.19484 14.6721 2.82033C14.8346 2.65516 14.8639 2.43104 14.7149 2.25356C14.555 2.06304 14.2785 1.75876 13.8011 1.27947C13.4716 0.948739 13.1518 0.636915 12.9149 0.40829C12.6889 0.190242 12.3507 0.175477 12.1179 0.386248C11.7608 0.709631 11.1159 1.31822 9.98715 2.44508C8.6354 3.79452 7.51995 4.90749 7.50836 4.91828C7.49673 4.92913 6.37544 3.82696 5.01655 2.46898C4.17751 1.63053 3.41756 0.886203 2.95891 0.439417C2.70522 0.192296 2.30362 0.188955 2.04778 0.433843C1.82357 0.648455 1.53684 0.926174 1.23334 1.22848Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="profile__list">
                    <a href="#">Список заказов</a>
                    <a href="#">Избранное</a>
                    <a href="#">Организации</a>
                    <a href="#">История баланса</a>
                    <a href="#">Пополнить баланс</a>
                    <a href="#" class="red">Выход</a>
                </div>
            </div>
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
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/profile/index.js')
    @vite('resources/js/profile/user_companies/index.js')
@endsection
