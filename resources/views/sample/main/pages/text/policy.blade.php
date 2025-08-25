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
                    <h1>{{ __("page/policy.content.title")}}</h1>
                    <img src="/temple/images/agreement/content/str.svg" alt="icon">
                </div>
                <div class="content__main content__menu">
                    <div class="content__main_items">
                        <p class="content__target">
                            {{ __("page/policy.content.policy_1")}}
                            <img src="/temple/images/agreement/content/str.svg" alt="icon">
                        </p>
                        <ul class="content__menu">
                            <li>
                                <a href="#policy_1_1">
                                    {{ __("page/policy.content.policy_1_1")}}
                                </a>
                            </li>
                            <li>
                                <a href="#policy_1_2">
                                    {{ __("page/policy.content.policy_1_2")}}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <a href="#policy_2">
                        {{ __("page/policy.content.policy_2")}}
                    </a>

                    <a href="#policy_3">
                        {{ __("page/policy.content.policy_3")}}
                    </a>

                    <a href="#policy_4">
                        {{ __("page/policy.content.policy_4")}}
                    </a>
                </div>
            </div>

            <div class="agreement__content">
                <div class="agreement__items">
                    <a href="#policy_1" class="agreement__title" id="policy_1">{{ __("page/policy.policy_1.title", ["full_name" => $settings->fullName()])}}</a>
                    <p class="agreement__item">
                        {!! __("page/policy.policy_1.p.1", ["full_name" => $settings->fullName(), "ie" => $settings->ie, "url" => request()->getHost()]) !!}
                    </p>
                    <ul>
                        <li>{{ __("page/policy.policy_1.ul.1")}}</li>
                    </ul>

                </div>
                <div class="agreement__items">
                    <a href="#policy_1_1" class="agreement__title" id="policy_1_1">{{ __("page/policy.policy_1_1.title")}}</a>
                    <ul>
                        <li>{{ __("page/policy.policy_1_1.ul.1")}}</li>
                        <li>{{ __("page/policy.policy_1_1.ul.2")}}</li>
                    </ul>
                </div>

                <div class="agreement__items">
                    <a href="#policy_1_2" class="agreement__title" id="policy_1_2">{{ __("page/policy.policy_1_2.title")}}</a>
                    <ul>
                        <li>{{ __("page/policy.policy_1_2.ul.1")}}</li>
                        <li>{{ __("page/policy.policy_1_2.ul.2")}}</li>
                        <li>{{ __("page/policy.policy_1_2.ul.3")}}</li>
                    </ul>
                </div>

                <div class="agreement__items">
                    <a href="#policy_2" class="agreement__title" id="policy_2">{{ __("page/policy.policy_2.title")}}</a>
                    <ul>
                        <li>{{ __("page/policy.policy_2.ul.1")}}</li>
                        <li>{{ __("page/policy.policy_2.ul.2")}}</li>
                        <li>{{ __("page/policy.policy_2.ul.3")}}</li>
                        <li>{{ __("page/policy.policy_2.ul.4")}}</li>
                    </ul>
                </div>

                <div class="agreement__items">
                    <a href="#policy_3" class="agreement__title" id="policy_3">{{ __("page/policy.policy_3.title")}}</a>
                    <p class="agreement__item">
                        {{ __("page/policy.policy_3.p.1")}}
                    </p>
                </div>

                <div class="agreement__items">
                    <a href="#policy_4" class="agreement__title" id="policy_4">{{ __("page/policy.policy_4.title")}}</a>

                    <ul>
                        <li>{{ __("page/policy.policy_4.ul.1")}}</li>
                        <li>{{ __("page/policy.policy_4.ul.2", ["ie" => $settings->ie])}}</li>
                        <li>{{ __("page/policy.policy_4.ul.3")}}</li>
                        <li>{{ __("page/policy.policy_4.ul.4")}}</li>
                    </ul>
                    <p class="agreement__item">
                        {{ __("page/policy.policy_4.p.1")}}
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
