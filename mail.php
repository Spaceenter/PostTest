<?php

include_once('PHPMailer-master/PHPMailerAutoload.php');

function connect_db() {
  $db_host = 'localhost';
  $db_user = 'pm_user';
  $db_password = '123321';
  $db_name = 'mail_db';

  $db_link = mysqli_connect("$db_host", "$db_user", "$db_password", "$db_name");
  if(mysqli_connect_errno())
  {
    echo "Sorry, we were unable to connect to the database.";
    exit;
  }
  return $db_link;
}

function system_send_email($To, $Subject, $Body, $From='notify') {
  $email = new PHPMailer();
  $email->From = $From."@protonmail.xyz";
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

function save_email_to_database($email) {
  $db_link = connect_db();
  $sql = "insert into mail_table values(
    default,
    '".mysqli_real_escape_string($db_link, $email)."'
  )";
  $result = mysqli_query($db_link, $sql);
  if(!$result) {
    return 'Error: '.mysqli_error($db_link);
  }
  mysqli_close($db_link);
}

function get_message_id_array() {
  $db_link = connect_db();
  $sql = "select MessageID from mail_table order by MessageID desc";
  $result = mysqli_query($db_link, $sql);
  if(!$result) {
    return 'Error: '.mysqli_error($db_link);
  }

  $id_array = array();
  $n = mysqli_num_rows($result); 
  if($n > 0) {
    while($row = mysqli_fetch_row($result)) {
      $id_array[] = $row[0];
    }
  }

  mysqli_free_result($result);
  mysqli_close($db_link);

  return $id_array;
}

function get_email($id) {
  $db_link = connect_db();
  $sql = "select Email from mail_table where 
    MessageID=".mysqli_real_escape_string($db_link, $id);
  $result = mysqli_query($db_link, $sql);
  if(!$result) {
    return 'Error: '.mysqli_error($db_link);
  }

  $n = mysqli_num_rows($result); 
  if($n > 0) {
    $row = mysqli_fetch_row($result);
  }

  mysqli_free_result($result);
  mysqli_close($db_link);

  return $row[0];
}
?>
