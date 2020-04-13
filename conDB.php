<?php
require_once ("config.php");
// funcion para conexion a MYSQL
function conexionDB()
{
   if (!($cnx=mysqli_connect(DB_SERVIDOR,DB_USUARIO,DB_PASS))) {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysqli_select_db($cnx, DB_DATABASE)) {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $cnx;
}
$linkcon=mysqli_connect(DB_SERVIDOR,DB_USUARIO,DB_PASS,DB_DATABASE);
$_SESSION['con']= $linkcon;
?>