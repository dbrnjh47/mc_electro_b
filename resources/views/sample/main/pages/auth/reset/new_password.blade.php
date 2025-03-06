@extends('sample.main.layouts.index', ['title' => 'Сброс пароля', 'description' => ''])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <div class="auth auth__container">
        <div class="modal" id="modal_reset_new_password">
            <div class="modal__content">
                <div class="modal__header">
                    <h2>Сброс пароля</h2>
                    <!-- <button class="modal__close__btn modal_close"></button> -->
                </div>
                <div class="modal__body">
                    <form>
                        <div class="modal__input_wrapper">
                            <label>Новый пароль</label>
                            <input type="text" placeholder="Придумайте пароль" class="modal__input">
                        </div>
                        <div class="modal__input_wrapper">
                            <label>Повторите пароль</label>
                            <input type="text" placeholder="Повторите пароль" class="modal__input">
                        </div>
                    </form>

                    <button class="modal__btn" id="modal_reset_new_password_btn">Сбросить</button>
                </div>
            </div>
        </div>

        <script type="module" src="/resources/js/auth/reset/index.js"></script>
    </div>
@endsection

@section('footer')
    <script>
        window.routes["profile"] = "{{ route('profile') }}";
        window.routes["restore.update.password"] = "{{ route('restore.update.password') }}";
    </script>
    {{-- <x-sample.main.layout.footer></x-sample.main.layout.footer> --}}
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    {{-- <x-sample.main.layout.go-top></x-sample.main.layout.go-top> --}}
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/auth/reset/index.js')
    @vite('resources/js/ajax/auth/new_password.js')
@endsection
