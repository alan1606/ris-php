<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_pq = sqlValue($_POST["id_pq"], "int", $horizonte); $total= 0;

 //Calculamos el monto DISPONIBLE que es igual al Monto abonado - la suma de los precios de los conceptos usados
 mysqli_select_db($horizonte, $database_horizonte);
 $consulta1 = "SELECT sum(p.pago_pag) from pagos_ov p 
 				left join orden_venta o on o.referencia_ov = p.referencia_pag 
				left join paquetes pq on pq.no_temp_pq = o.no_temp_ov 
			  where pq.id_pq = $id_pq";
 $query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte)); 
 $row1 = mysqli_fetch_row($query1); $monto_abonado = $row1[0];

 mysqli_select_db($horizonte, $database_horizonte);
 $consulta2 = "SELECT sum(cp.precio_ac) from conceptos_paquetes c 
 				left join asigna_conceptos_paquetes cp on cp.id_ac = c.id_concepto_convenio_cb 
			  where c.id_convenio_paciente_cb = $id_pq and c.usado_cb = 1";
 $query2 = mysqli_query($horizonte, $consulta2) or die (mysqli_error($horizonte)); 
 $row2 = mysqli_fetch_row($query2); $total_usados = $row2[0];

 mysqli_select_db($horizonte, $database_horizonte);
 $consulta3 = "SELECT sum(cp.precio_ac) from conceptos_paquetes c 
 				left join asigna_conceptos_paquetes cp on cp.id_ac = c.id_concepto_convenio_cb 
			  where c.id_convenio_paciente_cb = $id_pq";
 $query3 = mysqli_query($horizonte, $consulta3) or die (mysqli_error($horizonte)); 
 $row3 = mysqli_fetch_row($query3); $total = $row3[0];

 $disponible = $monto_abonado - $total_usados;
 
 echo $disponible.'}*'.$total_usados.'}*'.$total.'}*0';
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>