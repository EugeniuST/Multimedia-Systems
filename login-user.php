<?php require('header.php') ?>

<body>
    <div class="section-banner">
        <h1>Do you want to sell your property?</h1>
    </div>


    <div class="container  align-content-lg-center justify-content-center">

        <div class="col-lg-6 offset-lg-3 my-5 justify-content-center">

            <h2>Login</h2>

            <form action="submit" method="post">


                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="form-group text-right">
                    <a class="link" href="reset_pass.php">Reset password</a>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Login</button>

            </form>

            <div class="text-center">

                <h6>Don't have an account yet?</h6>

                <a name="go_to_reg_page" id="go_to_reg_page" class="link" href="register-user.php" role="button">Register</a>

            </div>

        </div>

    </div>
</body>

</html>