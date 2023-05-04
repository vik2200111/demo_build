<div class="top-wrapper" id="top">
  <div class="logo-wrapper">
    <div class="burger-wrapper">
      <input type="checkbox" class="checker" />
      <nav class="mobile-menu">
        <ul>
          <li><input type="text" placeholder="Поиск" /></li>
          <div class="main-mobile-menu">
            <li><a href="/index.php">Главная</a></li>
            <li><a href="/about_us.php">О нас</a></li>
            <li><a href="/projects_voting.php">Голосование</a></li>
            <li><a href="/history.php">История</a></li>
            <li><a href="/gallery.php">Галерея</a></li>
            <li>
              <?php if (!$_SESSION['user']) : ?>
                <a onclick="ShowFrame('modal_reg_system');" style="cursor: pointer;">Войти</a>
              <?php else : ?>
                <a onclick="user_exit()" style="cursor: pointer;">Выйти</a>
              <?php endif; ?>
            </li>
          </div>
        </ul>
      </nav>
      <div class="burger" id="main-bar"></div>
    </div>
    <a href="#"><img src="/resources/logos/logo-white.png" class="logo" id="logo" /></a>
    <h1 class="txt_main" id="title">Эвристика<br />в физике</h1>
  </div>
  <nav class="navigation">
    <ul class="row-1">
      <li class="nav-element"><a href="/index.php">Главная</a></li>
      <li class="nav-element"><a href="/about_us.php">О нас</a></li>
      <li class="nav-element"><a href="/history.php">История</a></li>
      <li class="nav-element"><a href="/gallery.php">Галерея</a></li>
      <li class="nav-element"><a href="/projects_voting.php">Голосование</a></li>
    </ul>
    <ul class="row-2">
      <li class="nav-element nav-element-search">
        <input type="text" class="search" placeholder="Поиск" />
      </li>
      <li class="nav-element">
        <?php if (!$_SESSION['user']) : ?>
          <a onclick="ShowFrame('modal_reg_system');" style="cursor: pointer;">Войти</a>
        <?php else : ?>
          <a onclick="user_exit()" style="cursor: pointer;">Выйти</a>
        <?php endif; ?>
      </li>
      <li>
        <ul class="social-media">
          <li><a href="https://vk.com/iyat_b_hip" class="vk"></a></li>
          <li><a class="youtube" href="https://www.youtube.com/channel/UCY3Zzwu9fqGknF6PCPlUvWA/videos"></a></li>
          <li><a href="https://www.instagram.com/zun.iyat_b.ru/" class="instagram"></a></li>
          <li><a href="https://t.me/zun_iyat_b" class="telegram"></a></li>
          <li><a href="https://www.facebook.com/" class="facebook"></a></li>
        </ul>
      </li>
    </ul>
  </nav>
</div>