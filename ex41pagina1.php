<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina 1</title>
</head>
<body>
	<h1>ENREGISTRA NOMBRE</h1>
    <?php
		session_start();
		unset($_SESSION['historial']);
        unset($_SESSION['intentos']);
	?>
	<form method="POST" action="ex41pagina2.php">
		<input type="number" name="ocult" min="1" max="100">
		<button>ENVIAR</button>
	</form>
</body>
</html>

