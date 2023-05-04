<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/PHP/!config.php';
    
    $user_question = $_POST["user_question"];

    if(is_null($user_question)) 
    {
        $response = ["id" => 5];
        echo json_encode($response);
        die();
    }

    $connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
    if ($connect->connect_errno)
    {
        $response = ["id" => 4];
        echo json_encode($response);
        die();
    }

    $request = $connect->prepare("INSERT INTO user_questions (owner_id, question) VALUES (:user_id, :user_question)");
    $request->bindParam(':user_id', $_SESSION['user']['id']);
    $request->bindParam(':user_question', $user_question);
    $res = $request->execute();
    if($res)
    {
        $response = ["id" => 1];
        echo json_encode($response);
    }
    else
    {
        $response = ["id" => 3];
        echo json_encode($response);
    }
?>