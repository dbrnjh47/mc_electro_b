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
                        <input type="hidden" name="token" value="{{$token}}">
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        <div class="modal__input_wrapper invalid_feedback_wrapper">
                            <label for="modal_reset_new_password_password">Новый пароль</label>
                            <input type="text" name="password" id="modal_reset_new_password_password" placeholder="Придумайте пароль" class="modal__input">
                        </div>
                        <div class="modal__input_wrapper invalid_feedback_wrapper">
                            <label for="modal_reset_new_password_password_confirmation">Повторите пароль</label>
                            <input type="text" name="password_confirmation" id="modal_reset_new_password_password_confirmation" placeholder="Повторите пароль" class="modal__input">
                        </div>
                    </form>

                    <button class="modal__btn" id="modal_reset_new_password_btn">Сбросить</button>
                </div>
            </div>
        </div>
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
