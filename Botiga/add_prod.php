<!DOCTYPE html>
<html>
	<head>
		<title>Data added</title>
	</head>
	<body>
		<table>
			<?php
				echo "<tr><p>S'han introduit les següents dades: </p></tr>";
				echo "<tr><td>Producte: ";
				echo $_POST["Name"];
				echo "</td></tr><tr><td>Descripció: ";
				echo $_POST["Desc"];
				echo "</td></tr><tr><td>Preu: ";
				echo $_POST["Price"];
				echo "€</td></tr>";
				$txt = $_POST["Name"] . ", " . $_POST["Desc"] . ", " . $_POST["Price"] . "€";
				$file = fopen("Cataleg.txt", "a");
				fwrite($file, $txt);
				fclose($file);
			?>
		</table>
	</body>
</html>