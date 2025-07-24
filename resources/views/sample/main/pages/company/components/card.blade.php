@php
    $url_company = route("company", ["slug" => $company->slug]);
@endphp
<div class="company_card">
    <div class="company_card__content">
        <a class="company_card__miniature" href="{{$url_company}}" target="_blank">
            <img src="{{$company->path_preview}}" alt="{{$company->name}}">
            <span class="company_card__miniature_cover"
                style="background-image: url('{{$company->path_preview}}');"></span>
        </a>
        <div class="company_card__info">
            <a class="company_card__name" href="{{$url_company}}" target="_blank">
                {{$company->name}}
            </a>
            <p>
                <span>
                    <svg class="red" width="18" height="17" viewBox="0 0 18 17"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z">
                        </path>
                    </svg>
                    4.6
                </span>
                <span>
                    <svg width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z">
                        </path>
                    </svg> 300 отзывов</span>
            </p>
            <p>
                Кол-во товаров: <span>{{$company->products_count}}</span>
            </p>
        </div>
    </div>
    @if($company->locale && $company->locale->short)
    <div class="company_card__description">
        {{$company->locale->short}}
    </div>
    @endif
    <a href="{{$url_company}}" target="_blank" class="btn">
        Показать товары компании
    </a>
</div>
