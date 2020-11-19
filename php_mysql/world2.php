<!DOCTYPE html>
<html>
	<head>
		<title>PG2</title>
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
            if( $_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["Country"])) {
                    $NomPais = $_POST["Country"];
                    $conn = mysqli_connect('localhost','telek','Tlk_1234');
                    mysqli_select_db($conn, 'world');
                    $consultaCodi = "SELECT Code FROM country WHERE Name = '$NomPais';";
                    $QuerycodiPais = mysqli_query($conn, $consultaCodi);
                    $registreCodi = mysqli_fetch_assoc($QuerycodiPais);
                    $Codi = $registreCodi["Code"];
                    # Obtenim el codi del pais de la taula country.

                    $consultaCiutats = "SELECT country.Name AS Pais, city.Name AS Ciutat FROM city INNER JOIN country ON city.CountryCode = country.Code WHERE country.Name = '$NomPais';";
                    $queryCiutats = mysqli_query($conn, $consultaCiutats);
                    
                    echo "<table><thead><td colspan='4' align='center' bgcolor='cyan'>Llistat de ciutats</td></thead>";
                    while( $registreCiutats = mysqli_fetch_assoc($queryCiutats) ){
                        $pais = $registreCiutats["Pais"];
                        echo "\t<tr>\n";
                        echo "\t\t<td>".$registreCiutats["Pais"]."</td>\n";
                        echo "\t\t<td>".$registreCiutats["Ciutat"]."</td>\n";
                        echo "<td><img src='./svg/$pais.svg' width='20' height='20'></td>";
                        echo "\t</tr>\n";
                    }
                    
				} else {
                    echo "<p>No s'han adjuntat dades</p>\n";
				} 
            }
            ?>
	</body>
</html>