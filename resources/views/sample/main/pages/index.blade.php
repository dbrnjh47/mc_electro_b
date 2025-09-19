@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')

@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')

@if(!empty($banners))
<section class="banners">
    <div class="banners__container">
        <div class="banner-block">

            <div class="swiper" id="main_banners">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <a @if($banner->href) href="{{$banner->href}}" @endif>
                                <img src="{{$banner->img_path}}" alt="{{$banner->img}}" loading="lazy"
                                decoding="async" />
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="categories categories_one_line">
    <div class="categories__container">

        <!-- <img class="categories__bg" src="/temple/images/landing/bg/1.svg" alt="news bg"> -->
        <div class="categories__bg">
            <!-- public\temple\images\landing\bg\bg.svg -->
            <svg class="bg_flicker" width="711" height="427" viewBox="0 0 711 427" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0 427H0.5L0.5 426.5H71V427H71.5V426.5H142V427H142.5V426.5H213V427H213.5V426.5H284V427H284.5V426.5H355V427H355.5V426.5H426V427H426.5V426.5H497V427H497.5V426.5H568V427H568.5V426.5H639V427H639.5V426.5H710V427H710.5V0H1.86648e-05L0 427ZM710 426V355.5H639.5V426H710ZM639 426V355.5H568.5V426H639ZM568 426V355.5H497.5L497.5 426H568ZM497 426L497 355.5H426.5L426.5 426H497ZM426 426L426 355.5H355.5L355.5 426H426ZM355 426L355 355.5H284.5L284.5 426H355ZM284 426L284 355.5H213.5L213.5 426H284ZM213 426L213 355.5H142.5L142.5 426H213ZM142 426L142 355.5H71.5L71.5 426H142ZM71 426L71 355.5H0.500003L0.5 426H71ZM71 355H0.500003L0.500006 284.5H71V355ZM142 355H71.5V284.5H142V355ZM213 355H142.5V284.5H213V355ZM284 355H213.5V284.5H284V355ZM355 355H284.5V284.5H355V355ZM426 355H355.5V284.5H426V355ZM497 355H426.5V284.5H497V355ZM568 355H497.5V284.5H568V355ZM639 355H568.5V284.5H639V355ZM710 355H639.5V284.5H710V355ZM710 284V213.5H639.5V284H710ZM639 284V213.5H568.5V284H639ZM568 284V213.5H497.5V284H568ZM497 284V213.5H426.5V284H497ZM426 284V213.5H355.5V284H426ZM355 284V213.5H284.5V284H355ZM284 284V213.5H213.5V284H284ZM213 284V213.5H142.5V284H213ZM142 284V213.5H71.5L71.5 284H142ZM71 284L71 213.5H0.500009L0.500006 284H71ZM71 213H0.500009L0.500012 142.5H71V213ZM142 213H71.5V142.5H142V213ZM213 213H142.5V142.5H213V213ZM284 213H213.5V142.5H284V213ZM355 213H284.5V142.5H355V213ZM426 213H355.5V142.5H426V213ZM497 213H426.5V142.5H497V213ZM568 213H497.5V142.5H568V213ZM639 213H568.5V142.5H639V213ZM710 213H639.5V142.5H710V213ZM710 142V71.5H639.5V142H710ZM639 142V71.5H568.5V142H639ZM568 142V71.5H497.5V142H568ZM497 142V71.5H426.5V142H497ZM426 142V71.5H355.5V142H426ZM355 142V71.5H284.5V142H355ZM284 142V71.5H213.5V142H284ZM213 142V71.5H142.5V142H213ZM142 142V71.5H71.5V142H142ZM71 142V71.5H0.500016L0.500012 142H71ZM71 71H0.500016L0.500019 0.5H71V71ZM142 71H71.5V0.5H142V71ZM213 71H142.5V0.5H213V71ZM284 71H213.5V0.5H284V71ZM355 71H284.5V0.5H355V71ZM426 71H355.5V0.5H426V71ZM497 71H426.5V0.5H497V71ZM568 71H497.5V0.5H568V71ZM639 71H568.5V0.5H639V71ZM710 71H639.5V0.5H710V71Z"
                    fill="url(#paint0_radial_655_2)" />
                <rect x="71.2617" y="63.7344" width="10.667" height="10.667"
                    transform="rotate(45 71.2617 63.7344)" class="bg_flicker_element" fill="#DE002B" />
                <rect x="284.242" y="134.732" width="10.667" height="10.667"
                    transform="rotate(45 284.242 134.732)" class="bg_flicker_element" fill="#DE002B" />
                <rect x="568.266" y="205.711" width="10.667" height="10.667"
                    transform="rotate(45 568.266 205.711)" class="bg_flicker_element" fill="#DE002B" />
                <path d="M646.801 142.286L639.258 134.743L631.715 142.286L639.258 149.829L646.801 142.286Z"
                    class="bg_flicker_element2" fill="#DE002B" />
                <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                    d="M639.258 122.414L659.129 142.285L639.258 162.157L619.387 142.285L639.258 122.414ZM639.258 123.121L658.422 142.285L639.258 161.45L620.094 142.285L639.258 123.121Z"
                    fill="#DE002B" />
                <path d="M149.785 284.27L142.242 276.728L134.7 284.27L142.242 291.813L149.785 284.27Z"
                    class="bg_flicker_element2" fill="#DE002B" />
                <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                    d="M142.242 264.398L162.114 284.27L142.242 304.141L122.371 284.27L142.242 264.398ZM142.242 265.106L161.407 284.27L142.242 303.434L123.078 284.27L142.242 265.106Z"
                    fill="#DE002B" />
                <defs>
                    <radialGradient id="paint0_radial_655_2" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(355.25 213.5) rotate(90) scale(213.5 355.25)">
                        <stop stop-color="#DE002B" />
                        <stop offset="1" stop-color="#DE002B" stop-opacity="0" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
        <div class="app__title">
            <div class="app__title_wrapper">
                <h2 class="app__title_text">Наш каталог</h2>
                {{-- <p class="app__title_description">Мы собрали для вас лучшие категории, которые есть в нашем
                    магазине</p> --}}
            </div>
            <a href="{{route('categories')}}" class="app__title_button">Смотреть все</a>
        </div>

        @include('sample.main.pages.category.all.components.categories__lists')

    </div>
