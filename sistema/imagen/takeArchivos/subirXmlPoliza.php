<?php require_once('../../Connections/ric.php'); ?>
<?php
mysqli_select_db($ric, $database_ric);

$nameF = $_GET['key'];
$x = md5(time());
if(!isset($_GET['key']) or $_GET['key']==""){
	echo "<span style='color:red'>Por favor inténtalo en un navegador que no sea FIREFOX</span><br>";
}
 
if($_GET['action'] == 'listFotos'){
 
    $query = mysqli_query($horizonte, "SELECT * FROM imagenes where tipo_im = 'XML_POLIZA' and idDe_im = $nameF");
    while($row = mysqli_fetch_array($query))
    {
        echo  '<li>
				<span name="'.$row['id_im'].'" class="eliminame" style="cursor:pointer; text-decoration:underline;">Eliminar</span>
                <embed src="xml/'.$row['nombre_im'].'?'.$x.'" />
                <span style="display:none">'.$row['nombre_im'].'</span>
            </li>';
    }
 
}elseif($_GET['action'] == 'eliminar'){
	$id_foto=$_GET['id'];
	$consultar = mysqli_query($horizonte, "SELECT * FROM imagenes WHERE tipo_im = 'XML_POLIZA' and id_im=$id_foto");
	$row2 = mysqli_fetch_array($consultar);

	$query = mysqli_query($horizonte, "DELETE FROM imagenes WHERE tipo_im = 'XML_POLIZA' and id_im = '".$_GET['id']."'");
	unlink("xml/".$row2['nombre_im']);
}

else
{
	mysqli_select_db($ric, $database_ric);
	$queryT = mysqli_query($horizonte, "SELECT COUNT(id_im) FROM imagenes where tipo_im = 'XML_POLIZA' and idDe_im = $nameF", $ric) or die (mysqli_error($horizonte));
    $rowT = mysqli_fetch_row($queryT);
	
	if ($rowT[0]>0){
		echo ""; 
	}else{
	
    $destino = "xml/";
    if(isset($_FILES['image'])){
 		$nombre = $nameF.".xml";
        //$nombre = $_FILES['image']['name'];
        $temp   = $_FILES['image']['tmp_name'];
		//$temp   = $nameF.".jpg";
 
        // subir imagen al servidor
        if(move_uploaded_file($temp, $destino.$nombre))
        {
			mysqli_select_db($ric, $database_ric);
            $query = mysqli_query($horizonte, "INSERT INTO imagenes VALUES('','".$nombre."','XML_POLIZA','".$nameF."')");
			$query1 = mysqli_query($horizonte, "SELECT id_im, nombre_im FROM imagenes where tipo_im = 'XML_POLIZA' ORDER BY id_im DESC limit 1");
    		$row1 = mysqli_fetch_row($query1);
        }
 
        echo  '<li>
				<span name="'.$row1[0].'" class="eliminame" style="cursor:pointer; text-decoration:underline">Eliminar</span>
                <embed src="xml/'.$row1[1].'?'.$x.'" />
                <span style="display:">'.''.'</span>
            </li>';
    }
	
	}
}
?>