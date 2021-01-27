<!DOCTYPE html>
<html>
	<head>
		<title>Data added</title>
	</head>
	<body>
		<table>
			<?php
				if( $_SERVER["REQUEST_METHOD"] == "POST") {
					if (isset($_POST["name"], $_POST["desc"], $_POST["price"])) {
					echo "<tr><p>S'han introduit les següents dades: </p></tr>";
					echo "<tr><td>Producte: ";
					echo $_POST["name"];
					echo "</td></tr><tr><td>Descripció: ";
					echo $_POST["desc"];
					echo "</td></tr><tr><td>Preu: ";
					echo $_POST["price"];
					echo "€</td></tr>";
					$txt = $_POST["name"] . ", " . $_POST["desc"] . ", " . $_POST["price"];
					$file = fopen("Cataleg.txt", "a");
					fwrite($file, $txt);
					fclose($file);
				} else {
					echo "<p>No s'han adjuntat dades</p>\n";
				}}
			?>
		</table>
	</body>
</html>