</section>

<section class="companies">
    <div class="companies__container">
        <!-- <img class="categories__bg" src="/temple/images/landing/bg/1.svg" alt="news bg"> -->
        <div class="companies__bg">
            <!-- public\temple\images\landing\bg\bg.svg -->
            <svg class="bg_flicker" width="711" height="427" viewBox="0 0 711 427" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0 427H0.5L0.5 426.5H71V427H71.5V426.5H142V427H142.5V426.5H213V427H213.5V426.5H284V427H284.5V426.5H355V427H355.5V426.5H426V427H426.5V426.5H497V427H497.5V426.5H568V427H568.5V426.5H639V427H639.5V426.5H710V427H710.5V0H1.86648e-05L0 427ZM710 426V355.5H639.5V426H710ZM639 426V355.5H568.5V426H639ZM568 426V355.5H497.5L497.5 426H568ZM497 426L497 355.5H426.5L426.5 426H497ZM426 426L426 355.5H355.5L355.5 426H426ZM355 426L355 355.5H284.5L284.5 426H355ZM284 426L284 355.5H213.5L213.5 426H284ZM213 426L213 355.5H142.5L142.5 426H213ZM142 426L142 355.5H71.5L71.5 426H142ZM71 426L71 355.5H0.500003L0.5 426H71ZM71 355H0.500003L0.500006 284.5H71V355ZM142 355H71.5V284.5H142V355ZM213 355H142.5V284.5H213V355ZM284 355H213.5V284.5H284V355ZM355 355H284.5V284.5H355V355ZM426 355H355.5V284.5H426V355ZM497 355H426.5V284.5H497V355ZM568 355H497.5V284.5H568V355ZM639 355H568.5V284.5H639V355ZM710 355H639.5V284.5H710V355ZM710 284V213.5H639.5V284H710ZM639 284V213.5H568.5V284H639ZM568 284V213.5H497.5V284H568ZM497 284V213.5H426.5V284H497ZM426 284V213.5H355.5V284H426ZM355 284V213.5H284.5V284H355ZM284 284V213.5H213.5V284H284ZM213 284V213.5H142.5V284H213ZM142 284V213.5H71.5L71.5 284H142ZM71 284L71 213.5H0.500009L0.500006 284H71ZM71 213H0.500009L0.500012 142.5H71V213ZM142 213H71.5V142.5H142V213ZM213 213H142.5V142.5H213V213ZM284 213H213.5V142.5H284V213ZM355 213H284.5V142.5H355V213ZM426 213H355.5V142.5H426V213ZM497 213H426.5V142.5H497V213ZM568 213H497.5V142.5H568V213ZM639 213H568.5V142.5H639V213ZM710 213H639.5V142.5H710V213ZM710 142V71.5H639.5V142H710ZM639 142V71.5H568.5V142H639ZM568 142V71.5H497.5V142H568ZM497 142V71.5H426.5V142H497ZM426 142V71.5H355.5V142H426ZM355 142V71.5H284.5V142H355ZM284 142V71.5H213.5V142H284ZM213 142V71.5H142.5V142H213ZM142 142V71.5H71.5V142H142ZM71 142V71.5H0.500016L0.500012 142H71ZM71 71H0.500016L0.500019 0.5H71V71ZM142 71H71.5V0.5H142V71ZM213 71H142.5V0.5H213V71ZM284 71H213.5V0.5H284V71ZM355 71H284.5V0.5H355V71ZM426 71H355.5V0.5H426V71ZM497 71H426.5V0.5H497V71ZM568 71H497.5V0.5H568V71ZM639 71H568.5V0.5H639V71ZM710 71H639.5V0.5H710V71Z"
                    fill="url(#paint0_radial_655_2)" />
                <rect x="71.2617" y="63.7344" width="10.667" height="10.667"
                    transform="rotate(45 71.2617 63.7344)" class="bg_flicker_element" fill="#DE002B" />
                <rect x="284.242" y="134.732" width="10.667" height="10.667"
                    transform="rotate(45 284.242 134.732)" class="bg_flicker_element" fill="#DE002B" />
                <rect x="568.266" y="205.711" width="10.667" height="10.667"
                    transform="rotate(45 568.266 205.711)" class="bg_flicker_element" fill="#DE002B" />
                <path d="M646.801 142.286L639.258 134.743L631.715 142.286L639.258 149.829L646.801 142.286Z"
                    class="bg_flicker_element2" fill="#DE002B" />
                <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                    d="M639.258 122.414L659.129 142.285L639.258 162.157L619.387 142.285L639.258 122.414ZM639.258 123.121L658.422 142.285L639.258 161.45L620.094 142.285L639.258 123.121Z"
                    fill="#DE002B" />
                <path d="M149.785 284.27L142.242 276.728L134.7 284.27L142.242 291.813L149.785 284.27Z"
                    class="bg_flicker_element2" fill="#DE002B" />
                <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                    d="M142.242 264.398L162.114 284.27L142.242 304.141L122.371 284.27L142.242 264.398ZM142.242 265.106L161.407 284.27L142.242 303.434L123.078 284.27L142.242 265.106Z"
                    fill="#DE002B" />
                <defs>
                    <radialGradient id="paint0_radial_655_2" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(355.25 213.5) rotate(90) scale(213.5 355.25)">
                        <stop stop-color="#DE002B" />
                        <stop offset="1" stop-color="#DE002B" stop-opacity="0" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
        <x-sample.main.company.slider></x-sample.main.company.slider>
    </div>

