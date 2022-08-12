<div class="property" id="<?php echo $row['id_property']; ?>">
    <div class="property-image">
        <div class="favorite_symbol d-flex justify-content-center align-items-center">
            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" class="svg-inline--fa fa-heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M462.1 62.86C438.8 41.92 408.9 31.1 378.7 32c-37.49 0-75.33 15.4-103 43.98l-19.7 20.27l-19.7-20.27C208.6 47.4 170.8 32 133.3 32C103.1 32 73.23 41.93 49.04 62.86c-62.14 53.79-65.25 149.7-9.23 207.6l193.2 199.7C239.4 476.7 247.6 480 255.9 480c8.332 0 16.69-3.267 23.01-9.804l193.1-199.7C528.2 212.5 525.1 116.6 462.1 62.86zM437.6 237.1l-181.6 187.8L74.34 237.1C42.1 203.8 34.46 138.1 80.46 99.15c39.9-34.54 94.59-17.5 121.4 10.17l54.17 55.92l54.16-55.92c26.42-27.27 81.26-44.89 121.4-10.17C477.1 138.6 470.5 203.1 437.6 237.1z"></path>
            </svg>
        </div>
        <a href="<?php echo 'proprietate.php?id=' . $row['id_property']; ?>">
            <?php if (strtoupper($row['photo_path']) == "NULL") : ?>
                <img class="no_photo" src="../images/no-image.png" alt="">
            <?php else : ?>
                <img src="../images/<?php echo $row['photo_path']; ?>" alt="">
            <?php endif; ?>
        </a>
    </div>
    <h5>
        <a href="<?php echo 'proprietate.php?id=' . $row['id_property']; ?>">
            <u>
                <?php echo $row['ad_title']; ?>
            </u>
        </a>
    </h5>
    <div class="property-options">
        <ul>
            <li><?php echo $row['City']; ?></li>
            <li><?php echo $row['total_area']; ?> m<sup>2</sup></li>
            <li><?php echo $row['year_of_building']; ?></li>
            <li><?php echo $row['nr_of_rooms']; ?> rooms</li>
        </ul>
    </div>
    <h6><?php echo $row['price']; ?>€/month</h6>
</div>
