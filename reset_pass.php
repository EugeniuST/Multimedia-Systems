<?php require('components_php/header.php') ?>

<body>
    <div class="section-banner">
        <h1 class="text-center title_register_login">Do you want to sell your property?</h1>
    </div>


    <div class="container  align-content-lg-center justify-content-center ">

        <div class="col-lg-6 offset-lg-3 my-5">
            <div class="row">
                <h2 class="text-center col-sm-10 offset-sm-2 mb-3">Reset</h2>
            </div>
            <form action="submit" method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
                    </div>
                </div>
                <div class="form-group link text-right">
                    <a href="login-user.php">Remember password?</a>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary mt-0">Next</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>

<?php include "components_php/footer.php" ?>

</html>