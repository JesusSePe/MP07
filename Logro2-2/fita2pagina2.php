<!DOCTYPE html>
<html>
	<head>
		<title>Pg2</title>
	</head>
	<body>
        <?php
            session_start();
            $_SESSION["frase1"] = $_POST["frase1"];
        ?>
        <form method="POST" action="fita2pagina3.php">
			frase2: <input type="text" name="frase2">
			<input type="submit" name="Send" value='Send'>
		</form>
	</body>
</html>
