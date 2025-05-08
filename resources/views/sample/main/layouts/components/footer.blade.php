<footer class="footer" itemscope itemtype="http://schema.org/WPFooter">
    <div class="footer__container">
        <div class="footer__content">
            <div class="footer__logo">
                <a href="/" itemprop="url" class="header__logo">
                    <span class="header__logo_icon">{{$settings->abbreviation}}</span>
                    <div class="header__logo_content">
                        <span class="header__logo_name" itemprop="name">{{$settings->name}}</span>
                        <span class="header__logo_title">электротовары здесь</span>
                    </div>
                </a>

                <p itemprop="description">Оптово-розничная сеть и интернет-магазин электротехнической продукции с доставкой по РФ и
                    СНГ.</p>
                <div class="footer__socials" itemscope itemtype="https://schema.org/Organization">
                    <a itemprop="email" href="mailto:{{$settings->email}}">
                        <img src="/temple/images/layout/footer/icon/email.svg" alt="email" loading="lazy" decoding="async">
                    </a>

                    @if($settings->tg)
                    <a itemprop="sameAs" href="{{$settings->tg}}" target="_blank">
                        <img src="/temple/images/layout/footer/icon/tg.svg" alt="tg" loading="lazy" decoding="async">
                    </a>
                    @endif

                    @if($settings->yt)
                    <a itemprop="sameAs" href="{{$settings->yt}}" target="_blank">
                        <img src="/temple/images/layout/footer/icon/yt.svg" alt="yt" loading="lazy" decoding="async">
                    </a>
                    @endif

                    @if($settings->vk)
                    <a itemprop="sameAs" href="{{$settings->vk}}" target="_blank">
                        <img src="/temple/images/layout/footer/icon/vk.svg" alt="vk" loading="lazy" decoding="async">
                    </a>
                    @endif

                    @if($settings->in)
                    <a itemprop="sameAs" href="{{$settings->in}}" target="_blank">
                        <img src="/temple/images/layout/footer/icon/in.svg" alt="in" loading="lazy" decoding="async">
                    </a>
                    @endif
                </div>
            </div>

            <div class="footer__menu">
                <h4>Информация</h4>
                <ul itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <li><a itemprop="url" href="#">Способы оплаты</a></li>
                    <li><a itemprop="url" href="{{route("agreement")}}">Пользовательское <br> соглашение</a></li>
                    <li><a itemprop="url" href="{{route("policy")}}">Политика <br> конфиденциальности</a></li>
                    <li><a itemprop="url" href="#">Статьи и обзоры</a></li>
                    <li><a itemprop="url" href="#">Производители и бренды</a></li>
                    <li><a itemprop="url" href="#">Архив товаров</a></li>
                </ul>
            </div>

            <div class="footer__menu">
                <h4>Сервисы</h4>
                <ul itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <li><a itemprop="url" href="#">Корзина</a></li>
                    <li><a itemprop="url" href="#">Авторизация</a></li>
                    <li><a itemprop="url" href="#">Настройки аккаунта</a></li>
                    <li><a itemprop="url" href="#">Мой адрес</a></li>
                    <li><a itemprop="url" href="#">Мои заказы</a></li>
                    <li><a itemprop="url" href="#">Поиск на сайте</a></li>
                    <li><a itemprop="url" href="#">Карта сайта</a></li>
                </ul>
            </div>

            <div class="footer__menu">
                <h4>Компания</h4>
                <ul itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <li><a itemprop="url" href="#">Краткая информация</a></li>
                    <li><a itemprop="url" href="#">История</a></li>
                    <li><a itemprop="url" href="#">Реквизиты</a></li>
                    <li><a itemprop="url" href="#">Новости</a></li>
                    <li><a itemprop="url" href="#">Адреса магазинов</a></li>
                    <li><a itemprop="url" href="#">Отзывы</a></li>
                </ul>
            </div>

            <div class="footer__menu footer__menu__numbers" itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
                <h4>Контакты</h4>
                <a href="tel:{{$settings->phone}}" itemprop="telephone" class="footer__menu__number">{{$settings->phone}}</a>
                <a href="mailto:{{$settings->email}}" itemprop="email" class="footer__menu__number">{{$settings->email}}</a>
            </div>
        </div>

        <div class="footer__bottom">
            <meta itemprop="copyrightYear" content="{{date("Y")}}">
            <p>© 2012-{{date("Y")}} {{$settings->abbreviation}} {{$settings->name}}.</p>
        </div>
    </div>
</footer>
