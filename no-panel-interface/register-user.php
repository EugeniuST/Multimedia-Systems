<?php require('../components_php/header.php') ?>
<?php session_start() ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<?php
if (isset($_SESSION['message'])) :
?>
  <script>
    $(document).ready(function() {
      <?php foreach ($_SESSION['message'] as $name_column => $value) : ?>
        $("label[for = '<?php echo $name_column ?>']").parent().children('div').prepend('<div class="alert alert-warning" role="alert"><?php echo $value ?></div> ');
      <?php endforeach; ?>
      <?php foreach ($_SESSION['date_register'] as $name_column => $value) : ?>
        $("label[for = '<?php echo $name_column ?>']").parent().children('div').children('.form-control').val('<?php echo $_SESSION['date_register'][$name_column] ?>');
      <?php endforeach; ?>
    });
  </script>
<?php endif; ?>

<body>
  <div class="section-banner">
    <h1 class="text-center title_register_login">Do you want to sell your property?</h1>
  </div>
  <div class="container  align-content-lg-center justify-content-center ">
    <div class="col-lg-6 offset-lg-3 my-5">
      <div class=" row">
        <h2 class="text-center col-sm-9 offset-sm-3 mb-3">Register</h2>
      </div>
      <form action="../user-panel/user-register.php" method="post">
        <div class="form-group row">
          <label for="email" class="col-sm-3">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3" for="first_name">First name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="first_name" id="name" required>
          </div>
          <small id="emailHelp" class="col-sm-9 offset-sm-3 form-text text-muted">First name must be between 2-15 chracters.</small>
        </div>

        <div class="form-group row">
          <label class="col-sm-3" for="last_name">Last name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="last_name" id="surname" required>
          </div>
          <small id="emailHelp" class="col-sm-9 offset-sm-3 form-text text-muted">First name must be between 2-15 chracters.</small>
        </div>

        <div class="form-group row">
          <label for="agent_type" class="col-sm-3">Agent type</label>
          <div class="col-sm-9">
            <select class="form-control" name="agent_type" id="agent_type">
              <option>Physical person</option>
              <option>Comercial agent</option>
              <option>Company</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="phone_number" class="col-sm-3">Mobile number</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="phone_number" id="phone_number" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3" for="password">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" required>
          </div>
          <small id="emailHelp" class="col-sm-9 offset-sm-3 form-text text-muted">Password must be between 8-15 chracters.</small>
        </div>
        <div class="form-group row">
          <label class="col-sm-3" for="repeat_password">Re Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="repeat_password" id="password" aria-describedby="helpId">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-9 offset-sm-3">
            <button type="submit" name="register" class="btn btn-primary mt-3">Register</button>
          </div>
        </div>
        <div class="row">
          <div class="text-center col-sm-9 offset-sm-3">
            <h6>Already have an account?</h6>
            <a name="go_to_reg_page" id="go_to_reg_page" class="link" href="login-user.php" role="button"><u>Login</u></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<?php
if (isset($_SESSION['message']))
  foreach ($_SESSION['message'] as $name_column => $value) :
    unset($_SESSION['message'][$name_column]);
  endforeach; ?>
<?php
if (isset($_SESSION['date_register']))
  foreach ($_SESSION['date_register'] as $name_column => $value) :
    unset($_SESSION['date_register'][$name_column]);
  endforeach; ?>
<?php include "components_php/footer.php" ?>