</section>

@if(!$products->isEmpty())
<section class="produtcs">
    <div class="produtcs__container">
        <div class="app__title">
            <div class="app__title_wrapper">
                <h2 class="app__title_text">Наши товары</h2>
                {{-- <div class="app__blocks">
                    <button class="btn activ">Распродажа</button>
                    <button class="btn">Хиты</button>
                    <button class="btn">Товары по акции</button>
                    <button class="btn">Новинки</button>
                </div> --}}
            </div>
            <div class="produtcs__actions">
                {{-- <div id="select2_sort" class="select2_sample_nude">
                    <select class="select2_custom" name="lang" data-dropdown-position="below"
                        data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort">
                        <option value="1" selected="">Сначала новые</option>
                        <option value="10">1</option>
                        <option value="2">Сначала старые</option>
                        <option value="3">Сначала дорогие</option>
                        <option value="3">Сначала дешевые</option>
                    </select>
                </div> --}}
                {{-- <button class="app__title_button">Смотреть все</button> --}}
            </div>

        </div>
        <div class="produtcs__lists">
            @foreach ($products as $product)
                <x-sample.main.product.card :product="$product"></x-sample.main.product.card>
            @endforeach
        </div>
    </div>
</section>
@endif
<section class="news">
    <div class="news__container">
        <div class="news__bg">
            <!-- public\temple\images\landing\bg\bg.svg -->
            <svg class="bg_flicker" width="711" height="427" viewBox="0 0 711 427"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0 427H0.5L0.5 426.5H71V427H71.5V426.5H142V427H142.5V426.5H213V427H213.5V426.5H284V427H284.5V426.5H355V427H355.5V426.5H426V427H426.5V426.5H497V427H497.5V426.5H568V427H568.5V426.5H639V427H639.5V426.5H710V427H710.5V0H1.86648e-05L0 427ZM710 426V355.5H639.5V426H710ZM639 426V355.5H568.5V426H639ZM568 426V355.5H497.5L497.5 426H568ZM497 426L497 355.5H426.5L426.5 426H497ZM426 426L426 355.5H355.5L355.5 426H426ZM355 426L355 355.5H284.5L284.5 426H355ZM284 426L284 355.5H213.5L213.5 426H284ZM213 426L213 355.5H142.5L142.5 426H213ZM142 426L142 355.5H71.5L71.5 426H142ZM71 426L71 355.5H0.500003L0.5 426H71ZM71 355H0.500003L0.500006 284.5H71V355ZM142 355H71.5V284.5H142V355ZM213 355H142.5V284.5H213V355ZM284 355H213.5V284.5H284V355ZM355 355H284.5V284.5H355V355ZM426 355H355.5V284.5H426V355ZM497 355H426.5V284.5H497V355ZM568 355H497.5V284.5H568V355ZM639 355H568.5V284.5H639V355ZM710 355H639.5V284.5H710V355ZM710 284V213.5H639.5V284H710ZM639 284V213.5H568.5V284H639ZM568 284V213.5H497.5V284H568ZM497 284V213.5H426.5V284H497ZM426 284V213.5H355.5V284H426ZM355 284V213.5H284.5V284H355ZM284 284V213.5H213.5V284H284ZM213 284V213.5H142.5V284H213ZM142 284V213.5H71.5L71.5 284H142ZM71 284L71 213.5H0.500009L0.500006 284H71ZM71 213H0.500009L0.500012 142.5H71V213ZM142 213H71.5V142.5H142V213ZM213 213H142.5V142.5H213V213ZM284 213H213.5V142.5H284V213ZM355 213H284.5V142.5H355V213ZM426 213H355.5V142.5H426V213ZM497 213H426.5V142.5H497V213ZM568 213H497.5V142.5H568V213ZM639 213H568.5V142.5H639V213ZM710 213H639.5V142.5H710V213ZM710 142V71.5H639.5V142H710ZM639 142V71.5H568.5V142H639ZM568 142V71.5H497.5V142H568ZM497 142V71.5H426.5V142H497ZM426 142V71.5H355.5V142H426ZM355 142V71.5H284.5V142H355ZM284 142V71.5H213.5V142H284ZM213 142V71.5H142.5V142H213ZM142 142V71.5H71.5V142H142ZM71 142V71.5H0.500016L0.500012 142H71ZM71 71H0.500016L0.500019 0.5H71V71ZM142 71H71.5V0.5H142V71ZM213 71H142.5V0.5H213V71ZM284 71H213.5V0.5H284V71ZM355 71H284.5V0.5H355V71ZM426 71H355.5V0.5H426V71ZM497 71H426.5V0.5H497V71ZM568 71H497.5V0.5H568V71ZM639 71H568.5V0.5H639V71ZM710 71H639.5V0.5H710V71Z"
                    fill="url(#paint0_radial_655_2)" />
                <rect x="71.2617" y="63.7344" width="10.667" height="10.667"
                    transform="rotate(45 71.2617 63.7344)" class="bg_flicker_element"
                    fill="#DE002B" />
                <rect x="284.242" y="134.732" width="10.667" height="10.667"
                    transform="rotate(45 284.242 134.732)" class="bg_flicker_element"
                    fill="#DE002B" />
                <rect x="568.266" y="205.711" width="10.667" height="10.667"
                    transform="rotate(45 568.266 205.711)" class="bg_flicker_element"
                    fill="#DE002B" />
                <path d="M646.801 142.286L639.258 134.743L631.715 142.286L639.258 149.829L646.801 142.286Z"
                    class="bg_flicker_element2" fill="#DE002B" />
                <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                    d="M639.258 122.414L659.129 142.285L639.258 162.157L619.387 142.285L639.258 122.414ZM639.258 123.121L658.422 142.285L639.258 161.45L620.094 142.285L639.258 123.121Z"
                    fill="#DE002B" />
                <path d="M149.785 284.27L142.242 276.728L134.7 284.27L142.242 291.813L149.785 284.27Z"
                    class="bg_flicker_element2" fill="#DE002B" />
                <path fill-rule="evenodd" clip-rule="evenodd" class="bg_flicker_element2"
                    d="M142.242 264.398L162.114 284.27L142.242 304.141L122.371 284.27L142.242 264.398ZM142.242 265.106L161.407 284.27L142.242 303.434L123.078 284.27L142.242 265.106Z"
                    fill="#DE002B" />
                <defs>
                    <radialGradient id="paint0_radial_655_2" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(355.25 213.5) rotate(90) scale(213.5 355.25)">
                        <stop stop-color="#DE002B" />
                        <stop offset="1" stop-color="#DE002B" stop-opacity="0" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
        <div class="app__title">
            <div class="app__title_wrapper">
                <h2 class="app__title_text">Новости</h2>
            </div>
            <button class="app__title_button">Все новости</button>
        </div>

        <div class="news__lists">
            <div class="news__item">
                <h3 class="news__item_title">
                    <p>23.10.2024</p>
                    <a href="#">Loresadasdasdasdasdasdm ipsum dolor amet, co
                        sddddddddddddddddddddddddddddddddddddddddd
                        nsectetur adipiscing elit</a>
                </h3>
                <div class="news__item_img">
                    <img src="/assets/news/preview/1.png" alt="News image" loading="lazy" decoding="async">
                </div>
            </div>

            <div class="news__item">
                <h3 class="news__item_title">
                    <p>23.10.2024</p>
                    <a href="#">Lorem </a>
                </h3>
                <div class="news__item_img">
                    <img src="/assets/news/preview/1.png" alt="News image" loading="lazy" decoding="async">
                </div>
            </div>

            <div class="news__item">
                <h3 class="news__item_title">
                    <p>23.10.2024</p>
                    <a href="#">Lorem ipsum dolor amet, consectetur adipiscing elit</a>
                </h3>
                <div class="news__item_img">
                    <img src="/assets/news/preview/1.png" alt="News image" loading="lazy" decoding="async">
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
    @vite('resources/js/landing/index.js')

    @include("sample.main.components.wishlist_action")

@endsection
