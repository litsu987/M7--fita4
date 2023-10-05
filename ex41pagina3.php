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

        function historial($numero_adivinar1) {
            echo "<h3>Historial de números intentados:</h3>";
            echo "<table>";
            echo "<tr>";
            foreach ($_SESSION['historial'] as $numero) {
                echo "<td style='border: 2px solid black; padding: 5px;'>";
                if ($numero < $numero_adivinar1) {
                    echo "<span style='color: blue;'>$numero</span>";
                } elseif ($numero > $numero_adivinar1) {
                    echo "<span style='color: red;'>$numero</span>";
                } elseif ($numero === $numero_adivinar1) {
                    echo "<span style='color: green;'>$numero</span>";
                }
                echo "</td>";
            }
            echo "</tr>";
            echo "</table>";
            
        }

		if (!isset($_SESSION['historial'])) {
			$_SESSION['historial'] = array();
		}

		if (!isset($_SESSION['intentos'])) {
			$_SESSION['intentos'] = 0;
		}

		if (!isset($_POST['endevina'])) {
			formulari();
		} else {
			$numero_adivinar = $_SESSION['ocult'];
			$numero_intentado = $_POST['endevina'];

			$_SESSION['historial'][] = $numero_intentado;

			if ($numero_intentado === $numero_adivinar) {
                $_SESSION['intentos']++;
                
				echo "<h3>Felicitats</h3>";
				echo "<p>Intentos: " . $_SESSION['intentos'] . "</p>";
				echo "<a href='ex41pagina1.php'>TORNAR A L'INICI</a>";
             
			} elseif ($numero_intentado < $numero_adivinar) {
                $_SESSION['intentos']++;
                echo "<p>Intentos: " . $_SESSION['intentos'] . "</p>";
				echo "<h3>El número que esteu buscant és major</h3>";
				formulari();
			} elseif ($numero_intentado > $numero_adivinar) {
                $_SESSION['intentos']++;
                echo "<p>Intentos: " . $_SESSION['intentos'] . "</p>";
				echo "<h3>El número que esteu buscant és menor</h3>";
				formulari();
			}
			if (!empty($_SESSION['historial'])) {
                historial($numero_adivinar);
                
            }
            
            
            
            
		}
	?>
</body>
</html>
