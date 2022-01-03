<?php require('../components_php/header.php') ?>
<?php session_start(); ?>
<?php
if (isset($_SESSION['message_failed'])) :
?>
    <script>
        $(document).ready(function() {
            <?php foreach ($_SESSION['date_login'] as $name_column => $value) : ?>
                $("label[for = '<?php echo $name_column ?>']").parent().children('div').children('.form-control').val('<?php echo $_SESSION['date_login'][$name_column] ?>');
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
            <div class="row">
                <h2 class="text-center col-sm-9 offset-sm-3 mb-3">Login</h2>
            </div>
            <?php if (isset($_SESSION['message_succes'])) : ?>
                <div class="col-lg-9 offset-lg-3 alert alert-success d-flex justify-content-center" role="alert">
                    You have succesful registered!
                </div>
            <?php elseif (isset($_SESSION['message_failed'])) : ?>
                <div class="col-lg-9 offset-lg-3 alert alert-warning d-flex justify-content-center" role="alert">
                    <?php echo $_SESSION['message_failed'] ?>
                </div>
            <?php endif; ?>
            <form action="../user-panel/user-auth.php" method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3" for="password">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
                    </div>
                </div>
                <div class="form-group link text-right">
                    <a href="reset_pass.php">Forgot password?</a>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary mt-0">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center col-sm-9 offset-sm-3">
                        <h6>Don't have account yet?</h6>
                        <a name="go_to_reg_page" id="go_to_reg_page" class="link" href="register-user.php" role="button"><u>Register</u></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<?php
if (isset($_SESSION['message_succes']))
    unset($_SESSION['message_succes']);
if (isset($_SESSION['message_failed']))
    unset($_SESSION['message_failed']);
if (isset($_SESSION['date_login']['email']))
    unset($_SESSION['date_login']['email']);
?>
<?php include "components_php/footer.php" ?>