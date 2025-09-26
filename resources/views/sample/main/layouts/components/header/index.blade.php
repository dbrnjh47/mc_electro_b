@include('sample.main.layouts.components.header.two')
@include('sample.main.layouts.components.header.bottom_menu')
@include('sample.main.layouts.components.header.burger')
@include('sample.main.layouts.components.header.categories')

<header class="header_wrapper" itemscope itemtype="https://schema.org/WPHeader">
    <div class="header header__container">
        <a href="/" itemprop="url" class="header__logo">
            <span class="header__logo_icon">{{ $settings->abbreviation }}</span>
            <div class="header__logo_content">
                <span class="header__logo_name" itemprop="name">{{ $settings->name }}</span>
                <span class="header__logo_title" itemprop="headline">электротовары здесь</span>
            </div>
        </a>

        <div class="header__search">
            <div class="header__search_input" itemscope itemtype="https://schema.org/SearchAction">
                <input type="text" placeholder="" itemprop="query-input">

                <!-- public\temple\images\layout\icon\search.svg -->
                <svg class="header__search_input_icon" width="20" height="20" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.0338 12.4L20 17.4375L17.5 20L12.4062 15.03C11.1215 15.8295 9.63816 16.2522 8.125 16.25C3.6375 16.25 0 12.6038 0 8.125C0 3.6375 3.64625 0 8.125 0C12.6125 0 16.25 3.64625 16.25 8.125C16.2523 9.63569 15.8309 11.1167 15.0338 12.4ZM2.49625 8.065C2.49625 11.165 5.01375 13.69 8.12125 13.69C11.2213 13.69 13.7463 11.1713 13.7463 8.065C13.7463 4.965 11.2275 2.44 8.12125 2.44C5.02125 2.44 2.49625 4.9575 2.49625 8.065Z" />
                </svg>


            </div>

            <div class="header__search_dropdown">
                <div class="header__search_dropdown_wrapper">
                    <div class="header__search_lookings">
                        <div class="header__search__lookings_title">Ранее искали</div>
                        <div class="header__search__looking">Лампочка дневного света</div>
                    </div>

                    <div class="header__search_results">
                        <div class="header__search__results_title">Результаты поиска</div>
                        <div class="header__search__result active"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAYAAADgKtSgAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMxSURBVHgBpZXLaxNBHMd/M/vetOk2QmwFhZD20IPailB70fbgxYM3PVsvPXhSL70V8WIvijdBUPsXFLx5seKDgq/QCpaimFSi0Hceu9lkn/5mNvSgSbaYX5gNu7Pzmd985zu/JRATubX8pCjALUrpuO8Hac/zdrC9tmv2woWJM887jSXtOhaXckZmMHk/1ZecVhQZPNeHqlWDhuuC7/ng+z54vv/g3OjIbUJI2IohtoNnB417x4+lp2VJZBDwKMV/BeEOhOwXIi8Mb775sGLg69cPnfm7T6vXRrKZp5oqA2OUzRqUqha4mDWbSKACNgIBdpbKFVxFMDU1Mfbqbw5tBT/S339DRXCA4L2yCfsVk4OZFAFbhecBFQRQUa6+3h7wQ3+uFecf+FIuZ2DGZ30km7U6NjuCBgFvbCXsni+bEEgkEgABTC4uLhmx8OpWpV8SRQ6q2XUuwwEcyawhFUK8FzB7Ea0kCBRUQ42H9yaToeN64OPguhNpHE3AMg/5JiEbkw155hyCm121XSsWjhtTaDSckudHMgRNMJuAOYR7jl1wItbf3IfC1Uvnt2PhkZj0oYWeprhcxjmwVBhlzi4E3eLixlbQRQSEJy0xrR7m83nDdEkeHWI0mVymSAIClFCQJJHLhFEAURs/PTSwdSg4i9XvGzO7O3uPNre2wbZtrqskSaBpGuiqCqqqQA86RRLE6VMjmWetGLQd/GT2xGMj2VvSEcaiXq+D40ReF9Ahuq7hBPKPduCOcHRCoCnqQhIPiSTJ/BnbTmZTTVF49rquzkOHoJ06NV1725PQgRUuriBKLCJcQTh7FtBwudN4sVOnDPSjhtrKsgRNS/NDwzYTD06YGTj6Bf43c0Fwd1imsihxj3seHiost2wCQugKxERHeDqdNnf3K3fZYWHFyjRNrOUeVLFKFn/9nouDi3EvrH9b/2z0Gdzs62tfIaGpwMQvFDeXu8qcxXB2uC+hKWBaFhSLP7kNTTy9VtlKdA0XiFBl7qhZKInv4UciGkIazn7XcDWlvnQdr8ArYBiVAjyV87OzM+Wu4WOZTGmvsTFKU5UXQxOpcMN8f+fK5YuzcIj4A5rGkZyBEemOAAAAAElFTkSuQmCC"
                                alt="">
                            Лампочка холодного света</div>
                        <div class="header__search__result"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAYAAADgKtSgAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMxSURBVHgBpZXLaxNBHMd/M/vetOk2QmwFhZD20IPailB70fbgxYM3PVsvPXhSL70V8WIvijdBUPsXFLx5seKDgq/QCpaimFSi0Hceu9lkn/5mNvSgSbaYX5gNu7Pzmd985zu/JRATubX8pCjALUrpuO8Hac/zdrC9tmv2woWJM887jSXtOhaXckZmMHk/1ZecVhQZPNeHqlWDhuuC7/ng+z54vv/g3OjIbUJI2IohtoNnB417x4+lp2VJZBDwKMV/BeEOhOwXIi8Mb775sGLg69cPnfm7T6vXRrKZp5oqA2OUzRqUqha4mDWbSKACNgIBdpbKFVxFMDU1Mfbqbw5tBT/S339DRXCA4L2yCfsVk4OZFAFbhecBFQRQUa6+3h7wQ3+uFecf+FIuZ2DGZ30km7U6NjuCBgFvbCXsni+bEEgkEgABTC4uLhmx8OpWpV8SRQ6q2XUuwwEcyawhFUK8FzB7Ea0kCBRUQ42H9yaToeN64OPguhNpHE3AMg/5JiEbkw155hyCm121XSsWjhtTaDSckudHMgRNMJuAOYR7jl1wItbf3IfC1Uvnt2PhkZj0oYWeprhcxjmwVBhlzi4E3eLixlbQRQSEJy0xrR7m83nDdEkeHWI0mVymSAIClFCQJJHLhFEAURs/PTSwdSg4i9XvGzO7O3uPNre2wbZtrqskSaBpGuiqCqqqQA86RRLE6VMjmWetGLQd/GT2xGMj2VvSEcaiXq+D40ReF9Ahuq7hBPKPduCOcHRCoCnqQhIPiSTJ/BnbTmZTTVF49rquzkOHoJ06NV1725PQgRUuriBKLCJcQTh7FtBwudN4sVOnDPSjhtrKsgRNS/NDwzYTD06YGTj6Bf43c0Fwd1imsihxj3seHiost2wCQugKxERHeDqdNnf3K3fZYWHFyjRNrOUeVLFKFn/9nouDi3EvrH9b/2z0Gdzs62tfIaGpwMQvFDeXu8qcxXB2uC+hKWBaFhSLP7kNTTy9VtlKdA0XiFBl7qhZKInv4UciGkIazn7XcDWlvnQdr8ArYBiVAjyV87OzM+Wu4WOZTGmvsTFKU5UXQxOpcMN8f+fK5YuzcIj4A5rGkZyBEemOAAAAAElFTkSuQmCC"
                                alt=""> Лампочка
                            теплого света</div>
                    </div>
                </div>
                <button class="header__search_dropdown__button">Показать все результаты поиска</button>
            </div>

        </div>

        <button class="btn" onclick="getCategories();">
            <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                <rect width="12" height="2" />
                <rect y="5" width="12" height="2" />
                <rect y="10" width="12" height="2" />
            </svg>
            Каталог</button>

        <button class="btn btn_upend">Свяжитесь с нами</button>

        <div class="header__actions">
            <a href="{{ route('wishlist') }}" itemprop="url" class="header__action header__action_hover">
                <!-- public\temple\images\layout\icon\favorite.svg -->
                <svg width="18" height="21" viewBox="0 0 18 21" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 1.49222C0 0.668092 0.688793 0 1.53846 0H16.4615C17.3112 0 18 0.668091 18 1.49222V20.452C18 20.8815 17.513 21.1436 17.1373 20.9162L9.29861 16.1724C9.11586 16.0618 8.88414 16.0618 8.70139 16.1724L0.862708 20.9162C0.486973 21.1436 0 20.8815 0 20.452V1.49222Z" />
                </svg>
                Избранное
            </a>
            <a href="#" itemprop="url" class="header__action header__action_hover">
                <!-- public\temple\images\layout\icon\basket.svg -->
                <svg width="23" height="21" viewBox="0 0 23 21" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.91299 3.10869L0.780596 2.15859C0.200337 1.98259 -0.128051 1.36729 0.0471219 0.784288C0.222295 0.201285 0.834692 -0.128656 1.41495 0.0473447L5.8757 1.40035L7.71315 13.6029H18.0253C18.103 13.6029 18.1722 13.5536 18.1979 13.48L18.6839 12.0883C18.7252 11.9703 18.6395 11.8463 18.515 11.8437L11.2281 11.6953C10.6221 11.683 10.1408 11.1794 10.1531 10.5705C10.1654 9.96167 10.6666 9.47809 11.2726 9.49043L19.4 9.65595C19.479 9.65756 19.5501 9.60799 19.5763 9.53306L20.0431 8.1963C20.0849 8.07679 19.9966 7.95168 19.8705 7.95168H11.7536C11.1475 7.95168 10.6561 7.45799 10.6561 6.849C10.6561 6.24001 11.1475 5.74633 11.7536 5.74633H22.4508C22.829 5.74633 23.0938 6.12167 22.9686 6.48021L19.9042 15.255C19.7885 15.5864 19.477 15.8082 19.1275 15.8082H6.53323C6.12619 15.8082 5.78027 15.5093 5.71938 15.1049L3.91299 3.10869Z" />
                    <path
                        d="M10.5647 19.1622C10.5647 20.1772 9.74575 21 8.73555 21C7.72534 21 6.9064 20.1772 6.9064 19.1622C6.9064 18.1472 7.72534 17.3244 8.73555 17.3244C9.74575 17.3244 10.5647 18.1472 10.5647 19.1622Z" />
                    <path
                        d="M18.6129 19.1622C18.6129 20.1772 17.794 21 16.7838 21C15.7736 21 14.9546 20.1772 14.9546 19.1622C14.9546 18.1472 15.7736 17.3244 16.7838 17.3244C17.794 17.3244 18.6129 18.1472 18.6129 19.1622Z" />
                </svg>

                Корзина
            </a>

            @auth
                <div class="header__user_wrapper">
                    <div class="header__user">
                        <p>12,000₽</p>
                        <div class="header__user_avatar">
                            <img src="/assets/user/avatar/defult.svg" alt="user" loading="lazy" decoding="async">
                        </div>
                    </div>
                    <div class="header__user_drop_menu">
                        <div class="header__user_drop_menu_role">
                            <a href="#" class="activ">Физ. лицо</a>
                            <a href="#">Юр. лицо</a>
                        </div>
                        <ul>
                            <li><a href="#">Профиль</a></li>
                            <li><a href="#">Список заказов</a></li>
                            <li><a href="#">Пополнить баланс</a></li>
                            <li><a href="{{ route('logout') }}">Выйти</a></li>
                        </ul>
                    </div>
                </div>
            @else
                <a class="header__action header__action_hover" onclick="modal('#modal_login');">
                    <!-- public\temple\images\layout\icon\user.svg -->
                    <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5158 4.96201C13.5158 7.70246 11.2464 9.92402 8.44688 9.92402C5.64738 9.92402 3.37794 7.70246 3.37794 4.96201C3.37794 2.22157 5.64738 0 8.44688 0C11.2464 0 13.5158 2.22157 13.5158 4.96201Z" />
                        <path
                            d="M0 17.0447C0 13.9773 2.5402 11.4906 5.6737 11.4906H12.1429C14.8254 11.4906 17 13.6194 17 16.2453V21H0V17.0447Z" />
                    </svg>

                    Войти
                </a>
            @endauth


            <div class="header__world_dropdown header__action_hover">

                <!-- public\temple\images\layout\icon\world.svg -->
                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.0312 0.0126667C10.4451 -0.0505081 10.6091 0.122629 10.5233 0.532078C8.88104 2.0561 7.57637 3.82682 6.60929 5.84424C5.12776 5.92186 3.64339 5.93764 2.15616 5.89146C1.87669 5.77789 1.80638 5.58118 1.94522 5.30122C3.91734 2.42688 6.61266 0.664036 10.0312 0.0126667Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.6406 0.0126579C17.2162 0.549516 20.0209 2.31236 22.0547 5.30121C22.2025 5.58679 22.1322 5.7835 21.8438 5.89145C20.3565 5.93763 18.8722 5.92186 17.3906 5.84423C16.4236 3.82681 15.1189 2.05609 13.4766 0.532069C13.4139 0.313541 13.4686 0.140404 13.6406 0.0126579Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.2032 0.957031C11.3684 0.949754 11.5012 1.01271 11.6016 1.14591C11.6329 2.67266 11.6329 4.19942 11.6016 5.72617C11.5398 5.81999 11.4538 5.8751 11.3438 5.89144C10.169 5.93728 8.99708 5.92156 7.82816 5.84422C7.6611 5.70284 7.622 5.53757 7.71097 5.34841C8.60586 3.6678 9.76991 2.20401 11.2032 0.957031Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.6094 0.957038C12.7465 0.95514 12.8715 0.994492 12.9844 1.07509C14.4066 2.3539 15.5316 3.84918 16.3594 5.56091C16.3311 5.67745 16.2686 5.77188 16.1719 5.84422C15.003 5.92157 13.8311 5.93729 12.6563 5.89144C12.5706 5.87855 12.5003 5.83917 12.4454 5.77339C12.3679 4.25068 12.3523 2.72392 12.3985 1.19313C12.4465 1.08987 12.5169 1.01117 12.6094 0.957038Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 11.4397C0 11.2036 0 10.9675 0 10.7314C0.142049 9.52979 0.446736 8.36503 0.914062 7.2372C0.998484 7.04318 1.10004 6.86219 1.21875 6.69418C2.77841 6.61651 4.34091 6.60074 5.90625 6.64696C6.09431 6.68705 6.18806 6.8051 6.1875 7.00111C5.73047 8.42953 5.45705 9.89333 5.36719 11.3925C5.33039 11.4768 5.27573 11.5477 5.20312 11.605C3.53125 11.6365 1.85938 11.6365 0.1875 11.605C0.10077 11.5724 0.0382704 11.5173 0 11.4397Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.31249 6.62335C8.65635 6.61546 10.0001 6.62335 11.3437 6.64696C11.4538 6.6633 11.5397 6.7184 11.6016 6.81223C11.6328 8.35474 11.6328 9.8972 11.6016 11.4397C11.5625 11.5105 11.5078 11.5656 11.4375 11.605C9.73438 11.6365 8.03123 11.6365 6.32812 11.605C6.28518 11.5873 6.24609 11.5637 6.21093 11.5341C6.16931 9.88615 6.46617 8.29642 7.10156 6.76501C7.1676 6.70452 7.23792 6.6573 7.31249 6.62335Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.6563 6.62333C14.0499 6.60086 15.4405 6.62447 16.8281 6.69416C16.9147 6.78973 16.9771 6.8999 17.0156 7.0247C17.5656 8.48353 17.8234 9.98671 17.7891 11.5341C17.7539 11.5637 17.7148 11.5873 17.6719 11.605C15.9688 11.6365 14.2656 11.6365 12.5625 11.605C12.5078 11.5499 12.4532 11.4948 12.3984 11.4397C12.3672 9.89718 12.3672 8.35472 12.3984 6.81221C12.4688 6.71924 12.5547 6.65629 12.6563 6.62333Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M24 10.6842C24 10.9518 24 11.2193 24 11.4869C23.9445 11.5343 23.8821 11.5737 23.8125 11.605C22.1406 11.6365 20.4688 11.6365 18.7969 11.605C18.7243 11.5477 18.6696 11.4768 18.6328 11.3925C18.5512 9.89182 18.2778 8.42802 17.8125 7.00111C17.8119 6.8051 17.9057 6.68705 18.0938 6.64696C19.6591 6.60074 21.2216 6.61651 22.7813 6.69418C23.1112 7.28121 23.369 7.90295 23.5547 8.55934C23.7493 9.26432 23.8977 9.97261 24 10.6842Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 13.3285C0 13.0609 0 12.7933 0 12.5258C0.0554415 12.4783 0.117941 12.439 0.1875 12.4077C1.85938 12.3762 3.53125 12.3762 5.20312 12.4077C5.27573 12.465 5.33039 12.5359 5.36719 12.6202C5.45705 14.1194 5.73047 15.5831 6.1875 17.0116C6.18806 17.2076 6.09431 17.3256 5.90625 17.3657C4.34091 17.4119 2.77841 17.3962 1.21875 17.3185C0.888778 16.7315 0.630966 16.1097 0.445312 15.4533C0.250724 14.7484 0.102287 14.0401 0 13.3285Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.32812 12.3841C8.03133 12.3762 9.73444 12.3841 11.4375 12.4077C11.4922 12.4628 11.5469 12.5179 11.6016 12.573C11.6328 14.1155 11.6328 15.6579 11.6016 17.2004C11.5397 17.2943 11.4538 17.3494 11.3437 17.3657C9.95025 17.4118 8.55961 17.3961 7.17187 17.3185C7.09964 17.2439 7.04494 17.1573 7.00781 17.0588C6.46889 15.6113 6.18764 14.116 6.16406 12.573C6.19641 12.4856 6.25106 12.4226 6.32812 12.3841Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.5625 12.3841C14.2657 12.3762 15.9688 12.3841 17.6719 12.4077C17.8322 12.5094 17.8947 12.6589 17.8594 12.8563C17.7773 14.3006 17.4882 15.7015 16.9922 17.0588C16.9551 17.1573 16.9004 17.2439 16.8281 17.3185C15.4404 17.3961 14.0498 17.4118 12.6563 17.3657C12.5462 17.3494 12.4603 17.2943 12.3984 17.2004C12.3672 15.6579 12.3672 14.1155 12.3984 12.573C12.4501 12.5045 12.5048 12.4416 12.5625 12.3841Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M24 12.573C24 12.8091 24 13.0452 24 13.2813C23.858 14.4829 23.5533 15.6476 23.0859 16.7755C23.0015 16.9695 22.8999 17.1505 22.7813 17.3185C21.2216 17.3962 19.6591 17.4119 18.0938 17.3657C17.9057 17.3256 17.8119 17.2076 17.8125 17.0116C18.2695 15.5831 18.543 14.1194 18.6328 12.6202C18.6696 12.5359 18.7243 12.465 18.7969 12.4077C20.4688 12.3762 22.1406 12.3762 23.8125 12.4077C23.8992 12.4403 23.9618 12.4953 24 12.573Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.15619 18.0976C3.6435 18.075 5.12788 18.0986 6.60931 18.1684C7.57639 20.1859 8.88106 21.9566 10.5234 23.4806C10.6123 23.7904 10.503 23.9636 10.1953 24C7.00086 23.4621 4.40713 21.9197 2.414 19.3725C2.22987 19.1114 2.05799 18.8439 1.89838 18.5698C1.85154 18.3333 1.93748 18.1759 2.15619 18.0976Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.96875 18.0976C9.09384 18.0897 10.2188 18.0976 11.3437 18.1212C11.4295 18.1341 11.4998 18.1735 11.5547 18.2393C11.6321 19.762 11.6477 21.2887 11.6016 22.8195C11.4487 23.0648 11.2534 23.1042 11.0156 22.9376C9.59348 21.6587 8.46848 20.1635 7.64062 18.4518C7.69622 18.2779 7.80558 18.1598 7.96875 18.0976Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.6563 18.0976C13.7814 18.0897 14.9064 18.0976 16.0313 18.1212C16.2032 18.1684 16.3125 18.2786 16.3594 18.4518C15.5315 20.1635 14.4065 21.6587 12.9844 22.9376C12.7689 23.0963 12.5736 23.0727 12.3984 22.8668C12.3672 21.3557 12.3672 19.8447 12.3984 18.3337C12.4503 18.2103 12.5363 18.1316 12.6563 18.0976Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.5313 18.0976C18.9688 18.0897 20.4063 18.0976 21.8438 18.1212C22.1226 18.2361 22.1929 18.4329 22.0547 18.7115C20.0898 21.585 17.3945 23.34 13.9688 23.9764C13.5521 24.0604 13.3881 23.8951 13.4766 23.4806C15.0873 22.0005 16.353 20.2691 17.2734 18.2865C17.3438 18.1935 17.4297 18.1306 17.5313 18.0976Z" />
                </svg>


                <div class="header__world_dropdown__menu">
                    <div class="header__world_dropdown__menu_items_wrapper">
                        {{-- <div class="header__world_dropdown__menu_items">
                            @foreach ($locales as $locale)
                            <a href="{{$locale->getUrl()}}" class="header__world_dropdown__menu_item @if ($user_local->id == $locale->id) active @endif">
                                <img src="{{$locale->icon_path}}" loading="lazy" decoding="async" alt="{{$locale->slug}}">
                                {{$locale->text}}
                            </a>
                            @endforeach
                        </div> --}}
                        <div class="header__world_dropdown__menu_items">
                            @foreach ($currencies as $currency)
                                <a href="{{ route('currency.set', ['id' => $currency->id]) }}"
                                    class="header__world_dropdown__menu_item @if ($user_currency->id == $currency->id) active @endif">
                                    {{ $currency->abbreviation }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="header__burger_menu">
            <div class="rect"></div>
            <div class="rect"></div>
            <div class="rect"></div>
        </div>
    </div>
</header>
