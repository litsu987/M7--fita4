<?php
session_start();

$N = 8; // Número de columnas
$M = 6; // Número de filas
$letra = "A"; // Variable para columna de letras

$hori = $M - 1;
$verti = $N - 1;

$barcos = array( // Array de los barcos con su longitud y coordenadas
    array("tipo" => "fragata", "longitud" => 1, "x" => 2, "y" => 3, "orientacion" => "horizontal"),
    array("tipo" => "submarino", "longitud" => 2, "x" => 4, "y" => 5, "orientacion" => "vertical"),
    array("tipo" => "destructor", "longitud" => 3, "x" => 1, "y" => 2, "orientacion" => "horizontal"),
    array("tipo" => "portaaviones", "longitud" => 4, "x" => 3, "y" => 4, "orientacion" => "vertical")
);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barco</title>
    <style type="text/css">
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align:center;
        }

        table {
            width: 80%;
            max-width: 600px;
            margin-bottom: 20px;
        }

        button {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .ship {
            background-color: blue;
        }

        .empty {
            background-color: white;
        }

        .message {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <table>
            <?php
            for ($i = 0; $i < $M; $i++) {
                echo "<tr>\n";
                for ($j = 0; $j < $N; $j++) {
                    if ($j == 0 && $i == 0) {
                        echo "\t\t<td></td>\n";
                    } elseif ($j == 0) {
                        echo "\t\t<td>$letra</td>\n";
                    } elseif ($i == 0) {
                        echo "\t\t<td>$j</td>\n";
                    } else {
                        $barcoEncontrado = false;
                        foreach ($barcos as $barco) {
                            if ($barco["orientacion"] == "horizontal" && $j >= $barco["y"] && $j < $barco["y"] + $barco["longitud"] && $i == $barco["x"]) {
                                // Aquí reemplaza el código que genera el botón
                                $acertadoClass = ($acertado) ? "acertado" : "";
                                echo "\t\t<td><form action='' method='post'><button class='ship $acertadoClass' name='barco_clicado' value='{$barco["tipo"]}'></button></form></td>\n";
                                $barcoEncontrado = true;
                                break;
                            } elseif ($barco["orientacion"] == "vertical" && $i >= $barco["x"] && $i < $barco["x"] + $barco["longitud"] && $j == $barco["y"]) {
                                // Aquí reemplaza el código que genera el botón
                                $acertadoClass = ($acertado) ? "acertado" : "";
                                echo "\t\t<td><form action='' method='post'><button class='ship $acertadoClass' name='barco_clicado' value='{$barco["tipo"]}'></button></form></td>\n";
                                $barcoEncontrado = true;
                                break;
                            }
                        }
                        if (!$barcoEncontrado) {
                            // Aquí reemplaza el código que genera el botón
                            echo "\t\t<td><button class='empty' name='button_$i$j'></button></td>\n";
                        }
                    }
                }
                if ($i > 0) {
                    $letra++;
                }
                echo "</tr>";

            
            }
            
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $barcoClicado = $_POST["barco_clicado"];
                $acertado = false;
            
                foreach ($barcos as $barco) {
                    if ($barco["tipo"] === $barcoClicado) {
                        $acertado = true;
                        break;
                    }
                }
                if ($acertado) {
                    echo "¡Has acertado!";
                } else {
                    echo "No has acertado.";
                }
            }
            ?>
             </table>
        
    </form>
</body>

</html>
