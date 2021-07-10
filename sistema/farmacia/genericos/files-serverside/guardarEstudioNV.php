<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idMedico = sqlValue($_POST["idMedico"], "int", $horizonte);
 $idE = sqlValue($_POST["idE"], "int", $horizonte);
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC = mysqli_query($horizonte, "SELECT id_to, id_departamento_to, id_area_to, precio_to from conceptos where id_to = $idE ") or die (mysqli_error($horizonte));
	 $rowC = mysqli_fetch_row($resultC);

 $idConvenio = sqlValue($_POST["idConvenio"], "int", $horizonte);
 if($_POST["idConvenio"]==''){$idConvenio=0;}
 $idDepartamento = sqlValue($rowC[1], "int", $horizonte);
 $idArea = sqlValue($rowC[2], "int", $horizonte);
 $idSucursal = sqlValue($_POST["idSucursal"], "int", $horizonte);
 $observaciones = sqlValue($_POST["observaciones"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precio = sqlValue($_POST["precioTo"], "double", $horizonte);
 $tipoConcepto = sqlValue($_POST["tipoConcepto"], "int", $horizonte);
 $id_con_bene = sqlValue($_POST["id_con_bene"], "int", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
$sql="INSERT INTO venta_conceptos(no_temp_vc,id_paciente_vc,id_usuario_vc,id_personal_medico_vc,id_concepto_es,id_convenio_vc,departamento_vc,area_vc,id_sucursal_vc,observaciones_vc,fecha_venta_vc,tipo_concepto_vc,precio_normal_vc,usuarioEdo1_e,fechaEdo1_e,id_conceptos_beneficios)";
$sql.= "VALUES ($noTemp, $idP, $idU, $idMedico, $idE, $idConvenio, $idDepartamento, $idArea, $idSucursal, $observaciones, $now, $tipoConcepto, $precio, $idU, $now, $id_con_bene)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>