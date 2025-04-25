<section class="breadcrumb">
    <div class="breadcrumb__container">
        <ul class="breadcrumb__lists" itemscope="" itemtype="https://schema.org/BreadcrumbList">
            @foreach ($breadcrumbs as $breadcrumb)
                <li @if(!$loop->last) class="breadcrumb__item" @endif itemprop="itemListElement"
                    itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item"
                        class="breadcrumb__link @if ($loop->first) start @elseif($loop->last) active @endif"
                        @if(!$loop->last) href="{{$breadcrumb["href"]}}" @endif>
                        <span itemprop="name">{{$breadcrumb["text"]}}</span>
                    </a>
                    <meta itemprop="position" content="{{ $loop->iteration }}">
                </li>

                @if (!$loop->last)
                    <li class="breadcrumb__item">
                        <a class="breadcrumb__link off">/</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</section>
