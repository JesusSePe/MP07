<!DOCTYPE html>
<html>
	<head>
		<title>Shopping cart</title>
	</head>
	<body>
		<?php
		session_start();
			echo "<form method='POST' action='compra.php'>";
				echo "<p>Products:</p>";
				echo "<select name='products'>";
				$array = file('Cataleg.txt');
				$itemNumber = 0;
				foreach($array as $product){
					$data = explode(",", $product);
					echo "<option value='$itemNumber'>$data[0]</option>";
					$itemNumber += 1;
				}
				echo "</select><p>Quantitat</p>";
				echo "<input type='number' min='0' name='quant'>";
				echo "<input type='submit' name='Buy' value='Buy'>";
			echo "</form>";
			if( $_SERVER["REQUEST_METHOD"] == "POST") {
				$_SESSION['products'] += $_SESSION['products'];
				$_SESSION['quant'] += $_SESSION['quant'];
				foreach($_SESSION['products'] as $info){
					echo "<pre>";
					print_r($info);
					echo"</pre>";
				}
			}
		?>
	</body>
</html>
