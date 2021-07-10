<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $img = $_POST['imgBase64'];
 $img = str_replace('data:image/png;base64,', '', $img);
 $img = str_replace(' ', '+', $img);
 $fileData = base64_decode($img);
 //saving
 mkdir("../img_cslta/".$_POST['id'], 0777);
 $fileName = '../img_cslta/'.$_POST['id'].'/'.$_POST['cont'].'.png';
 file_put_contents($fileName, $fileData);
 
 $nombre_img = '"'.$_POST['cont'].'.png'.'"';
 $idEstudio = $_POST['id'];
 $imagen = $_POST['cont'];
 
 //guardamos un registro en la table de imágenes de endoscopía por cada imagen que guardemos
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO img_consulta (nombre_ie, id_estudio_vc_ie, imagen_ie, a_reporte_ie) VALUES ($nombre_img, $idEstudio, $imagen, 0)";
  
$inserta = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

if (!$inserta) { echo $sql; }else{ echo 1; }
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>