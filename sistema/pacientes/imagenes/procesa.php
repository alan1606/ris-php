<?php require_once('../../Connections/horizonte.php'); ?>
<?php
require("../../funciones/php/values.php");
$x = md5(time());
mysqli_select_db($horizonte, $database_horizonte);
 
if($_GET['action'] == 'listFotos'){
 	
	$idPac = sqlValue($_GET['idPac'], "int", $horizonte);
    $query = mysqli_query($horizonte, "SELECT nombreFoto_p, id_p FROM pacientes where id_p = $idPac limit 1; ");
	while($rows = mysqli_fetch_assoc($query))
    {//echo $idPac;
        echo  '<li>
				<span name="'.$rows['id_p'].'" id="'.$rows['nombreFoto_p'].'" class="eliminame1" style="cursor:pointer">eliminar</span>
                <img style="border:1px solid black;" src="imagenes/perfil/'.$rows['nombreFoto_p'].'?'.$x.'" />
            </li>';
    }
 
}elseif($_GET['action'] == 'eliminar'){
	if(!isset($_GET['idP'])){
		$idP = 0;
	}else{$idP = sqlValue($_GET['idP'], "int", $horizonte);}
	
	$id_foto=$_GET['id'];
	$consultar = mysqli_query($horizonte, "SELECT * FROM imagenes WHERE id_im = $id_foto limit 1");
	$row2 = mysqli_fetch_array($consultar);
	
	$queryX1 = mysqli_query($horizonte, "update pacientes set foto_p = 0, nombreFoto_p = '' WHERE id_p = $idP limit 1");//Actualizamos al paciente si es q existe el id del paciente
	
	$query = mysqli_query($horizonte, "DELETE FROM imagenes WHERE id_im = '".$_GET['id']."' limit 1");
	unlink("perfil/".$row2['nombre_im']);
	
}elseif($_GET['action'] == 'eliminar1'){//cuando es para actualizar al paciente, la imagen se borra de la carpeta y el registro de la tabla de imagenes se borra con el campo nombre de foto del registro del paciente
	$id_P = sqlValue($_GET['idP'], "int", $horizonte); $nombre_F = sqlValue($_GET['nombreF'], "text", $horizonte);
	$consultar1 = mysqli_query($horizonte, "SELECT nombreFoto_p FROM pacientes WHERE id_p = $id_P limit 1");
	$row2x = mysqli_fetch_array($consultar1);

	$queryx = mysqli_query($horizonte, "DELETE FROM imagenes WHERE nombre_im = $nombre_F limit 1");
	$queryx1 = mysqli_query($horizonte, "update pacientes set foto_p = 0, nombreFoto_p = '' WHERE id_p = $id_P limit 1");
	
	unlink("perfil/".$row2x['nombreFoto_p']);

}elseif($_GET['action'] == 'subir1'){//cuando es para actualizar al paciente, se manda el nombre de la foto del paciente con extensión jpg
	if(!isset($_GET['idP'])){ $idP = 'koby'; }else{$idP = sqlValue($_GET['idP'], "int", $horizonte);}
	
	$nombreF = $_GET['nombreF'];
	$nombreF = sqlValue($nombreF, "text", $horizonte);
	mysqli_select_db($horizonte, $database_horizonte);
	$queryT = mysqli_query($horizonte, "SELECT COUNT(id_im) FROM imagenes where nombre_im = $nombreF") or die (mysqli_error($horizonte));
    $rowT = mysqli_fetch_row($queryT);
	
	if ($rowT[0]>0){ echo "";  }else{
		
		$destino = "perfil/";
		if(isset($_FILES['image'])){
			
			$nombre = $_FILES['image']['name'];
			$temp   = $_FILES['image']['tmp_name'];
			$nombre1 = $_GET['nombreF']; //es el nombre que paso en una variable de explorador llamada action al archivo que procesa y sube la imagen.
	 
			// subir imagen al servidor
			if(move_uploaded_file($temp, $destino.$nombre1))
			{
				$queryX1 = mysqli_query($horizonte, "update pacientes set foto_p = 1, nombreFoto_p = $nombreF WHERE id_p = $idP limit 1");//Actualizamos al paciente si es q existe el id del paciente
				$query = mysqli_query($horizonte, "INSERT INTO imagenes VALUES('','".$nombre1."','1','1')");
				$query1 = mysqli_query($horizonte, "SELECT id_im FROM imagenes ORDER BY id_im DESC limit 1");
				$row1 = mysqli_fetch_array($query1); 
			}
	
			echo  '<li>
					<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td> <img src="imagenes/perfil/'.$nombre1.'?'.$x.'" /> </td>
					  </tr>
					  <tr height="1%">
						<td> <span name="'.$row1['id_im'].'" class="eliminame" style="cursor:pointer">eliminar</span> </td>
					  </tr>
					</table>
				</li>';
		}
	}
}

else //simplemente cuando se va a subir una foto
{
	if(!isset($_GET['idP'])){ $idP = 'koby'; }else{$idP = sqlValue($_GET['idP'], "int", $horizonte);}
	if (substr_count($_GET['action'], '.') >= 1) {
		$miNombre = $_GET['action'];
		list($nombreSimple) = split('.', $miNombre);
		$_GET['action'] = $nombreSimple.'.jpg';
	}else{$_GET['action'] = $_GET['action'].'.jpg';}
	
	$nombreF = $_GET['action'];
	$nombreF = sqlValue($nombreF, "text", $horizonte);
	mysqli_select_db($horizonte, $database_horizonte);
	$queryT = mysqli_query($horizonte, "SELECT COUNT(id_im) FROM imagenes where nombre_im = $nombreF") or die (mysqli_error($horizonte));
    $rowT = mysqli_fetch_row($queryT);
	
	if ($rowT[0]>0){ echo "";  }else{
		
		$destino = "perfil/";
		if(isset($_FILES['image'])){
			
			$nombre = $_FILES['image']['name'];
			$temp   = $_FILES['image']['tmp_name'];
			$nombre1 = $_GET['action']; //es el nombre que paso en una variable de explorador llamada action al archivo que procesa y sube la imagen.
	 
			// subir imagen al servidor
			if(move_uploaded_file($temp, $destino.$nombre1))
			{
				$queryX1 = mysqli_query($horizonte, "update pacientes set foto_p = 1, nombreFoto_p = $nombreF WHERE id_p = $idP limit 1");//Actualizamos al paciente si es q existe el id del paciente
				$query = mysqli_query($horizonte, "INSERT INTO imagenes VALUES('','".$nombre1."','1','1')");
				$query1 = mysqli_query($horizonte, "SELECT id_im FROM imagenes ORDER BY id_im DESC limit 1");
				$row1 = mysqli_fetch_array($query1); 
			}
	
			echo  '<li>
					<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td> <img src="imagenes/perfil/'.$nombre1.'?'.$x.'" /> </td>
					  </tr>
					  <tr height="1%">
						<td id="miGaleri"> <button id="eliminaNFoto" name="'.$row1['id_im'].'" class="eliminame" >Eliminar la imagen</button> </td>
					  </tr>
					</table>
				</li>';
		}
	}
}
?>