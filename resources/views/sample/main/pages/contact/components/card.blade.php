<div class="contacts__box">
    <div class="contact_card">
        <div class="swiper contact_card__swiper">
            <div class="swiper-wrapper">

                @if (!$point->photos->isEmpty())
                    @foreach ($point->photos as $photo)
                        <div class="swiper-slide contact_card__slide">
                            <img class="contact_card__swiper_image" src="{{ $photo->img_path }}"
                                loading="lazy" decoding="async" alt="{{ $point->address }}" />
                            <span class="contact_card__swiper_image_cover"
                                style="background-image: url('{{ $photo->img_path }}');"></span>
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide contact_card__slide">
                        <img class="contact_card__swiper_image contact_card__swiper_image_defult" src="{{ \App\Models\Point\PointPhoto::DEFULT_PREVIEW_PATH }}" loading="lazy"
                            decoding="async" alt="{{ $point->address }}" />
                    </div>
                @endif

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="contact_card__info">
            @if(!isset($is_card))
            <a href="{{ route("contact", ["id" => $point->id]) }}" class="contact_card__title">
                {{ $point->title }}
            </a>
            @endif
            <p class="contact_card__item">
                <span class="contact_card__item_bold">Адрес:</span>
                {{ $point->address }} <br />
                @if ($point->comment)
                    ({{ $point->comment }})
                @endif
            </p>

            @if ($point->email)
                <p class="contact_card__item">
                    <span class="contact_card__item_bold">Почта:</span>
                    <a class="contact_card__item_link"
                        href="mailto:{{ $point->email }}">{{ $point->email }}</a>
                </p>
            @endif

            @if($point->operating_mode)
            <p class="contact_card__item">
                <span class="contact_card__item_bold">Режим работы:</span>
                {{ $point->operating_mode }}
            </p>
            @endif

            @if (!$point->phones->isEmpty())
            <p class="contact_card__item">
                <span class="contact_card__item_bold"> Телефон:</span>
                @foreach ($point->phones as $phone)
                <a class="contact_card__item_link" href="tel:{{$phone->phone->number}}">{{$phone->phone->text}}</a>@if(!$loop->last), @endif
                @endforeach
            </p>
            @endif

            <div class="contact_card__buttons">
                @if (!$point->links->isEmpty())
                    @foreach ($point->links as $link)
                        <a target="_blank" href="{{$link->url}}" class="contact_card__button contact_card__button--{{$link->category->type}}">
                            {{$link->category->title}}
                        </a>
                    @endforeach
                @endif
            </div>
            @if(!isset($is_card))
                <a class="btn contact_card__red_button" href="{{ route("contact", ["id" => $point->id]) }}">Открыть</a>
            @endif
        </div>
    </div>
</div>
