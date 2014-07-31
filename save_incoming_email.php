#!/usr/bin/php
<?php

include_once('mail.php');

// read from stdin 
$fin = fopen("php://stdin", "r");
$email = "";
while (!feof($fin)) {
  $part = fread($fin, 1024);
  $email .= $part;
}
fclose($fin);

// save to database
save_email_to_database($email);

?>
