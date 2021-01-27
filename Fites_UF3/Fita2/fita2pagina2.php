<!DOCTYPE html>
<html>
	<head>
		<title>PG1</title>
        <style>
 		body{
 		}
 		table,td, th {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
	</head>
	<body>
		<?php
            //SQL connection data.
            try{
                //First we save in variables the data connection info, and connect with database.
                $hostname = 'localhost';
                $dbname = 'fita';
                $uname = 'php';
                $pw = 'Php_1c4J8';
                $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$uname","$pw");
            } catch (PDOException $e) {
                //In case of error, we show a message explaining it.
                echo "Failed to get DB handle: " . $e->getMessage() . "\n";
                exit;
            }
            if (isset($_POST["name"])){
                if (isset($_POST["mail"])){
                    if (isset($_POST["pass"])){
                        if (isset($_POST["pass2"])){
                            $name = $_POST["name"];
                            $mail = $_POST["mail"];
                            $pass1 = $_POST["pass"];
                            $pass2 = $_POST["pass2"];

                            if ($pass1 == $pass2){
                                $date = date('Y-m-d H:m:s');
                                $newPWD = hash('sha256', $pass1);

                                $check = $pdo->prepare("SELECT * FROM USERS WHERE mail = :mail;");
                                $check->bindParam(':mail', $mail);
                                $check->execute();
                                if ($check){
                                    echo "El usuari ja existeix";
                                } else {
                                    //Query:
                                    $query = $pdo->prepare("INSERT INTO users (name, mail, register, pwd) VALUES (:name, :mail, CURRENT_TIME(), :pwd);");
                                    $query->bindParam(':name', $name);
                                    $query->bindParam(':mail', $mail);
                                    $query->bindParam(':pwd', $newPWD);
                                    $query->execute();
                                    echo "El usuari s'ha enregistrat.";
                                }
                            } else{
                                echo "Les contrasenyes no coincideixen!";
                            }
                        } else {
                            echo "No s'ha enviat la confirmació de contrasenya";
                        }
                    } else {
                        echo "No s'ha enviat la contrasenya";
                    }
                } else {
                    echo "No s'ha enviat el correu";
                }
            } else {
                echo "No s'ha enviat el nom.";
            }
		?>
	</body>
</html>