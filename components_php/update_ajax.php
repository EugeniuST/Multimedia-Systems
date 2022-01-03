<?php
include "../conf.php";
session_start();
if (isset($_SESSION['auth']) === FALSE)
    header('Location: ..login-user.php');
if (isset($_POST['favorite_update'])) :
    $user = $_SESSION['user']['id'];
    $id_property = $_POST['id_property'];
    $result = $mysql->query("Select * from favorite where id_user = '".$user."' and id_property = '".$id_property."'");
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $i = $i + 1;
    }
    if ($i > 0) :
        $mysql->query("DELETE FROM favorite WHERE id_user='$user' and id_property = '$id_property'");
    else :
        $mysql->query("INSERT INTO `favorite` (id_favorite, id_user, id_property) VALUES (NULL, '$user', '$id_property')");
    endif;
endif;
