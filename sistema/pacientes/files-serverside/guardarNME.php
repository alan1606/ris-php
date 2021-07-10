<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $nombre = sqlValue($_POST["nombreUs"], "text", $horizonte);
 $apaterno = sqlValue($_POST["apaternoUs"], "text", $horizonte);
 $amaterno = sqlValue($_POST["amaternoUs"], "text", $horizonte);
 $idU = sqlValue($_POST["id_u_nm"], "int", $horizonte);
 $sucursal = sqlValue($_POST["sucursalUs"], "int", $horizonte);
 $sexo = sqlValue($_POST["sexoUs"], "int", $horizonte);
 $telefono = sqlValue($_POST["telmovilUs"], "text", $horizonte);
 $fnac = sqlValue($_POST["fnacUs"], "date", $horizonte);
 $username = sqlValue($_POST["username"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 if($_POST["sexoUs"]==1){$titulo=sqlValue('DRA.', "text", $horizonte);}
 else{$titulo=sqlValue('DR.', "text", $horizonte);}
 $especialidad = sqlValue($_POST["especialidadU"], "int", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql="INSERT INTO usuarios(idUsuarioR_u, nombre_u, apaterno_u, amaterno_u, sexo_u, nacionalidad_u, fNac_u, idSucursal_u, acceso_u, usuario_u, contrasena_u, tCelular_u, idDepartamento_u, idArea_u, idPuesto_u, idEscolaridad_u, idProfesion_u, titulo_u, fecha_ingreso_u, especialidad_u) VALUES ($idU, $nombre, $apaterno, $amaterno, $sexo, 'MEXICANA', $fnac, $sucursal, '2', $username, $username, $telefono, '4', '21', '1', '6', '4782', $titulo, $now, $especialidad)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>