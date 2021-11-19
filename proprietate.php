<?php require_once('conf.php'); ?>
<?php
  if (isset($_GET['id']) && $_GET['id'] != NULL) {
    $proprietate_id = $_GET['id'];
  } else {
    die('ERROR 404.');
  }

  $result = $mysql->query("SELECT * FROM `proprietati` join agenti on agenti.id = proprietati.id_agent WHERE proprietati.id = '$proprietate_id' LIMIT 1 ");
  $proprietate = $result->fetch_assoc();

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


    <section class="section-property">
        <div class="property-image">
            <div class="container">
                <ul class="useful-links">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fas fa-phone"></i>
                            <?php echo $proprietate['telefon']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo 'mailto:'.$proprietate['email']; ?>">
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
                    <li>
                        <a href="javascript:void(0)" class="listing-share-link">
                            <i class="fas fa-heart"></i>
                            Save
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="property-title">
                    <div class="property-col">
                        <h2><?php echo $proprietate['titlu']; ?></h2>
                    </div>
                    <div class="property-col">
                        <h2 class="text-right"><?php echo $proprietate['pret']; ?>$/lună</h2>
                    </div>
                </div>
                <div class="images-for-wrap">
                    <div class="images-for">
                        <?php if(isset($proprietate['imagine_1'])): ?>
                        <div>
                            <img src="<?php echo $proprietate['imagine_1']; ?>" />
                        </div>
                        <?php endif; ?>
                        <?php if(isset($proprietate['imagine_2'])): ?>
                        <div>
                            <img src="<?php echo $proprietate['imagine_2']; ?>" />
                        </div>
                        <?php endif; ?>
                        <?php if(isset($proprietate['imagine_3'])): ?>
                        <div>
                            <img src="<?php echo $proprietate['imagine_3']; ?>" />
                        </div>
                        <?php endif; ?>
                        <?php if(isset($proprietate['imagine_4'])): ?>
                        <div>
                            <img src="<?php echo $proprietate['imagine_4']; ?>" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <button class="slick-btn-prev"><i class="fas fa-angle-left"></i></button>
                    <button class="slick-btn-next"><i class="fas fa-angle-right"></i></button>
                </div>
                <div class="images-nav">
                    <div>
                          <img src="<?php echo $proprietate['imagine_1']; ?>" />
                    </div>
                    <div>
                          <img src="<?php echo $proprietate['imagine_2']; ?>" />
                    </div>
                    <div>
                          <img src="<?php echo $proprietate['imagine_3']; ?>" />
                    </div>
                    <div>
                          <img src="<?php echo $proprietate['imagine_4']; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="property-details">
            <div class="container">
                <div class="property-details-text">
                    <h3>Descriere</h3>
                    <p><?php echo $proprietate['descriere']; ?>
                    </p>
                </div>
                <div class="property-details-form">
                    <h5 class="text-center">
                        <i class="fas fa-shield-alt"></i>
                        <?php echo $proprietate['nume']; ?>
                    </h5>
                    <div class="contact-property">
                        <form>
                            <div class="form-field">
                                <input name="name" placeholder="Prenume, Nume" required />
                            </div>
                            <div class="form-field">
                                <input name="email" placeholder="Adresa de Email" required />
                            </div>
                            <div class="form-field">
                                <input name="nr_telefon" placeholder="Nr. de Telefon" required />
                            </div>
                            <div class="form-field">
                                <button id = "contact_mail" type="button">CONTACTEAZĂ</button>
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
            <h3>Facilități</h3>
            <ul>
              <?php
                $facilitati_array = explode(", ", $proprietate['facilitati']);
                for ($i = 0; $i < count($facilitati_array); $i++) {
                  echo "
                  <li><i class='fas fa-check'></i>".$facilitati_array[$i]."</li>
                  ";
                }
               ?>
            </ul>
        </div>
    </section><!-- .section-amenities -->

    <section class="section-map">
        <div class="container">
            <h3>Oficiul nostru</h3>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5697.976885630815!2d26.065324655525252!3d44.43339928869624!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b201dbbe0b8639%3A0xeca7ba35fbc72d4d!2sCotroceni%20National%20Museum!5e0!3m2!1sen!2s!4v1619726043071!5m2!1sen!2s"  width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
	<!-- .section-map -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
  $( document ).ready(function() {
    $( "#contact_mail" ).on( "click", function() {
      var name = $("input[name='name']").val();
      var email = $("input[name='email']").val();
      var telefon = $("input[name='nr_telefon']").val();
      if(name.length!=0 && email.length!=0 && telefon.length!=0) {
        $.ajax({
          type: "POST",
          url: "mail.php",
          data: {nume_proprietate: "<?php echo $proprietate['titlu'] ?>", pret: "<?php echo $proprietate['pret'] ?>", name: name, email: email, telefon: telefon, contact_proprietate: "1"},
          success: function(data)
          {
            $("input[name='name']").val(null);
            $("input[name='email']").val(null);
            $("input[name='telefon']").val(null);
          }
        });
      }
    });
  });
  </script>
  <?php require_once('footer.php'); ?>
