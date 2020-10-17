<!DOCTYPE html>
<html>
	<head>
		<title>Shopping cart</title>
	</head>
	<body>
		<?php
		session_start();
			echo "<p>Products:</p>";
			echo "<select name='products'>";
			$array = file('Cataleg.txt');
			$itemNumber = 0;
			foreach($array as $product){
				$data = explode(",", $product);
				echo "<option value='$itemNumber'>$data[0]</option>";
			}
			echo "</select><p>Quantitat</p>";
			echo "<input type='number' min='0' name='quant'>";
			echo "<input type='submit' name='Buy' value='Buy'>";
			/*if (isset($_POST['products'])) {
				$_SESSION['products'] = $_SESSION['products'];
				$_SESSION['quant'] = $_SESSION['quant'];
				foreach($_SESSION['products']){
					echo "<pre>";
					print_r($_SESSION['products'][]);
					echo"</pre>";
				}
			}*/
			
		?>
	</body>
</html>