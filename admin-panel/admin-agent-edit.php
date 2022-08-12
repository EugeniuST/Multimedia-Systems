<?php
  // Cauta agent dupa ID
  $agent = null;
  if(isset($_GET['id'])) {
    $agent_id = $_GET['id'];
    $result = $mysql->query("SELECT * FROM `agenti` WHERE `id` = '$agent_id' LIMIT 1 ");
    $agent = $result->fetch_assoc();
  }

  // Delete Comercial agent
  if(isset($_POST['button']) && $_POST['button'] == 'delete' && isset($_POST['agent_id'])) {
    $agent_id = $_POST['agent_id'];
    $mysql->query("DELETE FROM agenti WHERE id='$agent_id'");

    $_SESSION['success_msg'] = "Comercial agentul a fost sters cu success.";
    header('Location: adminpanel.php?page=admin-agents');
    die();
  }

  // Edit info about agent
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
<div class="row">
  <div class="col-md-5 offset-md-3">
    <h4 class="mb-5">Edit info about agent</h4>
    <form action="adminpanel.php?page=admin-agent-edit" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $agent['nume']; ?>" />
      </div>
      <div class="form-group">
        <label for="Type_agent">Type:</label>
        <select class="form-control" name="Type_agent">
          <option value="">Comercial agent</option>
          <option value="">Developer</option>
          <option value="">Private person</option>
        </select>
      </div>
      <div class="form-group">
        <label for="phone">Telephone:</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $agent['telefon']; ?>" />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $agent['email']; ?>" />
      </div>
      <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>">
      <style media="screen">
        .flex_row_jstart {
          column-gap: 5%;
          width: 100%;
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: flex-start;
        }

        .flex_row_jstart > button {
          width: 90px;
        }
      </style>
      <div class="flex_row_jstart" style="justify-content: space-between">
        <button type="submit" name="button" value="update" class="btn btn-primary">Edit</button>
        <button type="submit" name="button" value="delete" class="btn btn-danger">Delete</button>
      </div>
    </form>
  </div>
</div>
<?php else: ?>
  <div class="alert alert-danger" role="alert">Comercial agentul selectat nu exista!</div>
<?php endif; ?>
