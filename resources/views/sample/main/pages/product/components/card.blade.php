@php
    $href = route('product', ['slug' => $product->slug]);
    if($path_id)
    {
        $href .= "?path_id={$path_id}";
    }
@endphp
<div class="product_card">
    <div class="product_card__buttons">

        <a href="{{$href}}" alt="{{$product->name}}" class="btn">Подробнее</a>
        <button class="btn btn_upend cart_action" data-product-id="{{$product->id}}" data-active="{{($product->cart_products_count ? 1 : 0)}}">
            @if($product->cart_products_count) Удалить из корзины @else Добавить в корзину @endif
        </button>

    </div>

    <button class="product_card__favorite">
        <!-- <img src="/temple/images/component/product/favorite.svg" alt="icon"> -->
        <svg class="wishlist_action" width="20" height="23" viewBox="0 0 20 23" xmlns="http://www.w3.org/2000/svg" data-product-id="{{$product->id}}" data-active="{{($product->wishlist_products_count ? 1 : 0)}}">
            <path
                d="M0 1.63434C0 0.731719 0.765325 0 1.7094 0H18.2906C19.2347 0 20 0.731719 20 1.63434V22.3998C20 22.8703 19.4589 23.1572 19.0414 22.9082L10.3318 17.7126C10.1287 17.5915 9.87127 17.5915 9.66822 17.7126L0.958564 22.9082C0.541081 23.1572 0 22.8703 0 22.3998V1.63434Z" />
        </svg>
    </button>

    <div class="product_card__head">
        @if(!$product->labels->isEmpty())
        <div class="product_card__head_tips">
            @foreach ($product->labels as $label)
                <span class="product_tip product_tip_{{$label->key}}">{{$label->title}}</span>
            @endforeach
        </div>
        @endif
        <h4 class="product_card__head_name">{{$product->name}}</h4>
        <p class="product_card__head_description">{{$product->uuid}}</p>
    </div>

    <div class="product_card__img">
        <img src="{{$product->getPreview()}}" alt="{{$product->name}}" loading="lazy" decoding="async">
    </div>

    <div class="product_card__info">
        <div class="product_card__info_price">
            <span>Цена</span>
            <p>{{ \App\Models\Product\Product::getPriceText($product->getLowestPrice()) }} ₽</p>
        </div>
        @if($product->city_point_count)
        <div class="product_card__info_price">
            <span>Кол-во (шт.)</span>
            <p>{{ $product->city_point_count }}</p>
        </div>
        @endif
        @if($product->point_count)
        <div class="product_card__info_price">
            <span>Кол-во на удалённом складе (шт.)</span>
            <p>{{ $product->point_count }}</p>
        </div>
        @endif
    </div>
</div>
