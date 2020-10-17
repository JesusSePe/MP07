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
				$id = 0;
				foreach( $data as $prod ){
					echo "<tr>";
					$info = explode(",", $prod);
					foreach( $info as $a){
						echo "<td>$a</td>";
					}
					echo "<td><a href='del_prod.php?id=$id'> <img src='trash.png' alt='delete' width='20' height='20'></a></td>";
					$id += 1;
					echo "</tr>";
				}
			?>
		</table>
		<table>
			<form method="POST" action="add_prod.php">
				<tr>
					<td>
						Nom: <input type="text" name="name">
					</td>
				</tr>
				<tr>
					<td>
						Descripció: <input type="text" name="desc">
					</td>
				</tr>
				<tr>
					<td>
						Preu: <input type="number" name="price">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="Send" value='Send'>
					</td>
				</tr>
			</form>
		</table>
		<a href='http://localhost/telekdev/Botiga/compra.php'>
			<input type="submit" name="Comprar" value='Comprar'></input>
		</a>
	</body>
</html>
