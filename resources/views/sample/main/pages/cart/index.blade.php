@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
    @include('sample.main.pages.cart.components.modal.point')
@endsection

@section('content')
    <button onclick="modal('#modal_shipping');">shipping-points</button>
    <button onclick="">shipping-courier</button>

    <x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>

    <section class="cart cart__container">
        <div class="app__title">
            <div class="app__title_wrapper">
                <h2 class="app__title_text">Корзина</h2>
            </div>
        </div>

        <div class="cart__content">
            <section id="sticky_article" class="cart_blocks">
                @guest
                    <div class="cart_block_guest cart__item_wrapper">
                        <h3>Войдите или зарегистрируйтесь</h3>
                        <p>Вы сможете отслеживать статус заказа и получать персональные предложения</p>
                        <div>
                            <button class="btn" onclick="modal('#modal_login');">Вход</button>
                            <button class="btn btn_upend" onclick="modal('#modal_signup');">Регистрация</button>
                        </div>
                    </div>
                @endguest

                <div class="cart_block_product_list__wrapper cart__item_wrapper">
                    <div class="cart_block_product_list__title">
                        <button class="standart_a">Очистить</button>

                        <x-sample.main.share url="{{ url()->current() }}" text=""></x-sample.main.share>
                    </div>

                    <div class="cart_block_product_list">
                        <div class="cart_block_product_list__item">

                            <div class="cart_block_product_list__line_head">
                                <div class="cart_block_product_list__line_head_left">
                                    <button class="product_card__favorite">
                                        <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                        <svg width="20" height="23" viewBox="0 0 20 23"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="product_card__head_tips">
                                        <span class="product_tip product_tip_sale">Распродажа</span>
                                    </div>
                                </div>

                                <div class="cart_block_product_list__action_buttons">
                                    <button>
                                        Удалить
                                        <!-- public\temple\images\cart\icons\trash.svg -->
                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6663 3.125C12.0115 3.125 12.2913 2.84518 12.2913 2.5C12.2913 2.15482 12.0115 1.875 11.6663 1.875H8.33301C7.98783 1.875 7.70801 2.15482 7.70801 2.5C7.70801 2.84518 7.98783 3.125 8.33301 3.125L11.6663 3.125Z">
                                            </path>
                                            <path
                                                d="M17.2913 5C17.2913 5.34518 17.0115 5.625 16.6663 5.625L3.33301 5.625C2.98783 5.625 2.70801 5.34518 2.70801 5C2.70801 4.65482 2.98783 4.375 3.33301 4.375L16.6663 4.375C17.0115 4.375 17.2913 4.65482 17.2913 5Z">
                                            </path>
                                            <path
                                                d="M4.99967 7.70833C5.34485 7.70833 5.62467 7.98816 5.62467 8.33333V15.8333C5.62467 16.4086 6.09104 16.875 6.66634 16.875H13.333C13.9083 16.875 14.3747 16.4086 14.3747 15.8333V8.33333C14.3747 7.98816 14.6545 7.70833 14.9997 7.70833C15.3449 7.70833 15.6247 7.98816 15.6247 8.33333V15.8333C15.6247 17.099 14.5987 18.125 13.333 18.125H6.66634C5.40069 18.125 4.37467 17.099 4.37467 15.8333V8.33333C4.37467 7.98816 4.6545 7.70833 4.99967 7.70833Z">
                                            </path>
                                            <path
                                                d="M8.33301 9.375C8.67819 9.375 8.95801 9.65482 8.95801 10V14.1667C8.95801 14.5118 8.67819 14.7917 8.33301 14.7917C7.98783 14.7917 7.70801 14.5118 7.70801 14.1667V10C7.70801 9.65482 7.98783 9.375 8.33301 9.375Z">
                                            </path>
                                            <path
                                                d="M12.2913 10C12.2913 9.65482 12.0115 9.375 11.6663 9.375C11.3212 9.375 11.0413 9.65482 11.0413 10V14.1667C11.0413 14.5118 11.3212 14.7917 11.6663 14.7917C12.0115 14.7917 12.2913 14.5118 12.2913 14.1667V10Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="cart_block_product_list__line">
                                <div class="cart_block_product_list__miniature">
                                    <a href="#" target="_blank">
                                        <img src="/assets/product/miniature/test.png" alt="">
                                    </a>
                                </div>

                                <div class="cart_block_product_list__info">
                                    <p>код: 37007694</p>
                                    <a href="#" target="_blank" class="standart_a">Выключатель 3-клавишный SchE
                                        AtlasDesign аквамарин
                                        механизм</a>

                                    <div class="cart_block_product_list__info_tags">
                                        <div>
                                            Не упусти выгоду
                                        </div>
                                    </div>

                                    <div class="cart_block_product_list__info_avails">
                                        <p class="green">Полное наличие</p>
                                    </div>

                                </div>

                                <div class="cart_block_product_list__action">
                                    <div class="input_count">
                                        <button class="input_count__btn input_count_reduce">
                                            -
                                        </button>
                                        <input type="text" val="1" placeholder="1" class="input_count__input">
                                        <button class="input_count__btn revers input_count_add">
                                            +
                                        </button>
                                    </div>

                                    <div class="cart_block_product_list__price">
                                        <div>
                                            <span class="price_old">390,16 руб.</span>
                                            <span class="price_current">390,16 руб.</span>
                                        </div>
                                        <p class="price_benefit">Выгода -<span>43,35 руб.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart_block_product_list__item">

                            <div class="cart_block_product_list__line_head">
                                <div class="cart_block_product_list__line_head_left">
                                    <button class="product_card__favorite">
                                        <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                        <svg width="20" height="23" viewBox="0 0 20 23"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="product_card__head_tips">
                                        <span>Хит</span>
                                        <span class="recommend">Советуем</span>
                                    </div>
                                </div>

                                <div class="cart_block_product_list__action_buttons">
                                    <button>
                                        Удалить
                                        <!-- public\temple\images\cart\icons\trash.svg -->
                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6663 3.125C12.0115 3.125 12.2913 2.84518 12.2913 2.5C12.2913 2.15482 12.0115 1.875 11.6663 1.875H8.33301C7.98783 1.875 7.70801 2.15482 7.70801 2.5C7.70801 2.84518 7.98783 3.125 8.33301 3.125L11.6663 3.125Z">
                                            </path>
                                            <path
                                                d="M17.2913 5C17.2913 5.34518 17.0115 5.625 16.6663 5.625L3.33301 5.625C2.98783 5.625 2.70801 5.34518 2.70801 5C2.70801 4.65482 2.98783 4.375 3.33301 4.375L16.6663 4.375C17.0115 4.375 17.2913 4.65482 17.2913 5Z">
                                            </path>
                                            <path
                                                d="M4.99967 7.70833C5.34485 7.70833 5.62467 7.98816 5.62467 8.33333V15.8333C5.62467 16.4086 6.09104 16.875 6.66634 16.875H13.333C13.9083 16.875 14.3747 16.4086 14.3747 15.8333V8.33333C14.3747 7.98816 14.6545 7.70833 14.9997 7.70833C15.3449 7.70833 15.6247 7.98816 15.6247 8.33333V15.8333C15.6247 17.099 14.5987 18.125 13.333 18.125H6.66634C5.40069 18.125 4.37467 17.099 4.37467 15.8333V8.33333C4.37467 7.98816 4.6545 7.70833 4.99967 7.70833Z">
                                            </path>
                                            <path
                                                d="M8.33301 9.375C8.67819 9.375 8.95801 9.65482 8.95801 10V14.1667C8.95801 14.5118 8.67819 14.7917 8.33301 14.7917C7.98783 14.7917 7.70801 14.5118 7.70801 14.1667V10C7.70801 9.65482 7.98783 9.375 8.33301 9.375Z">
                                            </path>
                                            <path
                                                d="M12.2913 10C12.2913 9.65482 12.0115 9.375 11.6663 9.375C11.3212 9.375 11.0413 9.65482 11.0413 10V14.1667C11.0413 14.5118 11.3212 14.7917 11.6663 14.7917C12.0115 14.7917 12.2913 14.5118 12.2913 14.1667V10Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="cart_block_product_list__line">
                                <div class="cart_block_product_list__miniature">
                                    <a href="#" target="_blank">
                                        <img src="/assets/product/miniature/test.png" alt="">
                                    </a>
                                </div>

                                <div class="cart_block_product_list__info">
                                    <p>код: 37007694</p>
                                    <a href="#" target="_blank" class="standart_a">Выключатель 3-клавишный SchE
                                        AtlasDesign аквамарин
                                        механизм</a>

                                    <div class="cart_block_product_list__info_tags">
                                        <div>
                                            Не упусти выгоду
                                        </div>
                                    </div>

                                    <div class="cart_block_product_list__info_avails">
                                        <p class="green">Полное наличие</p>
                                    </div>

                                </div>

                                <div class="cart_block_product_list__action">
                                    <div class="input_count">
                                        <button class="input_count__btn input_count_reduce">
                                            -
                                        </button>
                                        <input type="text" val="1" placeholder="1" class="input_count__input">
                                        <button class="input_count__btn revers input_count_add">
                                            +
                                        </button>
                                    </div>

                                    <div class="cart_block_product_list__price">
                                        <div>
                                            <span class="price_old">390,16 руб.</span>
                                            <span class="price_current">390,16 руб.</span>
                                        </div>
                                        <p class="price_benefit">Выгода -<span>43,35 руб.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart_block_product_list__item">

                            <div class="cart_block_product_list__line_head">
                                <div class="cart_block_product_list__line_head_left">
                                    <button class="product_card__favorite">
                                        <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                        <svg width="20" height="23" viewBox="0 0 20 23"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="product_card__head_tips">
                                        <span>Хит</span>
                                        <span class="recommend">Советуем</span>
                                    </div>
                                </div>

                                <div class="cart_block_product_list__action_buttons">
                                    <button>
                                        Удалить
                                        <!-- public\temple\images\cart\icons\trash.svg -->
                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6663 3.125C12.0115 3.125 12.2913 2.84518 12.2913 2.5C12.2913 2.15482 12.0115 1.875 11.6663 1.875H8.33301C7.98783 1.875 7.70801 2.15482 7.70801 2.5C7.70801 2.84518 7.98783 3.125 8.33301 3.125L11.6663 3.125Z">
                                            </path>
                                            <path
                                                d="M17.2913 5C17.2913 5.34518 17.0115 5.625 16.6663 5.625L3.33301 5.625C2.98783 5.625 2.70801 5.34518 2.70801 5C2.70801 4.65482 2.98783 4.375 3.33301 4.375L16.6663 4.375C17.0115 4.375 17.2913 4.65482 17.2913 5Z">
                                            </path>
                                            <path
                                                d="M4.99967 7.70833C5.34485 7.70833 5.62467 7.98816 5.62467 8.33333V15.8333C5.62467 16.4086 6.09104 16.875 6.66634 16.875H13.333C13.9083 16.875 14.3747 16.4086 14.3747 15.8333V8.33333C14.3747 7.98816 14.6545 7.70833 14.9997 7.70833C15.3449 7.70833 15.6247 7.98816 15.6247 8.33333V15.8333C15.6247 17.099 14.5987 18.125 13.333 18.125H6.66634C5.40069 18.125 4.37467 17.099 4.37467 15.8333V8.33333C4.37467 7.98816 4.6545 7.70833 4.99967 7.70833Z">
                                            </path>
                                            <path
                                                d="M8.33301 9.375C8.67819 9.375 8.95801 9.65482 8.95801 10V14.1667C8.95801 14.5118 8.67819 14.7917 8.33301 14.7917C7.98783 14.7917 7.70801 14.5118 7.70801 14.1667V10C7.70801 9.65482 7.98783 9.375 8.33301 9.375Z">
                                            </path>
                                            <path
                                                d="M12.2913 10C12.2913 9.65482 12.0115 9.375 11.6663 9.375C11.3212 9.375 11.0413 9.65482 11.0413 10V14.1667C11.0413 14.5118 11.3212 14.7917 11.6663 14.7917C12.0115 14.7917 12.2913 14.5118 12.2913 14.1667V10Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="cart_block_product_list__line">
                                <div class="cart_block_product_list__miniature">
                                    <a href="#" target="_blank">
                                        <img src="/assets/product/miniature/test.png" alt="">
                                    </a>
                                </div>

                                <div class="cart_block_product_list__info">
                                    <p>код: 37007694</p>
                                    <a href="#" target="_blank" class="standart_a">Выключатель 3-клавишный SchE
                                        AtlasDesign аквамарин
                                        механизм</a>

                                    <div class="cart_block_product_list__info_tags">
                                        <div>
                                            Не упусти выгоду
                                        </div>
                                    </div>

                                    <div class="cart_block_product_list__info_avails">
                                        <p class="green">Полное наличие</p>
                                    </div>

                                </div>

                                <div class="cart_block_product_list__action">
                                    <div class="input_count">
                                        <button class="input_count__btn input_count_reduce">
                                            -
                                        </button>
                                        <input type="text" val="1" placeholder="1" class="input_count__input">
                                        <button class="input_count__btn revers input_count_add">
                                            +
                                        </button>
                                    </div>

                                    <div class="cart_block_product_list__price">
                                        <div>
                                            <span class="price_old">390,16 руб.</span>
                                            <span class="price_current">390,16 руб.</span>
                                        </div>
                                        <p class="price_benefit">Выгода -<span>43,35 руб.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart_block_product_list__item">

                            <div class="cart_block_product_list__line_head">
                                <div class="cart_block_product_list__line_head_left">
                                    <button class="product_card__favorite">
                                        <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
                                        <svg width="20" height="23" viewBox="0 0 20 23"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="product_card__head_tips">
                                        <span>Хит</span>
                                        <span class="recommend">Советуем</span>
                                    </div>
                                </div>

                                <div class="cart_block_product_list__action_buttons">
                                    <button>
                                        Удалить
                                        <!-- public\temple\images\cart\icons\trash.svg -->
                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6663 3.125C12.0115 3.125 12.2913 2.84518 12.2913 2.5C12.2913 2.15482 12.0115 1.875 11.6663 1.875H8.33301C7.98783 1.875 7.70801 2.15482 7.70801 2.5C7.70801 2.84518 7.98783 3.125 8.33301 3.125L11.6663 3.125Z">
                                            </path>
                                            <path
                                                d="M17.2913 5C17.2913 5.34518 17.0115 5.625 16.6663 5.625L3.33301 5.625C2.98783 5.625 2.70801 5.34518 2.70801 5C2.70801 4.65482 2.98783 4.375 3.33301 4.375L16.6663 4.375C17.0115 4.375 17.2913 4.65482 17.2913 5Z">
                                            </path>
                                            <path
                                                d="M4.99967 7.70833C5.34485 7.70833 5.62467 7.98816 5.62467 8.33333V15.8333C5.62467 16.4086 6.09104 16.875 6.66634 16.875H13.333C13.9083 16.875 14.3747 16.4086 14.3747 15.8333V8.33333C14.3747 7.98816 14.6545 7.70833 14.9997 7.70833C15.3449 7.70833 15.6247 7.98816 15.6247 8.33333V15.8333C15.6247 17.099 14.5987 18.125 13.333 18.125H6.66634C5.40069 18.125 4.37467 17.099 4.37467 15.8333V8.33333C4.37467 7.98816 4.6545 7.70833 4.99967 7.70833Z">
                                            </path>
                                            <path
                                                d="M8.33301 9.375C8.67819 9.375 8.95801 9.65482 8.95801 10V14.1667C8.95801 14.5118 8.67819 14.7917 8.33301 14.7917C7.98783 14.7917 7.70801 14.5118 7.70801 14.1667V10C7.70801 9.65482 7.98783 9.375 8.33301 9.375Z">
                                            </path>
                                            <path
                                                d="M12.2913 10C12.2913 9.65482 12.0115 9.375 11.6663 9.375C11.3212 9.375 11.0413 9.65482 11.0413 10V14.1667C11.0413 14.5118 11.3212 14.7917 11.6663 14.7917C12.0115 14.7917 12.2913 14.5118 12.2913 14.1667V10Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="cart_block_product_list__line">
                                <div class="cart_block_product_list__miniature">
                                    <a href="#" target="_blank">
                                        <img src="/assets/product/miniature/test.png" alt="">
                                    </a>
                                </div>

                                <div class="cart_block_product_list__info">
                                    <p>код: 37007694</p>
                                    <a href="#" target="_blank" class="standart_a">Выключатель 3-клавишный SchE
                                        AtlasDesign аквамарин
                                        механизм</a>

                                    <div class="cart_block_product_list__info_tags">
                                        <div>
                                            Не упусти выгоду
                                        </div>
                                    </div>

                                    <div class="cart_block_product_list__info_avails">
                                        <p class="green">Полное наличие</p>
                                    </div>

                                </div>

                                <div class="cart_block_product_list__action">
                                    <div class="input_count">
                                        <button class="input_count__btn input_count_reduce">
                                            -
                                        </button>
                                        <input type="text" val="1" placeholder="1" class="input_count__input">
                                        <button class="input_count__btn revers input_count_add">
                                            +
                                        </button>
                                    </div>

                                    <div class="cart_block_product_list__price">
                                        <div>
                                            <span class="price_old">390,16 руб.</span>
                                            <span class="price_current">390,16 руб.</span>
                                        </div>
                                        <p class="price_benefit">Выгода -<span>43,35 руб.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cart_block_product_list__result">
                        <p>Итог: <span>763,45 руб.</span></p>
                    </div>

                </div>

                <div class="cart_block_recipient__wrapper cart__item_wrapper">
                    <h3>Укажите данные поулчателя заказа</h3>
                    <div class="cart_block_recipient">
                        <div>
                            <select class="select2_custom">
                                <option value="individual" selected>Физическое лицо</option>
                                <option value="legal">Юредическое лицо</option>
                                <option value="2">ООО Москва</option>
                                <option value="3">ИП Санкт-Петербург</option>
                            </select>
                        </div>

                        <div>

                        </div>

                        <div class="modal__input_wrapper">
                            <div>
                                <label for="cart_phone">Номер телефона</label>
                            </div>
                            <input type="text" id="cart_phone" class="modal__input" name="p"
                                placeholder="Введите номер телефона">
                        </div>

                        <div class="modal__input_wrapper">
                            <div>
                                <label for="cart_name">Имя и фамилия</label>
                            </div>
                            <input type="text" id="cart_name" class="modal__input" name="p"
                                placeholder="Введите имя и фамилия">
                        </div>
                    </div>

                </div>

                <div class="cart__item_wrapper">
                    <div class="cart_block_shipping_method__title">
                        <h3>Где и как вы хотите получить заказ?</h3>
                        <p>Ваш город: <span class="standart_a">Челябинск</span></p>
                    </div>

                    <div class="cart_block_shipping_method">
                        <div class="cart_block_shipping_method__info">
                            <div class="modal__input_wrapper">
                                <h4>Способ получения</h4>
                                <select class="select2_custom" id="cart_shipping_method">
                                    <option value="" selected>Самовывоз</option>
                                    <option value="">Курьером</option>
                                    <option value="">Транспортной компанией</option>
                                </select>
                            </div>

                            <div class="modal__input_wrapper" id="shipping_method_info">
                                <h4>Выбранный пункт самовывоза</h4>
                                <p>Город, улица,дом , строение</p>
                                <span>пн. - вс. : с 10:00 до 20:00</span>
                                <button class="btn">Изменить адресс</button>
                            </div>
                        </div>
                        <div class="cart_block_shipping_method__map"></div>
                    </div>
                </div>

                <div class="cart_block_payment_list__wrapper cart__item_wrapper">
                    <h3>Выберите способ оплаты</h3>
                    <div class="cart_block_payment_list">
                        <div class="cart_block_payment_list__item activ">
                            <input type="checkbox" value="1" checked id="payment_id_5">
                            <label for="payment_id_5" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                    <p>Краткое описание</p>
                                </div>
                                <div class="cart_block_payment_list__item_photo">
                                    <img src="/temple/images/cart/payments/card.png" alt="">
                                </div>
                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_4">
                            <label for="payment_id_4" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                    <p>Краткое описание</p>
                                </div>
                                <div class="cart_block_payment_list__item_photo">
                                    <img src="/temple/images/cart/payments/sbp.png" alt="">
                                </div>
                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_3">
                            <label for="payment_id_3" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                </div>

                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_3">
                            <label for="payment_id_3" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                </div>

                            </label>
                        </div>

                        <div class="cart_block_payment_list__item">
                            <input type="checkbox" value="1" id="payment_id_3">
                            <label for="payment_id_3" class="cart_block_payment_list__item_content">
                                <div>
                                    <h6>Наличными при получении</h6>
                                </div>

                            </label>
                        </div>
                    </div>
                </div>

            </section>

            <div id="sticky_aside1">
                <section class="cart__item_wrapper cart_info">
                    <div class="cart_info__item">
                        <div>
                            <p>Покупатель</p>
                            <span>Указать</span>
                        </div>
                        <p></p>
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <p>Самовывоз</p>
                            <span>Изменить</span>
                        </div>
                        <p>ул. Газизуллина, д. 2А</p>
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <p>Способ оплаты</p>
                            <span>Изменить</span>
                        </div>
                        <p>Наличными при получении</p>
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <label for="cart_promocode">Промокод</label>
                        </div>
                        <input type="text" id="cart_promocode" class="cart_input" name="p" maxlength="20"
                            placeholder="Введите промокод">
                    </div>

                    <div class="cart_info__item">
                        <div>
                            <label for="cart_comment">Комментарий</label>
                        </div>
                        <textarea name="p2" id="cart_comment" class="cart_input" placeholder="Введите комментарий"></textarea>
                    </div>

                    <hr>

                    <div class="cart_info__result">
                        <p>166 товаров • 149.80 кг</p>
                        <p class="cart_info__result_price">570 309,16 ₽</p>
                    </div>

                    <div class="cart_info__result">
                        <p>Доставка</p>
                        <p class="cart_info__result_price green">Бесплатная</p>
                    </div>


                    <div class="cart_info__result_total">
                        <p>Итог</p>
                        <p>
                            <span>433,51 руб.</span>
                            599 390,16 руб.
                        </p>
                    </div>


                    <button class="btn">Оформить заказ</button>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>

    @include('sample.main.components.wishlist_action')
    @vite('resources/js/cart/index.js')
@endsection
