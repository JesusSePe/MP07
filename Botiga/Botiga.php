<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			#data {
				border-style: solid;
				border-width: 2px;
			}
		</style>
		<title>Botiga</title>
	</head>
	<body>
		<table border = "1" id="data">
			<?php
				$data = file("Cataleg.txt");
				foreach( $data as $prod ){
					echo "<tr>";
					$info = explode(",", $prod);
					foreach( $info as $a){
						echo "<td>$a</td>";
					}
					echo "</tr>";
				}
			?>
		</table>
		<table>
			<form method="POST" action="add_prod.php">
				<tr>
					<td>
						Nom: <input type="text" name="Name">
					</td>
				</tr>
				<tr>
					<td>
						Descripció: <input type="text" name="Desc">
					</td>
				</tr>
				<tr>
					<td>
						Preu: <input type="number" name="Price">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="Send">
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>
