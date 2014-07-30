<?php

function connect_db() {
  $db_host = 'localhost';
  $db_user = 'pm_user';
  $db_password = '123321';
  $db_name = 'post_test';

  $db_link = mysqli_connect("$db_host", "$db_user", "$db_password", "$db_name");
  if(mysqli_connect_errno())
  {
    echo "Sorry, we were unable to connect to the database.";
    exit;
  }
  return $db_link;
}


?>
