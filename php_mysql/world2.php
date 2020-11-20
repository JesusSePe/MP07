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
                    $conn = mysqli_connect('localhost','php','Php_1c4J8');
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
                    if (isset($_POST["NewCity"], $_POST["Dis"], $_POST["Popul"])){
                        $Name = $_POST["NewCity"];
                        $District = $_POST["Dis"];
                        $Population = $_POST["Popul"];
                        $addQuery = "INSERT INTO `city` (`Name`, `CountryCode`, `District`, `Population`) VALUES ('$Name', '$Codi' ,'$District', $Population);";
                        $addCity = mysqli_query($conn, $addQuery);
                    }
				} else {
                    echo "<p>No s'han adjuntat dades</p>\n";
                }
            }
            ?>
	</body>
</html>