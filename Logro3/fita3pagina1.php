<!DOCTYPE html>
<html>
	<head>
        <style type="text/css">
			#table {
				border-style: solid;
				border-width: 2px;
			}
		</style>
		<title>pg1</title>
	</head>
	<body>
		<table border = "1" id="table">
            <th>nom</th>
            <th>cognom</th>
            <th>cognom</th>
            <th>numero</th>
			<?php
				$data = file("contactes1.txt");
				foreach( $data as $contacte ){
					echo "<tr>";
					$info = explode(",", $contacte);
					foreach( $info as $a){
                        echo "<td>$a</td>";
                    }
                    $file = $info[0] . "#" . $info[1] . "#" . $info[2] . "#" . $info[3];
                    echo "</tr>";
                    $newfile = fopen("contactes2.txt", "a");
                    fwrite($newfile, $file);
                    fclose($newfile);
                }
			?>
		</table>
	</body>
</html>