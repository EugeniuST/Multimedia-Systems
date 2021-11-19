  <footer id="footer">
    <div class="container">
        <div class="footer-row">
            <div class="footer-column">
                <h5>Popular Searches</h5>
                <ul>
                    <li>
                        <a href="#">Apartaments for selling</a>
                    </li>
                    <li>
                        <a href="#">Apartments for renting</a>
                    </li>
                    <li>
                        <a href="#">Offices for selling</a>
                    </li>
                    <li>
                        <a href="#">Offices for renting</a>
                    </li>
                </ul>
            </div>
            <div class="footer-column">
                <h5>Fast Links</h5>
                <ul>
                    <li>
                        <a href="#">Prices</a>
                    </li>
                    <li>
                        <a href="#">Our Services</a>
                    </li>
                    <li>
                        <a href="#">About Us</a>
                    </li>
                    <li>
                        <a href="#">Contacts</a>
                    </li>
                </ul>
            </div>
            <div class="footer-column">
              <h5>Subscribe for news-letter</h5>
              <form id="subscribe">
                  <div class="form-field">
                      <input name="name_abonare" placeholder="Prenume, Nume" required />
                  </div>
                  <div class="form-field">
                      <input name="email_abonare" placeholder="Adresa de Email" required />
                  </div>
                  <div class="form-field">
                      <button id= "abonare" type="button">SUBSCRIBE</button>
                  </div>
              </form>
            </div>
        </div>
        <div class="copyright">
          Copyright © 2021. BestImobil– Real Estate Template by Stoica Eugeniu.
        </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/mobile.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>

<script type="text/javascript">
$( document ).ready(function() {
  $( "#abonare" ).on( "click", function() {
    var name = $("input[name='name_abonare']").val();
    var email = $("input[name='email_abonare']").val();
    if(name.length!=0 && email.length!=0 && message.length!=0) {
      $.ajax({
        type: "POST",
        url: "footer.php",
        data: {name: name, email: email, reg_abonat: "1"},
        success: function(data)
        {
          $("input[name='name_abonare']").val(null);
          $("input[name='email_abonare']").val(null);
        }
      });
    }
  });
});
</script>

<?php
  if(isset($_POST['reg_abonat'])) {
    include "conf.php";
    $email = $_POST['email'];
    $nume = $_POST['name'];

    $result = $mysql->query("INSERT INTO `abonare_tabel` (`full_name`, `email`)
                            VALUES ('$nume', '$email');");

  }
 ?>
