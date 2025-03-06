@extends('sample.main.layouts.index', ['title' => 'Восстановление пароля', 'description' => ''])
@section('head')
@endsection

@section('header')
    <x-sample.main.layout.header></x-sample.main.layout.header>
@endsection

@section('content')
    <div class="auth auth__container">
        <div class="modal" id="modal_reset">
            <div class="modal__content">
                <div class="modal__header">
                    <h2>Востановление пароля</h2>
                    <!-- <button class="modal__close__btn modal_close"></button> -->
                </div>
                <div class="modal__body">
                    <form>
                        <div class="modal__input_wrapper invalid_feedback_wrapper">
                            <label for="modal_reset_email">Электронная почта</label>
                            <input type="text" name="email" id="modal_reset_email" placeholder="Введите почту" class="modal__input">
                        </div>
                    </form>

                    <button class="modal__btn" id="modal_reset_btn">Сбросить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        window.routes["restore.reset"] = "{{ route('restore.reset') }}";
    </script>
    {{-- <x-sample.main.layout.footer></x-sample.main.layout.footer> --}}
    <x-sample.main.layout.сookie></x-sample.main.layout.сookie>
    {{-- <x-sample.main.layout.go-top></x-sample.main.layout.go-top> --}}
    <x-sample.main.support></x-sample.main.support>
    @vite('resources/js/auth/reset/index.js')
    @vite('resources/js/ajax/auth/reset.js')
@endsection
