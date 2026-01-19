@extends('sample.main.layouts.index', ['title' => 'Восстановление пароля', 'description' => ''])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <div class="auth auth__container">
        @include("sample.main.pages.auth.modals.signup", ['is_block' => 1])
    </div>
@endsection

@section('footer')
    {{-- <x-sample.main.layout.footer></x-sample.main.layout.footer> --}}
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    {{-- <x-sample.main.layout.go-top></x-sample.main.layout.go-top> --}}
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/auth/reset/index.js')
@endsection
