<?php
//Creado por Quincho, así que a saber...
//13.03.2016
session_start();
ob_start();
require("conDB.php");
conexionDB();
header('Content-Type: text/html; charset=UTF-8');

function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);
}
function clean($string) {
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
$cod_tabla = rand_string(10);
$reg_pass= "INSERT INTO esc_grupos (id_grupo, nombre_grupo, creacion) VALUES ('".$cod_tabla."', '".$_POST['inputNombre']."', NOW())";
	if (mysqli_query($_SESSION['con'], $reg_pass)or die(mysqli_error($_SESSION['con']))) {
					echo "<div class=\"alert alert-success\" role=\"alert\"> </div>";
				}else {
					echo "<div class=\"alert alert-warning\" role=\"alert\"> </div>";
				}
 //CREAR TABLA
	$sql = "CREATE TABLE `esc_gr_".$cod_tabla."` (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	juez VARCHAR(30) NOT NULL,
	`1` INT(2) NOT NULL DEFAULT '0',
	`2` INT(2) NOT NULL DEFAULT '0',
	`3` INT(2) NOT NULL DEFAULT '0',
	`4` INT(2) NOT NULL DEFAULT '0',
	`5` INT(2) NOT NULL DEFAULT '0',
	`6` INT(2) NOT NULL DEFAULT '0',
	`7` INT(2) NOT NULL DEFAULT '0',
	`8` INT(2) NOT NULL DEFAULT '0',
	`9` INT(2) NOT NULL DEFAULT '0',
	`10` INT(2) NOT NULL DEFAULT '0',
	`11` INT(2) NOT NULL DEFAULT '0',
	`12` INT(2) NOT NULL DEFAULT '0',
	`13` INT(2) NOT NULL DEFAULT '0',
	`14` INT(2) NOT NULL DEFAULT '0',
	`15` INT(2) NOT NULL DEFAULT '0',
	`16` INT(2) NOT NULL DEFAULT '0',
	`17` INT(2) NOT NULL DEFAULT '0',
	`18` INT(2) NOT NULL DEFAULT '0',
	`19` INT(2) NOT NULL DEFAULT '0',
	`20` INT(2) NOT NULL DEFAULT '0',
	`21` INT(2) NOT NULL DEFAULT '0',
	`22` INT(2) NOT NULL DEFAULT '0',
	`23` INT(2) NOT NULL DEFAULT '0',
	`24` INT(2) NOT NULL DEFAULT '0',
	`25` INT(2) NOT NULL DEFAULT '0',
	`26` INT(2) NOT NULL DEFAULT '0'
	)";

	if (mysqli_query($_SESSION['con'], $sql)) {
		echo " ";
	} else {
		echo "Error creating table: " . mysqli_error($_SESSION['con']);
	}

 // FIN CREAR TABLA
echo "<meta http-equiv=\"refresh\" content=\"0;URL=../grupo.php?id=".$cod_tabla."\">";
?>