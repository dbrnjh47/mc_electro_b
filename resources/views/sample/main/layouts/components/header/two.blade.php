<div class="header_two__container">
    <div class="header_two">
        <ul class="header_two__menu" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <li id="city_select">
                <select class="select2_custom" data-placholder="Введите текст"
                    data-dropdown-parent="#city_select" data-minimum-results-for-search="2" name="state">
                    <option value="AL">Москва</option>
                    <option value="WY">Свердловск</option>
                    <option value="WY">Екатеринбург</option>
                    <option value="WY">Самара</option>
                    <option value="WY">Краснодар</option>
                </select>

                <div class="location">
                    <h2 class="location__text">Ваш город <span>Москва?</span></h2>
                    <div class="location__inner">
                        <button class="btn">Все верно</button>
                        <button class="btn btn_upend">Сменить город</button>
                    </div>
                </div>

            </li>
            <li><a href="#" itemprop="url" class="header_two__menu_link">Распродажа</a></li>
            <li><a href="#" itemprop="url" class="header_two__menu_link">Акции</a></li>
            <li>
                <div class="header_two__sub_menu">
                    <button class="header_two__menu_link header_two__sub_menu_title">
                        О компании
                        <!-- /temple/images/layout/icon/str.svg -->
                        <svg width="15" height="8" viewBox="0 0 15 8"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.7017 1.63282L8.22017 7.71985C7.82243 8.09338 7.17757 8.09338 6.77983 7.71985L0.298304 1.63282C-0.0994349 1.25929 -0.0994349 0.653678 0.298304 0.280147C0.696042 -0.0933833 1.3409 -0.0933832 1.73864 0.280147L7.5 5.69084L13.2614 0.280148C13.6591 -0.0933827 14.304 -0.0933827 14.7017 0.280148C15.0994 0.653679 15.0994 1.25929 14.7017 1.63282Z" />
                        </svg>
                    </button>
                    <div class="header_two__sub_menu_wrapper">
                        <a href="#" itemprop="url" class="header_two__sub_menu_wrapper_link">Краткая информация</a>
                        <a href="#" itemprop="url" class="header_two__sub_menu_wrapper_link">История</a>
                        <a href="#" itemprop="url" class="header_two__sub_menu_wrapper_link">Реквизиты</a>
                        <a href="#" itemprop="url" class="header_two__sub_menu_wrapper_link">Новости</a>
                        <a href="#" itemprop="url" class="header_two__sub_menu_wrapper_link">Адреса магазинов</a>
                        <a href="#" itemprop="url" class="header_two__sub_menu_wrapper_link">Отзывы</a>
                    </div>
                </div>
            </li>
            <li><a itemprop="url" href="#" class="header_two__menu_link">Доставка</a></li>
            <li><a itemprop="url" href="#" class="header_two__menu_link">Контакты</a></li>
        </ul>

        <div class="header_two__contacts_wrapper">
            <ul class="header_two__contacts">
                @if($settings->tg)
                <li>
                    <a itemprop="url" target="_blank" href="{{$settings->tg}}">
                        <img src="/temple/images/layout/icon/social/tg.svg" alt="tg" loading="lazy" decoding="async">
                    </a>
                </li>
                @endif

                @if($settings->yt)
                <li>
                    <a itemprop="url" target="_blank" href="{{$settings->yt}}">
                        <img src="/temple/images/layout/icon/social/yt.svg" alt="yt" loading="lazy" decoding="async">
                    </a>
                </li>
                @endif

                @if($settings->vk)
                <li>
                    <a itemprop="url" target="_blank" href="{{$settings->vk}}">
                        <img src="/temple/images/layout/icon/social/vk.svg" alt="vk" loading="lazy" decoding="async">
                    </a>
                </li>
                @endif
            </ul>

            <img src="/temple/images/layout/icon/social/phone.svg" alt="phone" loading="lazy" decoding="async">
            <div class="header_two__phones">
                <a href="tel:{{$settings->phone}}" itemprop="telephone">{{$settings->phone}}</a>,<br>
                <a href="mailto:{{$settings->email}}" itemprop="email">{{$settings->email}}</a>
            </div>
        </div>
    </div>
</div>
