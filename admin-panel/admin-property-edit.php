<?php
  // Cauta property dupa ID
  $property = null;
  if(isset($_GET['id'])) {
    $property_id = $_GET['id'];
    $result = $mysql->query("SELECT * FROM `proprietati` WHERE `id` = '$property_id' LIMIT 1 ");
    $property = $result->fetch_assoc();
  }

  // Delete Property
  if(isset($_POST['button']) && $_POST['button'] == 'delete' && isset($_POST['property_id'])) {
    $property_id = $_POST['property_id'];
    $mysql->query("DELETE FROM proprietati WHERE id='$property_id'");

    $_SESSION['success_msg'] = "Proprietatea a fost stearsa cu success.";
    header('Location: adminpanel.php?page=admin-properties&id='.$property_id);
    die();
  }
  // Edit property
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
<div class="row">
  <div class="col-md-5 offset-md-3">
    <h4 class="mb-5">Edit property</h4>
    <form action="adminpanel.php?page=admin-property-edit" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Title:</label>
        <input type="text" name="titlu" class="form-control" id="titlu" value="<?php echo $property['titlu']; ?>"/>
      </div>
      <div class="form-group">
        <label for="pret">Price:</label>
        <input type="number" name="pret" class="form-control" id="pret" value="<?php echo $property['pret']; ?>">
      </div>
      <div class="form-group">
        <label for="camere">Rooms:</label>
        <input type="number" name="camere" class="form-control" id="camere" value="<?php echo $property['camere']; ?>">
      </div>
      <div class="form-group">
        <label for="suprafata">Area (m2):</label>
        <input type="number" name="suprafata" class="form-control" id="suprafata" value="<?php echo $property['suprafata']; ?>">
      </div>
      <div class="form-group">
        <label for="anul">Year of building:</label>
        <input type="number" name="anul" class="form-control" id="anul" value="<?php echo $property['anul']; ?>">
      </div>
      <div class="form-group">
        <label for="tip_achizitie">Type of purchased:</label>
        <select class="form-control" name="tip_achizitie" id="tip_achizitie">
          <option <?php if($property['tip_achizitie'] == 'To rent') echo "selected"; ?>>
            To rent
          </option>
          <option <?php if($property['tip_achizitie'] == 'To buy') echo "selected"; ?>>
            To buy
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="tip_imobil">Type of building:</label>
        <select class="form-control" name="tip_imobil" id="tip_imobil">
          <option <?php if($property['tip_imobil'] == 'Apartament') echo "selected"; ?>>
            Apartament
          </option>
          <option <?php if($property['tip_imobil'] == 'House') echo "selected"; ?>>
            House
          </option>
          <option <?php if($property['tip_imobil'] == 'Office') echo "selected"; ?>>
            Office
          </option>
          <option <?php if($property['tip_imobil'] == 'Comercial space') echo "selected"; ?>>
            Comercial space
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="oras">City:</label>
        <input type="text" name="oras" class="form-control" id="oras" value="<?php echo $property['oras']; ?>"/>
      </div>
      <div class="form-group">
        <label for="oras">Address:</label>
        <input type="text" name="oras" class="form-control" id="oras" value="<?php echo $property['oras']; ?>"/>
      </div>
      <div class="form-group">
        <label for="">Email agent:</label>
        <select class="form-control" name="">
          <option value="">Agent1@gmail.com</option>
          <option value="">Agent2@gmail.com</option>
        </select>
      </div>
      <div class="form-group">
        <label for="descriere">Description:</label>
        <textarea type="text" name="descriere" class="form-control" id="descriere" rows = "10"><?php echo $property['descriere']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="facilitati">Facilities:</label>
        <style media="screen">
        .flex_row_jstart {
            column-gap: 5%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
        }

        .flex_row_jstart label {
          margin: 0;
        }
        </style>
        <div class="flex_row_jstart" style="flex-wrap: wrap;">
          <div class="flex_row_jstart">
            <input type="checkbox" name="Ready" value="">
            <label for="Ready">Ready to move in</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Separate" value="">
            <label for="Separate">Separate entrance</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Equipied" value="">
            <label for="Equipied">With household appliances</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Furnished" value="">
            <label for="Furnished">Furnished</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Autonomous" value="">
            <label for="Autonomous">Autonomous heating</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Conditioner" value="">
            <label for="Conditioner">Conditioner</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Armor" value="">
            <label for="Armor">Armored door</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Telephone" value="">
            <label for="Telephone">Telephone line</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Smart" value="">
            <label for="Smart">Smart Home system</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Intercom" value="">
            <label for="Intercom">Intercom</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Internet" value="">
            <label for="Internet">Internet</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Cable" value="">
            <label for="Cable">TV cable</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Alarm" value="">
            <label for="Alarm">Alarm system</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Video" value="">
            <label for="Video">Video surveillance</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Elevator" value="">
            <label for="Elevator">Elevator</label>
          </div>
          <div class="flex_row_jstart">
            <input type="checkbox" name="Child" value="">
            <label for="Child">Children's playground</label>
          </div>
        </div>

        <!-- <textarea type="text" name="facilitati" class="form-control" id="facilitati" rows = "10">
          <?php echo
          $property["facilitati"];
          ?>
      </textarea> -->
      </div>
      <div class="form-group">
        <label for="imagine_1">Image1:</label>
        <input type="file" id="imagine_1" name="imagine_1" class="form-control" value="<?php echo $property['imagine_1']; ?>"/>
      </div>
      <div class="form-group">
        <label for="imagine_2">Image2:</label>
        <input type="file" id="imagine_2" name="imagine_2" class="form-control" value="<?php echo $property['imagine_2']; ?>"/>
      </div>
      <div class="form-group">
        <label for="imagine_3">Image3:</label>
        <input type="file" id="imagine_3" name="imagine_3" class="form-control" value="<?php echo $property['imagine_3']; ?>"/>
      </div>
      <div class="form-group">
        <label for="imagine_4">Image4:</label>
        <input type="file" id="imagine_4" name="imagine_4" class="form-control" value="<?php echo $property['imagine_4']; ?>"/>
      </div>

      <input type="hidden" name="property_id" value="<?php echo $_GET['id']; ?>">
      <style media="screen">
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
<?php endif; ?>
