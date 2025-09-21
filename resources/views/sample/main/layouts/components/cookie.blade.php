
@if(!Cookie::get('cookie_checked'))
<script>
     window.routes["cookie.agreement"] = "{{route('cookie.agreement')}}";
</script>
<div class="cookies_conteiner">
    <div class="cookies">
        <p>{{$settings->fullName()}} использует cookie, чтобы повысить удобство пользованиясайтом.
            <a href="{{route('policy')}}">Политика конфиденциальности.</a>
        </p>
        <button>Все верно</button>
    </div>
</div>
@endif
