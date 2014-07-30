#!/usr/bin/php
<?php

// read from stdin 
$fin = fopen("php://stdin", "r");
$email = "";
while (!feof($fin)) {
  $part = fread($fin, 1024);
  $email .= $part;
}
fclose($fin);

// save to database

?>
