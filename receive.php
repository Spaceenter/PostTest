<html>

<head>
</head>

<body>

	<a href="index.php">Go back to home page.</a><hr>

<?php

include_once('mail.php');

$msg_id_array = get_message_id_array();
$n = count($msg_id_array);
if($n > 0) {
  for($i = 0; $i < $n; $i++) {
    echo '<a href="message.php?id='.$msg_id_array[$i].'">message_'.$msg_id_array[$i].'</a><br>';
  }
}

?>

</body>

</html>
