<?php
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
$cod_grupo = rand_string(10);
$reg_pass= "INSERT INTO esc_grupos (id_grupo, nombre_grupo, creacion) VALUES ('".$cod_grupo."', '".$_POST['inputNombre']."', NOW())";
	if (mysqli_query($_SESSION['con'], $reg_pass)or die(mysqli_error($_SESSION['con']))) {
					echo "<div class=\"alert alert-success\" role=\"alert\"> </div>";
				}else {
					echo "<div class=\"alert alert-warning\" role=\"alert\"> </div>";
				}

 // FIN CREAR TABLA
echo "<meta http-equiv=\"refresh\" content=\"0;URL=grupo.php?id=".$cod_grupo."\">";
?>