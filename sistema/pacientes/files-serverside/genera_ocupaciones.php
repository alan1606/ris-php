<?php
header('content-type: text/html; charset: utf-8');
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 //$_GET['ocupacion'] = 'DISE';
 $profesion = $_GET['query'];
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "SELECT id_ocupacion, ocupacion FROM catalogo_ocupaciones where ocupacion like '%".$profesion."%' ";
 $result = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

 $json = [];
 while($row = mysqli_fetch_array($result)){
	 $json[] = array(
		'id' => $row['id_ocupacion'],
        'name' => $row['ocupacion']
    );
 }

 echo json_encode($json);
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>