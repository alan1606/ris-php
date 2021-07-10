<?php
	require_once('Connections/horizonte.php');
	require("funciones/php/values.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SISTEMA DE EXPEDIENTE CLÍNICO ELECTRÓNICO">
    <meta name="author" content="ING EMMANUEL ANZURES BAUTISTA">
    
    <title>SISTEMA - SERVICIOS MÉDICOS</title>
    
</head>

<!-- Contenido -->
<?php
mysqli_select_db($horizonte, $database_horizonte); echo 'Start'; mysqli_query("SET NAMES 'utf8'");
	
	$file = fopen("archivo.txt", "r") or exit("Unable to open file!");
	//Output a line of the file until the end is reached
	while(!feof($file))
	{
		//echo fgets($file). "<br />";
		
		list($telefono, $nombre, $rfc, $calle, $localidad, $municipio, $cp) = explode("|", fgets($file));

		if ($cp == 'CODIGO_POSTAL' || $telefono == NULL || strlen($cp) > 5 || strlen($rfc) > 15 || strlen($localidad) > 80 ){ continue; }
		
		$telefono = sqlValue(utf8_decode(strtoupper($telefono)), "text", $horizonte);
		$nombre = sqlValue(utf8_decode(strtoupper($nombre)), "text", $horizonte);
		$rfc = sqlValue(utf8_decode(strtoupper($rfc)), "text", $horizonte);
		$calle = sqlValue(utf8_decode(strtoupper($calle)), "text", $horizonte);
		$localidad = sqlValue(utf8_decode(strtoupper($localidad)), "text", $horizonte);
		$municipio = sqlValue(utf8_decode(strtoupper($municipio)), "text", $horizonte);
		$cp = sqlValue(utf8_decode(strtoupper($cp)), "text", $horizonte);

		//echo 'Telefono: '.$telefono.'<br/>'; 
		//echo 'Nombre: '.$nombre.'<br/>'; 
		//echo 'RFC: '.$rfc.'<br/>'; REPLACE(campo, "-", '_')
		//echo 'Calle: '.$calle.'<br/>'; 
		//echo 'Localidad: '.$localidad.'<br/>'; 
		//echo 'Municipio: '.$municipio.'<br/>';
		//echo 'CP: '.$cp.'<br/><br/>';
		
		//$insert = "INSERT INTO contactos(telefono_c, region_c, nombre_c, rfc_c, calle_c, localidad_c, municipio_c, cp_c) VALUES ($telefono, '9', REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($nombre,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), $rfc, REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($calle,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($localidad,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($municipio,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), $cp)";
		$insert = "INSERT INTO contactos(telefono_c, region_c, nombre_c, rfc_c, calle_c, municipio_c, cp_c) VALUES ($telefono, '9', REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($nombre,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), '\xEC', 'Í'), '\xFD','Y'), '\xE7','C'), '\xFB','U'), '\xF2', 'O'), 'xFF','Y'), $rfc, REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($calle,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), '\xEC', 'Í'), '\xFD','Y'), '\xE7','C'), '\xFB','U'), '\xF2', 'O'), 'xFF','Y'), REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($municipio,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), '\xEC', 'Í'), '\xFD','Y'), '\xE7','C'), '\xFB','U'), '\xF2', 'O'), 'xFF','Y'), REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (REPLACE( REPLACE($cp,'\xF1','Ñ'),'\xED','Í'), '\xFF','Ñ'), '\xE9', 'É'), '\xE1', 'Á'), '\xFA','Ú'), '\xF3','Ó'), '\xFC','U'), '\xB0', 'º'), '\xAA','A'), '\xE8','É'), '\xBA', 'O'), '\xB4',''), '\xBF',''), '\xA1', ''), '\xA8', ''), '\xE0','Á'), '\xEC', 'Í'), '\xFD','Y'), '\xE7','C'), '\xFB','U'), '\xF2', 'O'), 'xFF','Y') )";

		$update = mysqli_query($horizonte, $insert) or die (mysqli_error($horizonte));
	
		if(!$update){echo $sql;} else{ }//echo 'ok'; }
		 		
	}
	fclose($file);
	
	echo 'End';
?>
<!-- FIN Contenido -->  
