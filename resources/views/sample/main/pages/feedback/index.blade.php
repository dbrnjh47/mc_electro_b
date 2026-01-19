@extends('sample.main.layouts.index', ['title' => $title, 'description' => ""])
@section('head')

@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
<section class="repeating">
    <div class="repeating__wrap">
        <h1 class="repeating__title">Спасибо за заказ!</h1>
        <p class="repeating__text">Заказ
            <span class="repeating__text_underline copy_button">№1232-231123-12312</span>
            создан на сумму 30 000 ₽ и
            принят в обработку. Вы будете получать SMS уведомдения
            о готовности заказа на номер
            <span class="repeating__text_red">+7 000 000 00 00 </span>
        </p>
        <a href="#" class="btn">Назад</a>
    </div>
</section>
@endsection

@section('footer')
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/repeating/index.js')
@endsection
