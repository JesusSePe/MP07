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
                if ((isset($_POST["sup_min"])) AND (isset($_POST["sup_max"]))) {
                    $max = $_POST["sup_max"];
                    $min = $_POST["sup_min"];
                    $conn = mysqli_connect('localhost','php','Php_1c4J8');
                    mysqli_select_db($conn, 'world');
                    $consultaPais = "SELECT Name FROM country WHERE SurfaceArea BETWEEN $min AND $max;";
                    $QueryPais = mysqli_query($conn, $consultaPais);

                    echo "<table><thead><td colspan='4' align='center' bgcolor='cyan'>Llistat de paisos</td></thead>";
                    while( $registre = mysqli_fetch_assoc($QueryPais)) {
                        $pais = $registre["Name"];
                        echo "\t<tr>\n";
                        echo "\t\t<td>".$pais."</td>\n";
                        echo "\t</tr>\n";
                    }
				} else {
                    echo "<p>No s'han adjuntat dades</p>\n";
                }
            }
        ?>
    </body>
</html>