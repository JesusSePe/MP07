<!DOCTYPE html>
<html>
	<head>
		<title>Pg3</title>
	</head>
	<body>
        <h3>Endevina</h3>
        <?php
            session_start();
            if (isset($_POST["endevina"])){
                if ($_POST["endevina"] > $_SESSION["ocult"]){
                    echo "<p>El nombre ocult es mes petit</p>";
                    echo "<form method='POST' action='fita2pagina3.php'>";
                    echo "Endevina: <input type='number' name='endevina'>";
                    echo "<input type='submit' name='Send' value='Go!'>";
                    echo "</form>";
                } elseif ($_POST["endevina"] < $_SESSION["ocult"]) {
                    echo "<p>El nombre ocult es mes gran</p>";
                    echo "<form method='POST' action='fita2pagina3.php'>";
                    echo "Endevina: <input type='number' name='endevina'>";
                    echo "<input type='submit' name='Send' value='Go!'>";
                    echo "</form>";
                } elseif ($_POST["endevina"] == $_SESSION["ocult"]) {
                    echo "FELICITATS!";
                    echo "<a href='./fita2pagina1.php'>Jugar de nou</a>";
                } 
            } else {
                    echo "<form method='POST' action='fita2pagina3.php'>";
                    echo "Endevina: <input type='number' name='endevina'>";
                    echo "<input type='submit' name='Send' value='Go!'>";
                    echo "</form>";
                }
        ?>
	</body>
</html>
