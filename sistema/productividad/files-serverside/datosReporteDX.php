<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 //fecha inicial
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT min(date_format(fecha_venta_ov,'%d/%m/%Y')), fecha_venta_ov from orden_venta order by fecha_venta_ov asc limit 1") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result); //$f1 = '"'.$row[0].'"'; echo $f1;
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result0 = mysqli_query($horizonte, "SELECT min(fecha_venta_ov) from orden_venta where fecha_venta_ov is not NULL order by fecha_venta_ov asc limit 1") or die (mysqli_error($horizonte));
 $row0 = mysqli_fetch_row($result0); //echo $row0[0];
 
 //dias transcurridos
 mysqli_select_db($horizonte, $database_horizonte);
 $result1 = mysqli_query($horizonte, "SELECT DATEDIFF(now(),'$row0[0]') from orden_venta ") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);
 
 //total de consultas
 mysqli_select_db($horizonte, $database_horizonte);
 $result1z = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 1 and temporal_vc = 0") or die (mysqli_error($horizonte));
 $row1z = mysqli_fetch_row($result1z);
 
 $avance = $row1z[0];
 
 //total de dx dados
 mysqli_select_db($horizonte, $database_horizonte);
 $result2 = mysqli_query($horizonte, "SELECT count(id_dxc) from dx_consultas where temp_dxc = 0 ") or die (mysqli_error($horizonte));
 $row2 = mysqli_fetch_row($result2);
 
 //total de ingresos
 mysqli_select_db($horizonte, $database_horizonte);
 $result3 = mysqli_query($horizonte, "SELECT sum(gran_total_ov) from orden_venta where 1 = 1 ") or die (mysqli_error($horizonte));
 $row3 = mysqli_fetch_row($result3);
 
 //total de consultas
 mysqli_select_db($horizonte, $database_horizonte);
 $result4 = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 1 and temporal_vc = 0") or die (mysqli_error($horizonte));
 $row4 = mysqli_fetch_row($result4);
 
 //total de estudios de laboratorios
 mysqli_select_db($horizonte, $database_horizonte);
 $result4a = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 3 and temporal_vc = 0") or die (mysqli_error($horizonte));
 $row4a = mysqli_fetch_row($result4a);
 
 //total de estudios de imagen
 mysqli_select_db($horizonte, $database_horizonte);
 $result4b = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 4 and temporal_vc = 0") or die (mysqli_error($horizonte));
 $row4b = mysqli_fetch_row($result4b);
 
 //total de servicios
 mysqli_select_db($horizonte, $database_horizonte);
 $result4c = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 2 and temporal_vc = 0") or die (mysqli_error($horizonte));
 $row4c = mysqli_fetch_row($result4c);
 
 //promedio pacientes por día
 $row5 = round($row1z[0]/$row1[0],2);
 
 //Promedio ordenes de venta por día
 $row6 = round($row2[0]/$row1[0],2);
 
 //Total igreso por día
 $row7 = round($row3[0]/$row1[0],2);
 
 //Total consultas por día
 $row7a = round($row4[0]/$row1[0],2);
 
 //Total estudios laboratorio por día
 $row7b = round($row4a[0]/$row1[0],2);
 
 //Total estudios imagen por día
 $row7c = round($row4b[0]/$row1[0],2);
 
 //Total servicios por día
 $row7d = round($row4c[0]/$row1[0],2);
 
 //Total fuera de rango hombres hipertensos
 mysqli_select_db($horizonte, $database_horizonte);
 $result8 = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where usuario_ov = 1 ") or die (mysqli_error($horizonte));
 $row8 = mysqli_fetch_row($result8);

 //Total posibles ultrasonidos
 mysqli_select_db($horizonte, $database_horizonte);
 $result9 = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where usuario_ov = 1 ") or die (mysqli_error($horizonte));
 $row9 = mysqli_fetch_row($result9);
 
 //Porcentaje posibles ultras
 if($row1[0]!=0){ $PPU = round(($row1z[0]*1)/$row1[0],2);}else{$PPU = 0;}//$PPU =111;
 //Porcentaje total fuera de Rango
 if($row1[0]!=0){ $PTFR = round(($row2[0]*1)/$row1[0],2);}else{$PTFR = 0;}//$PTFR =111;
 //Total Hipertensos fuera de rango
 $Thipertensos = 111;
 //%Total Hipertensos fuera de rango
 if($row1[0]!=0){
 $PTH = ($row6[0]*100)/$row1[0];}else{$PTH = 0;}$PTH = 111;
 //%Total dislipidemicos fuera de rango
 if($row1[0]!=0){
 $PTD = ($row7[0]*100)/$row1[0];}else{$PTD = 0;}$PTD =111;
 //%Total diabéticos fuera de rango
 if($row1[0]!=0){
 $PTDi = ($row8[0]*100)/$row1[0];}else{$PTDi = 0;}$PTDi =111;
 
 //%Total Hipertensos
 if($row1[0]!=0){
 $PTH1 = ($row2[0]*100)/$row1[0];}else{$PTH1 = 0;}$PTH1 =111;
 //%Total dislipidemicos
 if($row1[0]!=0){
 $PTD1 = ($row3[0]*100)/$row1[0];}else{$PTD1 = 0;}$PTD1 = 111;
 //%Total diabéticos
 if($row1[0]!=0){
 $PTDi1 = ($row4[0]*100)/$row1[0];}else{$PTDi1 = 0;}$PTDi1 = 111;
	
 echo $row[0].";".$row1[0].";".$avance.";".$row2[0].";".$PPU.";".$PTFR.";".$row4a[0].";".$row4b[0].";".$row4c[0].";".$row5.";".$row6.";".$row7.";".$row7a.";".$row7b.";".$row7c.";".$row7d.";".$row8[0].";".$PTDi.";".$PTH1.";".$PTD1.";".$PTDi1.";".$row9[0].";".$PPU;

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>