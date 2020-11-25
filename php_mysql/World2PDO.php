<!DOCTYPE html>
<html>
	<head>
		<title>PG1</title>
        <style>
 		body{
 		}
 		table,td, th {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
	</head>
	<body>
		<?php
            //SQL connection data.
            try{
                //First we save in variables the data connection info, and connect with database.
                $hostname = 'localhost';
                $dbname = 'world';
                $uname = 'php';
                $pw = 'Php_1c4J8';
                $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$uname","$pw");
            } catch (PDOException $e) {
                //In case of error, we show a message explaining it.
                echo "Failed to get DB handle: " . $e->getMessage() . "\n";
                exit;
            }

            //Query:
            $query = $pdo->prepare("SELECT DISTINCT(Continent) FROM country;");
            $query->execute();

            //Continent form.
            echo "<form method='POST' action='World2PDO.php'>Continent: <select name='Continent'>";
            $row = $query->fetch(); //The first query row is saved in $row.
            while($row) {
                $name = $row["Continent"];
                echo "<option value='$name'>".$name."</option>\n";
                $row = $query->fetch(); //Once the row isn't needed anymore, the row value is changed for the next query result row.
            }
            unset($query); //In order to save some space, the query value is deleted from memory.

            echo "<input type='submit' name='Send' value='Send'></form>";
            
            if(( $_SERVER["REQUEST_METHOD"] == "POST") and (isset($_POST["Continent"]))) { //If there's data sent from POST, and is the Continent, we show a table with the info.
                $continent = $_POST["Continent"]; //The continent name is saved in the $continent variable.
                $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$uname","$pw");
                $citiesQuery = $pdo->prepare("SELECT name, population FROM country WHERE continent = '$continent' ORDER BY 1;"); //Cities per continent query
                $citiesQuery->execute();
                //Table
                echo "<table><thead><td colspan='4' align='center' bgcolor='cyan'>Cities in $continent</td></thead>";
                echo "<tr><th>Country</th><th>Population</th></tr>";

                $cityRow = $citiesQuery->fetch(); //The first query result row is saved in $cityRow
                while($cityRow){
                    echo "\t\t<td>".$cityRow["name"]."</td>";
                    echo "\t\t<td>".$cityRow["population"]."</td>\n";
                    echo "\t</tr>\n";
                    $cityRow = $citiesQuery->fetch(); //The next query result row is saved in $cityRow
                    }
                unset($citiesQuery);

                $populationQuery = $pdo->prepare("SELECT SUM(population) AS 'pop' FROM country WHERE continent = '$continent';"); //Total population on continent
                $populationQuery->execute();
                //Table
                echo "<tr><th>Population:</th>";

                $populationRow = $populationQuery->fetch();
                while($populationRow){
                    echo "\t\t<td>".$populationRow["pop"]."</td>";
                    echo "\t</tr>\n";
                    $populationRow = $populationQuery->fetch();
                }
                unset($pdo); //Finally, the data provided to connect to the database is deleted to save memory.
                unset($populationQuery);
            }
		?>
	</body>
</html>
