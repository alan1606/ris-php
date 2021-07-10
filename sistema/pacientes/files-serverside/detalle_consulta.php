<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);
 mysqli_select_db($horizonte, $database_horizonte);

 if( isset($_POST["from_co"]) ){
   $result = mysqli_query($horizonte, "SELECT e.concepto_to, v.precio_vc from venta_conceptos v left join conceptos e on e.id_to = v.id_concepto_es where v.no_temp_vc = $aleatorio and e.id_tipo_concepto_to = 1 and v.estatus_vc = 1") or die (mysqli_error($horizonte));
 }else{
   $result = mysqli_query($horizonte, "SELECT e.concepto_to, v.precio_vc from venta_conceptos v left join conceptos e on e.id_to = v.id_concepto_es where v.no_temp_vc = $aleatorio and e.id_tipo_concepto_to = 1") or die (mysqli_error($horizonte));
 }

 $cont = 0; echo "<table class='table-condensed'> \n";
 while ( $row = mysqli_fetch_row($result) ){
	$cont++;
	echo"<tr style='color:black;' class='$row[1]'>
			<td>$cont</td>
			<td>$row[0] $$row[1]</td>
		</tr> \n";
 }
 echo "</table> \n";
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>
