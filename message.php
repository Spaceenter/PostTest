<html>

<head>
</head>

<body>

	<a href="index.php">Go back to home page.</a><hr>

<?php

include_once('mail.php');

if($_GET) {
  echo 'Raw Incoming Message:<hr>';
  $email = get_email($_GET['id']);
  echo nl2br($email);
}
else {
  echo "You are not supposed to enter this page in this way.";
}

?>

</body>

</html>
