<div class="modal modal_auth" id="modal_signup">
    <div class="modal__content">
      <div class="modal__header">
        <h2>Регистрация</h2>
        <button class="modal__close__btn modal_close"></button>
      </div>
      <div class="modal__body">
        <form>
          <div class="modal__input_wrapper invalid_feedback_wrapper">
            <label for="modal_signup_name">ФИО</label>
            <input name="name" type="text" placeholder="Введите ФИО" class="modal__input" id="modal_signup_name">
          </div>
          <div class="modal__input_wrapper invalid_feedback_wrapper">
            <label for="modal_signup_email">Электронная почта</label>
            <input name="email" type="email" placeholder="Введите почту" class="modal__input"
              id="modal_signup_email">
          </div>
          <div class="modal__input_wrapper invalid_feedback_wrapper">
            <label for="modal_signup_phone">Телефон</label>
            <input name="phone" type="text" placeholder="Введите номер телефона"
              class="modal__input __mask_int __mask_add_symbol" data-add-symbol="+" id="modal_signup_phone">
          </div>
          <div class="modal__input_wrapper invalid_feedback_wrapper">
            <label for="modal_signup_password">Пароль</label>
            <input name="password" type="password" placeholder="Введите пароль" class="modal__input"
              id="modal_signup_password">
          </div>
          <div class="invalid_feedback_wrapper">
            <div class="checkbox">
              <input name="agreement" id="modal_signup_agreement" type="checkbox">
              <label for="modal_signup_agreement">
                Я подтверждаю, что согласен с <a href="{{route('policy')}}" target="_blank">политикой
                  конфидециальности</a>
              </label>
            </div>
          </div>
        </form>

        <div class="modal_auth__actions">
          <a class="modal_auth__action" onclick="modal('#modal_login');">Уже есть аккаунт?</a>
        </div>
        <button class="modal__btn" id="modal_signup_btn">Зарегистрироваться</button>
        <button class="modal__btn modal_auth__btn"><img src="/temple/images/auth/socials/google.png" alt="google"
            loading="lazy">Войти с помощью Google</button>
        <button class="modal__btn modal_auth__btn"><img src="/temple/images/auth/socials/fb.png" alt="facebook"
            loading="lazy">Войти с помощью Facebook</button>
      </div>
    </div>
  </div>
