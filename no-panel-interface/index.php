<!DOCTYPE html>
<html lang="eng" dir="ltr">

<?php
include '../components_php/header.php';
?>
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

<section class="section-banner">
  <div class="container">
    <!-- <div class=""> -->
    <form class="d-lg-flex flex-column justify-content-start" id="search" action="proprietati.php" method="GET">
      <h1>Search your ideal variant</h1>
      <div class="form-field">
        <select name="type_of_purchased">
          <option value="All">Type of purchase</option>
          <?php
          include "../conf.php";
          $result = $mysql->query("SELECT type_of_purchased FROM specifications INNER JOIN property ON specifications.id_property=property.id_property group by type_of_purchased;");
          while ($option = $result->fetch_assoc()) : ?>
            <option value="<?php echo $option['type_of_purchased'] ?>"> <?php echo $option['type_of_purchased'] ?> </option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="form-field">
        <select name="type_of_building">
          <option value="All">Tip of building</option>
          <?php
          $result = $mysql->query("SELECT type_of_building FROM specifications INNER JOIN property ON specifications.id_property=property.id_property group by type_of_building;");
          while ($option = $result->fetch_assoc())
            echo "
              <option value='" . $option['type_of_building'] . "'>" . $option['type_of_building'] . "</option>
                ";
          ?>
        </select>
      </div>
      <div class="form-field">
        <select name="City">
          <option value="All">City</option>
          <?php
          $result = $mysql->query("SELECT City FROM adresa INNER JOIN property ON adresa.id_property=property.id_property group by City;");
          while ($option = $result->fetch_assoc())
            echo "
              <option value='" . $option['City'] . "'>" . $option['City'] . "</option>
                ";
          ?>
        </select>
      </div>
      <div class="form-field">
        <button class="" type="submit">
          <i class="fas fa-search"></i>
          <p>Search</p>
        </button>
      </div>
    </form>
  </div>
</section>
<!-- .section-banner -->

<?php $result = $mysql->query("SELECT * FROM property 
    INNER JOIN adresa ON adresa.id_property=property.id_property 
    INNER JOIN property_photos ON property_photos.id_property=property.id_property
    INNER JOIN specifications ON specifications.id_property=property.id_property
    ORDER BY Time ASC");
?>
<section class="section-properties" id="properties">

  <div class="container">
    <h1>Recent </h1>
    <?php if ($result->num_rows > 0) : ?>
      <div class="carousel columns-3-properties d-lg-flex flex-row justify-content-between align-items-center">
        <div class="slaider_arrow d-lg-flex flex-row justify-content-between align-items-center">
          <i class="fas fa-chevron-left"></i>
          <i class="fas fa-chevron-right"></i>
        </div>

        <?php include '../components_php/cards.php' ?>

      </div>
  </div>
<?php else : ?>
  There are no properties!
<?php endif; ?>
</div>
</section>
<!-- .section-properties -->

<section class="section-testimonials" id="testimonials">
  <div class="container">
    <h1>Reviews</h1>
    <div class="testimonials ">
      <div class="testimonials-item">
        <div class="testimonials-thumbnail">
          <img src="../images/testimonial_1.jpg">
        </div>
        <h5 class="testimonials-title">Aurelia E. Bogza</h5>
        <div class="testimonials-position">CEO at Pixies Inc.</div>
        <div class="testimonials-description">
          <p>
            <em>I have been renting well properties through this company for over 5 years and have always been extremely happy with their work.
            </em>
          </p>
        </div>
      </div>

      <div class="testimonials-item">
        <div class="testimonials-thumbnail">
          <img src="../images/testimonial_2.jpg">
        </div>
        <h5 class="testimonials-title">Dumitru Costel</h5>
        <div class="testimonials-position">Manager of Leogrand.</div>

        <div class="testimonials-description">
          <p>
            <em>We were extremely impressed by the service offered by Best Property, they are very prompt and professional.
            </em>
          </p>
        </div>
      </div>

      <div class="testimonials-item">
        <div class="testimonials-thumbnail">
          <img src="../images/testimonial_3.jpg">
        </div>
        <h5 class="testimonials-title">Alexandra Ioana</h5>
        <div class="testimonials-position">Director at JustConsult.</div>

        <div class="testimonials-description">
          <p><em>Thanks for everything. I have been renting through this agency for more than 5 years and have never had a problem with them.
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
    <h1>About Us</h1>
    <div class="about">
      <div class="about-image">
        <img src="../images/about.jpg">
      </div>
      <div class="about-text d-flex flex-column align-items-center">
        <h5>Best Property</h5>
        <h5>It was founded in Funchal as a company focused on efficiently satisfying customers and serving them at the highest quality in all real estate requests.</h5>
        <br>
        <p>Over time, the company dominates the real estate market in Portugal through customer orientation, providing both professional support and understanding of personal needs. As a result of working with people, our work has become a passion for each of us.</p>
        <p>The range of services provided by Us is varied and complex, because we have the largest real estate database and we make maximum effort to achieve all customer needs.</p>
      </div>
    </div>
  </div>
</section>
<!-- .section-about -->

<section class="section-contact" id="contacts">
  <div class="container">
    <h1>Contacts</h1>
    <div class="contact">
      <div class="contact-text">
        <h5>Address from Funchal:</h5>
        <h5>Estrada Monumental 455, 9000-098 Funchal, Portugal</h5>
        <p>
          We want every customer to buy their dream home, for this reason we gather in our database the most advantageous real estate offers at affordable prices. We want to be recognized as a reliable partner that delivers professional real estate services, saving time, money and nerves to our clients.
        </p>
      </div>
      <div class="contact-form">
        <form id="contactus">
          <div class="form-field">
            <input type="text" name="name" placeholder="Your name" required />
          </div>
          <div class="form-field">
            <input type="email" name="email" placeholder="Email address" required />
          </div>
          <div class="form-field">
            <textarea id="message" name="message" placeholder = "Message"></textarea>
          </div>
          <div class="form-field">
            <button type="submit" id="contact_mail" name="contact_mail">
              <i class="fas fa-paper-plane"></i>
              <p>Send</p>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- .section-contact -->
<?php require_once('../components_php/footer.php'); ?>

<script type="text/javascript">
  $(document).ready(function() {

    $(".fa-chevron-left").click(function() {
      $('.properties').animate({
        scrollLeft: '-=300px'
      }, 800);
    });
    $(".fa-chevron-right").click(function() {
      $('.properties').animate({
        scrollLeft: '+=300px'
      }, 800);
    });
    $("#contact_mail").on("click", function() {
      var name = $("input[name='name']").val();
      var email = $("input[name='email']").val();
      // var message = $("#message").val();
      if (name.length != 0 && email.length != 0 && message.length != 0) {
        $.ajax({
          type: "POST",
          url: "mail.php",
          data: {
            name: name,
            email: email,
            message: message,
            contact_mail: "1"
          },
          success: function(data) {
            $("input[name='name']").val(null);
            $("input[name='email']").val(null);
          }
        });
      }
    });
  });
</script>