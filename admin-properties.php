<?php
$result = $mysql->query("SELECT * FROM `proprietati`");
?>
<p class="text-right mb-5">
  <a href="adminpanel.php?page=admin-property-add" class="btn btn-success">Adauga Proprietate</a>
</p>

<?php if (!empty($_SESSION['success_msg'])) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['success_msg']; ?>
  </div>
  <?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>

<?php $i = 1;
if ($result->num_rows > 0) : ?>
  <table class="table">
    <caption>Lista proprietatilor</caption>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titlu</th>
        <th scope="col">Suprafata</th>
        <th scope="col">Nr. Camere</th>
        <th scope="col">Pret</th>
      </tr>
    </thead>
    <tbody>

      <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td>
            <a class="btn-link" href="adminpanel.php?page=admin-property-edit&id=<?php echo $row['id']; ?>">
              <?php echo $row['titlu']; ?>
            </a>
          </td>
          <td><?php echo $row['suprafata']; ?> m<sup>2</sup></td>
          <td><?php echo $row['camere']; ?> camere</td>
          <td><?php echo $row['pret']; ?>$</td>
        </tr>
      <?php $i++;
      endwhile; ?>

    </tbody>
  </table>

<?php else : ?>
  Nu exista proprietati!
<?php endif; ?>