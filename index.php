<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="ro" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title> BestImobil </title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/slick.css">
    <link rel="stylesheet" href="styles/slick-theme.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
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

<section class="section-banner">
    <div class="container">
        <form id="search" action="proprietati.php" method="GET">
            <h1>Găssadasdsaește-ți casa ideală</h1>
            <div class="form-field">
                <select name="tip_achizitie">
                    <option value="">-Tip achizitie-</option>
                    <option value="Cumpara">Cumpără</option>
                    <option value="Arendeaza">Arendează</option>
                </select>
            </div>
            <div class="form-field">
                <select name="tip_imobil">
                    <option value="">-Tip imobil-</option>
                    <option value="Apartament">Apartament</option>
                    <option value="Oficiu">Oficiu</option>
                    <option value="Casa">Casă</option>
		                <option value="Spatiu comercial">Spatiu comercial</option>
                </select>
            </div>
            <div class="form-field">
              <select name="oras">
                <?php
                include "conf.php";
                $result = $mysql->query("SELECT oras FROM proprietati group by oras;");
                while($option = $result->fetch_assoc())
                echo "
                  <option value='".$option['oras']."'>-".$option['oras']."-</option>
                ";
                ?>
              </select>
            </div>
            <div class="form-field">
                <button type="submit">CAUTĂ</button>
            </div>
        </form>
    </div>
</section>
<!-- .section-banner -->

<section class="section-properties" id="properties">
    <div class="container">
        <h1>Oferte fierbinți</h1>
        <div class="properties">
            <div class="property">
                <div class="property-image">
                    <a href="proprietate.php?id=1">
                        <img src="images/office-1.png" />
                    </a>
                </div>
                <h5>
                    <a href="proprietate.php?id=1">Telecentru, DUMBRAVEI</a>
                </h5>
                <div class="property-options">
                    <ul>
                        <li>Suprafața totală</li>
                        <li>1300 m<sup>2</sup></li>
                        <li>4 camere</li>
                        <li>2019</li>
                    </ul>
                </div>
                <h6>1200€/lună</h6>
            </div>
            <div class="property">
                <div class="property-image">
                    <a href="proprietate.php?id=2">
                        <img src="images/office-2.jfif" />
                    </a>
                </div>
                <h5>
                    <a href="proprietate.php?id=2">Centru, ȘTEFAN CEL MARE</a>
                </h5>
                <div class="property-options">
                    <ul>
                        <li>Suprafața totală</li>
                        <li>900 m<sup>2</sup></li>
                        <li>3 camere</li>
                        <li>2019</li>
                    </ul>
                </div>
                <h6>500€/lună</h6>
            </div>
            <div class="property last">
                <div class="property-image">
                    <a href="proprietate.php?id=4">
                        <img src="images/buiucani-oficiu1.jpg" />
                    </a>
                </div>
                <h5>
                    <a href="proprietate.php?id=4"> Buiucani, ALba Iulia 25</a>
                </h5>
                <div class="property-options">
                    <ul>
                        <li>Suprafața totală</li>
                        <li>230 m<sup>2</sup></li>
                        <li>3 camere</li>
                        <li>1990</li>
                    </ul>
                </div>
                <h6>1000$/lună</h6>
            </div>
        </div>
    </div>
</section>
<!-- .section-properties -->

