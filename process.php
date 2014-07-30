<?php

include_once('PHPMailer-master/PHPMailerAutoload.php');
include_once('db.php');

// send email
if($_POST) {
  $to = $_POST['to'];
  $title = $_POST['title'];
  $body = $_POST['body'];
  system_send_email($to, $title, $body);
  echo 'Message is successfully sent.<br>';
  echo '<a href="index.php">Go back to home page.</a>';
}
else {
  echo 'Please fill the right information in the form.<br>';
  echo '<a href="send.php">Go back to sending page.</a>';
}

function system_send_email($To, $Subject, $Body, $From='notify') {
  $email = new PHPMailer();
  $email->From = $From."@".EMAIL_DOMAIN;
  $email->FromName = "ProtonMail";
  $email->Subject = $Subject;
  $email->Body = $Body;
  $email->addReplyTo($email->From, $email->FromName);
  $email->Sender = $email->From; // Return-Path
  $email->addAddress($To);
  $email->isHTML(true);
  $email->XMailer=' ';
  $email->send();
} 
