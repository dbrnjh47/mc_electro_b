<div class="product_menu_block__reviews_item">
    <div class="product_menu_block__reviews_user">
        <div class="product_menu_block__reviews_user_name">
            {{$review->user->name}}
            <div class="product_menu_block__reviews_user_stars">
                @for($i = 0; $i < 5; $i++)
                    <svg @if($review->quantity > $i) class="red" @endif viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                        </path>
                    </svg>
                @endfor
            </div>
        </div>
        <div class="product_menu_block__reviews_user_date">
            {{$review->created_at->format('d.m.Y')}}
        </div>
    </div>
    <div class="product_menu_block__reviews_menu">
        @foreach ($review->descriptions as $description)
            <button @if($loop->first) class="activ" @endif data-type="{{$description->type}}">{{ ($description->type == "comment" ? "Коментарий" : ($description->type == "dignity" ? "Достоинства" : "Недостатки")) }}</button>
        @endforeach
    </div>
    @if(!$review->medias->isEmpty())
    <div>
        <div class="swiper product_menu_block__reviews_slider">
            <div class="swiper-wrapper">
                @foreach ($review->medias as $media)
                    <div class="swiper-slide">
                        <div class="product_menu_block__reviews_slider_miniature @if($media->is_video()) is_video @endif" data-path="{{$media->path}}">
                            <img src="{{$media->miniature}}" alt="{{$product_name}}" />
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    @endif
    @foreach ($review->descriptions as $description)
    <div class="product_menu_block__reviews_text @if($loop->first) activ @endif" data-type="{{$description->type}}">
        {{$description->text}}
    </div>
    @endforeach
</div>
