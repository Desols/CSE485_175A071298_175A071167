<?php
$to = "huunv72@wru.vn";
$subject = "Send Email from Localhost";
$txt = "Hello Teacher!";
$headers = "From: eus3.g5@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";
mail($to,$subject,$txt,$headers);
?>
