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

    if(is_null($comment_box_id)) 
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

    $request = $connect->prepare("SELECT users.login, comments.message FROM comments JOIN users ON users.id = comments.owner_id WHERE comments.box_id = :box_id");
    $request->bindParam(':box_id', $comment_box_id);
    $request->execute();
    $comments = $request->fetchAll(PDO::FETCH_ASSOC);
    
    if($comments)
    {
        $response = 
        [
            "id" => 1,
            // "login" => $comments['login'],
            // "message" => $comments['message']
            "comments" => $comments
        ];
        echo json_encode($response);
    }
    else
    {
        $response = ["id" => 3];
        echo json_encode($response);
    }
    
?>