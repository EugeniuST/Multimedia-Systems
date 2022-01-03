<?php
  // Add Comercial agents
  if(isset($_POST['button']) && $_POST['button'] == 'submit') {
    if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email'])) {
      $_SESSION['error_msg'] = "Completati toate campurile.";
      header('Location: adminpanel.php?page=admin-agent-add');
      die();
    } else {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $mysql->query("INSERT INTO `agenti` (nume, telefon, email) VALUES ('$name', '$phone', '$email')");

      $_SESSION['success_msg'] = "Comercial agentul a fost creat cu success.";
      header('Location: adminpanel.php?page=admin-agents');
      die();
    }
  }
?>

<div class="row">
  <div class="col-md-5 offset-md-3">
    <h4 class="mb-5">Adauga agent</h4>
    <form action="adminpanel.php?page=admin-agent-add" method="post">
      <?php if(!empty($_SESSION['error_msg'])): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error_msg']; ?>
        </div>
      <?php unset($_SESSION['error_msg']); ?>
      <?php endif; ?>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" id="name" />
      </div>
      <div class="form-group">
        <label for="phone">Telephone:</label>
        <input type="text" name="phone" class="form-control" id="phone">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>

      <button type="submit" name="button" value="submit" class="btn btn-primary">Adauga</button>
    </form>
  </div>
</div>
