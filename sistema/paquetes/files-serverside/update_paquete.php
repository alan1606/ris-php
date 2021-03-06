<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idEstudio = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreE"]), "text", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio_paq"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 //Checamos si el paquete al menos tiene 1 concepto asignado con su precio unitario y cantidad
 mysqli_select_db($horizonte, $database_horizonte);
 $result3 = mysqli_query($horizonte, "SELECT count(id_ac) from asigna_conceptos_paquetes where aleatorio_ac = $aleatorio") or die(mysqli_error($horizonte));
 $row3 = mysqli_fetch_row($result3);

 if($row3[0]>1){//Hay al menos un concepto
	 mysqli_select_db($horizonte, $database_horizonte); $estado = 0; $precio = 0;
	 $query = mysqli_query($horizonte, "SELECT id_ac, precio_ac, cantidad_ac from asigna_conceptos_paquetes where aleatorio_ac = $aleatorio") or die(mysqli_error($horizonte));
	 while ($fila = mysqli_fetch_array($query)) {
		 $mi_id = sqlValue($fila['id_ac'], "int", $horizonte);
		 
		 mysqli_select_db($horizonte, $database_horizonte);
		 $result2 = mysqli_query($horizonte, "SELECT count(id_ac) from asigna_conceptos_paquetes where id_ac = $mi_id and (precio_ac is null or cantidad_ac is null)") or die(mysqli_error($horizonte));
		 $row2 = mysqli_fetch_row($result2);

		 if($row2[0]>0){$estado++;}else{
			 $precio = $precio + ($fila['precio_ac']*$fila['cantidad_ac']);
		 }
	 };
	 $precio = sqlValue($precio, "double", $horizonte);

	 //Si estado = 0 hay al menos un concepto asignado al convenio con su precio(s) y su(s) cantidad(es)
	 if($estado==0){
		 mysqli_select_db($horizonte, $database_horizonte);
		 $sql = "update conceptos set concepto_to = $nombre, precio_to = $precio, precio_urgencia_to = $precio, precio_m = $precio, precio_mu = $precio where id_to = $idEstudio limit 1";

		 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

		 if (!$update) { echo $sql; }else{ 
			 echo 1;
		 }
	 }else{//Tiene conceptos asignados pero le faltan datos del precio unitario y/o cantidad
		 echo 3;
	 }
 }else{//No podemos continuar ya que no hay ning??n concepto asignado
	 echo 2;
 }

 //Cerrar conexi??n a la Base de Datos
 mysqli_close($horizonte);
?>