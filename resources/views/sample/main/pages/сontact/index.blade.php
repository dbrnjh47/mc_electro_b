@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb>

    <section class="contacts">
        <div class="contacts__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Контакты</h2>
                    <p class="app__title_description">Подразделения компании МК Электро в Челябинске</p>
                </div>
                <div class="app__filters">
                    <div id="select2_sort" class="select2_sample_nude">
                        <select class="select2_custom" name="lang" data-dropdown-position="below"
                            data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort"
                            data-search-input-placeholder="Введите город">
                            <option value="1" selected="">Челябинск</option>
                            <option value="10">Москва</option>
                            <option value="2">Новосибирск</option>
                            <option value="3">Москва</option>
                            <option value="3">Москва</option>
                        </select>
                    </div>
                    <div class="app__search">
                        <input type="text" placeholder="Введите адресс">
                    </div>
                </div>

            </div>
            <div class="contacts__content">

                @foreach ($points as $point)
                    @include("sample.main.pages.сontact.components.card")
                @endforeach

            </div>
        </div>
        {{ $points->appends(request()->input())->onEachSide(1)->links() }}

    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/contacts/index.js')
@endsection
