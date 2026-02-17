@extends('sample.main.layouts.index', ['title' => $title, 'description' => $description])
@section('head')

@endsection

@section('header')
<x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <x-sample.main.breadcrumb :breadcrumbs="$breadcrumbs"></x-sample.main.breadcrumb>


@endsection

@section('footer')

    <x-sample.main.layout.footer></x-sample.main.layout.footer>
    <x-sample.main.layout.cookie></x-sample.main.layout.cookie>
    <x-sample.main.layout.go-top></x-sample.main.layout.go-top>
    <x-sample.main.support></x-sample.main.support>

    @vite('resources/js/cart/clear.js')
@endsection
