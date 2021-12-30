<?php
  if(isset($_POST['contact_mail'])) {

    $from="bestimobilestate@gmail.com";
    $headersfrom='';
    $headersfrom .= 'MIME-Version: 1.0' . "\r\n";
    $headersfrom .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headersfrom .= 'From: '.$from.' '. "\r\n";

    $message = "<p>Salut! Ma numesc <b>".$_POST['name']."</b>. <br>Te contactez cu mesajul:<br><b>".$_POST['message']."</b><br>Ma poti contacta pe: <b>".$_POST['email']."</b></p>";
    $subject="Mesaj de la clienti!";
    $result = mail("bestimobilestate@gmail.com", $subject, $message, $headersfrom);
    if(!$result) {
         echo "Error";
    } else {
        echo "Success";
    }
  }
  else if(isset($_POST['contact_proprietate'])) {

    $from="bestimobilestate@gmail.com";
    $headersfrom='';
    $headersfrom .= 'MIME-Version: 1.0' . "\r\n";
    $headersfrom .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headersfrom .= 'From: '.$from.' '. "\r\n";

    $message = "<p>Salut! Ma numesc <b>".$_POST['name']."</b><br>Sunt interesate de oferta cu titlul:<b>".$_POST['nume_proprietate']."</b><br>Pretul: <b>".$_POST['pret']."</b><br>Pot fi contactat la email-ul: <b>".$_POST['email']."</b></p>";
    $subject="Mesaj de la clienti [proprietate]!";
    $result = mail("bestimobilestate@gmail.com", $subject, $message, $headersfrom);
    if(!$result) {
         echo "Error";
    } else {
        echo "Success";
    }

  }
