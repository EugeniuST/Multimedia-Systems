<!DOCTYPE html>
<html lang="eng">
<?php
require_once "../conf.php";
session_start(); ?>

<body>
  <div class="wrapper">
    <!-- Sidebar Holder -->

    <?php include "../components_php/side-bar.php" ?>

    <!-- Page Content Holder -->
    <div id="content">

      <?php if (isset($_GET['page'])) : ?>
        <?php if (file_exists($_GET['page'] . '.php')) : ?>
          <?php require_once $_GET['page'] . '.php'; ?>
        <?php else : ?>
          <?php require_once '../admin-panel/adminpanel-404.php'; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>

</body>

</html>