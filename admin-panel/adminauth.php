<?php
  require_once('../conf.php');
  if(isset($_COOKIE['user'])) {
    header('Location: adminpanel.php');
  }
?>
<!doctype html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/Multimedia-Systems/favicon.ico" type="image/x-icon"/>
    <title>Best Property | Admin</title>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  </head>
<body>

    <div class="admin-login">
      <a href="index.php" title="Comercial agentse Imobiliara" class="logo">
          <img src="images/bl1.png" />
      </a>
      <form action="auth.php" method="post">
        <?php if(!empty($_SESSION['login_error_msg'])): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['login_error_msg']; ?>
          </div>
        <?php unset($_SESSION['login_error_msg']); ?>
        <?php endif; ?>
        <div class="form-group">
            <label for="login" class="col-form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login" />
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input type="password" class="form-control" name="pass" id="pass"  />
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>

</body>
</html>
