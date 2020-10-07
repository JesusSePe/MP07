<!DOCTYPE html>
<html>
<head>
	<title>SUPAH LOOP</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>key</th>
			<th>value</th>
		</tr>
		<?php
			foreach($_SERVER as $k=>$v) {
				echo "
				<tr>
					<td>$k</td>
					<td>$v</td>
				<tr>";
			}
		?>
	</table>
</body>
</html>

