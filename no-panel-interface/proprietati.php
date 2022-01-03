<?php require_once('../conf.php'); ?>
<?php $title = 'Properties';
$type_of_purchased = $_GET['type_of_purchased'] ?? '';
if ($type_of_purchased == "All") :
  unset($type_of_purchased);
endif;
$type_of_bulding = $_GET['type_of_bulding'] ?? '';
if ($type_of_bulding == "All")
  unset($type_of_bulding);
$City = $_GET['City'] ?? '';
if ($City == "All")
  unset($City);
$where = '';

if ($type_of_purchased || $type_of_bulding || $City) {
  $title = 'Results of searching:';
  $where = "WHERE";
}

if ($type_of_purchased) $where .= " `type_of_purchased` = '$type_of_purchased' ";
if ($type_of_purchased && $type_of_bulding) $where .= 'AND';
if ($type_of_bulding) $where .= " `type_of_building` = '$type_of_bulding' ";
if (($type_of_purchased && $City) || ($type_of_bulding && $City)) $where .= 'AND';
if ($City) $where .= " `City` = '$City' "; ?>

<?php if (isset($_POST['where_trecut']))
  $where = $_POST['where_trecut'] ?>

<?php require_once('../components_php/header.php'); ?>

<div class="overlay">
  <a class="close">&times;</a>
  <div class="overlay__content">
    <a href="index.php">Home</a>
    <a href="proprietati.php">Real Estate</a>
    <a href="index.php#aboutus">About Us</a>
    <a href="index.php#contacts">Contact</a>
  </div>
</div>

<!--MENU BUTTON-->
<section class="section-properties" id="properties">
  <div class="container">

    <div class="flex-column">
      <h1 class="text-center">Properties</h1>
      <div class="form-group sort_filter">
        <button class="d-flex justtify-content-center align-items-center btn-menu form-control filter_button">
          <p>
            Filter
          </p>
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" class="svg-inline--fa fa-filter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M504.6 84.19L320 306.8v149.2c0 19.52-21.97 30.7-37.75 19.66l-80-55.98C195.8 415.2 192 407.8 192 400V306.8L7.375 84.19C-9.965 63.28 5.213 32 32.7 32h446.6C506.8 32 521.1 63.28 504.6 84.19z"></path>
          </svg>
        </button>
      </div>
    </div>

    <?php $result = $mysql->query("SELECT * FROM property 
      INNER JOIN adresa ON adresa.id_property=property.id_property 
      INNER JOIN property_photos ON property_photos.id_property=property.id_property
      INNER JOIN specifications ON specifications.id_property=property.id_property
      " . $where . "ORDER BY Time ASC");
    ?>
    <?php if ($result->num_rows > 0) : ?>
      <div class="d-lg-flex flex-row justify-content-between properties_filter">

        <div class="columns-2">
          <?php include "../components_php/cards.php" ?>
        </div>
        <div class="form">

          <form class="d-lg-flex flex-column justify-content-start" action="proprietati.html" method="post">
            <div class="form-group d-lg-flex flex-column justify-content-start">
              <label for="">Sort by</label>
              <select class="form-control form-select" name="">
                <option value="">Price - asc</option>
                <option value="">Price - desc</option>
                <option value="">New - added</option>
                <option value="">Old - added</option>
              </select>
            </div>

            <?php $group_selectors = array("City", "type_of_purchased", "type_of_building", "condition_of_offer", "parking_space") ?>
            <?php foreach ($group_selectors as $selector) : ?>

              <div class="form-group d-lg-flex flex-column justify-content-start">
                <label for=""><?php $title_group = explode('_', ucfirst($selector));
                              foreach ($title_group as $title_group_single) echo $title_group_single . " "; ?></label>
                <?php if ($title_group = "Type of building") : ?>
                  <select class="form-control form-select" name="">
                  <?php else : ?>
                    <select class="form-control form-select" name="">
                    <?php endif; ?>
                    <option value="">All</option>
                    <?php $result = $mysql->query("select * from all_spec " . $where . "  group by " . $selector);
                    while ($row = $result->fetch_assoc()) : ?>
                      <option value="<?php echo $row[$selector] ?>"><?php echo $row[$selector] ?></option>
                    <?php endwhile; ?>
                    </select>
              </div>

            <?php endforeach; ?>

            <?php $group_ranges = array("price", "year_of_building", "total_area") ?>
            <?php foreach ($group_ranges as $selector) : ?>
              <?php $result = $mysql->query("select  * from all_spec " . $where . "  group by " . $selector . " order by " . $selector . " ASC limit 1");
              while ($row = $result->fetch_assoc()) {
                $min = $row[$selector];
              }
              $result = $mysql->query("select  * from all_spec " . $where . "  group by " . $selector . " order by " . $selector . " DESC limit 1");
              while ($row = $result->fetch_assoc()) {
                $max = $row[$selector];
              } ?>

              <div class="form-group d-lg-flex flex-column justify-content-start">
                <label for=""><?php $title_group = explode('_', ucfirst($selector));
                              foreach ($title_group as $title_group_single) {
                                echo $title_group_single . " ";
                              }
                              if ($title_group_single == "area")
                                echo " m2";
                              else if ($title_group_single == "Price")
                                echo " €" ?></label>
                <div class="form-row d-lg-flex flex-row justify-content-start align-items-center range">
                  <div class="col">
                    <input type="number" class="form-control" name="" value="<?php echo $min; ?>">
                  </div>
                  <div class="col">
                    <input type="number" class="form-control" name="" value="<?php echo $max; ?>">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <?php $group_checkboxex = array("nr_of_rooms", "floor", "nr_of_balconies", "n_additionally") ?>
            <?php foreach ($group_checkboxex as $selector) : ?>

              <div class="d-lg-flex flex-column justify-content-start form-group">
                <label for=""><?php $title_group = explode('_', ucfirst($selector));
                              foreach ($title_group as $title_group_single) {
                                if ($title_group_single == "N") : ?>
                      <div class="text-primary"> <b>Additionally</b> </div>
                      <?php break; ?>
                  <?php endif;
                                echo $title_group_single . " ";
                              } ?>
                </label>
                <div class="div_checboxes">
                  <?php $result = $mysql->query("select  * from all_spec " . $where . "  group by " . $selector);
                  while ($row = $result->fetch_assoc()) : ?>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="" value="" id="beedrooms">
                      <label class="form-check-label" for="beedrooms"><?php if ($title_group_single == "rooms") echo 'T';
                                                                      echo $row[$selector] ?></label>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="buttons_for_filter d-lg-flex flex-row justify-content-between align-items-center">
              <button type="submit" name="button">Save</button>
              <button class="btn-reject" type="submit" name="button">Reset</button>
            </div>

          </form>
        </div>
      </div>

    <?php else : ?>
      There are no properties!
    <?php endif; ?>

  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $(".filter_button").click(function() {
      var display = $('.filter_button').css('display');
      if (display != "none") {
        // do this...
        $(".form").css("display", "block");
      } else {
        $(".form").css("display", "none");
      }
    });
    $(".btn-reject").click(function() {

    });
  });
</script>

<?php require_once('../components_php/footer.php'); ?>