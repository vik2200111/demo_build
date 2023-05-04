<?php

$CURRENT_SEASON = 7;
$IS_VOTE_ENABLE = true;

$projects = [];
$marks = [];

session_start();
if ($_SESSION['user'])
{
    include $_SERVER['DOCUMENT_ROOT'] . '/PHP/!config.php';

    $connect = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);
    if ($connect->connect_errno) 
    {
        echo "Connect error!";
        die();
    }

    $request = $connect->prepare("SELECT * FROM projects WHERE season_id = :curent_season");
    $request->bindParam(':curent_season', $CURRENT_SEASON);
    $request->execute();
    $projects = $request->fetchAll();

    foreach ($projects as &$project) 
    {
        $request = $connect->prepare("SELECT mark_1, mark_2, mark_3 FROM users_marks WHERE owner_id = :user_id AND project_id = :project_id");
        $request->bindParam(':user_id', $_SESSION['user']['id']);
        $request->bindParam(':project_id', $project['id']);
        $request->execute();
        $res = $request->fetch(PDO::FETCH_ASSOC);
        array_push($marks, $res);
    }

    if (!$projects) 
    {
        echo "Season id error!";
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Голосование</title>

  <link rel="shortcut icon" href="resources/favicons/main_favicon.png" type="image/png" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/ModalFrame.css" />
  <link rel="stylesheet" href="CSS/reg_system.css" />
  <link rel="stylesheet" href="CSS/comment_system.css" />
  <link rel="stylesheet" href="CSS/projects_voting.css" />

  <script type="text/javascript" src="https://vk.com/js/api/openapi.js?169"></script>
  <script type="text/javascript" src="https://kit.fontawesome.com/738b08a700.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="JavaScripts/for_style.js" defer></script>
  <script type="text/javascript" src="JavaScripts/reg_system.js" defer></script>
  <script type="text/javascript" src="JavaScripts/voting_system.js" defer></script>
  <script type="text/javascript" src="JavaScripts/comment_system.js" defer></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <header>
    <div class="shadow"></div>
  </header>
 
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Moduls/header.php'; ?>
  <?php if($_SESSION['user']):?>
    <?php if($IS_VOTE_ENABLE):?>
    <ul style = "visibility: hidden;" id="send_marks_status"><li class="warning">1</li></ul>
    <section class="project_section">
      <table class="table_with_projects">
        <thead>

        <tr>
          <th class = "number">№</th>
          <th class>Название</th>
          <th class = "mark">Наука</th>
          <th class = "mark">Техника</th>
          <th class = "mark">Креатив</th>
        </tr>
        </thead>

        <?php
            for ($i=0; $i < count($projects); $i++) 
            { 
              $pID = $projects[$i]['project_id'];
              $upID = $projects[$i]['id'];

              if($marks[$i]['mark_1'])
              {
                echo sprintf(
                "
                <tbody>
                  <tr class = 'confrimed'>
                    <td>%d</td>
                    <td class = name><a class = 'project_link_name' href='/projects/%d/%d.php'>%s</a></td>
                "
                , $pID, $CURRENT_SEASON, $pID, $projects[$i]['name']);

                echo sprintf(
                "
                    <td>%d</td>
                    <td>%d</td>
                    <td>%d</td>
                    <td class = 'table_button'><button class = 'show_chat_button' data-comment_table_button_id=%d>
                      <i class='fas fa-comments'></i>
                    </button></td>
                  </tr>
                "
                , $marks[$i]['mark_1'], $marks[$i]['mark_2'], $marks[$i]['mark_3'], $upID);
              }
              else
              {
                echo sprintf(
                "
                <tbody>
                  <tr>
                    <td>%d</td>
                    <td class = name><a class = 'project_link_name' href='/projects/%d/%d.php'>%s</a></td>
                "
                , $pID, $CURRENT_SEASON, $pID, $projects[$i]['name']);

                echo sprintf(
                "
                    <form data-pID=%d onsubmit='return false;'>
                      <td><input class='mark_input' data-pID=%d type='number' required  min='1' max='10' title='Наука'></td>
                      <td><input class='mark_input' data-pID=%d type='number' required  min='1' max='10' title='Техника'></td>
                      <td><input class='mark_input' data-pID=%d type='number' required  min='1' max='10' title='Креатив'></td>
                      <td class = 'table_button'>
                          <button class='mark_send_button' data-pID=%d type='submit'>
                            <i class='fas fa-pencil-alt'></i>
                          </button>
                          <button class = 'show_chat_button' data-comment_table_button_id=%d style='display: none;'>
                            <i class='fas fa-comments'></i>
                          </button>
                      </td>
                    </form>
                  </tr>
                "
                , $upID, $upID, $upID, $upID, $upID, $upID);
              }

              echo sprintf(
              "
                <tr class = 'chat_table' data-comment_table_box_id = %d>
                  <td colspan='5'>
                    <div class='comment_system_box' data-comment_box_id=%d></div>
                    <form class='send_comment'>   
                      <input type='text' class='comment_system_input' data-comment_box_id=%d />
                      <button class='comment_system_button' data-comment_box_id=%d>Отправить</button>
                    </form>
                  </td>
                </tr>
                </tbody>
              "
                , $upID, $upID, $upID, $upID);
            }
        ?>

      </table>
    </section>
    <?php else:?>
      <section class="project_section">
        <h1 style = 
        "
          width: 70%;
          text-align: center;
          font-size: 6vw;
        " >К сожалению, оценивание проектов <?php echo $CURRENT_SEASON ?> сезона завершено.</h1>
      </section>
    <?php  endif; ?>
  <?php else:?>
    <section class="project_section">
        <h1 style = 
        "
          width: 70%;
          text-align: center;
          font-size: 6vw;
        " >Чтобы проголосовать, нужно войти в свой аккаунт.</h1>
      </section>
  <?php  endif; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/Moduls/footer.php'; ?> 

</body>

</html>