<section class="section-testimonials" id="testimonials">
    <div class="container">
        <h1>Recenzii</h1>
        <div class="testimonials ">
            <div class="testimonials-item">
                <div class="testimonials-thumbnail">
                    <img src="images/testimonial_1.jpg">
                </div>
                <h6 class="testimonials-title">Aurelia E. Bogza</h6>
                <div class="testimonials-position">CEO at Pixies Inc.</div>
                <div class="testimonials-description">
                    <p>
                        <em>Am închiriat cu bine proprietăți prin această companie de peste 5 ani și am fost mereu extrem de fericită cu munca lor.
                        </em>
                    </p>
                </div>
            </div>

            <div class="testimonials-item">
                <div class="testimonials-thumbnail">
                    <img src="images/testimonial_2.jpg">
                </div>
                <h6 class="testimonials-title">Dumitru Costel</h6>
                <div class="testimonials-position">Manager of Leogrand.</div>

                <div class="testimonials-description">
                    <p>
                        <em>Am fost extrem de impresionați de serviciul oferit de BestImobil, sunt foarte prompți și profesioniști.
                        </em>
                    </p>
                </div>
            </div>

            <div class="testimonials-item">
                <div class="testimonials-thumbnail">
                    <img src="images/testimonial_3.jpg">
                </div>
                <h6 class="testimonials-title">Alexandra Ioana</h6>
                <div class="testimonials-position">Director at JustConsult.</div>

                <div class="testimonials-description">
                    <p><em>Multumesc pentru tot. Închiriez prin această agenție de mai bine de 5 ani și nu am avut niciodată o problemă cu ei.
                       </em>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- .section-testimonials -->

<section class="section-about" id="aboutus">
    <div class="container">
        <h1>Despre noi</h1>
        <div class="about">
            <div class="about-image">
                <img src="images/about.jpg">
            </div>
            <div class="about-text">
              <h3>BestImobil</h3>
              <h6>A fost înființată în București ca o companie concentrată spre satisfacerea eficientă a clienților și deservirea lor la cea mai înaltă calitate în toate solicitările din imobiliare..</h6>
              <br>
              <p>În timp, compania domină piața imobiliară din România prin orientare către client, oferindu-i atît o susținere profesională, cît și înțelegerea nevoilor personale. În urma lucrului cu oamenii, activitatea noastră a devenit o pasiune pentru fiecare dintre noi.</p>
              <p>Gama serviciilor prestate de noi este variată și complexă, pentru că avem cea mai mare bază de date imobiliare și depunem maximum efort întru realizarea tuturor necesităților clienților</p>
            </div>
        </div>
    </div>
</section>
<!-- .section-about -->

<section class="section-contact" id="contacts">
    <div class="container">
        <h1>Contacte</h1>
        <div class="contact">
            <div class="contact-text">
              <h3>Adresa București</h3>
		            <h5>București, bd. Gr Vieru, 12/1</h5>
              <p>
                 Ne dorim ca fiecare client să își procure locuința visurilor, din acest motiv adunăm în baza noastră de date cele mai avantajoase oferte imobiliare la prețuri accesibile. Ne dorim să fim recunoscuți ca un partener de încredere care livrează servicii imobiliare profesioniste, salvând timp, bani și nervi clienților noștri.
              </p>
            </div>
            <div class="contact-form">
                <form id="contactus">
                    <div class="form-field">
                        <input type = "text" name="name" placeholder="Numele dvs." required />
                    </div>
                    <div class="form-field">
                        <input type="email" name="email" placeholder="Adresa de  Email" required />
                    </div>
                    <div class="form-field">
                      <textarea id = "message" name="message" placeholder="Mesajul...">Mesajul...</textarea>
                    </div>
                    <div class="form-field">
                        <button type="submit" id= "contact_mail" name = "contact_mail">TRIMITE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$( document ).ready(function() {
  $( "textarea[name = 'message']" ).on( "click", function() {
    $("textarea").val(null);
  });

  $(document).on('keyup',function(evt) {
    if (evt.keyCode == 27) {
      $("textarea").val("Mesajul...");
    }
  });

  $( "#contact_mail" ).on( "click", function() {
    var name = $("input[name='name']").val();
    var email = $("input[name='email']").val();
    var message = $("#message").val();
    if(name.length!=0 && email.length!=0 && message.length!=0) {
      $.ajax({
        type: "POST",
        url: "mail.php",
        data: {name: name, email: email, message: message, contact_mail: "1"},
        success: function(data)
        {
          $("input[name='name']").val(null);
          $("input[name='email']").val(null);
          $("#message").val("Mesajul...");
        }
      });
    }
  });
});
</script>
<!-- .section-contact -->
<?php require_once('footer.php'); ?>
