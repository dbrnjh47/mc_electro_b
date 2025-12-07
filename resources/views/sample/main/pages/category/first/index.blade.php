@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <section class="dop_menu_mob dop_menu_mob__container">
        <div class="dop_menu_mob__button">
            <img src="{{ Vite::asset('resources/js/custom/dop_menu/mob/img/filter.svg') }}" alt="filter"> Фильтры
        </div>
        <div class="dop_menu_mob__sort">
            <div id="select2_sort_mob" class="select2_sample_nude select2_sample_nude_white">
                <select class="select2_custom" name="product_sort" data-minimum-results-for-search="5"
                    data-dropdown-parent="#select2_sort_mob">
                    {{-- <option value="">По наличию</option> --}}
                    <option value="name_asc">По названию</option>
                    <option value="create_desc" selected="">Сначала новые</option>
                    <option value="create_asc">Сначала старые</option>
                    <option value="price_desc">По убыванию цены</option>
                    <option value="price_asc">По возрастанию цены</option>
                </select>
            </div>
        </div>
    </section>

    <x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>

    <section class="categories">
        <div class="categories__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">{{$category->name}} <span>(19)</span></h2>
                    @if($category->description)
                        <p class="app__title_description">{{$category->description}}</p>
                    @endif
                </div>
            </div>

            @if($category->childrens)
            @php
                $path_slugs = route("category", ["slugs" => implode('/', $path_slugs)]);
            @endphp
            <div class="categories__lists">
                @foreach ($category->childrens as $category_children)
                    @php
                        $category_children->full_path = $path_slugs."/".$category_children->path;
                    @endphp
                    @if(!$category_children->childrens) <a href="{{$category_children->full_path}}" @else <div @endif class="categories__item @if($category_children->childrens && count($category_children->childrens) <= 3) activ @endif ">
                    @if($category_children->childrens)
                    <div class="categories__hover">
                        <div class="categories__hover_items">
                            <a href="{{$category_children->full_path}}" class="categories__hover_item">
                                <h4 class="categories__hover_item_title bold">{{$category_children->name}}</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            @foreach ($category_children->childrens as $c)
                            <a href="{{$path_slugs."/".$c->path}}" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">{{$c->name}}</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                            @endforeach
                        </div>

                        @if((count($category_children->childrens) - 3) > 0)
                        <button class="categories__hover_item_btn">Еще {{count($category_children->childrens) - 3}}</button>
                        @endif
                    </div>
                    @endif

                    <div class="categories__item_title">{{$category_children->name}}</div>
                    @if($category_children->description)
                        <div class="categories__item_description">{{$category_children->description}}</div>
                    @endif

                    @if ($category_children->preview)
                        <img class="categories__item_bg" src="{{$category_children->preview_path}}" loading="lazy"
                            decoding="async" alt="{{$category_children->name}}">
                    @endif
                @if(!$category_children->childrens) </a> @else </div> @endif
                @endforeach

                <div class="categories__item categories__item_last">
                    <h3>Оставить заявку на подбор техники</h3>
                    <button>Заявка</button>
                </div>

            </div>

            @if(count($category->childrens) > 5)
            <div class="categories__btn">
                <button class="btn">Показать еще</button>
            </div>
            @endif

            @endif
        </div>
    </section>

    <section class="category__container">
        <div class="category">
            <div class="dop_menu__bg dop_menu__close"></div>
            <div id="sticky_aside1" class="filter__wrapper dop_menu">
                <div class="filter">
                    <div class="filter__title">
                        <h4>Фильтры</h4>
                        <svg class="close dop_menu__close" width="15" height="15" viewBox="0 0 15 15"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.23334 1.22848C0.935229 1.52543 0.660942 1.80387 0.447115 2.02273C0.196487 2.27925 0.197379 2.68721 0.448081 2.94366C0.878267 3.38371 1.57724 4.09588 2.36252 4.88484C3.66192 6.19031 4.77307 7.31102 4.83181 7.37521L4.9386 7.49199L2.48019 9.95126C1.64812 10.7836 0.904998 11.5351 0.456446 11.9901C0.206495 12.2436 0.201478 12.6477 0.447797 12.9048C0.666371 13.1329 0.950745 13.4259 1.26283 13.7378L2.05439 14.5289C2.31476 14.7891 2.73675 14.789 2.99705 14.5288L4.98563 12.5403C6.33851 11.1875 7.4632 10.0748 7.48484 10.0676C7.50653 10.0603 8.62656 11.1535 9.97378 12.4968C10.805 13.3257 11.5572 14.0649 12.0115 14.5096C12.2636 14.7565 12.6636 14.7623 12.9199 14.5198C13.2119 14.2436 13.5962 13.8727 13.9291 13.5275L14.531 12.9225C14.7902 12.662 14.7897 12.2408 14.5298 11.9809L10.0392 7.49029L10.3869 7.1385C10.5782 6.945 11.6656 5.85168 12.8033 4.70889C13.588 3.92065 14.3036 3.19484 14.6721 2.82033C14.8346 2.65516 14.8639 2.43104 14.7149 2.25356C14.555 2.06304 14.2785 1.75876 13.8011 1.27947C13.4716 0.948739 13.1518 0.636915 12.9149 0.40829C12.6889 0.190242 12.3507 0.175477 12.1179 0.386248C11.7608 0.709631 11.1159 1.31822 9.98715 2.44508C8.6354 3.79452 7.51995 4.90749 7.50836 4.91828C7.49673 4.92913 6.37544 3.82696 5.01655 2.46898C4.17751 1.63053 3.41756 0.886203 2.95891 0.439417C2.70522 0.192296 2.30362 0.188955 2.04778 0.433843C1.82357 0.648455 1.53684 0.926174 1.23334 1.22848Z">
                            </path>
                        </svg>
                    </div>

                    <input type="text" name="search" placeholder="Поиск" class="input">

                    <div class="filter__item open">
                        <div class="filter__header">
                            <p>Цена</p>
                            <img src="/temple/images/category/str.svg" alt="str">
                        </div>
                        <button class="filter__clear">Очистить</button>
                        <div class="filter__body ion_rangeslider__body">
                            <div class="filter__range_inputs">
                                <input type="number" name="min" placeholder="0000" class="input">
                                <span>–</span>
                                <input type="number" name="max" placeholder="0000" class="input">
                            </div>
                            <div class="filter__range">
                                <input class="ion_rangeslider" type="text" />
                            </div>
                        </div>
                    </div>

                    <div class="filter__item">
                        <div class="filter__header">
                            <p>Наличие товара</p>
                            <img src="/temple/images/category/str.svg" alt="str">
                        </div>
                        <button class="filter__clear">Очистить</button>

                        <div class="filter__body">
                            <div class="filter__checkbox">
                                <div class="checkbox">
                                    <input name="agreement" id="filter_name_1" type="checkbox">
                                    <label for="filter_name_1">
                                        Товары по акции<sup>22222</sup>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input name="agreement" id="filter_name_2" type="checkbox">
                                    <label for="filter_name_2">
                                        Товары по акции<sup>22222</sup>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input name="agreement" id="filter_name_3" type="checkbox">
                                    <label for="filter_name_3">
                                        Товары по акции<sup>22222</sup>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filter__item">
                        <div class="filter__header">
                            <p>Товары со скидкой</p>
                            <img src="/temple/images/category/str.svg" alt="str">
                        </div>
                        <button class="filter__clear">Очистить</button>

                        <div class="filter__body">
                            <div class="filter__radio">
                                <div class="radio">
                                    <input name="agreement" id="filter_name2_1" name="name_filter" type="radio">
                                    <label for="filter_name2_1">
                                        Любой
                                    </label>
                                </div>
                                <div class="radio">
                                    <input name="agreement" id="filter_name2_2" name="name_filter" type="radio">
                                    <label for="filter_name2_2">
                                        5% и больше
                                    </label>
                                </div>
                                <div class="radio">
                                    <input name="agreement" id="filter_name2_3" name="name_filter" type="radio">
                                    <label for="filter_name2_3">
                                        15% и больше
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filter__item">
                        <div class="filter__header">
                            <p>Список</p>
                            <img src="/temple/images/category/str.svg" alt="str">
                        </div>
                        <button class="filter__clear">Очистить</button>

                        <div class="filter__body select2_more select2_sample_more">
                            <select class="select2_custom" name="lang" data-minimum-results-for-search="5"
                                data-dropdown-css-class="select2-filter">
                                <option value="" selected=""></option>
                                <option value="1">Руский</option>
                                <option value="2">Китайский</option>
                                <option value="3">Английский</option>

                            </select>
                            <div class="select2_more__list">

                            </div>
                        </div>
                    </div>

                    <div class="filter__item">
                        <div class="filter__header">
                            <p>Обычный силект</p>
                            <img src="/temple/images/category/str.svg" alt="str">
                        </div>
                        <button class="filter__clear">Очистить</button>

                        <div class="filter__body select2_sample_more">
                            <select class="select2_custom" name="lang" data-minimum-results-for-search="5"
                                data-dropdown-css-class="select2-filter">
                                <option value="" selected=""></option>
                                <option value="1">Руский</option>
                                <option value="2">Китайский</option>
                                <option value="3">Английский</option>

                            </select>
                        </div>
                    </div>

                    <div class="filter__actions">
                        <button class="btn">Искать</button>
                        <button class="btn filter__actions_btn_clear">Очистить фильтры</button>
                    </div>
                </div>
            </div>

            <div class="products__wrapper" id="sticky_article">
                <div class="products__header">
                    <div class="products__tips">
                        <div>Любая скидка</div>
                        <div>Любая скидка</div>
                        <div>Любая скидка</div>
                        <div>Любая скидка</div>
                        <div>Любая скидка</div>
                        <div>Любая скидка</div>
                        <div>Любая скидка</div>
                    </div>
                    <div id="select2_sort" class="select2_sample_nude">
                        <select class="select2_custom" name="product_sort" data-minimum-results-for-search="5"
                            data-dropdown-parent="#select2_sort">
                            {{-- <option value="">По наличию</option> --}}
                            <option value="name_asc">По названию</option>
                            <option value="create_desc" selected="">Сначала новые</option>
                            <option value="create_asc">Сначала старые</option>
                            <option value="price_desc">По убыванию цены</option>
                            <option value="price_asc">По возрастанию цены</option>
                        </select>
                    </div>
                </div>
                <section class="products_list">
                    @for($i = 0; $i < 11; $i++)
                    <div class="product_card skeleton">

                    </div>
                    @endfor

                    <x-sample.main.product.feedback-card></x-sample.main.product.feedback-card>
                </section>
                <section class="pagination skeleton">

                </section>
            </div>
        </div>

    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>

    @php
        $category_ids = $category->children_ids;
        $category_ids[] = $category->id;
    @endphp

    <script>
        window.routes["product.filter"] = "{{ route('product.filter') }}";

        let category_ids = @json($category_ids);
        let category_slug = "{{ $category->slug }}";
    </script>

    @include("sample.main.components.wishlist_action")
    @vite('resources/js/category/index.js')

@endsection
