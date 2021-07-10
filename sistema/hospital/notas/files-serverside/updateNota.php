<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idN = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreNM"], "text", $horizonte);
 $nota = sqlValue($_POST["input"], "text", $horizonte);
 $area = sqlValue($_POST["area_nota"], "int", $horizonte);
 
 $sql = "UPDATE notas_medicas SET nombre_nm = $nombre, nota_nm = $nota, id_area_nm = $area where id_nm = $idN limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>