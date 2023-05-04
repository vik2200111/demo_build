<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/PHP/!config.php';
    
    $user_login = $_POST["user_login"];
    $user_pass = md5($_POST["user_pass"]."12ewr53hjr");

    if(is_null($user_login) || is_null($user_pass)) 
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

    $request = $connect->prepare("SELECT * FROM users WHERE login = :user_login AND pass = :user_pass");
    $request->bindParam(':user_login', $user_login);
    $request->bindParam(':user_pass', $user_pass);
    $request->execute();
    $user = $request->fetch(PDO::FETCH_ASSOC);
    
    if($user)
    {
        $_SESSION['user'] = 
        [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email']
        ];
        $response = ["id" => 1];
        echo json_encode($response);
    }
    else
    {
        $response = ["id" => 2];
        echo json_encode($response);
    }

?>