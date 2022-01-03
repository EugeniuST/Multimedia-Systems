<?php include "../conf.php";
session_start();
if (isset($_POST['register'])) :
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $agent_type = $_POST['agent_type'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    $result = $mysql->query("select  * from user where Email = '" . $email . "' limit 1");
    $i = 0;
    while ($row = $result->fetch_assoc())
        $i = $i + 1;
    if ($i > 0) :
        $_SESSION['message']['email'] = "User with this email already exist!";
    endif;
    if ((strlen($password) <= 15) && (strlen($password) >= 8)) :
        if ($repeat_password != $password) :
            $_SESSION['message']['repeat_password'] = "Password dont match";
        endif;
    else :
        $_SESSION['message']['password'] = "Password is very long or very short";
    endif;

    if (strlen($first_name) > 15 or strlen($first_name) < 2) :
        $_SESSION['message']['first_name'] = "First name is very long or very short";
    endif;

    if (strlen($last_name) > 15 or strlen($last_name) < 2) :
        $_SESSION['message']['last_name'] = "Last name is very long or very short";
    endif;

    if (isset($_SESSION['message'])) :
        $i = 0;
        foreach ($_SESSION['message'] as $column => $value)
            $i = $i + 1;
    endif;
    if ($i > 0) :
        $_SESSION['date_register']['email'] = $email;
        $_SESSION['date_register']['first_name'] = $first_name;
        $_SESSION['date_register']['last_name'] = $last_name;
        $_SESSION['date_register']['agent_type'] = $agent_type;
        $_SESSION['date_register']['phone_number'] = $phone_number;
        header("Location: ../no-panel-interface/register-user.php");
    else :
        $password = password_hash($password,  PASSWORD_DEFAULT);

        $first_name = $mysql->real_escape_string($first_name);
        $last_name = $mysql->real_escape_string($last_name);
        $email = $mysql->real_escape_string($email);

        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);

        mysqli_query($mysql, "INSERT INTO `user` (`id_user`, `Email`, `password`, `name`, `surname`, `user_type`, `status`, `token`, 'Mobile') VALUES (NULL, '$email', '$password', '$first_name', '$last_name', '$agent_type', '0', '$token', '$phone_number')");
        $_SESSION['message_succes'] = "Registration was with succes!";

        $from = 'countdowncontactuab@gmail.com';
        $headersfrom = '';
        $headersfrom .= 'MIME-Version: 1.0' . "\r\n";
        $headersfrom .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headersfrom .= 'From: ' . $from . ' ' . "\r\n";
        $message = "<p>Hey! Salut <b>" . $first_name . "</b>!<br>Recently registered on Best Property. Click <a href='http://localhost/madeira_real_estate_1/Multimedia-Systems/user-panel/user-register.php?token=" . $token . "&action=reg'>HERE</a> for to validate your email.</p>";
        $result = mail($email, 'Confirm email on Best Property', $message, $headersfrom);
        if (!$result) {
            echo "Error";
        } else {
            echo "Success";
        }
        mysqli_close($connect);
        header("Location: ../login-user.php");
    endif;
endif;
