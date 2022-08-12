<?php include "../components_php/search_bar.php"?>
<h2 class="text-center mb-4">Favorite</h2>
<?php include "../conf.php" ?>
<?php $result = $mysql->query("SELECT * FROM property 
      INNER JOIN adresa ON adresa.id_property=property.id_property 
      INNER JOIN property_photos ON property_photos.id_property=property.id_property
      INNER JOIN specifications ON specifications.id_property=property.id_property
      INNER JOIN favorite ON favorite.id_property=property.id_property
      INNER JOIN user ON user.id_user=property.id_user
      " . "where favorite.id_user = " . $_SESSION['user']['id'] . " ORDER BY Time ASC");
?>
<div class = "carousel"> 
  <?php include "../components_php/cards.php" ?>
</div>