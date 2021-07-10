<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idEstudio = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreE"]), "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $no_beneficiarios = sqlValue($_POST["no_beneficiarios"], "int", $horizonte);

 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue(date('Y-m-d-H-i-s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE conceptos set concepto_to = $nombre, precio_to = $precio, dias_entrega_to = $no_beneficiarios where id_to = $idEstudio limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>