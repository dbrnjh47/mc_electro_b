<div class="categories__lists">

    @foreach ($categories as $category)
        @php
            $path_slugs = [$category->slug];
            $path = route('category', ['slugs' => implode('/', $path_slugs)]);
        @endphp
        @if($category->relation_childrens->isEmpty()) <a href="{{$path}}" @else <div @endif class="categories__item">
            @if (!$category->relation_childrens->isEmpty())
                <div class="categories__hover">
                    <div class="categories__hover_items">
                        <a href="{{$path}}" class="categories__hover_item">
                            <h4 class="categories__hover_item_title bold">{{ $category->locale->name }}</h4>
                            <div class="categories__hover_item_line"></div>
                            <p class="categories__hover_item_count">5</p>
                        </a>

                        @foreach ($category->relation_childrens as $c)
                            @php
                                $c = $c->category;
                            @endphp
                            <a href="{{$path}}/{{$c->slug}}" class="categories__hover_item">
                                <h4 class="categories__hover_item_title">{{ $c->locale->name }}</h4>
                                <div class="categories__hover_item_line"></div>
                                <p class="categories__hover_item_count">5</p>
                            </a>
                        @endforeach
                    </div>


                    @if (count($category->relation_childrens) - 3 > 0)
                        <button class="categories__hover_item_btn">Еще
                            {{ count($category->relation_childrens) - 3 }}</button>
                    @endif
                </div>
            @endif

            <div class="categories__item_title">{{ $category->locale->name }}</div>
            <div class="categories__item_description">{{ $category->locale->description }}</div>

            @if ($category->preview)
                <img class="categories__item_bg" src="{{$category->preview_path}}" loading="lazy"
                    decoding="async" alt="{{ $category->locale->name }}">
            @endif

        @if($category->relation_childrens->isEmpty()) </a> @else </div> @endif
    @endforeach


    <div class="categories__item categories__item_last">
        <h3>Оставить заявку на подбор</h3>
        <button>Заявка</button>
    </div>
</div>
