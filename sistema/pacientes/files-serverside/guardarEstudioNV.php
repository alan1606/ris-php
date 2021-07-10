<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $id_user = sqlValue($_SESSION['id'], "int", $horizonte);

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 if(isset($_POST["idMedico"])){$idMedico = sqlValue($_POST["idMedico"], "int", $horizonte);}else{$idMedico=0;}

 $idE = sqlValue($_POST["idE"], "int", $horizonte);
 mysqli_select_db($horizonte, $database_horizonte);
 $resultC = mysqli_query($horizonte, "SELECT id_to, id_departamento_to, id_area_to, precio_to, id_tipo_concepto_to, aleatorio_c from conceptos where id_to = $idE ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC); $tempiU = sqlValue($rowC[5], "text", $horizonte);

 if($rowC[4]==1){//Cuando es una consulta
	 mysqli_select_db($horizonte, $database_horizonte);
	 $resultMCt = mysqli_query($horizonte, "SELECT id_u from usuarios where temporal_u = $tempiU ") or die (mysqli_error($horizonte));
	 $rowMCt = mysqli_fetch_row($resultMCt);

	 $idMedico = $rowMCt[0];
 }else if($rowC[4]==2){//Cuando es un servicio
	 $idMedico = $id_user;
 }

 if( !isset($_POST["idConvenio"])){ $idConvenio = sqlValue(0, "int", $horizonte); }else{
 	$idConvenio = sqlValue($_POST["idConvenio"], "int", $horizonte);
 }

 $idDepartamento = sqlValue($rowC[1], "int", $horizonte);
 $idArea = sqlValue($rowC[2], "int", $horizonte);
 $idSucursal = sqlValue($_POST["idSucursal"], "int", $horizonte);

 if( !isset($_POST["observaciones"])){ $observaciones = sqlValue("", "text", $horizonte); }else{
 	$observaciones = sqlValue($_POST["observaciones"], "text", $horizonte);
 }

 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precio = sqlValue($_POST["precioTo"], "double", $horizonte);
 $tipoConcepto = sqlValue($_POST["tipoConcepto"], "int", $horizonte);
 $id_con_bene = sqlValue($_POST["id_con_bene"], "int", $horizonte);
 $ocupado = sqlValue($_POST["ocupado"], "int", $horizonte);

 if( !isset($_POST["agendar"])){ $fechaC = $now; }else{
 	if($_POST["agendar"]==1){ $fechaC = sqlValue($_POST["fechaC"], "text", $horizonte); } else{ $fechaC = $now; }
 }

 if($ocupado==0){
	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql="INSERT INTO venta_conceptos(no_temp_vc,id_paciente_vc,id_usuario_vc,id_personal_medico_vc,id_concepto_es,id_convenio_vc,observaciones_vc,fecha_venta_vc,precio_vc,usuarioEdo1_e,fechaEdo1_e,id_conceptos_beneficios)";
	 $sql.="VALUES ($noTemp, $idP, $idU, $idMedico, $idE, $idConvenio, $observaciones, $fechaC, $precio, $idU, $fechaC, $id_con_bene)";

	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	 if (!$update) { echo $sql; }else{
	 	echo 1;
	 }
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>
