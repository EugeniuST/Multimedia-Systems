<?php
include "../conf.php";
session_start();
if (empty($_POST['email']) || empty($_POST['password'])) {
    $email = $_POST['email'];
    $_SESSION["date_login"]['email'] = $email;
    $_SESSION["message_failed"] = "Empty all fields or one!";
    header("Location: ../no-panel-interface/login-user.php");
} else {
    $email = $_POST['email'];
    $_SESSION["date_login"]['email'] = $email;
    $email = htmlspecialchars($email);
    $password = $_POST['password'];


    $email = $mysql->real_escape_string($email);
    $check_user = mysqli_query($mysql, "SELECT * FROM `user` WHERE Email = '$email' limit 1");

    $user = mysqli_fetch_assoc($check_user);
    $bool = password_verify($password, $user["password"]);

    if (mysqli_num_rows($check_user) > 0 && $user["status"] === "1" && $bool) {

        $_SESSION['user'] = [
            "id" => $user['id_user'],
            "first_name" => $user['name'],
            "last_name" => $user['surname'],
            "agent_type" => $user['user_type'],
            "mobile" => $user['Mobile'],
            "email" => $user['email'],
            "token" => $user['token']
        ];

        $_SESSION['auth'] = "Autentificated!";
        header("Location: user-panel.php");
    } elseif (mysqli_num_rows($check_user) === 0) {
        $_SESSION["message_failed"] = "User with this email dont exist!";
        header("Location: ../no-panel-interface/login-user.php");
    } elseif ($bool === False or $user["status"] === "0") {
        $_SESSION["message_failed"] = "Incorrect password!";
        header("Location: ../no-panel-interface/login-user.php");
    } 
}
