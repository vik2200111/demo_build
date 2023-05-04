<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Эвристика в физике</title>

    <link rel="shortcut icon" href="resources/favicons/main_favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/ModalFrame.css" />
    <link rel="stylesheet" href="CSS/reg_system.css" />

    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?169"></script>
    <script type="text/javascript" src="https://kit.fontawesome.com/738b08a700.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="JavaScripts/load_news.js"       defer></script>
    <script type="text/javascript" src="JavaScripts/slider_system.js"   defer></script>
    <script type="text/javascript" src="JavaScripts/for_style.js"       defer></script>
    <script type="text/javascript" src="JavaScripts/reg_system.js"      defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>

    <?php include $_SERVER['DOCUMENT_ROOT'].'/Moduls/header.php';?>

    <div class="main_slider_container">
      <div class="block_upper_slider">
        <div class = "slider-item-description off_desk">
          <blockquote>
            <p>Действие даже самого крохотного существа приводит к изменениям во всей Вселенной.</p>
            <footer>— <cite>Никола Тесла</cite></footer>
          </blockquote>
        </div>
        <div class = "slider-item-description off_desk">
          <blockquote>
            <p>Величайшим достижением человеческого гения является то, что человек может понять вещи, которые он уже не в силах вообразить.</p>
            <footer>— <cite>Лев Ландау</cite></footer>
          </blockquote>
        </div>
        <div class = "slider-item-description off_desk">
          <blockquote>
            <p>Эксперт — это человек, который совершил все возможные ошибки в очень узкой специальности.</p>
            <footer>— <cite>Нильс Бор</cite></footer>
          </blockquote>
        </div>
        <div class = "slider-item-description off_desk">
          <blockquote>
            <p>Ничто не мешает человеку завтра стать умнее, чем он был вчера.</p>
            <footer>— <cite>Петр Капица</cite></footer>
          </blockquote>
        </div>
        <div class = "slider-item-description off_desk">
          <blockquote>
            <p>Три стадии признания научной истины: первая — «это абсурд», вторая — «в этом что-то есть», третья — «это общеизвестно».</p>
            <footer>— <cite>Эрнест Резерфорд</cite></footer>
          </blockquote>
        </div>
        <div class = "slider-item-description off_desk">
          <blockquote>
            <p>Я думаю, что смело могу утверждать: квантовую механику не понимает никто.</p>
            <footer>— <cite>Ричард Фейнман</cite></footer>
          </blockquote>
        </div>
      </div>
      <div class="slides">
        <img
          class="slider-item"
          src="resources/images/main_page/slides/1.webp"
          alt="image"
        />
        <img
          class="slider-item"
          src="resources/images/main_page/slides/2.webp"
          alt="image"
        />
        <img
          class="slider-item"
          src="resources/images/main_page/slides/3.webp"
          alt="image"
        />
        <img
          class="slider-item"
          src="resources/images/main_page/slides/4.webp"
          alt="image"
        />
        <img
          class="slider-item"
          src="resources/images/main_page/slides/5.webp"
          alt="image"
        />
        <img
          class="slider-item"
          src="resources/images/main_page/slides/6.webp"
          alt="image"
        />
      </div>
      <div class="shadow"></div>
      <div class="slider_buttons">
        <div class="button prev"></div>
        <div class="button next"></div>
      </div>
      <div class="slider_dots"></div>
    </div>

    <section class="description">
      <div class="container">
        <div class="description_left">
          <p>
            На кафедре физики развиваются технологии эвристического обучения
            в высшей школе согласно методике «Обучение через открытие». На ФКСиС
            при организации лекционных занятий по общей физике используется
            разработанная доцентом И.И. Ташлыковой-Бушкевич технология
            эвристического обучения, вовлекающая студентов в процесс создания
            собственного образовательного продукта в форме творческих работ
            в условиях организации самостоятельной работы.
          </p>
          <br />
          <p>
            Творческие студенческие работы в форме видеороликов используются
            в качестве учебных демонстрационных материалов при проведении
            лекционных занятий по физике согласно современным тенденциям
            инновационного обучения. Тизеры студенческих проектов представлены
            на медийном интернет-ресурсе — YouTube-канале «Эвристика в физике».
          </p>
        </div>
        <div class="description_right">
          <img src="resources/images/main_page/content/stonks.jpg" alt="real stonks" />
        </div>
      </div>
    </section>
    <section class="news">
      <div class="container">
        <p class="name_news">Новости</p>
        <div id="news_box_1" class="box_for_news"></div>
      </div>
    </section>

    <?php include $_SERVER['DOCUMENT_ROOT'].'/Moduls/footer.php';?>

  </body>
</html>