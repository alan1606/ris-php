<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idPacienteN"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreP"], "text", $horizonte);
 $area = sqlValue($_POST["areaB"], "int", $horizonte);
 $unidadMedidaResultado = sqlValue($_POST["id_umBase"], "int", $horizonte);
 $precioEstimado = sqlValue($_POST["precioP"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorioB"], "text", $horizonte);
 if(isset($_POST["equipoMu1"])){
	 $equipo = sqlValue($_POST["equipoMu1"], "int", $horizonte);
 }else{$equipo = 'NULL';}
  
 $sql = "UPDATE bases SET usuario_reg_b = $idUsuario, base_b = $nombre, id_area_b = $area, unidad_medida_r_b = $unidadMedidaResultado, precio_maquila_b = $precioEstimado, id_equipo_b = $equipo where id_b = $id limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>