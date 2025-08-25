@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <section class="dop_menu_mob dop_menu_mob__container">
        <div class="dop_menu_mob__button">
            <img src="{{ Vite::asset('resources/js/custom/dop_menu/mob/img/filter.svg') }}" alt="filter"> Содержание
        </div>
    </section>
    <section class="agreement__container">
        <x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>

        <section class="agreement">
            <div class="dop_menu__bg dop_menu__close"></div>
            <div class="content dop_menu">
                <div class="content__head content__target">
                    <h1>{{ __("page/agreement.content.title")}}</h1>
                    <img src="/temple/images/agreement/content/str.svg" alt="icon">
                </div>
                <div class="content__main content__menu">
                    <a href="#agreement_1">
                        {{ __("page/agreement.content.a.1")}}
                    </a>
                    <a href="#agreement_2">
                        {{ __("page/agreement.content.a.2")}}
                    </a>
                    <a href="#agreement_3">
                        {{ __("page/agreement.content.a.3")}}
                    </a>
                    <a href="#agreement_4">
                        {{ __("page/agreement.content.a.4")}}
                    </a>
                    <a href="#agreement_5">
                        {{ __("page/agreement.content.a.5")}}
                    </a>
                    <a href="#agreement_6">
                        {{ __("page/agreement.content.a.6")}}
                    </a>
                    <a href="#agreement_7">
                        {{ __("page/agreement.content.a.7")}}
                    </a>
                    <a href="#agreement_8">
                        {{ __("page/agreement.content.a.8")}}
                    </a>
                    <a href="#agreement_9">
                        {{ __("page/agreement.content.a.9")}}
                    </a>
                </div>
            </div>

            <div class="agreement__content">
                <div class="agreement__items">
                    <a href="#agreement_1" class="agreement__title" id="agreement_1">{{ __("page/agreement.agreement_1.title")}}</a>
                    <p class="agreement__item" id="agreement_1_1">
                        {!! __("page/agreement.agreement_1.p.1", ["full_name" => $settings->fullName(), "full_url" => request()->getSchemeAndHttpHost(), "url" => request()->getHost()]) !!}
                    </p>
                    <p class="agreement__item" id="agreement_1_2">
                        {{ __("page/agreement.agreement_1.p.2", ["full_name" => $settings->fullName(), "ie" => $settings->ie])}}
                    </p>
                    <p class="agreement__item" id="agreement_1_3">
                        {{ __("page/agreement.agreement_1.p.3", ["full_name" => $settings->fullName()])}}
                    </p>
                    <p class="agreement__item" id="agreement_1_4">
                        {{ __("page/agreement.agreement_1.p.4")}}
                    </p>
                    <p class="agreement__item" id="agreement_1_5">
                        {{ __("page/agreement.agreement_1.p.5")}}
                    </p>
                    <p class="agreement__item" id="agreement_1_6">
                        {{ __("page/agreement.agreement_1.p.6")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_2" class="agreement__title" id="agreement_2">{{ __("page/agreement.agreement_2.title")}}</a>
                    <p class="agreement__item" id="agreement_2_1">
                        {{ __("page/agreement.agreement_2.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_2_1_1">
                        {!! __("page/agreement.agreement_2.p.2", ["full_name" => $settings->fullName(), "full_url" => request()->getSchemeAndHttpHost(), "url" => request()->getHost()]) !!}
                    </p>
                    <p class="agreement__item" id="agreement_2_1_2">
                        {{ __("page/agreement.agreement_2.p.3")}}
                    </p>
                    <p class="agreement__item" id="agreement_2_1_3">
                        {{ __("page/agreement.agreement_2.p.4", ["ie" => $settings->ie])}}
                    </p>
                    <p class="agreement__item" id="agreement_2_1_4">
                        {{ __("page/agreement.agreement_2.p.5")}}
                    </p>
                    <p class="agreement__item" id="agreement_2_1_5">
                        {{ __("page/agreement.agreement_2.p.6")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_3" class="agreement__title" id="agreement_3">{{ __("page/agreement.agreement_3.title")}}</a>
                    <p class="agreement__item" id="agreement_3_1">
                        {{ __("page/agreement.agreement_3.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_3_1_1">
                        {{ __("page/agreement.agreement_3.p.2.text")}}
                        <ul>
                            <li>{{ __("page/agreement.agreement_3.p.2.ul.1")}}</li>
                            <li>{{ __("page/agreement.agreement_3.p.2.ul.2")}}</li>
                            <li>{{ __("page/agreement.agreement_3.p.2.ul.3")}}</li>
                            <li>{{ __("page/agreement.agreement_3.p.2.ul.4")}}</li>
                            <li>{{ __("page/agreement.agreement_3.p.2.ul.5")}}</li>
                        </ul>
                    </p>
                    <p class="agreement__item" id="agreement_3_1_2">
                        {{ __("page/agreement.agreement_3.p.3")}}
                    </p>
                    <p class="agreement__item" id="agreement_3_2">
                        {{ __("page/agreement.agreement_3.p.4")}}
                    </p>
                    <p class="agreement__item" id="agreement_3_3">
                        {{ __("page/agreement.agreement_3.p.5")}}
                    </p>
                    <p class="agreement__item" id="agreement_3_4">
                        {{ __("page/agreement.agreement_3.p.6")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_4" class="agreement__title" id="agreement_4">{{ __("page/agreement.agreement_4.title")}}</a>
                    <p class="agreement__item" id="agreement_4_1">
                        {{ __("page/agreement.agreement_4.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_1_1">
                        {{ __("page/agreement.agreement_4.p.2")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_1_2">
                        {{ __("page/agreement.agreement_4.p.3")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_1_3">
                        {{ __("page/agreement.agreement_4.p.4")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_1_4">
                        {{ __("page/agreement.agreement_4.p.5")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_2">
                        {{ __("page/agreement.agreement_4.p.6")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_2_1">
                        {{ __("page/agreement.agreement_4.p.7")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_2_2">
                        {{ __("page/agreement.agreement_4.p.8")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_2_3">
                        {{ __("page/agreement.agreement_4.p.9", ["full_name" => $settings->fullName()])}}
                    </p>
                    <p class="agreement__item" id="agreement_4_2_4">
                        {{ __("page/agreement.agreement_4.p.10")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3">
                        {{ __("page/agreement.agreement_4.p.11")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3_1">
                        {{ __("page/agreement.agreement_4.p.12")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3_2">
                        {{ __("page/agreement.agreement_4.p.13")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3_3">
                        {{ __("page/agreement.agreement_4.p.14")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3_4">
                        {{ __("page/agreement.agreement_4.p.15")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3_5">
                        {{ __("page/agreement.agreement_4.p.16")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3_6">
                        {{ __("page/agreement.agreement_4.p.17")}}
                    </p>
                    <p class="agreement__item" id="agreement_4_3_7">
                        {{ __("page/agreement.agreement_4.p.18")}}
                    </p>
                    <div class="agreement__item_tab">
                        <p class="agreement__item" id="agreement_4_3_7_1">
                            {{ __("page/agreement.agreement_4.p.19")}}
                        </p>
                        <p class="agreement__item" id="agreement_4_3_7_2">
                            {{ __("page/agreement.agreement_4.p.20")}}
                        </p>
                        <p class="agreement__item" id="agreement_4_3_7_3">
                            {{ __("page/agreement.agreement_4.p.21")}}
                        </p>
                        <p class="agreement__item" id="agreement_4_3_7_4">
                            {{ __("page/agreement.agreement_4.p.22")}}
                        </p>
                        <p class="agreement__item" id="agreement_4_3_7_5">
                            {{ __("page/agreement.agreement_4.p.23")}}
                        </p>
                        <p class="agreement__item" id="agreement_4_3_7_6">
                            {{ __("page/agreement.agreement_4.p.24")}}
                        </p>
                        <p class="agreement__item" id="agreement_4_3_7_7">
                            {{ __("page/agreement.agreement_4.p.25")}}
                        </p>
                    </div>

                    <p class="agreement__item" id="agreement_4_4">
                        {{ __("page/agreement.agreement_4.p.26")}}
                    </p>

                    <p class="agreement__item" id="agreement_4_4_1">
                        {{ __("page/agreement.agreement_4.p.27")}}
                    </p>

                    <p class="agreement__item" id="agreement_4_4_2">
                        {{ __("page/agreement.agreement_4.p.28")}}
                    </p>

                    <p class="agreement__item" id="agreement_4_4_3">
                        {{ __("page/agreement.agreement_4.p.29")}}
                    </p>

                    <p class="agreement__item" id="agreement_4_4_4">
                        {{ __("page/agreement.agreement_4.p.30")}}
                    </p>

                    <p class="agreement__item" id="agreement_4_4_5">
                        {{ __("page/agreement.agreement_4.p.31")}}
                    </p>

                    <p class="agreement__item" id="agreement_4_4_6">
                        {{ __("page/agreement.agreement_4.p.32")}}
                    </p>

                    <p class="agreement__item" id="agreement_4_4_7">
                        {{ __("page/agreement.agreement_4.p.33")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_5" class="agreement__title" id="agreement_5">{{ __("page/agreement.agreement_5.title")}}</a>
                    <p class="agreement__item" id="agreement_5_1">
                        {{ __("page/agreement.agreement_5.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_2">
                        {{ __("page/agreement.agreement_5.p.2")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_3">
                        {{ __("page/agreement.agreement_5.p.3")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_4">
                        {{ __("page/agreement.agreement_5.p.4")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_5">
                        {{ __("page/agreement.agreement_5.p.5")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_6">
                        {{ __("page/agreement.agreement_5.p.6")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_7">
                        {{ __("page/agreement.agreement_5.p.7")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_8">
                        {{ __("page/agreement.agreement_5.p.8")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_9">
                        {{ __("page/agreement.agreement_5.p.9")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_10">
                        {{ __("page/agreement.agreement_5.p.10")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_11">
                        {{ __("page/agreement.agreement_5.p.11")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_11_1">
                        {{ __("page/agreement.agreement_5.p.12")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_11_2">
                        {{ __("page/agreement.agreement_5.p.13")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_11_3">
                        {{ __("page/agreement.agreement_5.p.14")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_11_4">
                        {{ __("page/agreement.agreement_5.p.15")}}
                    </p>
                    <p class="agreement__item" id="agreement_5_12">
                        {{ __("page/agreement.agreement_5.p.16")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_6" class="agreement__title" id="agreement_6">{{ __("page/agreement.agreement_6.title")}}</a>
                    <p class="agreement__item" id="agreement_6_1">
                        {{ __("page/agreement.agreement_6.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_6_2">
                        {{ __("page/agreement.agreement_6.p.2")}}
                    </p>
                    <p class="agreement__item" id="agreement_6_2_1">
                        {{ __("page/agreement.agreement_6.p.3")}}
                    </p>
                    <p class="agreement__item" id="agreement_6_2_2">
                        {{ __("page/agreement.agreement_6.p.4")}}
                    </p>
                    <p class="agreement__item" id="agreement_6_2_3">
                        {{ __("page/agreement.agreement_6.p.5")}}
                    </p>
                    <p class="agreement__item" id="agreement_6_2_4">
                        {{ __("page/agreement.agreement_6.p.6")}}
                    </p>
                    <p class="agreement__item" id="agreement_6_3">
                        {{ __("page/agreement.agreement_6.p.7")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_7" class="agreement__title" id="agreement_7">{{ __("page/agreement.agreement_7.title")}}</a>
                    <p class="agreement__item" id="agreement_7_1">
                        {{ __("page/agreement.agreement_7.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_7_2">
                        {{ __("page/agreement.agreement_7.p.2")}}
                    </p>
                    <p class="agreement__item" id="agreement_7_3">
                        {{ __("page/agreement.agreement_7.p.3")}}
                    </p>
                    <p class="agreement__item" id="agreement_7_4">
                        {{ __("page/agreement.agreement_7.p.4")}}
                    </p>
                    <p class="agreement__item" id="agreement_7_5">
                        {{ __("page/agreement.agreement_7.p.5")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_8" class="agreement__title" id="agreement_8">{{ __("page/agreement.agreement_8.title")}}</a>
                    <p class="agreement__item" id="agreement_8_1">
                        {{ __("page/agreement.agreement_8.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_8_2">
                        {{ __("page/agreement.agreement_8.p.2")}}
                    </p>
                    <p class="agreement__item" id="agreement_8_3">
                        {{ __("page/agreement.agreement_8.p.3")}}
                    </p>
                    <p class="agreement__item" id="agreement_8_4">
                        {{ __("page/agreement.agreement_8.p.4")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#agreement_9" class="agreement__title" id="agreement_9">{{ __("page/agreement.agreement_9.title")}}</a>
                    <p class="agreement__item" id="agreement_9_1">
                        {{ __("page/agreement.agreement_9.p.1")}}
                    </p>
                    <p class="agreement__item" id="agreement_9_2">
                        {{ __("page/agreement.agreement_9.p.2")}}
                    </p>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/agreement/index.js')
@endsection
