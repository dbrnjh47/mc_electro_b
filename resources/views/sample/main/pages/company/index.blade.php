@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
<section class="breadcrumb">
    <div class="breadcrumb__container">
        <ul class="breadcrumb__lists" itemscope="" itemtype="https://schema.org/BreadcrumbList">
            <li class="breadcrumb__item" itemprop="itemListElement" itemscope=""
                itemtype="https://schema.org/ListItem">
                <a itemprop="item" class="breadcrumb__link start" href="#">
                    <span itemprop="name">Главная</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li class="breadcrumb__item">
                <a class="breadcrumb__link off">/</a>
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <a itemprop="item" class="breadcrumb__link active">
                    <span itemprop="name">Компании</span>
                </a>
                <meta itemprop="position" content="3">
            </li>
        </ul>
    </div>
</section>

<section class="companies">
    <div class="companies__container">
        <div class="app__title">
            <div class="app__title_wrapper">
                <h2 class="app__title_text">Компании</h2>
            </div>
            <div class="app__filters">
                <div class="app__search">
                    <input type="text" placeholder="Введите название">
                </div>
            </div>
        </div>

        <div class="companies__list">
            {{-- <x-company.card></x-company.card> --}}
            {{-- <x-company.card></x-company.card> --}}
            {{-- <x-company.card></x-company.card> --}}
            {{-- <x-company.card></x-company.card> --}}
            {{-- <x-company.card></x-company.card> --}}
            {{-- <x-company.card></x-company.card> --}}
            <div class="company_card">
                <div class="company_card__content">
                  <div class="company_card__miniature">
                    <img src="/assets/companies/logo/1.svg" alt="" loading="lazy" decoding="async">
                    <span class="company_card__miniature_cover" style="background-image: url('/assets/companies/logo/1.svg');"></span>
                  </div>
                  <div class="company_card__info">
                    <div class="company_card__name">
                      Название компании
                    </div>
                    <p>
                      <span>
                        <svg class="red" width="18" height="17" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z"></path>
                        </svg>
                        4.6
                      </span>
                      <span>
                        <svg width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.99" fill-rule="evenodd" clip-rule="evenodd" d="M18.9216 6.50596C19.029 7.0658 19.0232 7.59029 18.9216 8.12607C18.7202 9.18742 18.2973 10.1533 17.653 11.0237C17.3943 11.3289 17.1364 11.6333 16.8794 11.9371C17.3726 12.9936 17.8574 14.054 18.3337 15.1181C18.4591 15.6191 18.2735 15.9131 17.7767 16C17.5916 15.9531 17.4162 15.8796 17.2507 15.7795C16.1671 15.0961 15.0842 14.4138 14.0018 13.7323C10.0487 15.2239 6.30476 14.8145 2.77005 12.504C1.73146 11.6798 0.937316 10.6614 0.387546 9.44889C-0.357961 7.26693 -0.0278762 5.27218 1.37768 3.46471C3.34909 1.3528 5.77287 0.208495 8.64895 0.0316779C11.6603 -0.178965 14.3419 0.660899 16.6938 2.55133C17.878 3.60833 18.6206 4.9383 18.9216 6.50596Z"></path>
                        </svg> 300 отзывов</span>
                    </p>
                    <p>
                      Кол-во товаров: <span>200</span>
                    </p>
                  </div>
                </div>
                <div class="company_card__description">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                </div>
                <a href="#" class="btn">
                  Подробнее о компании
                </a>
              </div>

              <div class="company_card">
                <div class="company_card__content">
                  <div class="company_card__miniature">
                    <img src="/assets/companies/logo/1.svg" alt="" loading="lazy" decoding="async">
                    <span class="company_card__miniature_cover" style="background-image: url('/assets/companies/logo/1.svg');"></span>
                  </div>
                  <div class="company_card__info">
                    <div class="company_card__name">
                      Название компании
                    </div>
                    <p>
                        <span>
                            <svg class="red" width="18" height="17" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z"></path>
                            </svg>
                          4.6
                        </span>
                        <span>300 отзывов</span>
                      </p>
                      <p>
                        Кол-во товаров: <span>200</span>
                      </p>
                  </div>
                </div>
                <div class="company_card__description">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                </div>
                <a href="#" class="btn">
                  Подробнее о компании
                </a>
              </div>
        </div>
    </div>
</section>
<section class="pagination">
    <div class="pagination__container">
        <p>Показано 10 из 84</p>
        <div class="pagination__items">
            <a class="pagination__arrow" href="#" title="">
                <img src="/temple/images/component/pagination/arrow.svg" alt="arrow" loading="lazy" decoding="async">
            </a>

            <span class="page">
                <a href="#" title="1">
                    1
                </a>
            </span>

            <p class="pagination__activ">2</p>

            <span class="page">
                <a href="#" title="1">
                    1
                </a>
            </span>
            <span class="page">
                <a href="#" title="1">
                    1
                </a>
            </span>
            <span class="page">
                <a href="#" title="1">
                    1
                </a>
            </span>
            <span class="page">
                <a href="#" title="1">
                    1
                </a>
            </span>
            <span class="page">
                <a href="#" title="1">
                    1
                </a>
            </span>

            <a class="pagination__arrow right" href="#" title="">
                <img src="/temple/images/component/pagination/arrow.svg" alt="arrow">
            </a>
        </div>
    </div>
</section>
@endsection

@section('footer')
    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/companies/index.js')
@endsection
