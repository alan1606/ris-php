<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idM = sqlValue($_POST["idM"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT id_u from usuarios where clave_u = $idM limit 1 ") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultRu = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, clave_u, especialidad_u, precio_consulta_u, comision_consulta_u, idDepartamento_u, idArea_u, idPuesto_u from usuarios where id_u = $rowR[0] ") or die (mysqli_error($horizonte));
 $rowRu = mysqli_fetch_row($resultRu);
 
 $idEspecialidad = sqlValue($rowRu[4], "int", $horizonte);
 $idPuesto = sqlValue($rowRu[9], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultEu = mysqli_query($horizonte, "SELECT nombre_especialidad from especialidades where id_es = $idEspecialidad ") or die (mysqli_error($horizonte));
 $rowEu = mysqli_fetch_row($resultEu);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultPu = mysqli_query($horizonte, "SELECT nombre_cp from catalogo_puestos where id_cp = $idPuesto ") or die (mysqli_error($horizonte));
 $rowPu = mysqli_fetch_row($resultPu);
 
 $cadena = $rowR[0].";".$rowRu[0]." ".$rowRu[1]." ".$rowRu[2].";".$rowRu[3].";".$rowEu[0].";".$rowRu[5].";".$rowRu[6].";".$rowRu[7].";".$rowRu[8].";".$rowPu[0];
 
 echo $cadena;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>