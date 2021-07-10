<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

 $idP = sqlValue($_POST["id_pac_hv2"], "int", $horizonte);
 $idV = sqlValue($_POST["vacuna_add"], "int", $horizonte);
 $fecha = sqlValue($_POST["date_apvac"], "date", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultS= mysqli_query($horizonte, "SELECT vacuna_v, enfermedad_v, edad_v, aplicacion_v, dosis_v from catalogo_vacunas where id_v = $idV") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS); 

 $vacuna = sqlValue($rowS[0], "text", $horizonte);
 $enfermedad = sqlValue($rowS[1], "text", $horizonte);
 $edad = sqlValue($rowS[2], "text", $horizonte);
 $aplicacion = sqlValue($rowS[3], "text", $horizonte);
 $dosis = sqlValue($rowS[4], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sqlY = "insert into vacunas_aplicadas SET id_paciente_va = $idP, vacuna_va = $vacuna, aplicada_va = 1, enfermedad_va = $enfermedad, edad_va = $edad, dosis_va = $dosis, fecha_aplicacion_va = $fecha, id_usuario_va = $id_user, fecha_va = $now, esquema = 2";
 $updateY = mysqli_query($horizonte, $sqlY) or die (mysqli_error($horizonte));

 if (!$updateY) { echo $sqlY; }else {echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>