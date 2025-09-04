<section class="empty_list">
    <h1>{{$title}}</h1>
    @if($text)<p>{{$text}}</p>@endif
    @if($button && is_array($button) && !empty($button))<a href="{{$button["url"]}}" class="btn">{{$button["text"]}}</a>@endif
</section>
