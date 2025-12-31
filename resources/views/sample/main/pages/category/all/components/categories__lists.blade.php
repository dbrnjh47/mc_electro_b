<div class="categories__lists">

    @foreach ($categories as $category)
        @php
            $path_slugs = [$category->slug];
            $path = route('category', ['slugs' => implode('/', $path_slugs)]);
        @endphp
        @if($category->child_categories->isEmpty()) <a href="{{$path}}" @else <div @endif class="categories__item">
            @if (!$category->child_categories->isEmpty())
                <div class="categories__hover">
                    <div class="categories__hover_items">
                        <a href="{{$path}}" class="categories__hover_item">
                            <h4 class="categories__hover_item_title bold">{{ $category->name }}</h4>
                            <div class="categories__hover_item_line"></div>
                            <p class="categories__hover_item_count">{{ (isset($category->products_count) && $category->products_count ? $category->products_count : "") }}</p>
                        </a>

                        @foreach ($category->child_categories as $c)
                            <a href="{{$path}}/{{$c->slug}}" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">{{ $c->name }}</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">{{ (isset($c->products_count) && $c->products_count ? $c->products_count : "") }}</p>
                            </a>
                        @endforeach
                    </div>


                    @if ($category->child_categories->count() - 3 > 0)
                        <button class="categories__hover_item_btn">Еще
                            {{ $category->child_categories->count() - 3 }}</button>
                    @endif
                </div>
            @endif


            <div class="categories__item_description">
                <div class="categories__item_title">{{ $category->name }}</div>
                {{ $category->description }}
            </div>

            @if ($category->preview)
                <img class="categories__item_bg" src="{{$category->preview_path}}" loading="lazy"
                    decoding="async" alt="{{ $category->name }}">
            @endif

        @if($category->child_categories->isEmpty()) </a> @else </div> @endif
    @endforeach


    <div class="categories__item categories__item_last">
        <h3>Оставить заявку на подбор</h3>
        <button>Заявка</button>
    </div>
</div>
