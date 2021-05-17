<?php
   $name = $_Post['name'];
   $email = $_Post[ 'email'];
   $message = $_Post[ 'message'];
   $formcontent = "From: $name \n Message: $message';
   $recipient = "readersplanet2@gmail.com";
   $subject= "contact form";\
   $mailheader= "From: $email \r\n";
   mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
   echo "Thank You!";
?>
