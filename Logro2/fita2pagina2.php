<!DOCTYPE html>
<html>
	<head>
		<title>Pg2</title>
	</head>
	<body>
        <?php
            session_start();
            $_SESSION["ocult"] = $_POST["ocult"];
        ?>
        <a href="./fita2pagina3.php">Endevinar</a>
	</body>
</html>
