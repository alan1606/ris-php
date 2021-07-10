<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
//Generales
 $id_pq = sqlValue($_POST['id_pq'], "int", $horizonte);//nombre de usuario del usuario

mysqli_select_db($horizonte, $database_horizonte);
$result = mysqli_query($horizonte, "
	SELECT cp.id_cb, c.concepto_to, cp.usado_cb, DATE_FORMAT(cp.fecha_usado_cb, '%Y-%m-%d'), ac.precio_ac, 
		cp.id_cb, cp.id_cb, cp.id_cb, cp.id_cb, cp.id_cb, pq.activo_pq from conceptos_paquetes cp
		left join asigna_conceptos_paquetes ac on ac.id_ac = cp.id_concepto_convenio_cb
		left join conceptos c on c.id_to = ac.id_concepto_ac
		left join paquetes pq on pq.id_pq = cp.id_convenio_paciente_cb
		where cp.id_convenio_paciente_cb = $id_pq 
	") or die (mysqli_error($horizonte)); 

echo "<table id='tabla_detallitos' class='table-condensed table-bordered table-striped' width='100%' height='100%'> \n"; 
echo "<thead class='bg-success'><tr>
		<td>#</td>
		<td class='bg-success'>CONCEPTO</td>
		<td class='bg-success'>DISPONIBLE</td>
		<td class='bg-success' nowrap>FECHA USO</td>
		<td class='bg-success'>PRECIO</td>
		<td class='bg-success'>USAR</td>
	</tr></thead><tbody> \n";
$cont = 0;
while ( $row = mysqli_fetch_row($result) ){ 
	$cont++;
	if($row[10]==1){//Paquete activo
		if($row[2]==0){//Concepto no usado
			$disponible = 'SI';
			$check='<input class="checkis" type="checkbox" name="usar_'.$row[0].'" onClick="usar_c(this.value,this.lang,this.id)" id="usar'.$row[0].'" lang="'.$row[4].'" value="'.$row[0].'">';
			$clase= 'text-black';
		}else{//Concepto ha sido usado
			$disponible = 'NO'; $check = '-'; $clase= 'text-danger';
		}
		$btn_generar_ov='<button type="button" class="btn btn-primary btn-sm" id="btn_genera_ov" onClick="generar_orden()">Generar Orden</button>';
	}else{//Paquete inactivo
		$disponible = 'NO'; $clase= 'text-danger'; $btn_generar_ov=''; $check = '-';
	}
	if($row[3]==null){$row[3]='No usado';}
	echo"<tr class='".$clase."'>
			<td>$cont</td>
			<td>$row[1]</td>
			<td align='center'>$disponible</td>
			<td align='center'>$row[3]</td>
			<td align='right'>$ $row[4]</td>
			<td align='center'>$check</td>
		</tr> \n"; 
} 
echo "</tbody>
	<tfoot><tr>
		<td class='bg-success'>&nbsp;</td>
		<td class='bg-success' align='right'>$btn_generar_ov</td>
		<td class='bg-success'></td>
		<td class='bg-success'></td>
		<td class='bg-success'></td>
		<td class='bg-success'></td>
	</tr></tfoot> \n
	</table> \n"; 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>