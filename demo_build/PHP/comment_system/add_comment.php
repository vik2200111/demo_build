<?php 

    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/PHP/!config.php';

    if(!$_SESSION['user'])
    {
        $response = ["id" => 2];
        echo json_encode($response);
        die();
    }

    $comment_box_id = $_POST["comment_box_id"];
    $comment_message = $_POST["comment_message"];

    if(is_null($comment_box_id) || is_null($comment_message)) 
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

    $request = $connect->prepare("INSERT INTO comments (box_id, owner_id, message) VALUES (:box_id, :owner_id, :comment_message)");
    $request->bindParam(':box_id', $comment_box_id);
    $request->bindParam(':owner_id', $_SESSION['user']['id']);
    $request->bindParam(':comment_message', $comment_message);
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