<?php

include_once('mail.php');

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

?>
