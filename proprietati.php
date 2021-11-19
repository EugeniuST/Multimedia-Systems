<?php require_once('conf.php'); ?>
<?php
  $result = $mysql->query("SELECT * FROM `proprietati`");
  $title = 'Proprietati';
$tip_achizitie = $_GET['tip_achizitie'] ?? '';
$tip_imobil = $_GET['tip_imobil'] ?? '';
$oras = $_GET['oras'] ?? '';
$where = '';

if($tip_achizitie || $tip_imobil || $oras) {
  $title = 'Rezultatele cautarii:';
  $where = "WHERE";
}

if($tip_achizitie) $where .= " `tip_achizitie` = '$tip_achizitie' ";
if($tip_achizitie && $tip_imobil) $where .= 'AND';
if($tip_imobil) $where .= " `tip_imobil` = '$tip_imobil' ";
if(($tip_achizitie && $oras) || ($tip_imobil && $oras)) $where .= 'AND';
if($oras) $where .= " `oras` = '$oras' ";


 // var_dump("SELECT * FROM `proprietati` " . $where);
 // die();
$result = $mysql->query("SELECT * FROM `proprietati` " . $where);
?>
<?php require_once('header.php'); ?>

<div class="overlay">
       <a class="close">&times;</a>
         <div class="overlay__content">
           <a href="index.php">Acasă</a>
           <a href="proprietati.php">Imobile</a>
           <a href="index.php#aboutus">Despre noi</a>
           <a href="index.php#contacts">Contacte</a>
         </div>
     </div>

   <!--MENU BUTTON-->
    <section class="section-properties" id="properties">
        <div class="container">

            <h1>Proprietati</h1>

            <?php if ($result->num_rows > 0): ?>
                <div class="properties">
                <?php while( $row = $result->fetch_assoc() ): ?>
                  <div class="property">
                      <div class="property-image">
                          <a href="<?php echo 'proprietate.php?id='.$row['id']; ?>">
                              <?php if($row['imagine_1']): ?>
                                  <img src="<?php echo $row['imagine_1']; ?>" />
                              <?php endif; ?>
                          </a>
                      </div>
                      <h5>
                          <a href="<?php echo 'proprietate.php?id='.$row['id']; ?>">
                            <?php echo $row['titlu']; ?>
                          </a>
                      </h5>
                      <div class="property-options">
                          <ul>
                              <li>Suprafața totală</li>
                              <li><?php echo $row['suprafata']; ?> m<sup>2</sup></li>
                              <li><?php echo $row['camere']; ?> camere</li>
                              <li><?php echo $row['anul']; ?></li>
                          </ul>
                      </div>
                      <h6><?php echo $row['pret']; ?>$/lună</h6>
                  </div>
                <?php endwhile; ?>
                </div>
            <?php else: ?>
                Nu exista proprietati!
            <?php endif; ?>
        </div>
    </section>

<?php require_once('footer.php'); ?>
