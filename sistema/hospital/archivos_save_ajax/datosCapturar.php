<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idE = sqlValue($_POST["idE"], "int", $horizonte); //en venta de conceptos
 
mysqli_select_db($horizonte, $database_horizonte);
$result1 = mysqli_query($horizonte, "SELECT p.nombre_p, p.apaterno_p, p.amaterno_p, DATE_FORMAT(p.fNac_p,'%d/%c/%Y'), s.cat_sexo, p.fNac_p from pacientes p left join catalogo_sexos s on s.id_sexo = p.sexo_p where p.id_p = $idP ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

mysqli_select_db($horizonte, $database_horizonte);
$result2 = mysqli_query($horizonte, "SELECT v.referencia_vc, v.id_concepto_es, v.nota_radiologo_vc, DATE_FORMAT(v.fecha_venta_vc,'%d/%c/%Y'), v.usuarioEdo4_e, v.id_personal_medico_vc, s.nombre_su, v.contador_vc, v.usuarioEdo4_e from venta_conceptos v left join sucursales s on s.id_su = v.id_sucursal_vc where v.id_vc = $idE ") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2);
$claveE = sqlValue($row2[1], "int", $horizonte);
$ref = sqlValue($row2[0], "text", $horizonte);
$idUautoriza = sqlValue($row2[4], "int", $horizonte);
$idUmedico = sqlValue($row2[5], "int", $horizonte);

$lista = ''; $k = 0; $lista1 = ''; $k1 = 0;
mysqli_select_db($horizonte, $database_horizonte);
$consultaM = "SELECT m.metodo_me from asignar_metodo am left join bases b on b.aleatorio_b = am.aleatorio_ame left join asignar_bases ab on ab.id_base_ab = b.id_b left join metodos m on m.id_me = am.id_metodo_ame where ab.id_estudio_ab = $claveE group by am.id_metodo_ame ";
$query = mysqli_query($horizonte, $consultaM) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) {
	if($k==0){
		$lista = $fila['metodo_me'];
	}else{
		$lista = $lista.','.$fila['metodo_me'];	
	}
	$k++;
};//echo $lista;

mysqli_select_db($horizonte, $database_horizonte);
$consultaM1 ="SELECT m.muestra_mu from asignar_muestra am left join bases b on b.aleatorio_b = am.aleatorio_am left join asignar_bases ab on ab.id_base_ab = b.id_b left join muestras m on m.id_mu = am.id_muestra_am where ab.id_estudio_ab = $claveE group by am.id_muestra_am ";
$query1 = mysqli_query($horizonte, $consultaM1) or die (mysqli_error($horizonte));
while ($fila1 = mysqli_fetch_array($query1)) {
	if($k1==0){
		$lista1 = $fila1['muestra_mu'];
	}else{
		$lista1 = $lista1.','.$fila1['muestra_mu'];	
	}
	$k1++;
};//echo $lista;

mysqli_select_db($horizonte, $database_horizonte);
$result4d = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, cedulaProfesional_u, id_u, sexo_u, titulo_u from usuarios where id_u = $idUautoriza ") or die (mysqli_error($horizonte));
$row4d = mysqli_fetch_row($result4d);
$quimicoAutoriza = $row4d[0]." ".$row4d[1]." ".$row4d[2];

mysqli_select_db($horizonte, $database_horizonte);
$result4d1 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, cedulaProfesional_u, id_u, sexo_u, titulo_u from usuarios where id_u = $idUmedico ") or die (mysqli_error($horizonte));
$row4d1 = mysqli_fetch_row($result4d1);
$miMedico = $row4d1[0]." ".$row4d1[1]." ".$row4d1[2];

mysqli_select_db($horizonte, $database_horizonte);
$result3 = mysqli_query($horizonte, "SELECT concepto_to, id_area_to from conceptos where id_to = $claveE ") or die (mysqli_error($horizonte));
$row3 = mysqli_fetch_row($result3);
$areaE = sqlValue($row3[1], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result4 = mysqli_query($horizonte, "SELECT nombre_a from areas where id_a = $areaE ") or die (mysqli_error($horizonte));
$row4 = mysqli_fetch_row($result4);

mysqli_select_db($horizonte, $database_horizonte);
$result5 = mysqli_query($horizonte, "SELECT observaciones_l_ov from orden_venta where referencia_ov = $ref ") or die (mysqli_error($horizonte));
$row5 = mysqli_fetch_row($result5);

mysqli_select_db($horizonte, $database_horizonte);
$result6 = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where estatus_vc = 2 and referencia_vc = $ref and tipo_concepto_vc = 3") or die (mysqli_error($horizonte));
$row6 = mysqli_fetch_row($result6);

$fecha1 = new DateTime($row1[5]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
//printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
if($anos>0){$row1[5]=$anos." AÑOS";}
if($anos<1){
	if($meses<=2 and $meses>=1){$row1[5]=$meses." MES(ES) ".$dias." DÍA(S)";}
	if($meses>=3){$row1[5]=$meses." MES(ES) ";}
	if($meses==0){$row1[5]=$dias." DÍA(S)";}
	if($meses==0 and $dias<=1){$row1[5]=$dias." DÍA(S) ".$horas." HORA(S)";}
	if($meses==0 and $dias<1){$row1[5]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
} 
if($anos>150 or $anos<0){$row1[5]="DESCONOCIDA";}else{}

mysqli_select_db($horizonte, $database_horizonte);
$result7 = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where referencia_vc = $ref and tipo_concepto_vc = 3") or die (mysqli_error($horizonte));
$row7 = mysqli_fetch_row($result7);

mysqli_select_db($horizonte, $database_horizonte);
$result8 = mysqli_query($horizonte, "SELECT min(contador_vc), max(contador_vc) from venta_conceptos where referencia_vc = $ref and tipo_concepto_vc = 3") or die (mysqli_error($horizonte));
$row8 = mysqli_fetch_row($result8);

if($row8[0]>1){
	$razon = $row8[1] - $row8[0];
	$nome = $row2[7] - $razon;
}else{$nome = $row2[7];}
  
echo $row1[0].' '.$row1[1].' '.$row1[2].'*}'.$row2[0].'*}'.$row3[0].'*}'.$row4[0].'*}'.$row5[0].'*}'.$row6[0].'*}'.$row4[0].'*}'.$areaE.'*}'.$row2[2].'*}'.$row1[3].'*}'.$row1[4].'*}'.$row1[5].'*}'.$row2[3].'*}'.$miMedico.'*}'.$quimicoAutoriza.'*}'.$row4d[3].'*}'.$lista1.'*}'.$lista.'*}'.$row4d[6].'*}'.$row2[6].'*}'.$nome.' DE '.$row7[0].'*}'.$row2[8].".png";
//Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>