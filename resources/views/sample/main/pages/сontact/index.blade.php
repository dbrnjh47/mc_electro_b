@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
<x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>

    <section class="contacts">
        <div class="contacts__container">
            <div class="app__title">
                <div class="app__title_wrapper">
                    <h2 class="app__title_text">Контакты</h2>
                    <p class="app__title_description">Подразделения компании {{$settings->fullName()}}</p>
                </div>
                <div class="app__filters">
                    <div id="select2_sort" class="select2_sample_nude">
                        <select class="select2_custom" name="city_id" data-dropdown-position="below"
                            data-minimum-results-for-search="5" data-dropdown-parent="#select2_sort"
                            data-search-input-placeholder="Введите город">
                            <option value="" selected="">Города</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}" @if($city_id == $city->id) selected="" @endif>{{$city->locale->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="app__search">
                        <input type="text" placeholder="Введите адресс" id="contacts_search">
                    </div>
                </div>

            </div>

            @include('sample.main.pages.сontact.components.cards')

        </div>
        {{ $points->appends(request()->input())->onEachSide(1)->links() }}

    </section>
@endsection

@section('footer')
    <script>
        window.routes["contacts.block"] = "{{ route('contacts.block') }}";
    </script>
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>

    @vite('resources/js/contacts/index.js')
    @vite('resources/js/ajax/contacts/get.js')

@endsection
