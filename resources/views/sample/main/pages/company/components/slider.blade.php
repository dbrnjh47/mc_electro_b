@if (!$companies->isEmpty())
    <div class="swiper" id="companies_slider">
        <div class="swiper-wrapper">
            @foreach ($companies as $company)
                <a href="{{ route('company', ['slug' => $company->slug]) }}" class="swiper-slide company__slide">
                    <img src="{{ $company->path_preview }}" alt="{{ $company->name }}" loading="lazy" decoding="async" />
                </a>
            @endforeach
        </div>
    </div>
@endif
