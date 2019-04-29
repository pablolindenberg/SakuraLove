<?php

//if "email" variable is filled out, send email
 if(ini_set("SMTP", "aspmx.l.google.com")){
    ini_set("sendmail_from", "alfombra.roja.santiago@gmail.com");

    $message = "The mail message was sent with the following mail setting:\r\nSMTP = aspmx.l.google.com\r\nsmtp_port = 25\r\nsendmail_from = YourMail@address.com";

    $headers = "From: alfombra.roja.santiago@gmail.com";


    mail("Sending@provider.com", "Testing", $message, $headers);
    echo "Check your email now....<BR/>";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>

 <form method="post">

  Email: <input name="email" type="text" />

  Subject: <input name="subject" type="text" />

  Message:

  <textarea name="comment" rows="15" cols="40"></textarea>

  <input type="submit" value="Submit" />
  </form>
  
<?php
  }
?>
