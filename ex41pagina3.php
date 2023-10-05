<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina 3</title>
</head>
<body>
	<h1>ENDEVINA EL NOMBRE</h1>
		<?php
			session_start();
			function formulari() {
				echo "<form method='POST'>";
				echo "<input type='number' name='endevina'>";
				echo "<input type='submit' value='ENDEVINA'>";
				echo "</form>";
			}
			if (!isset($_POST['endevina'])) {
				formulari();
			} else {
				if ($_POST['endevina']===$_SESSION['ocult']) {
					echo "<h3>Felicitats</h3>";
					echo "<a href='ex41pagina1.php'>TORNAR A L'INICI</a>";
				} elseif ($_POST['endevina']<$_SESSION['ocult']) {
					echo "<h3>El número que esteu buscant és major</h3>";
					formulari();
				} elseif ($_POST['endevina']>$_SESSION['ocult']) {
					echo "<h3>El número que esteu buscant és menor</h3>";
					formulari();
				}
			}
		?>
</body>
</html>