<?php 

    include $_SERVER['DOCUMENT_ROOT'].'/PHP/!config.php';

    $user_login = $_POST["user_login"];
    $user_pass = md5($_POST["user_pass"]."12ewr53hjr");
    $user_email = $_POST["user_email"];

    if(is_null($user_login) || is_null($user_pass) || is_null($user_email)) 
    {
        $response = ["id" => 5];
        echo json_encode($response);
    }

    $connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
    if ($connect->connect_errno)
    {
        $response = ["id" => 4];
        echo json_encode($response);
        die();
    }

    $request = $connect->prepare("SELECT * FROM users WHERE login = :user_login");
    $request->bindParam(':user_login', $user_login);
    $request->execute();
    $user = $request->fetch(PDO::FETCH_ASSOC);

    if(!$user)
    {
        $request = $connect->prepare("SELECT * FROM valid_emails WHERE email = :user_mail");
        $request->bindParam(':user_mail', $user_email);
        $request->execute();
        $isValidMail = $request->fetch(PDO::FETCH_ASSOC);

        if($isValidMail)
        {

            $request = $connect->prepare("INSERT INTO users (login, pass, email) VALUES (:user_login, :user_pass, :user_email)");
            $request->bindParam(':user_login', $user_login);
            $request->bindParam(':user_pass', $user_pass);
            $request->bindParam(':user_email', $user_email);
            $res = $request->execute();
            if($res)
            {
                $request = $connect->prepare("DELETE FROM valid_emails WHERE email=:user_mail AND id=:email_id");
                $request->bindParam(':user_mail', $isValidMail['email']);
                $request->bindParam(':email_id', $isValidMail['id']);
                $request->execute();

                $response = ["id" => 1];
                echo json_encode($response);
            }
            else
            {
                $response = ["id" => 3];
                echo json_encode($response);
            }
        }
        else
        {
            $response = ["id" => 6];
            echo json_encode($response);
        }
    }
    else
    {
        $response = ["id" => 2];
        echo json_encode($response);
    }
    
?>