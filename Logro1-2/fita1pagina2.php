<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		</style>
		<title>Links</title>
	</head>
	<body>
		<?php
			//Pagina 2 debe mostrar un enlace por cada palabra. Cada enlace envia a la pagina 3.
			if( $_SERVER["REQUEST_METHOD"] == "POST") {
				if (isset($_POST["frase"])) {
					$frase = explode(' ',$_POST["frase"]);
                    foreach($frase as $palabras){
						$palabra = $palabras;
						echo "<a href='./fita1pagina3.php?palabra=$palabra'>$palabra</a><br>";
					}
				} else {
					echo "<p>No s'han adjuntat dades</p>\n";
				}
			}
		?>
	</body>
</html>
