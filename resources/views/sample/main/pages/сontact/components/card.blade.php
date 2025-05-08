<div class="contacts__box">
    <div class="contact_card">
        <div class="swiper contact_card__swiper">
            <div class="swiper-wrapper">

                @if (!$point->photos->isEmpty())
                    @foreach ($point->photos as $photo)
                        <div class="swiper-slide contact_card__slide">
                            <img class="contact_card__swiper_image" src="{{ $photo->img }}"
                                loading="lazy" decoding="async" alt="{{ $point->locale->address }}" />
                            <span class="contact_card__swiper_image_cover"
                                style="background-image: url('{{ $photo->img }}');"></span>
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide contact_card__slide">
                        <img class="contact_card__swiper_image contact_card__swiper_image_defult" src="{{ \App\Models\Point\Point::DEFULT_PREVIEW_PATH }}" loading="lazy"
                            decoding="async" alt="{{ $point->locale->address }}" />
                    </div>
                @endif

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="contact_card__info">
            @if(!isset($is_card))
            <h5 class="contact_card__title">
                {{ $point->locale->title }}
            </h5>
            @endif
            <p class="contact_card__item">
                <span class="contact_card__item_bold">Адрес:</span>
                {{ $point->locale->address }} <br />
                @if ($point->locale->comment)
                    ({{ $point->locale->comment }})
                @endif
            </p>

            @if ($point->email)
                <p class="contact_card__item">
                    <span class="contact_card__item_bold">Почта:</span>
                    <a class="contact_card__item_link"
                        href="mailto:{{ $point->email }}">{{ $point->email }}</a>
                </p>
            @endif

            <p class="contact_card__item">
                <span class="contact_card__item_bold">Режим работы склада:</span>
                пн-пт <br />
                9:00-18:00, сб-вс 9:00-17:00
            </p>

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
