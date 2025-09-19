@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
<x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>

    <section class="categories">
        <div class="categories__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Популярные категории</h2>
                    <p class="app__title_description">Мы собрали для вас лучшие категории, которые есть в нашем магазине</p>
                </div>
                {{-- <p class="app__text">Кол-во категорий: <span>21</span></p> --}}
            </div>

            @include('sample.main.pages.category.all.components.categories__lists')
        </div>
    </section>

    {{ $categories->appends(request()->input())->onEachSide(1)->links() }}

    <section class="companies">
        <div class="companies__container">
            <x-sample.main.company.slider></x-sample.main.company.slider>
        </div>

    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/categories/index.js')
@endsection
