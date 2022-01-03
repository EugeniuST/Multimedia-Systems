<?php include "../conf.php";
session_start();
if (isset($_POST['user-edit-settings'])) :
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $agent_type = $_POST['agent_type'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

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
        header("Location: user-panel.php?page=settings");
    else :
        $password = password_hash($password,  PASSWORD_DEFAULT);

        $first_name = $mysql->real_escape_string($first_name);
        $last_name = $mysql->real_escape_string($last_name);
        $email = $mysql->real_escape_string($email);

        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);

        $mysql->query("UPDATE `user` SET name='$first_name',
        surname='$last_name',
        password='$password',
        Mobile='$phone_number',
        user_type='$agent_type'
     WHERE id=$property_id
");
        $_SESSION['message_success'] = "Updated information was with succes!";

        mysqli_close($connect);
        header("Location: user-panel.php?page=settings");
    endif;
endif;
