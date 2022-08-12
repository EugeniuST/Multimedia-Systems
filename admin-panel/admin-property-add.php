<?php
  // Add propriety
  if(isset($_POST['button']) && $_POST['button'] == 'submit') {
    $titlu = $_POST['titlu'];
    $pret = $_POST['pret'];
    $camere = $_POST['camere'];
    $suprafata = $_POST['suprafata'];
    $anul = $_POST['anul'];
    $tip_achizitie = $_POST['tip_achizitie'];
    $tip_imobil = $_POST['tip_imobil'];
    $oras= $_POST['oras'];
    $facilitati= $_POST['facilitati'];
    $descriere= $_POST['descriere'];
    $id_agent= $_POST['id_agent'];
    $imagine_1= "images/".$_POST['imagine_1'];
    $imagine_2= "images/".$_POST['imagine_2'];
    $imagine_3= "images/".$_POST['imagine_3'];
    $imagine_4= "images/".$_POST['imagine_4'];

    if(isset($_POST['upload'])){
    $target = "images/" . basename($_FILES['imagine_1']['name']);
    $db = mysqli_conect("localhost", "root", "", "finalweb");
    $image = "images/".$_FILES['imagine_1']['name'];
    $sql= "INSERT INTO images (imagine_1) VALUES ('$imagine_1')";
    mysqli_query($db, $sql);
  }

    $mysql->query("INSERT INTO `proprietati` (id_agent, titlu, pret, camere, suprafata, anul, tip_achizitie, tip_imobil, oras, descriere, facilitati, imagine_1, imagine_2, imagine_3, imagine_4)
                   VALUES ('$id_agent','$titlu', '$pret', '$camere', '$suprafata', '$anul', '$tip_achizitie', '$tip_imobil', '$oras', '$descriere','$facilitati', '$imagine_1', '$imagine_2', '$imagine_3', '$imagine_4')
                 ");

    $_SESSION['success_msg'] = "Proprietatea a fost creata cu success.";
    header('Location: adminpanel.php?page=admin-properties');
    die();
  }
?>

<div class="row">
  <div class="col-md-5 offset-md-3">
    <h4 class="mb-5">Add propriety</h4>
    <form action="adminpanel.php?page=admin-property-add" method="post">
      <?php if(!empty($_SESSION['error_msg'])): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error_msg']; ?>
        </div>
      <?php unset($_SESSION['error_msg']); ?>
      <?php endif; ?>

      <div class="form-group">
        <label for="name">Title:</label>
        <input type="text" name="titlu" class="form-control" id="titlu" />
      </div>
      <div class="form-group">
        <label for="pret">Price:</label>
        <input type="number" name="pret" class="form-control" id="pret">
      </div>
      <div class="form-group">
        <label for="id_agent">Id-ul agentului:</label>
        <?php $result = $mysql->query("SELECT id from agenti;");  ?>
            <select class="form-control" name="id_agent">
              <?php
              while($id_agent = mysqli_fetch_assoc($result)){
                echo "
                  <option id='agent-".$id_agent['id']."'>".$id_agent['id']."</option>
                ";
              }
              ?>
            </select>
      </div>
      <div class="form-group">
        <label for="camere">Room:</label>
        <input type="number" name="camere" class="form-control" id="camere">
      </div>
      <div class="form-group">
        <label for="suprafata">Area (mp):</label>
        <input type="number" name="suprafata" class="form-control" id="suprafata">
      </div>
      <div class="form-group">
        <label for="anul">Year of building:</label>
        <input type="number" name="anul" class="form-control" id="anul">
      </div>
      <div class="form-group">
        <label for="tip_achizitie">Type of action:</label>
        <select class="form-control" name="tip_achizitie" id="tip_achizitie">
          <option>To rent</option>
          <option>To buy</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tip_imobil">Building type:</label>
        <select class="form-control" name="tip_imobil" id="tip_imobil">
          <option>Apartament</option>
          <option>House</option>
          <option>Office</option>
          <option>Comercial space</option>
        </select>
      </div>
      <div class="form-group">
        <label for="oras">City:</label>
        <input type="text" name="oras" class="form-control" id="oras" value=""/>
      </div>
      <div class="form-group">
        <label for="descriere">Description:</label>
        <textarea type="text" name="descriere" class="form-control" id="descriere" rows = "10"></textarea>
      </div>
      <div class="form-group">
        <label for="facilitati">Facilities:</label>
        <textarea type="text" name="facilitati" class="form-control" id="facilitati" rows = "10"></textarea>
      </div>
      <div class="form-group">
        <label for="imagine_1">Image1:</label>
        <input type="file" id="imagine_1" name="imagine_1" class="form-control" >
      </div>
      <div class="form-group">
        <label for="imagine_2">Image2:</label>
        <input type="file" id="imagine_2" name="imagine_2" class="form-control">
      </div>
      <div class="form-group">
        <label for="imagine_3">Image3:</label>
        <input type="file" id="imagine_3" name="imagine_3" class="form-control">
      </div>
      <div class="form-group">
        <label for="imagine_4">Image4:</label>
        <input type="file" id="imagine_4" name="imagine_4" class="form-control">
      </div>
      <button type="submit" name="button" value="submit" class="btn btn-primary">Adauga</button>
    </form>
  </div>
</div>
