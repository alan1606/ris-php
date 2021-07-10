<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idMedico = sqlValue($_POST["idMedico"], "int", $horizonte);
 $claveE = sqlValue($_POST["claveE"], "text", $horizonte);
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC = mysqli_query($horizonte, "SELECT id_serv, id_departamento_serv, id_area_serv, costo_serv from servicios where clave_serv = $claveE ") or die (mysqli_error($horizonte));
	 $rowC = mysqli_fetch_row($resultC);
 $idE = sqlValue($rowC[0], "int", $horizonte);
 $idConvenio = sqlValue($_POST["idConvenio"], "int", $horizonte);
 if($_POST["idConvenio"]==''){$idConvenio=0;}
 $idDepartamento = sqlValue($rowC[1], "int", $horizonte);
 $idArea = sqlValue($rowC[2], "int", $horizonte);
 $idSucursal = sqlValue($_POST["idSucursal"], "int", $horizonte);
 $observaciones = sqlValue($_POST["observaciones"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precio = sqlValue($rowC[3], "double", $horizonte);
 $fechaEntrega = sqlValue($_POST["fechaEntrega"], "date", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
$sql="INSERT INTO venta_conceptos(no_temp_vc,id_paciente_vc,id_usuario_vc,id_personal_medico_vc,id_concepto_es,id_convenio_vc,departamento_vc,area_vc,id_sucursal_vc,observaciones_vc,fecha_venta_vc,tipo_concepto_vc,precio_normal_vc,fecha_entrega_vc,usuarioEdo1_e,fechaEdo1_e)";
$sql.= "VALUES ($noTemp, $idP, $idU, $idMedico, $idE, $idConvenio, $idDepartamento, $idArea, $idSucursal, $observaciones, $now, 2, $precio, $fechaEntrega, $idU, $now)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>