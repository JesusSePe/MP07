<!DOCTYPE html>
<html>
	<head>
		<title>PG1</title>
        <style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
	</head>
	<body>
		<?php
            $conn = mysqli_connect('localhost','php','Php_1c4J8');
            mysqli_select_db($conn, 'world');
            $consulta = "SELECT Name FROM country ORDER BY Name;";
            $resultat = mysqli_query($conn, $consulta);
            if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
                 die($message);
            } else {
                echo "<form method='POST' action='world2.php'>Pais: <select name='Country'>";
                while( $registre = mysqli_fetch_assoc($resultat) ) {
                    $nom = $registre["Name"];
                    echo "<option value='$nom'>".$nom."</option>\n";
				}
				echo "</select><br>Nova ciutat (opcional):<input type='text' name='NewCity'></input><br>";
				echo "Districte (opcional):<input type='text' name='Dis'></input><br>";
				echo "Població (opcional):<input type='number' name='Popul'></input><br>";
                echo "<input type='submit' name='Send' value='Send'>";
            }
		?>
	</body>
</html>
