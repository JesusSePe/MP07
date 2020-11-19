<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		</style>
		<title>Comandes</title>
	</head>
	<body>
		<table>
			<?php
				if( $_SERVER["REQUEST_METHOD"] == "POST") {
					if (isset($_POST["quant"])) {
                        foreach($_POST["quant"] as $comanda){
                            echo "<a href='./fita1pagina3.php'<tr><td>Comanda ";
                            echo $comanda;
                        }
				} else {
					echo "<p>No s'han adjuntat dades</p>\n";
				}}
			?>
		</table>
	</body>
</html>
