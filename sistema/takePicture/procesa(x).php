<?php require_once('../Connections/productores.php'); ?>
<?php
mysql_select_db($database_productores, $productores);
 
if($_GET['action'] == 'listFotos'){
 
    $query = mysqli_query($horizonte, "SELECT * FROM fotos ORDER BY id_foto DESC");
    while($row = mysqli_fetch_array($query))
    {
        echo  '<li>
				<span name="'.$row['id_foto'].'" class="eliminame" style="cursor:pointer">eliminar</span>
                <img src="photos/'.$row['nombre_foto'].'" />
                <span style="display:none">'.$row['nombre_foto'].'</span>
            </li>';
    }
 
}elseif($_GET['action'] == 'eliminar'){
	$id_foto=$_GET['id'];
	$consultar = mysqli_query($horizonte, "SELECT * FROM fotos WHERE id_foto=$id_foto");
	$row2 = mysqli_fetch_array($consultar);

	$query = mysqli_query($horizonte, "DELETE FROM fotos WHERE id_foto = '".$_GET['id']."'");
	unlink("photos/".$row2['nombre_foto']);
}

else
{
    $destino = "photos/";
    if(isset($_FILES['image'])){
 
        $nombre = $_FILES['image']['name'];
        $temp   = $_FILES['image']['tmp_name'];
 
        // subir imagen al servidor
        if(move_uploaded_file($temp, $destino.$nombre))
        {
            $query = mysqli_query($horizonte, "INSERT INTO fotos VALUES('','".$nombre."')");
			$query1 = mysqli_query($horizonte, "SELECT id_foto FROM fotos ORDER BY id_foto DESC limit 1");
    		$row1 = mysqli_fetch_array($query1);
        }
 
        echo  '<li>
				<span name="'.$row1['id_foto'].'" class="eliminame" style="cursor:pointer">eliminar</span>
                <img src="photos/'.$nombre.'" />
                <span style="display:none">'.$nombre.'</span>
            </li>';
    }
}
?>