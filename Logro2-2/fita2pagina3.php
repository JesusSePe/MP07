<!DOCTYPE html>
<html>
	<head>
		<title>Pg3</title>
	</head>
	<body>
        <h3>Coincidencies</h3>
        <?php
            session_start();
            if (isset($_POST["frase2"]) and isset($_SESSION["frase1"])){
                $frase1 = explode(' ',$_SESSION["frase1"]);
                $frase2 = explode(' ',$_POST["frase2"]);
                foreach ($frase1 as $key => $value) {
                    if (in_array($value, $frase2)){
                        echo "La paraula $value està a les dues frases";
                        $found = true;
                    break;
                    }
                }
                if (isset($found)){
                    echo "<a href='fita2pagina1.php'> COME BACK </a>";
                } else {
                    echo "No hi ha cap coincidencia";
                    echo "<br><a href='fita2pagina1.php'> COME BACK </a>";
                }
            }

        ?>
	</body>
</html>
