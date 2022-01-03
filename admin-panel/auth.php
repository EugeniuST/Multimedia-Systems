<?php
    require_once('conf.php');

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if(empty($login) || empty($pass)) {
      $_SESSION['login_error_msg'] = "Campurile nu au fost completate.";
      header('Location: adminauth.php');
      die();
    }

    $pass = md5($pass);

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();

    if($user == 0) {
      $_SESSION['login_error_msg'] = "Utilizatorul nu este gasit.";
      header('Location: adminauth.php');
      die();
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close();

    header('Location: adminpanel.php');
?>
