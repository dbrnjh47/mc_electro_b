@extends('sample.main.layouts.index', ['title' => "404", 'description' => ""])
@section('head')

@endsection

@section('header')
    <x-sample.main.layout.header :start="1"></x-sample.main.layout.header>
@endsection

@section('content')
<section class="repeating full_page">
    <div class="repeating__wrap">
        <h1 class="repeating__title">404<br>Страница не найдена</h1>
        <p class="repeating__text"> Извините. Запрашиваемая вами страница не найдена
            Пожалуйста, вернитесь на главную страницу
        </p>
        <a href="{{route("home")}}" class="btn">Назад</a>
    </div>
</section>
@endsection

@section('footer')
    @vite('resources/js/repeating/index.js')
@endsection
