<!DOCTYPE html>
<html>
	<head>
		<title>Product Deleted</title>
	</head>
	<body>
		<p>The following product has been deleted:</p>
		<?php
			$array = file('Cataleg.txt');
			echo "<p>" . $array[$_GET["id"]] . "</p>";
			unset($array[$_GET["id"]]);
			$file = fopen('Cataleg.txt', 'w');
			foreach($array as $item){
				fwrite($file, $item);
			}
		?>
	</body>
</html>