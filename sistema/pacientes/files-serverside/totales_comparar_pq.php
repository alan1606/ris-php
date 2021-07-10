<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_pq = sqlValue($_POST["id_pq"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $consulta1 = "SELECT c1.precio_to as precio_sin, c.precio_ac as precio_con, c.cantidad_ac as cantidad from asigna_conceptos_paquetes c left join conceptos m on m.aleatorio_c = c.aleatorio_ac left join conceptos c1 on c1.id_to = c.id_concepto_ac where m.id_to = $id_pq";
 $query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));
 $total_sin = 0; $total_con = 0; $ahorro = 0;
 while ($fila = mysqli_fetch_array($query1)) {
	 $total_sin = $total_sin+$fila['precio_sin']*$fila['cantidad'];
	 $total_con = $total_con+$fila['precio_con']*$fila['cantidad'];
 };
 $ahorro = $total_sin-$total_con;

 echo $total_sin.'}*'.$total_con.'}*'.$ahorro;
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>