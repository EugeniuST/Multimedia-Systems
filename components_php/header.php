<!DOCTYPE html>
<html lang="ro" dir="ltr">
<?php include "../conf.php";
session_start(); ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="/Multimedia-Systems/favicon.ico" type="image/x-icon" />
  <title> Best Property </title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css" />
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/slick.css">
  <link rel="stylesheet" href="../styles/slick-theme.css">
  <link rel="stylesheet" href="../styles_new/universal.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<header id="header">
  <div class="container">
    <div class="header-left">
      <button id="btn-menu" type="button">menu</button>
      <a href="index.php" title="Comercial agentse Imobiliara" class="logo">
        <div class="icon">
          <img style="width: 60px" src="../images/bl1.png" alt="">
          <h1>Best Property</h1>
        </div>
      </a>
    </div>

    <div class="header-right">
      <ul class="header-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="proprietati.php">Real Estates</a></li>
        <li><a href="index.php#aboutus">About Us</a></li>
        <li><a href="index.php#contactus">Contacts</a></li>
        <?php if (isset($_SESSION['auth']) == FALSE) : ?>
          <div class="header-element text-center btn-group">
            <a class='btn btn-outline-primary login_btn' href="../no-panel-interface/login-user.php">Login</a>
            <a class='btn btn-outline-primary' href="../no-panel-interface/register-user.php">Register</a>
          </div>
        <?php else : ?>
          <div class="header-element text-center btn-group">
            <a class='btn btn-outline-primary login_btn' href="../user-panel/user-panel.php">My Account</a>
          </div>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</header>

</html>