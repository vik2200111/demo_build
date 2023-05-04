<section class="contact-us">
  <div class="container">
    <h2 class="contact_header">Задайте вопрос</h2>

    <?php if (!$_SESSION['user']) : ?>
      <form class="question-form" onsubmit="return ShowFrame('modal_reg_system');">
      <?php else : ?>
        <script src="/JavaScripts/question_system.js"></script>
        <form class="question-form" onsubmit="return Send_Question(0);">
        <?php endif; ?>

        <input data-q_box_id=0 class="contact_question" type="text" placeholder="Когда новый сезон эвристики в физике?" />
        <button class="send-button">Отправить</button>
        </form>
        <ul class="social-media">
          <li><a href="https://vk.com/iyat_b_hip" class="vk"></a></li>
          <li><a class="youtube" href="https://www.youtube.com/channel/UCY3Zzwu9fqGknF6PCPlUvWA/videos"></a></li>
          <li><a href="https://www.instagram.com/zun.iyat_b.ru/" class="instagram"></a></li>
          <li><a href="https://t.me/zun_iyat_b" class="telegram"></a></li>
          <li><a href="https://www.facebook.com/" class="facebook"></a></li>
        </ul>
  </div>
</section>

<footer class="footer">
  <div class="container">
    <a href="#">
      <img src="/resources/logos/logo-white.png" alt="logo" class="footer-logo" />
    </a>
    <ul class="footer-navigation">
      <li><a href="/index.php">Главная</a></li>
      <li><a href="/projects_voting.php">Голосование</a></li>
      <li><a href="/about_us.php">О нас</a></li>
      <li><a href="/history.php">История</a></li>
      <li><a href="/gallery.php">Галерея</a></li>
    </ul>
  </div>
</footer>

<?php if (!$_SESSION['user']) : ?>
  <div class="modal_frame" data-key="modal_reg_system">
    <div class="modal_frame_body">
      <div class="modal_frame_content">
        <div class="modal_frame_cross">&#10006;</div>

        <div class="reg_system_blok" id="reg_blok" hidden>
          <div class="modal_frame_caption">Регистрация аккаунта</div>
          <form class="reg_system_form" onsubmit="return RegClick();">
            <input type="text" class="reg_system_input" id="reg_user_login" placeholder="Логин" /><br />
            <input type="password" class="reg_system_input" id="reg_user_pass" placeholder="Пароль" /><br />
            <input type="email" class="reg_system_input" id="reg_user_email" placeholder="Email" /><br />
            <ul class="reg_system_status" id="reg_status"></ul>
            <button class="reg_system_button">Регистрация</button>
            <br>
            <p>Уже есть аккаунт? <a class="reg_system_link" onclick="ToAut()">Авторизоваться.</a></p>
          </form>
        </div>

        <div class="reg_system_blok" id="aut_blok">
          <div class="modal_frame_caption">Авторизация</div>
          <form class="reg_system_form" onsubmit="return AutClick();">
            <input type="text" class="reg_system_input" id="aut_user_login" placeholder="Логин" /><br />
            <input type="password" class="reg_system_input" id="aut_user_pass" placeholder="Пароль" /><br />
            <ul class="reg_system_status" id="aut_status"></ul>
            <button class="reg_system_button">Войти</button>
            <br>
            <p>Нет аккаунта? <a class="reg_system_link" onclick="ToReg()">Зарегистрироваться.</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="JavaScripts/ModalFrame.js"></script>
<?php endif; ?>