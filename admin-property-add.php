<?php
// Adauga Proprietate
if (isset($_POST['button']) && $_POST['button'] == 'submit') {
  $titlu = $_POST['titlu'];
  $pret = $_POST['pret'];
  $camere = $_POST['camere'];
  $suprafata = $_POST['suprafata'];
  $anul = $_POST['anul'];
  $tip_achizitie = $_POST['tip_achizitie'];
  $tip_imobil = $_POST['tip_imobil'];
  $oras = $_POST['oras'];
  $facilitati = $_POST['facilitati'];
  $descriere = $_POST['descriere'];
  $id_agent = $_POST['id_agent'];
  $imagine_1 = "images/" . $_POST['imagine_1'];
  $imagine_2 = "images/" . $_POST['imagine_2'];
  $imagine_3 = "images/" . $_POST['imagine_3'];
  $imagine_4 = "images/" . $_POST['imagine_4'];

  if (isset($_POST['upload'])) {
    $target = "images/" . basename($_FILES['imagine_1']['name']);
    $db = mysqli_connect("localhost", "root", "", "finalweb");
    $image = "images/" . $_FILES['imagine_1']['name'];
    $sql = "INSERT INTO images (imagine_1) VALUES ('$imagine_1')";
    mysqli_query($db, $sql);
  }

  $mysql->query("INSERT INTO `proprietati` (id_agent, titlu, pret, camere, suprafata, anul, tip_achizitie, tip_imobil, oras, descriere, facilitati, imagine_1, imagine_2, imagine_3, imagine_4)
                   VALUES ('$id_agent','$titlu', '$pret', '$camere', '$suprafata', '$anul', '$tip_achizitie', '$tip_imobil', '$oras', '$descriere','$facilitati', '$imagine_1', '$imagine_2', '$imagine_3', '$imagine_4')
                 ");

  $_SESSION['success_msg'] = "Property created successfully";
  header('Location: adminpanel.php?page=admin-properties');
  die();
}
?>
<h2> Add property </h2>
<div class="row">
  <div class="col-lg-6 first-column">
    <h4>Basic info</h4>
    <form action="adminpanel.php?page=admin-property-add" method="post">
      <?php if (!empty($_SESSION['error_msg'])) : ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error_msg']; ?>
        </div>
        <?php unset($_SESSION['error_msg']); ?>
      <?php endif; ?>

      <div class="form-group">
        <label for="type_of_building">Type of building</label>
        <?php $result = $mysql->query("SELECT id from agenti;");  ?>
        <select class="form-control" name="type_of_building">
          <?php
          while ($id_agent = mysqli_fetch_assoc($result)) {
            echo "
                  <option id='agent-" . $id_agent['id'] . "'>" . $id_agent['id'] . "</option>
                ";
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="type_of_purchase">Type of purchase</label>
        <?php $result = $mysql->query("SELECT id from agenti;");  ?>
        <select class="form-control" name="type_of_purchase">
          <?php
          while ($id_agent = mysqli_fetch_assoc($result)) {
            echo "
                  <option id='agent-" . $id_agent['id'] . "'>" . $id_agent['id'] . "</option>
                ";
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="ad_title">Ad title</label>
        <input type="select" name="ad_title" class="form-control" id="ad_title">
      </div>

      <div class="form-group">
        <label for="ad_desc">Ad description</label>
        <textarea class="form-control" name="ad_desc" id="ad_desc" rows="3"></textarea>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="">
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="rent" id="rent" value="rent"> Are you renting?
        </label>
      </div>

      <div class="form-group">
        <label for="price_per_day">Price per day</label>
        <input type="number" class="form-control" name="price_per_day" id="price_per_day" placeholder="">
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="max_loan_period" id="max_loan_period" value="max_loan_period"> Max loan payment
        </label>
      </div>

      <div class="form-group">
        <label for="loan_period">Loan period (months)</label>
        <input type="number" class="form-control" name="loan_period" id="loan_period" placeholder="">
      </div>

  </div>
  <div class="col-lg-6 second-column">

    <h4>Address</h4>
    <div class="form-group">
      <label for="city">City</label>
      <select class="form-control" name="city" id="city">
        <option>Funchal</option>
        <option>Chisinau</option>
        <option>Falesti</option>
      </select>
    </div>

    <div class="form-group">
      <label for="street">Street</label>
      <input type="text" class="form-control" name="street" id="street" placeholder="">
    </div>

    <div class="form-group">
      <label for="nr_of_street">Nr. of street</label>
      <input type="number" class="form-control" name="nr_of_street" id="nr_of_street" placeholder="">
    </div>

    <h4>Additionaly</h4>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="ready_to_move" id="ready_to_move" value="ready_to_move"> Ready to move in
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="autonom_heating" id="autonom_heating" value="autonom_heating"> Autonomous heating
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="household_appliance" id="household_appliance" value="household_appliance"> With household appliance
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="furnished" id="furnished" value="furnished"> Furnished
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="conditioner" id="conditioner" value="conditioner"> Conditioner
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="armored_door" id="armored_door" value="armored_door"> Armored door
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="telephone_line" id="telephone_line" value="telephone_line"> Telephone line
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="smart_home" id="smart_home" value="smart_home"> Smart-Home system
      </label>
    </div>

    <!-- this is the line -->
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="intercom" id="intercom" value="intercom"> Intercom
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="internet" id="internet" value="internet"> Internet
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="tv_cable" id="tv_cable" value="tv_cable"> TV cable
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="alarm_system" id="alarm_system" value="alarm_system"> Alarm system
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="video_surveillance" id="video_surveillance" value="video_surveillance"> Video surveillance
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="elevator" id="elevator" value="elevator"> Elevator
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="playground" id="playground" value="playground"> Children's playground
      </label>
    </div>

    <h4>Media</h4>
    <div class="form-group">
      <label for="images_upload">Add images</label>
      <input type="file" class="form-control-file" name="images_upload" id="images_upload" multiple accept="image/*">
    </div>

  </div>
  <h4>Choose your location </h4>
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13438.662958682431!2d-16.947666350000002!3d32.64172385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2spt!4v1640806596723!5m2!1sen!2spt" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

  </form>

</div>