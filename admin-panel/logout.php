<?php
  session_start();
  unset($_COOKIE['user']); setcookie('user', null, -1, '/');

    header('Location: adminauth.php');
  
?>
