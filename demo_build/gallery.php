<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Галерея</title>

    <link rel="shortcut icon" href="resources/favicons/main_favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/ModalFrame.css" />
    <link rel="stylesheet" href="CSS/reg_system.css" />
    <link rel="stylesheet" href="CSS/history.css" />
    <link rel="stylesheet" href="CSS/gallery.css" />

    <script type="text/javascript" src="https://kit.fontawesome.com/738b08a700.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="JavaScripts/for_style.js"       defer></script>
    <script type="text/javascript" src="JavaScripts/reg_system.js"      defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <header>
      <div class="shadow"></div>
    </header>

    <?php include $_SERVER['DOCUMENT_ROOT'].'/Moduls/header.php';?>

    <section class="gallery">
      <div class="container">
        <h2 class="ourGallery">Наша галерея</h2>
        <div class="photos">
          <div class="photo">
            <img src="resources/images/gallery/fisika (2).png" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (3).png" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (4).png" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (5).png" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (6).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (6).png" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (7).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (8).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (9).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (10).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (13).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (17).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (15).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (14).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (1).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (2).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (3).jpg" alt="gallery">
          </div>
          <div class="photo">
            <img src="resources/images/gallery/fisika (4).jpg" alt="gallery">
          </div>
        </div>
      </div>
    </section>
    
    <?php include $_SERVER['DOCUMENT_ROOT'].'/Moduls/footer.php';?>

  </body>
</html>