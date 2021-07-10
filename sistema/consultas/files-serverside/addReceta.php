<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idusuarioNM"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreNM"]), "text", $horizonte);
 $nota = sqlValue($_POST["input"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $a = sqlValue($_POST["a"], "text", $horizonte);
 $temporal = sqlValue($_POST["temporal"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 if(!isset($_POST["a"]) or $_POST["a"]==''){//Estan creando al nuevo usuario
 	$sql = "INSERT INTO notas_medicas(nombre_nm, nota_nm, temporal_nm, fecha_nm, tipo_nm, user_reg_nm) VALUES($nombre, $nota, $temporal, $now, 4, $idUsuario)";	 
 }else{//Usuario que ya existe
	 $sql= "INSERT INTO notas_medicas(nombre_nm, nota_nm, temporal_nm, fecha_nm, tipo_nm, user_reg_nm) VALUES($nombre, $nota, $temporal, $now, 4, $idUsuario)";
 }  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>