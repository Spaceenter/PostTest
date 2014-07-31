<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style type="text/css">
    body { padding: 5%; background: #e5e5e5}
    </style>
</head>
<body>
	<p><a href="index.php" class="btn btn-default">Go back to home page.</a></p>
	<br>
	<form action='process.php' method='post'>
		To: <input class="form-control" type='text' name='to' value=''><br>
		Msg Title: <input class="form-control" type='text' name='title' value=''><br>
		Msg Body:<br>
		<textarea class="form-control" rows='10' cols='50' name='body'>Msg Body</textarea><br>
		<input type='submit' class="btn btn-primary" name='send' value='send'>
	</form>
</body>
</html>
