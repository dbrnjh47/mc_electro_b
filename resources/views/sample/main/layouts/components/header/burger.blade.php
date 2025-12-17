<div class="burger_menu" itemscope itemtype="https://schema.org/Organization">
    <div class="burger_menu__bg burger_menu_close"></div>

    <div class="burger_menu__main">
        <div class="burger_menu__main__content">
            <div class="burger_menu__main__content_info">
                <a href="{{route("home")}}" itemprop="url" class="header__logo">
                    <span class="header__logo_icon">{{ $settings->abbreviation }}</span>
                    <div class="header__logo_content">
                        <span class="header__logo_name" itemprop="name">{{ $settings->name }}</span>
                        <span class="header__logo_title">электротовары здесь</span>
                    </div>
                </a>


                <svg class="close burger_menu_close" width="15" height="15" viewBox="0 0 15 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.23334 1.22848C0.935229 1.52543 0.660942 1.80387 0.447115 2.02273C0.196487 2.27925 0.197379 2.68721 0.448081 2.94366C0.878267 3.38371 1.57724 4.09588 2.36252 4.88484C3.66192 6.19031 4.77307 7.31102 4.83181 7.37521L4.9386 7.49199L2.48019 9.95126C1.64812 10.7836 0.904998 11.5351 0.456446 11.9901C0.206495 12.2436 0.201478 12.6477 0.447797 12.9048C0.666371 13.1329 0.950745 13.4259 1.26283 13.7378L2.05439 14.5289C2.31476 14.7891 2.73675 14.789 2.99705 14.5288L4.98563 12.5403C6.33851 11.1875 7.4632 10.0748 7.48484 10.0676C7.50653 10.0603 8.62656 11.1535 9.97378 12.4968C10.805 13.3257 11.5572 14.0649 12.0115 14.5096C12.2636 14.7565 12.6636 14.7623 12.9199 14.5198C13.2119 14.2436 13.5962 13.8727 13.9291 13.5275L14.531 12.9225C14.7902 12.662 14.7897 12.2408 14.5298 11.9809L10.0392 7.49029L10.3869 7.1385C10.5782 6.945 11.6656 5.85168 12.8033 4.70889C13.588 3.92065 14.3036 3.19484 14.6721 2.82033C14.8346 2.65516 14.8639 2.43104 14.7149 2.25356C14.555 2.06304 14.2785 1.75876 13.8011 1.27947C13.4716 0.948739 13.1518 0.636915 12.9149 0.40829C12.6889 0.190242 12.3507 0.175477 12.1179 0.386248C11.7608 0.709631 11.1159 1.31822 9.98715 2.44508C8.6354 3.79452 7.51995 4.90749 7.50836 4.91828C7.49673 4.92913 6.37544 3.82696 5.01655 2.46898C4.17751 1.63053 3.41756 0.886203 2.95891 0.439417C2.70522 0.192296 2.30362 0.188955 2.04778 0.433843C1.82357 0.648455 1.53684 0.926174 1.23334 1.22848Z">
                    </path>
                </svg>

                <div class="burger_menu__main__buttons">
                    <a class="button" onclick="modal('#modal_login');">
                        Войти
                    </a>
                    <a class="button button_two" onclick="modal('#modal_signup');">
                        Зарегистрироваться
                    </a>
                </div>

            </div>

            <ul class="burger_menu__main__navigations">
                <li>
                    <a class="navigation" onclick="getCategories();">
                        Каталог
                    </a>
                </li>
                <li>
                    <a class="navigation" itemprop="url" href="{{ route('category', ['slugs' => 'sale']) }}">
                        Распродажа
                    </a>
                </li>

                {{-- <li>
                    <a class="navigation" itemprop="url" href="">
                        Акции
                    </a>
                </li> --}}

                <li>
                    <a class="navigation">
                        О компании
                        <svg width="12" height="7" viewBox="0 0 12 7"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.8047 0.18794C12.0651 0.438526 12.0651 0.844807 11.8047 1.09539L6.4714 6.81206C6.21105 7.06265 5.78894 7.06265 5.5286 6.81206L0.195262 1.09539C-0.0650874 0.844807 -0.0650873 0.438526 0.195262 0.187939C0.455612 -0.0626471 0.877722 -0.0626471 1.13807 0.187939L6 5.45088L10.8619 0.18794C11.1223 -0.0626467 11.5444 -0.0626466 11.8047 0.18794Z"
                            ></path>
                        </svg>

                    </a>

                    <div class="navigation_list">
                        <a class="navigation" itemprop="url" href="{{ route('about') }}">Краткая информация</a>
                        <a class="navigation" itemprop="url" href="">Новости</a>
                    </div>
                </li>

                <li>
                    <a class="navigation" itemprop="url" href="{{ route('contacts') }}">
                        Контакты
                    </a>
                </li>
            </ul>

            <div class="burger_menu__main__settings">
                <div class="burger_menu__main__setting" id="burger_city_select">
                    <h3>Город</h3>
                    <select class="" data-dropdown-parent="#burger_city_select" data-placholder="Введите название города"
                        data-minimum-results-for-search="1">
                        @if ($user_city)
                            <option value="{{ $user_city->id }}" selected>{{ $user_city->name }}</option>
                        @else
                            <option value="all" selected>Все города</option>
                        @endif
                    </select>
                </div>

                {{-- <div class="burger_menu__main__setting" id="burger_currency_select">
                    <h3>Валюта</h3>
                    <select class="select2_custom" data-dropdown-parent="#burger_currency_select"
                        data-minimum-results-for-search="10">

                        @foreach ($currencies as $currency)
                            <option value="{{$currency->id}}" @if ($user_currency->id == $currency->id) selected @endif>{{ $currency->abbreviation }}</option>
                        @endforeach
                    </select>
                </div> --}}
            </div>

            <div class="burger_menu__main__contact">
                <p class="title">Контакты</p>
                <a class="phone" itemprop="telephone" href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                <a class="mail" itemprop="email" href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>

                <ul class="burger_menu__main__contacts">
                    @if ($settings->tg)
                        <li>
                            <a href="{{ $settings->tg }}" itemprop="sameAs" target="_blank">
                                <img src="/temple/images/layout/icon/social/tg.svg" alt="tg" loading="lazy"
                                    decoding="async">
                            </a>
                        </li>
                    @endif

                    @if ($settings->yt)
                        <li>
                            <a href="{{ $settings->yt }}" itemprop="sameAs" target="_blank">
                                <img src="/temple/images/layout/icon/social/yt.svg" alt="yt" loading="lazy"
                                    decoding="async">
                            </a>
                        </li>
                    @endif

                    @if ($settings->vk)
                        <li>
                            <a href="{{ $settings->vk }}" itemprop="sameAs" target="_blank">
                                <img src="/temple/images/layout/icon/social/vk.svg" alt="vk" loading="lazy"
                                    decoding="async">
                            </a>
                        </li>
                    @endif
                </ul>

            </div>

        </div>
    </div>
</div>
