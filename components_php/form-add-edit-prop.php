<?php $action = "Add" ?>
<?php if (isset($_GET['id'])) :
    $property_id = $_GET['id'];
    $action = "Update";
    include "../conf.php"; ?>
    <?php
    ?>
    <script>
        $(document).ready(function() {

            <?php
            $result = $mysql->query("SELECT * FROM `specifications` WHERE id_property = $property_id LIMIT 1;");
            $specifications  = $result->fetch_assoc();
            $result = $mysql->query("SELECT * FROM `adresa` WHERE id_property = $property_id LIMIT 1;");
            $adresa = $result->fetch_assoc();
            $result = $mysql->query("SELECT * FROM `property` WHERE id_property = $property_id LIMIT 1;");
            $property = $result->fetch_assoc();

            foreach ($specifications  as $column_name => $value) : ?>
                $("input[name = <?php echo $column_name ?>]").val("<?php echo $value; ?>");
            <?php endforeach; ?>
            <?php foreach ($adresa as $column_name => $value) : ?>
                $("input[name = <?php echo $column_name ?>]").val("<?php echo $value; ?>");
            <?php endforeach; ?>
            <?php foreach ($property as $column_name => $value) : ?>
                $("input[name = <?php echo $column_name ?>]").val("<?php echo $value; ?>");
                $("textarea[name = <?php echo $column_name ?>]").val("<?php echo $value; ?>");
            <?php endforeach; ?>
            <?php $result = $mysql->query("SELECT n_additionally FROM additionally 
                                    join relation_additionally_property on relation_additionally_property.id_additionally = additionally.id_additionally
                                    where relation_additionally_property.id_property = $property_id");
            while ($additionally = $result->fetch_assoc()) :
                $value = str_replace(" ", "_", $additionally['n_additionally']);
            ?>
                $("input[name = <?php echo $value ?>]").prop("checked", true);
            <?php endwhile; ?>
        });
    </script>
<?php endif;
?>
<script>
    $(document).ready(function() {
        function readonly_by_purchased() {
            if ($("select[name=type_of_purchased]").val() == "Sell") {
                $("input[name=price_per_day]").attr("readonly", true);
                $("input[name=price_per_day]").prop("readonly", true);
                $("input[name=price_per_day]").val("0");
                $("input[name=maximal_trance_period]").attr("readonly", false);
                $("input[name=maximal_trance_period]").prop("readonly", false);
            }
            if ($("select[name=type_of_purchased]").val() == "Rent") {
                $("input[name=price_per_day]").attr("readonly", false);
                $("input[name=price_per_day]").prop("readonly", false);
                $("input[name=maximal_trance_period]").val("0");
                $("input[name=maximal_trance_period]").attr("readonly", true);
                $("input[name=maximal_trance_period]").prop("readonly", true);
            }
        }
        readonly_by_purchased();
        $('select[name=type_of_purchased]').on('change', function() {
            readonly_by_purchased();
        });
    });
</script>

<form class="row" action="" method="post">
    <div class="col-lg-6 first-column">
        <h4>Basic</h4>
        <div class="form-group">
            <label for="ad_title">Ad title</label>
            <input type="select" name="ad_title" class="form-control" id="ad_title" required>
        </div>
        <div class="form-group">
            <label for="ad_description">Ad description</label>
            <textarea class="form-control" name="ad_description" id="ad_desc" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="type_of_purchased">Type of purchase</label>
            <select class="form-control" name="type_of_purchased">
                <option value="Sell">Sell</option>
                <option value="Rent">Rent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type_of_building">Type of building</label>
            <select class="form-control" name="type_of_building">
                <option value="Apartment">Apartment</option>
                <option value="Office">Office</option>
                <option value="House">House</option>
                <option value="Comercial_house">Comercial house</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nr_of_rooms">Nr of rooms </label>
            <input type="number" class="form-control" name="nr_of_rooms" id="price_per_day" placeholder="">
        </div>
        <div class="form-group">
            <label for="nr_of_floors">Nr of floors </label>
            <input type="number" class="form-control" name="nr_of_floors" id="price_per_day" placeholder="">
        </div>
        <div class="form-group">
            <label for="condition_of_offer">Condition of offer</label>
            <select class="form-control" name="condition_of_offer">
                <option value="Old">Old</option>
                <option value="Good">Used</option>
                <option value="New">New</option>
            </select>
        </div>
        <div class="form-group">
            <label for="parking_space">Parking space</label>
            <select class="form-control" name="parking_space">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="year_of_building">Year of building</label>
            <input type="number" class="form-control" name="year_of_building" id="price" placeholder="">
        </div>
        <div class="form-group">
            <label for="total_area">Total area m2</label>
            <input type="text" name="total_area" class="form-control" id="" required>
        </div>
        <div class="form-group">
            <label for="ceiling_height">Ceiling height</label>
            <input type="text" name="ceiling_height" class="form-control" id="">
        </div>
    </div>
    <div class="col-lg-6 second-column">

        <!-- <div class="form-group row pl-3">
            <div class="col-sm-4 form-group form-check price_per_day">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Rent per day?
                </label>
            </div> -->

        <div class="form-group">
            <label for="price_per_day">Price per day </label>
            <input type="number" class="form-control" name="price_per_day" id="price_per_day" placeholder="">
        </div>
        <!-- </div> -->
        <!-- <div class="form-group row pl-3">
            <div class="col-sm-4 form-group form-check maximal_trance_period">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Posibility take in credit?
                </label>
            </div> -->
        <div class="form-group">
            <label for="maximal_trance_period">Loan period (months)</label>
            <input type="number" class="form-control" name="maximal_trance_period" id="loan_period" placeholder="">
        </div>
        <!-- </div> -->
        <div class="form-group">
            <label for="nr_of_balconies">Nr of balconies </label>
            <input type="number" class="form-control" name="nr_of_balconies" id="price_per_day" placeholder="">
        </div>
        <h4>Address</h4>
        <div class="form-group">
            <label for="City">City</label>
            <select class="form-control" name="City" id="city">
                <option value="Funchal">Funchal</option>
                <option value="Lisboa">Lisboa</option>
                <option value="Porto">Porto</option>
            </select>
        </div>
        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" name="street" id="street" placeholder="" required>
        </div>

        <div class="form-group">
            <label for="nr_of_street">Nr. of street</label>
            <input type="number" class="form-control" name="nr_of_street" id="nr_of_street" placeholder="" required>
        </div>

        <h4>Additionaly</h4>
        <div class="additionaly form-group">

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Ready_to_move_in" id="ready_to_move" value="ready_to_move">
                <label class="form-check-label" for="Ready_to_move_in"> Ready to move in</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Autonomous_heating" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Autonomous_heating">Autonomous heating</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="With_household_appliance" value="autonom_heating">
                <label class="form-check-label" for="With_household_appliance">With household appliance</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Furnished" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Furnished">Furnished</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Conditioner" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Conditioner">Conditioner</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Armored_door" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Armored_door">Armored door</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Telephone_line" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for=" Telephone_line">Telephone line</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Smart-Home_system" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Smart-Home_system">Smart-Home system</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Intercom" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Intercom">Intercom</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Internet" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Internet">Internet</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="TV_cable" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="TV_cable">TV cable</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Alarm_system" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Alarm_system">Alarm system</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Video_surveillance" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Video_surveillance">Video surveillance</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Elevator" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Elevator">Elevator</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Childrens_playground" id="autonom_heating" value="autonom_heating">
                <label class="form-check-label" for="Childrens_playground">Childrens playground</label>
            </div>

        </div>

        <h4>Media</h4>
        <div class="form-group form-inline media">
            <label for="images_upload">Add images</label>
            <input type="file" class="form-control-file" name="images_upload" id="images_upload" multiple accept="image/*">
        </div>

    </div>
    <div class="form-group col-lg-6 offset-lg-3">
        <button type="submit" name="<?php echo $action; ?>" class="form-control"><?php echo $action ?></button>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13438.662958682431!2d-16.947666350000002!3d32.64172385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2spt!4v1640806596723!5m2!1sen!2spt" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</form>