<?php
  require_once('conf.php');
  if(!isset($_COOKIE['user'])) {
    header('Location: adminauth.php');
  }
?>
<!-- Login= eugen1
     pass= 123123 -->
<!doctype html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title>BestImobil | Admin</title>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  </head>
<body>
  <div class="wrapper">
      <!-- Sidebar Holder -->
      <nav id="sidebar" class="">
          <div class="sidebar-header">
              <h3>
                <a href="adminpanel.php">Best Imobil</a>
              </h3>
          </div>

          <ul class="list-unstyled components">
              <p><b>Menu</b></p>
              <li>
                  <a
                    href="adminpanel.php?page=admin-properties"
                    <?php if(isset($_GET['page']) && (
                      $_GET['page'] == 'admin-properties' ||
                      $_GET['page'] == 'admin-property-add' ||
                      $_GET['page'] == 'admin-property-edit'
                    )): ?>
                      class="active"
                    <?php endif; ?>
                  >
                    Proprietati
                  </a>
              </li>
              <li>
                  <a
                    href="adminpanel.php?page=admin-agents"
                    <?php if(isset($_GET['page']) && (
                      $_GET['page'] == 'admin-agents' ||
                      $_GET['page'] == 'admin-agent-add' ||
                      $_GET['page'] == 'admin-agent-edit'
                    )): ?>
                      class="active"
                    <?php endif; ?>
                  >
                    Agenti
                  </a>
              </li>
          </ul>

          <ul class="list-unstyled CTAs">
              <li>
                  <a href="index.php" class="webiste">Best Imobil Website</a>
              </li>
          </ul>
      </nav>

      <!-- Page Content Holder -->
      <div id="content">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="nav navbar-nav ml-auto">
                          <li class="nav-item active">
                              <a class="nav-link" href="#">Admin</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="logout.php">Log out</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <?php if(isset($_GET['page'])): ?>
            <?php if(file_exists($_GET['page'].'.php')): ?>
              <?php require_once($_GET['page'].'.php'); ?>
            <?php else: ?>
              <?php require_once('adminpanel-404.php'); ?>
            <?php endif; ?>
          <?php else: ?>
            <?php require_once('adminpanel-home.php'); ?>
          <?php endif; ?>
      </div>
  </div>
</body>
</html>
