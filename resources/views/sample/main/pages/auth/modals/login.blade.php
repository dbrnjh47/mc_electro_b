@php
    $key = (isset($is_block) && $is_block == 1 ? "block" : "modal");
@endphp
<div class="modal modal_auth" id="{{$key}}_login">
    <div class="modal__content">
        <div class="modal__header">
            <h2>Вход</h2>
            @if(!isset($is_block))
                <button class="modal__close__btn modal_close"></button>
            @endif
        </div>
        <div class="modal__body">
            <form>
                <div class="modal__input_wrapper invalid_feedback_wrapper">
                    <label for="{{$key}}_login_email">Электронная почта</label>
                    <input name="email" type="email" placeholder="Введите почту" class="modal__input"
                        id="{{$key}}_login_email">
                </div>
                <div class="modal__input_wrapper invalid_feedback_wrapper">
                    <label for="{{$key}}_login_password">Пароль</label>
                    <input name="password" type="password" placeholder="Введите пароль" class="modal__input"
                        id="{{$key}}_login_password">
                </div>
            </form>
            <div class="modal_auth__actions">
                <a class="modal_auth__action" href="{{route('restore')}}">Забыли пароль?</a>
                <a class="modal_auth__action modal_auth__action_dop" onclick="modal('#modal_signup');">Еще нет учетной записи?</a>
            </div>
            <button class="modal__btn disable" id="{{$key}}_login_btn">Войти</button>
            <button class="modal__btn modal_auth__btn"><img src="/temple/images/auth/socials/google.png"
                    alt="google" loading="lazy">Войти с помощью Google</button>
            <button class="modal__btn modal_auth__btn"><img src="/temple/images/auth/socials/fb.png"
                    alt="facebook" loading="lazy">Войти с помощью Facebook</button>

        </div>
    </div>
</div>
