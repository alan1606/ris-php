<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';
include_once '../../recursos/datauser.php';

 $id_user = sqlValue($id_u, "int", $horizonte);
 $idE = sqlValue($_POST["idE"], "int", $horizonte);

 if( !isset($_POST["idConvenio"])){
   $idConvenio = sqlValue(0, "int", $horizonte);
 }else{
 	$idConvenio = sqlValue($_POST["idConvenio"], "int", $horizonte);
 }

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);

 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precio = sqlValue($_POST["precioTo"], "double", $horizonte);
 $id_con_bene = sqlValue($_POST["id_con_bene"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $result2 = mysqli_query($horizonte, "SELECT referencia_ov from orden_venta where no_temp_ov = $noTemp") or die (mysqli_error($horizonte));
 $row2 = mysqli_fetch_row($result2); $referencia = sqlValue($row2[0], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $result3 = mysqli_query($horizonte, "SELECT max(contador_vc) from venta_conceptos where no_temp_vc = $noTemp limit 1") or die (mysqli_error($horizonte));
 $row3 = mysqli_fetch_row($result3); $suma = $row3[0]+1;

 $contador = sqlValue($suma, "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql="INSERT INTO venta_conceptos(no_temp_vc,id_paciente_vc,id_usuario_vc,id_personal_medico_vc,id_concepto_es,id_convenio_vc,fecha_venta_vc,precio_vc,usuarioEdo1_e,fechaEdo1_e,id_conceptos_beneficios,temporal_vc, referencia_vc, contador_vc)";
 $sql.="VALUES ($noTemp, $idP, $id_user, $id_user, $idE, $idConvenio, $now, $precio, $id_user, $now, $id_con_bene, 0, $referencia, $contador)";

 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
 if (!$update) { echo $sql; }else{
   mysqli_select_db($horizonte, $database_horizonte);
   $result = mysqli_query($horizonte, "SELECT total_c, subtotal_ov, gran_total_ov, sub_total_c, total_ei, sub_total_i, total_el, sub_total_l, total_s, sub_total_s, total_p, sub_total_p from orden_venta where no_temp_ov = $noTemp") or die (mysqli_error($horizonte));
   $row = mysqli_fetch_row($result);

   $total_c = sqlValue($row[0] + $_POST["precioTo"], "double", $horizonte);
   $subtotal_ov = sqlValue($row[1] + $_POST["precioTo"], "double", $horizonte);
   $gran_total_ov = sqlValue($row[2] + $_POST["precioTo"], "double", $horizonte);
   $sub_total_c = sqlValue($row[3] + $_POST["precioTo"], "double", $horizonte);

   $total_i = sqlValue($row[4] + $_POST["precioTo"], "double", $horizonte);
   $sub_total_i = sqlValue($row[5] + $_POST["precioTo"], "double", $horizonte);

   $total_l = sqlValue($row[6] + $_POST["precioTo"], "double", $horizonte);
   $sub_total_l = sqlValue($row[7] + $_POST["precioTo"], "double", $horizonte);

   $total_s = sqlValue($row[8] + $_POST["precioTo"], "double", $horizonte);
   $sub_total_s = sqlValue($row[9] + $_POST["precioTo"], "double", $horizonte);

   $total_p = sqlValue($row[10] + $_POST["precioTo"], "double", $horizonte);
   $sub_total_p = sqlValue($row[11] + $_POST["precioTo"], "double", $horizonte);

   // Actualizamos la OV
   mysqli_select_db($horizonte, $database_horizonte);

   if( $_POST["opc"] == 1 ){
     $sql1="UPDATE orden_venta SET total_c = $total_c, subtotal_ov = $subtotal_ov, gran_total_ov = $gran_total_ov, sub_total_c = $sub_total_c where no_temp_ov = $noTemp limit 1;";
   }else if( $_POST["opc"] == 2 ){
     $sql1="UPDATE orden_venta SET total_ei = $total_i, subtotal_ov = $subtotal_ov, gran_total_ov = $gran_total_ov, sub_total_i = $sub_total_i where no_temp_ov = $noTemp limit 1;";
   }else if( $_POST["opc"] == 3 ){
     $sql1="UPDATE orden_venta SET total_el = $total_l, subtotal_ov = $subtotal_ov, gran_total_ov = $gran_total_ov, sub_total_l = $sub_total_l where no_temp_ov = $noTemp limit 1;";
   }else if( $_POST["opc"] == 4 ){
     $sql1="UPDATE orden_venta SET total_s = $total_s, subtotal_ov = $subtotal_ov, gran_total_ov = $gran_total_ov, sub_total_s = $sub_total_s where no_temp_ov = $noTemp limit 1;";
   }else if( $_POST["opc"] == 5 ){
     $sql1="UPDATE orden_venta SET total_p = $total_p, subtotal_ov = $subtotal_ov, gran_total_ov = $gran_total_ov, sub_total_p = $sub_total_p where no_temp_ov = $noTemp limit 1;";
   }

   $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));

   if (!$update1) { echo $sql1; }else{ echo 1; }

 }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>
