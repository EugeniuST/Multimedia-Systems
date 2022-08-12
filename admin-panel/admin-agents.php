<?php
  $result = $mysql->query("SELECT * FROM `agenti`");
?>
<p class="text-right mb-5">
  <a href="adminpanel.php?page=admin-agent-add" class="btn btn-success">Add Comercial agents</a>
</p>

<?php if(!empty($_SESSION['success_msg'])): ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['success_msg']; ?>
  </div>
<?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>

<?php if ($result->num_rows > 0): ?>
  <table class="table">
    <caption>Lista agentilor</caption>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Telephone</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>

    <?php $i = 1; while( $row = $result->fetch_assoc() ): ?>
      <tr>
        <th scope="row"><?php echo $i;?></th>
        <td>
          <a class="btn-link" href="adminpanel.php?page=admin-agent-edit&id=<?php echo $row['id']; ?>">
            <?php echo $row['nume']; ?>
          </a>
        </td>
        <td><?php echo $row['telefon']; ?></td>
        <td><?php echo $row['email']; ?></td>
      </tr>
    <?php $i++; endwhile; ?>

  </tbody>
</table>

<?php else: ?>
    Nu exista agenti!
<?php endif; ?>
