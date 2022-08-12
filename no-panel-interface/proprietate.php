<?php require_once('conf.php'); ?>
<?php
if (isset($_GET['id']) && $_GET['id'] != NULL) {
    $property_id = $_GET['id'];
} else {
    die('ERROR 404.');
}
$result = $mysql->query("SELECT * FROM all_spec WHERE id_property = " . $property_id . " LIMIT 1 ");
$property = $result->fetch_assoc();

?>
<?php require_once('components_php/header.php'); ?>

<div class="overlay">
    <a class="close">&times;</a>
    <div class="overlay__content">
        <a href="index.php">Acasă</a>
        <a href="proprietati.php">Real Estates</a>
        <a href="index.php#aboutus">About US</a>
        <a href="index.php#contacts">Contacts</a>
    </div>
</div>
<!--MENU BUTTON-->

<section class="section-property">
    <div class="property-image">
        <div class="container">
            <ul class="useful-links">
                <li>
                    <a href="javascript:void(0)">
                        <i class="fas fa-phone"></i>
                        <?php echo $property['Mobile']; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo 'mailto:' . $property['Email']; ?>">
                        <i class="fas fa-envelope"></i>
                        Email
                    </a>
                </li>
                <li>
                    <a href="javascript:window.print()">
                        <i class="fas fa-print"></i>
                        Print
                    </a>
                </li>
                <li >
                    <a href="javascript:void(0)" class="save-color listing-share-link">
                        <i class="fas fa-heart"></i>
                        Save
                    </a>
                </li>
            </ul>
            <hr>
            <div class="property-title">
                <div class="property-col">
                    <h2><?php echo $property['ad_title']; ?></h2>
                </div>
                <div class="property-col">
                    <h2 class="text-right"><?php echo $property['price']; ?>$/lună</h2>
                </div>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <?php $single_photo = "False";
                if (strtoupper($property['photo_path']) == "NULL") :
                    $single_photo = "True";
                else :
                    $photos = explode('&', $property['photo_path']);
                endif; ?>
                <?php if ($single_photo == "False") : ?>
                    <ol class="carousel-indicators">
                        <?php $i = 0;
                        foreach ($photos as $photo) : ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to=" <?php echo $i ?> " class="<?php if ($i == 0) echo 'active'; ?>"></li>
                        <?php endforeach;; ?>
                    </ol>
                <?php endif; ?>

                <div class="carousel-inner">
                    <?php if ($single_photo == "True") : ?>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/no-image.png" alt="">
                        </div>
                    <?php else : ?>
                        <?php foreach ($photos as $photo) : ?>
                            <div>
                                <img class="d-block w-100" src=" <?php echo $photo ?> " alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <?php if ($single_photo == "False") : ?>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="property-details">
        <div class="container">
            <div class="property-details-text">
                <h3> <b>Description</b></h3>
                <p><?php echo $property['ad_description']; ?>
                </p>
            </div>
            <div class="property-details-form">
                <h5 class="text-center"></h5>
                <i class="fas fa-shield-alt"></i>
                <?php echo ucwords($property['prenume/nume']); ?>
                </h5>
                <div class="contact-property">
                    <form>
                        <div class="form-field">
                            <input name="name" placeholder="1-st Name, 2-nd Name" required />
                        </div>
                        <div class="form-field">
                            <input name="email" placeholder="Email address" required />
                        </div>
                        <div class="form-field">
                            <input name="nr_telefon" placeholder="Nr. de Telephone" required />
                        </div>
                        <div class="form-field">
                            <button id="contact_mail" type="button">Contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- .section-details -->

<section class="section-amenities">
    <div class="container">
        <h3> <b>Facilități</b></h3>
        <ul>
            <li class="denumire_categorie_li text-center">
                <h3> <b>Basic</b></h3>
            </li>
            <?php
            $reject_specifications = ["id_specification", "id_user", "id_property"];
            $result = $mysql->query("select  * from specifications where id_property = " . $property['id_property'] . " limit 1");
            $row = $result->fetch_assoc();
            foreach ($row as $specification => $value)
                if (in_array($specification, $reject_specifications) == FALSE) :
            ?>
                <li><?php
                    $specification = explode('_', ucfirst($specification));
                    $words_spec = "";
                    foreach ($specification as $word_spec) $words_spec = $words_spec . $word_spec . " ";
                    $words_spec = $words_spec . "- " . $value;
                    echo $words_spec; ?>
                </li>
            <?php endif; ?>
            <li class="denumire_categorie_li text-center additionally">
                <h3><b>Additionally</b></h3>
            </li>
            <?php $result = $mysql->query("select * from relation_additionally_property 
                                            join additionally on additionally.id_additionally = relation_additionally_property.id_additionally
                                            where id_property = " . $property['id_property']);
            while ($row = $result->fetch_assoc()) :
            ?>
                <li><i class='fas fa-check'></i><?php echo $row['n_additionally'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
</section><!-- .section-amenities -->

<section class="section-map">
    <div class="container">
        <div class="d-flex flex-row align-items-center">
            <svg class = "" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                <path fill="currentColor" d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"></path>
            </svg>
            <h3 class=""><b><?php echo $property['City']?></b><?php echo ", ".$property['street']." ".$property['nr_of_street']?></h3>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5697.976885630815!2d26.065324655525252!3d44.43339928869624!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b201dbbe0b8639%3A0xeca7ba35fbc72d4d!2sCotroceni%20National%20Museum!5e0!3m2!1sen!2s!4v1619726043071!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>
<!-- .section-map -->
<?php require_once('footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>