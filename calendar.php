<!DOCTYPE html>
<html>
	<head>
		<title>Calendar</title>
	</head>
	<body>
		<table border="1">
			<?php
				$days = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
				$MonthDays = 30;
				$Primer = 3;
				$dia = 0;
				$Max = 30;
				echo "<tr>";
				foreach( $days as $day) {
					echo "<th>$day</th>";
				}
				echo "</tr>";
				for( $week = 0; $week < 5; $week++) {
					echo "<tr>";
					for( $d = 0; $d < 7; $d+=1 ) {
						if ($Primer != 0){
							echo "<td></td>";
							$Primer -= 1;
						}else {
							$dia++;
							if ($dia <= $Max) {
								echo "<td>$dia</td>";
							}else {
								echo "<td> </td>";
							}
						}
					}
					echo "</tr>";
					echo "<tr>";
					for( $d = 0; $d < 7; $d++ ) {
						echo"<td>‎ </td>";
					} 
					echo "</tr>";
				}
			?>
		</table>
	</body>
</html>
