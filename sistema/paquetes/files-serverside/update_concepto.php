<?php
include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';
include_once '../../recursos/datauser.php';

require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idCo = sqlValue($_POST["id"], "int", $horizonte);
$precio = sqlValue($_POST["precio"], "doube", $horizonte);
$cantidad = sqlValue($_POST["cantidad"], "int", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 //if($acceso_usuario==1){
	 mysqli_select_db($horizonte, $database_horizonte);
 	 $sql = "update asigna_conceptos_paquetes set precio_ac = $precio, cantidad_ac = $cantidad where id_ac = $idCo limit 1";
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
	 if (!$update) { echo $sql; }else{
		 //El precio del paquete es el precio de la tabla de conceptos, actualizar precio_to
		 mysqli_select_db($horizonte, $database_horizonte);
		 $result1 = mysqli_query($horizonte, "SELECT aleatorio_ac from asigna_conceptos_paquetes where id_ac = $idCo limit 1") or die(mysqli_error($horizonte));
		 $row1 = mysqli_fetch_row($result1); $aleatorio = sqlValue($row1[0], "text", $horizonte);
		 
		 //Sumamos los precios de los conceptos del paquete del paciente por su cantidad
		 mysqli_select_db($horizonte, $database_horizonte);
		 $result2 = mysqli_query($horizonte, "SELECT sum(a.precio_ac*a.cantidad_ac) from asigna_conceptos_paquetes a left join conceptos c on c.id_to = a.id_concepto_ac where a.aleatorio_ac = $aleatorio order by a.id_ac desc") or die(mysqli_error($horizonte));
		 $row2 = mysqli_fetch_row($result2); $precioConcepto = sqlValue($row2[0], "doube", $horizonte);
		 
		 mysqli_select_db($horizonte, $database_horizonte);
		 $result3 = mysqli_query($horizonte, "SELECT id_to from conceptos where aleatorio_c = $aleatorio limit 1") or die(mysqli_error($horizonte));
		 $row3 = mysqli_fetch_row($result3); $idConcepto = sqlValue($row3[0], "text", $horizonte);
		 
		 //Actualizamos el precio del paquete, que es el de la tabla de conceptos
		 mysqli_select_db($horizonte, $database_horizonte);
		 $sql1 = "update conceptos set precio_to = $precioConcepto, precio_urgencia_to = $precioConcepto, precio_m= $precioConcepto, precio_mu= $precioConcepto where id_to = $idConcepto limit 1";
		 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));

		 if (!$update1) { echo $sql; }else{ echo 1; }
	 } 
 //}else{
	// echo 2;
 //}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>