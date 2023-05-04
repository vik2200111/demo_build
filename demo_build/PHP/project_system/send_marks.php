<?php 

    $CURRENT_SEASON = 7;
    $IS_VOTE_ENABLE = true;

    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/PHP/!config.php';

    $isFirstSendSuccess = false;
    $isSecondSendSuccess = false;

    $projectID = (int)$_POST["projectID"];
    $mark_1 = (int)$_POST["mark_1"];
    $mark_2 = (int)$_POST["mark_2"];
    $mark_3 = (int)$_POST["mark_3"];

    // $projectID = 3;
    // $mark_1 = 4;
    // $mark_2 = 4;
    // $mark_3 = 4;

    if($IS_VOTE_ENABLE == false) 
    {
        $response = ["id" => 7];
        echo json_encode($response);
        die();
    }

    if($projectID == 0 || is_null($mark_1) || is_null($mark_2) || is_null($mark_3)) 
    {
        $response = ["id" => 1];
        echo json_encode($response);
        die();
    }

    if(is_null($_SESSION['user']['id']) || is_null($_SESSION['user']['login']))
    {
        $response = ["id" => 1];
        echo json_encode($response);
        die();
    }

    if(($mark_1 < 1 || $mark_1 > 10) || (($mark_2 < 1 || $mark_2 > 10)) || (($mark_3 < 1 || $mark_3 > 10))) 
    {
        $response = ["id" => 2];
        echo json_encode($response);
        die();
    }

    $connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
    if ($connect->connect_errno)
    {
        $response = ["id" => 3];
        echo json_encode($response);
        die();
    }

    $request = $connect->prepare("SELECT * FROM projects WHERE project_id = :project_id AND season_id = :season_id");
    $request->bindParam(':project_id', $projectID);
    $request->bindParam(':season_id', $CURRENT_SEASON);
    $request->execute();
    $isValid = $request->fetch(PDO::FETCH_ASSOC);

    if($isValid == false)
    {
        $response = ["id" => 8];
        echo json_encode($response);
        die();
    }

    $request = $connect->prepare("SELECT * FROM users_marks WHERE project_id = :project_id AND owner_id = :owner_id");
    $request->bindParam(':project_id', $projectID);
    $request->bindParam(':owner_id', $_SESSION['user']['id']);
    $request->execute();
    $marks = $request->fetch(PDO::FETCH_ASSOC);

    if($marks == false)
    {

        $request = $connect->prepare("INSERT INTO users_marks (owner_id, project_id, mark_1, mark_2, mark_3) VALUES (:user_id, :project_id, :mark_1, :mark_2, :mark_3)");
        $request->bindParam(':user_id', $_SESSION['user']['id']);
        $request->bindParam(':project_id', $projectID);
        $request->bindParam(':mark_1', $mark_1);
        $request->bindParam(':mark_2', $mark_2);
        $request->bindParam(':mark_3', $mark_3);

        $res = $request->execute();
        if($res)
        {
            $isFirstSendSuccess = true;
        }
        else
        {
            $response = ["id" => 4];
            echo json_encode($response);
            die();
        }

        $request = $connect->prepare("UPDATE projects SET mark_1 = mark_1 + :mark_1, mark_2 = mark_2 + :mark_2, mark_3 = mark_3 + :mark_3 WHERE id = :project_id");
        $request->bindParam(':mark_1', $mark_1);
        $request->bindParam(':mark_2', $mark_2);
        $request->bindParam(':mark_3', $mark_3);
        $request->bindParam(':project_id', $projectID);

        $res = $request->execute();
        if($res)
        {
            $isSecondSendSuccess = true;
        }
        else
        {
            $response = ["id" => 5];
            echo json_encode($response);
            die();
        }

        if($isSecondSendSuccess && $isFirstSendSuccess)
        {
            $response = ["id" => 0];
            echo json_encode($response);
        }
    }
    else
    {
        $response = ["id" => 6];
        echo json_encode($response);
    }
?>