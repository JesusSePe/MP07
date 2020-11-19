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
            $conn = mysqli_connect('localhost','telek','Tlk_1234');
            mysqli_select_db($conn, 'world');
            $consulta = "SELECT Name FROM country ORDER BY Name;";
            $resultat = mysqli_query($conn, $consulta);
            if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
                 die($message);
            } else {
                echo "<form method='POST' action='world2.php'><select name='Country'>";
                while( $registre = mysqli_fetch_assoc($resultat) ) {
                    $nom = $registre["Name"];
                    echo "<option value='$nom'>".$nom."</option>\n";
                }
                echo "</select><input type='submit' name='Send' value='Send'>";
            }
		?>
	</body>
</html>
