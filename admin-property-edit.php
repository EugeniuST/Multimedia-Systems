<?php
  // Cauta proprietate dupa ID
  $property = null;
  if(isset($_GET['id'])) {
    $property_id = $_GET['id'];
    $result = $mysql->query("SELECT * FROM `proprietati` WHERE `id` = '$property_id' LIMIT 1 ");
    $property = $result->fetch_assoc();
  }

  // Sterge Proprietate
  if(isset($_POST['button']) && $_POST['button'] == 'delete' && isset($_POST['property_id'])) {
    $property_id = $_POST['property_id'];
    $mysql->query("DELETE FROM proprietati WHERE id='$property_id'");

    $_SESSION['success_msg'] = "Proprietatea a fost stearsa cu success.";
    header('Location: adminpanel.php?page=admin-properties&id='.$property_id);
    die();
  }
  // Modifica proprietate
  if(isset($_POST['button']) && $_POST['button'] == 'update' && isset($_POST['property_id'])) {

    $property_id = $_POST['property_id'];
    $result = $mysql->query("SELECT * FROM `proprietati` WHERE `id` = '$property_id' LIMIT 1 ");
    $image = $result->fetch_assoc();
    $image['imagine_1'];

    $titlu = $_POST['titlu'];
    $pret = $_POST['pret'];
    $camere = $_POST['camere'];
    $suprafata = $_POST['suprafata'];
    $anul = $_POST['anul'];
    $tip_achizitie = $_POST['tip_achizitie'];
    $tip_imobil = $_POST['tip_imobil'];
    $oras= $_POST['oras'];
    $descriere= $_POST['descriere'];
    $facilitati = $_POST['facilitati'];
    $imagine_1= $_POST['imagine_1'];
    $imagine_2= $_POST['imagine_2'];
    $imagine_3= $_POST['imagine_3'];
    $imagine_4= $_POST['imagine_4'];
    if(strlen($imagine_1))
      $imagine_1 = $image['imagine_1'];
    if(strlen($imagine2))
      $imagine_2 = $image['imagine_2'];
    if(strlen($imagine_3))
      $imagine_3 = $image['imagine_3'];
    if(strlen($imagine_4))
      $imagine_4 = $image['imagine_4'];

    $mysql->query("UPDATE `proprietati` SET titlu='$titlu',
                                            pret='$pret',
                                            camere='$camere',
                                            suprafata='$suprafata',
                                            anul='$anul',
                                            tip_achizitie='$tip_achizitie',
                                            tip_imobil='$tip_imobil',
                                            oras='$oras',
                                            descriere='$descriere',
                                            facilitati='$facilitati',
                                            imagine_1='$imagine_1',
                                            imagine_2='$imagine_2',
                                            imagine_3='$imagine_3',
                                            imagine_4='$imagine_4'
                                         WHERE id=$property_id
                  ");

    $_SESSION['success_msg'] = "Proprietatea a fost modificata cu success.";
    header('Location: adminpanel.php?page=admin-property-edit&id='.$property_id);
    die();
  }
?>

<?php if(!empty($_SESSION['success_msg'])): ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['success_msg']; ?>
  </div>
<?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>
<?php if($property): ?>
<div class="row mb-5">
  <div class="col-md-5 offset-md-3">
    <form action="adminpanel.php?page=admin-property-edit" method="post" class="text-right">
      <input type="hidden" name="property_id" value="<?php echo $_GET['id']; ?>">
      <button type="submit" name="button" value="delete" class="btn btn-danger">Sterge Proprietate</button>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-5 offset-md-3">
    <h4 class="mb-5">Modifica proprietate</h4>
    <form action="adminpanel.php?page=admin-property-edit" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Titlu:</label>
        <input type="text" name="titlu" class="form-control" id="titlu" value="<?php echo $property['titlu']; ?>"/>
      </div>
      <div class="form-group">
        <label for="pret">Pret:</label>
        <input type="number" name="pret" class="form-control" id="pret" value="<?php echo $property['pret']; ?>">
      </div>
      <div class="form-group">
        <label for="camere">Camere:</label>
        <input type="number" name="camere" class="form-control" id="camere" value="<?php echo $property['camere']; ?>">
      </div>
      <div class="form-group">
        <label for="suprafata">Suprafata (mp):</label>
        <input type="number" name="suprafata" class="form-control" id="suprafata" value="<?php echo $property['suprafata']; ?>">
      </div>
      <div class="form-group">
        <label for="anul">Anul constructiei:</label>
        <input type="number" name="anul" class="form-control" id="anul" value="<?php echo $property['anul']; ?>">
      </div>
      <div class="form-group">
        <label for="tip_achizitie">Tip achizitie:</label>
        <select class="form-control" name="tip_achizitie" id="tip_achizitie">
          <option <?php if($property['tip_achizitie'] == 'Arendeaza') echo "selected"; ?>>
            Arendeaza
          </option>
          <option <?php if($property['tip_achizitie'] == 'Cumpara') echo "selected"; ?>>
            Cumpara
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="tip_imobil">Tip imobil:</label>
        <select class="form-control" name="tip_imobil" id="tip_imobil">
          <option <?php if($property['tip_imobil'] == 'Apartament') echo "selected"; ?>>
            Apartament
          </option>
          <option <?php if($property['tip_imobil'] == 'Casa') echo "selected"; ?>>
            Casa
          </option>
          <option <?php if($property['tip_imobil'] == 'Oficiu') echo "selected"; ?>>
            Oficiu
          </option>
          <option <?php if($property['tip_imobil'] == 'Spatiu comercial') echo "selected"; ?>>
            Spatiu comercial
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="oras">Oras:</label>
        <input type="text" name="oras" class="form-control" id="oras" value="<?php echo $property['oras']; ?>"/>
      </div>
      <div class="form-group">
        <label for="descriere">Descriere:</label>
        <textarea type="text" name="descriere" class="form-control" id="descriere" rows = "10"><?php echo $property['descriere']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="facilitati">Facilitati:</label>
        <textarea type="text" name="facilitati" class="form-control" id="facilitati" rows = "10"><?php
          echo
          $property["facilitati"]
          ;
        ?></textarea>
      </div>
      <div class="form-group">
        <label for="imagine_1">Imagine 1:</label>
        <input type="file" id="imagine_1" name="imagine_1" class="form-control" value="<?php echo $property['imagine_1']; ?>"/>
      </div>
      <div class="form-group">
        <label for="imagine_2">Imagine 2:</label>
        <input type="file" id="imagine_2" name="imagine_2" class="form-control" value="<?php echo $property['imagine_2']; ?>"/>
      </div>
      <div class="form-group">
        <label for="imagine_3">Imagine 3:</label>
        <input type="file" id="imagine_3" name="imagine_3" class="form-control" value="<?php echo $property['imagine_3']; ?>"/>
      </div>
      <div class="form-group">
        <label for="imagine_4">Imagine 4:</label>
        <input type="file" id="imagine_4" name="imagine_4" class="form-control" value="<?php echo $property['imagine_4']; ?>"/>
      </div>

      <input type="hidden" name="property_id" value="<?php echo $_GET['id']; ?>">
      <button type="submit" name="button" value="update" class="btn btn-primary">Modifica</button>
    </form>
  </div>
</div>
<?php endif; ?>
