<?php
  // Cauta agent dupa ID
  $agent = null;
  if(isset($_GET['id'])) {
    $agent_id = $_GET['id'];
    $result = $mysql->query("SELECT * FROM `agenti` WHERE `id` = '$agent_id' LIMIT 1 ");
    $agent = $result->fetch_assoc();
  }

  // Sterge Agent
  if(isset($_POST['button']) && $_POST['button'] == 'delete' && isset($_POST['agent_id'])) {
    $agent_id = $_POST['agent_id'];
    $mysql->query("DELETE FROM agenti WHERE id='$agent_id'");

    $_SESSION['success_msg'] = "Agentul a fost sters cu success.";
    header('Location: adminpanel.php?page=admin-agents');
    die();
  }

  // Modifica datele agentului
  if(isset($_POST['button']) && $_POST['button'] == 'update' && isset($_POST['agent_id'])) {
    $agent_id = $_POST['agent_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $mysql->query("UPDATE `agenti` SET nume='$name', telefon='$phone', email='$email' WHERE id=$agent_id");

    $_SESSION['success_msg'] = "Datele agentului au fost modificate cu success.";
    header('Location: adminpanel.php?page=admin-agent-edit&id='.$agent_id);
    die();
  }
?>

<?php if(!empty($_SESSION['success_msg'])): ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['success_msg']; ?>
  </div>
<?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>

<?php if($agent): ?>
<div class="row mb-5">
  <div class="col-md-5 offset-md-3">
    <form action="adminpanel.php?page=admin-agent-edit" method="post" class="text-right">
      <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>">
      <button type="submit" name="button" value="delete" class="btn btn-danger">Sterge Agent</button>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-5 offset-md-3">
    <h4 class="mb-5">Modifica datele agentului</h4>
    <form action="adminpanel.php?page=admin-agent-edit" method="post">
      <div class="form-group">
        <label for="name">Nume:</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $agent['nume']; ?>" />
      </div>
      <div class="form-group">
        <label for="phone">Telefon:</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $agent['telefon']; ?>" />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $agent['email']; ?>" />
      </div>

      <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>">
      <button type="submit" name="button" value="update" class="btn btn-primary">Modifica</button>
    </form>
  </div>
</div>
<?php else: ?>
  <div class="alert alert-danger" role="alert">Agentul selectat nu exista!</div>
<?php endif; ?>
