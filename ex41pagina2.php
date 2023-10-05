<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina 2</title>
</head>
<body>
	<h1>NOMBRE ENREGISTRAT</h1>
	<?php
		session_start();
		$_SESSION['ocult'] = $_POST['ocult'];	
	?>
	<a href="ex41pagina3.php">ENDEVINAR</a>
</body>
</html>