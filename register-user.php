<?php require('header.php') ?>

<body>
  <div class="section-banner">
    <h1>Do you want to sell your property?</h1>
  </div>


  <div class="container  align-content-lg-center justify-content-center ">

    <div class="col-lg-6 offset-lg-3 my-5 justify-content-center">
      <h2>Register</h2>
      <form action="submit" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
          <label for="surname">Surname</label>
          <input type="text" class="form-control" name="surname" id="surname" required>
        </div>

        <div class="form-group">
          <label for="agent_type">Agent type</label>
          <select class="form-control" name="agent_type" id="agent_type">
            <option>Physical person</option>
            <option>Juridic person</option>
            <option>Company</option>
          </select>
        </div>

        <div class="form-group">
          <label for="phone_number">Mobile number</label>
          <input type="tel" class="form-control" name="phone_number" id="phone_number" pattern="[+]{1}[0-9]{3}[0-9]{3}[0-9]{5}" required>
        </div>

        <button type="submit" class="btn btn-primary my-3">Register</button>
      </form>
      <div class="text-center">

            <h6>Already have an account?</h6>

            <a name="go_to_reg_page" id="go_to_reg_page" class="link" href="login-user.php" role="button">Login</a>

            </div>
    </div>
  </div>
</body>

</html>