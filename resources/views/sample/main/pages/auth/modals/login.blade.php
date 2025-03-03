<div class="modal modal_auth" id="modal_login">
    <div class="modal__content">
        <div class="modal__header">
            <h2>Вход</h2>
            <button class="modal__close__btn modal_close"></button>
        </div>
        <div class="modal__body">
            <form>
                <div class="modal__input_wrapper invalid_feedback_wrapper">
                    <label for="modal_login_email">Электронная почта</label>
                    <input name="email" type="email" placeholder="Введите почту" class="modal__input"
                        id="modal_login_email">
                </div>
                <div class="modal__input_wrapper invalid_feedback_wrapper">
                    <label for="modal_login_password">Пароль</label>
                    <input name="password" type="password" placeholder="Введите пароль" class="modal__input"
                        id="modal_login_password">
                </div>
            </form>
            <div class="modal_auth__actions">
                <a class="modal_auth__action" href="#">Забыли пароль?</a>
                <a class="modal_auth__action modal_auth__action_dop" onclick="modal('#modal_signup');">Еще нет учетной записи?</a>
            </div>
            <button class="modal__btn disable" id="modal_login_btn">Войти</button>
            <button class="modal__btn modal_auth__btn"><img src="/temple/images/auth/socials/google.png"
                    alt="google" loading="lazy">Войти с помощью Google</button>
            <button class="modal__btn modal_auth__btn"><img src="/temple/images/auth/socials/fb.png"
                    alt="facebook" loading="lazy">Войти с помощью Facebook</button>

        </div>
    </div>
</div>
