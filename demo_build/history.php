<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>История</title>

  <link rel="shortcut icon" href="resources/favicons/main_favicon.png" type="image/png" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/ModalFrame.css" />
  <link rel="stylesheet" href="CSS/reg_system.css" />
  <link rel="stylesheet" href="CSS/history.css" />

  <script type="text/javascript" src="https://kit.fontawesome.com/738b08a700.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="JavaScripts/slider_system.js" defer></script>
  <script type="text/javascript" src="JavaScripts/for_style.js" defer></script>
  <script type="text/javascript" src="JavaScripts/reg_system.js" defer></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <header>
    <div class="shadow"></div>
  </header>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/Moduls/header.php'; ?>

  <section class="history">
    <div class="container">
      <h2 class="history__header">История</h2>
      <div class="season-6">
        <p>
          В БГУИР ПОДВЕЛИ ИТОГИ 6-ГО СЕЗОНА КОНКУРСА ТВОРЧЕСКИХ ПРОЕКТОВ
          «ЭВРИСТИКА В ФИЗИКЕ»
        </p><br>

        <p>
          На факультете компьютерных систем и сетей подвели итоги 6-го сезона
          конкурса творческих проектов «Эвристика в физике». Он проводился
          на протяжении осеннего семестра 2020/2021 учебного года в рамках
          лекционного курса общей физики. Автор и научный руководитель
          конкурса — доцент кафедры физики Ия Игоревна Ташлыкова-Бушкевич.
        </p><br>

        <p>
          В 6-м сезоне конкурса участвовали 68 студентов-авторов
          из 159 студентов второго курса специальности «Вычислительные машины,
          системы и сети». Команды представили 16 проектов, пять из которых
          стали победителями.
        </p><br>

        <p>
          Конкурс «Эвристика в физике» проходил в несколько этапов. Открыл
          сезон фестиваль визиток, затем студенты участвовали в марафоне,
          где анонсировались проекты. Эти этапы проходили на YouTube-канале
          и освещались в социальных сетях «Эвристики в физике» (Instagram
          и «Вконтакте»). В январе в формате онлайн прошёл сам конкурс,
          на котором были выбраны победители в разных номинациях.
        </p>
      </div>
    </div>
  </section>

  <section class="history__slider">
    <div class="main_slider_container">
      <div class="slides">
        <img class="slider-item" src="resources/images/history/slides/1.jpg" alt="image" />
        <img class="slider-item" src="resources/images/history/slides/2.jpg" alt="image" />
        <img class="slider-item" src="resources/images/history/slides/3.jpg" alt="image" />
        <img class="slider-item" src="resources/images/history/slides/4.jpg" alt="image" />
        <img class="slider-item" src="resources/images/history/slides/5.jpg" alt="image" />
      </div>
      <div class="block-under-slider">
        <div class="slider-item-description">
          Лучшей творческой работой стал проект "Самодельная электрогитара"
          (состав команды - Илья Халецкий, Матвей Суша, Владислав Ященко,
          Алексей Калютчик, Елизавета Ковшер, координатор - Максим Каганович).
        </div>
        <div class="slider-item-description">
          Проект "Туннельный эффект" определили как лучшую креативную работу
          (состав команды - Иван Барановский, Александр Крылов, Дмитрий Орлов,
          Илья Ламашко, Максим Ракитский, координатор - Максим Каганович).
        </div>
        <div class="slider-item-description">
          В номинации "Лучшая научная работа" победил проект "Эффект
          Джанибекова" (состав команды - Егор Лявенко, Марьян Терехов, Дмитрий
          Писарчик, Владислав Прохоркин, Павел Ященко, координатор - Максим
          Каганович).
        </div>
        <div class="slider-item-description">
          Лучшей технической работой стал проект "Фотоэффект" (состав команды
          - Мария Вишняк, Вадим Галуза, Иван Лосик, Дмитрий Лопатин,
          координатор - Владимир Грищенко).
        </div>
        <div class="slider-item-description">
          Приз зрительских симпатий получила работа "Оптический и акустический
          фокусы" (состав команды - Полина Бушманова, Юлия Хиневич, Никита
          Шалесный, Иван Коркош, координатор - Максим Жук).
        </div>
      </div>

      <div class="slider_buttons">
        <div class="button prev"></div>
        <div class="button next"></div>
      </div>
      <div class="slider_dots"></div>
    </div>
  </section>
  <section class="history__winners">
    <div class="container">
      <p>
        Проекты-победители были отмечены дипломами научного руководителя.
        Ознакомиться со всеми работами студентов можно на YouTube-канале
        конкурса.
      </p><br>
      <p>
        Популярность проекта растет и планируется, что в весеннем 7 сезоне
        будут участвовать студенты уже двух факультетов: к факультету
        компьютерных систем и сетей присоединится факультет информационных
        коммуникаций. Студенты-координаторы проектов с ФКСиС уже подготовили
        первокурсников-стажеров с ФИК. Они вместе участвовали в организации
        шестого сезона конкурса.
      </p>
    </div>
  </section>
  <section class="technique">
    <div class="container">
      <h3>
        ТЕХНОЛОГИИ ПРОБЛЕМНО-ЭВРИСТИЧЕСКОГО ОБУЧЕНИЯ ВНЕДРЕНЫ УЖЕ НА ДВУХ
        ФАКУЛЬТЕТАХ БЕЛОРУССКОГО ГОСУДАРСТВЕННОГО УНИВЕРСИТЕТА ИНФОРМАТИКИ
        И РАДИОЭЛЕКТРОНИКИ
      </h3>
      <img src="/resources/images/history/content/impls.jpg" alt="Импульс" class="impuls" />
      <p>
        На X Международной научно-методической конференции «Высшее техническое
        образование: проблемы и пути развития» представлены два доклада в
        соавторстве со студентами 2 курса ФКСиС: «Применение
        проблемно-эвристического подхода в рамках нового формата обучающих
        средств на факультете КСиС в условиях дистанционного образования» и
        «Анализ развития творческого потенциала участников проекта “Эвристика
        в физике” на факультете КСиС БГУИР». Главная цель
        научно-педагогических исследований нашего проекта – повышение
        эффективности учебного процесса с помощью проблемно-эвристических
        технологий при обучении физике в БГУИР в рамках концепции «Университет
        3.0». Популярность среди студентов ФКСиС проекта «Эвристика в физике»
        иллюстрируется тем фактом, что по результатам опроса на 1 курсе более
        30% студентов-участников проекта знали и планировали принять в нем
        участие еще до начала изучения дисциплины «Физика».
      </p><br>
      <p>
        Пятый сезон творческих проектов «Эвристика в физике» (февраль-июнь
        2020) прошел в условиях пандемии коронавирусной инфекции, когда многие
        занятия были перенесены на онлайн-платформы (Moodle, Zoom, Skype и
        др.). Все заявленные в феврале проекты по физике были доведены до
        конца. Полученные результаты позволяют сделать вывод, что
        эвристические технологии являются весьма адаптивными и могут
        применяться не только как дополнение к традиционным лекциям и
        практическим занятиям, но и при дистанционной работе в вузах.
      </p>

    </div>
  </section>
  
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/Moduls/footer.php'; ?>

</body>

</html>