<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
    /* Array of database columns which should be read and sent back to DataTables. Use a space where  * you want to insert a non-database field (for example a counter or static image) */
	
	$aColumns = array('v.id_vc','v.referencia_vc', 'e.concepto_to', 'concat(de.nombre_u," ", de.apaterno_u)', 'concat(m.nombre_u," ", m.apaterno_u)', '(-1)*(v.precio_vc)', 'o.iva_ov', 'o.iva_ov - (-1)*(v.precio_vc)', 'v.salvado_vc', 'v.id_vc', '(-1)*(v.precio_vc)', 'v.estatus_vc', 'v.usuarioEdo2_e', 'DATE_FORMAT(v.fechaEdo2_e, "%Y-%m-%d")', 'DATE_FORMAT(v.fechaEdo2_e, "%H:%i:%s")' );
     
    // DB tables to use 
    $aTables = array( 'venta_conceptos v');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "v.id_vc";
     
	 // Joins   
	$sJoin = 'left join usuarios de on de.id_u = v.id_usuario_vc join usuarios m on m.id_u = v.id_personal_medico_vc left join estatus es on es.id_est = v.estatus_vc left join conceptos e on e.id_to = v.id_concepto_es left join orden_venta o on o.referencia_ov = v.referencia_vc left join sucursales s on s.id_su = o.sucursal_ov';
	
	mysqli_select_db($horizonte, $database_horizonte); 
	$resultAU = mysqli_query($horizonte, "SELECT multisucursal_u, idSucursal_u from usuarios where id_u = '$_GET[idU]'") or die (mysqli_error($horizonte));
	$rowAU = mysqli_fetch_row($resultAU); $id_suc = sqlValue($rowAU[1], "int", $horizonte);
	
	switch($rowAU[0]){
		case 0://Solo vé lo suyo
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 8 and v.temporal_vc=0 and v.id_usuario_vc = '$_GET[idU]' ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 8 and v.temporal_vc = 0 and v.id_usuario_vc = '$_GET[idU]' ";
			}
		break;
		case 2://Ve todo lo de su sucursal y lo suyo
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 8 and v.temporal_vc=0 and (o.sucursal_ov = $id_suc or v.id_usuario_vc = '$_GET[idU]') ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 8 and v.temporal_vc = 0 and (o.sucursal_ov = $id_suc or v.id_usuario_vc = '$_GET[idU]') ";
			}
		break;
		case 1://Ve todo de todas las sucursales
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 8 and v.temporal_vc=0 ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 8 and v.temporal_vc = 0 ";
			}
		break;
		default:
			echo 'Ha ocurrido un error';
	}
	
    /* Database connection information */
    $gaSql['user']       = $username_horizonte;
    $gaSql['password']   = $password_horizonte;
    $gaSql['db']         = $database_horizonte;
    $gaSql['server']     = $hostname_horizonte;
 
    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] );
     
    mysqli_select_db( $gaSql['link'], $gaSql['db'] );
     
    /*  * Paging */
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ) { $sLimit = "LIMIT ".mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayStart'] ).", ". mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayLength'] ); }
     
    /* * Ordering */
    $sOrder = "order by v.id_vc desc";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ) { if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ) { $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]." ".mysqli_real_escape_string( $gaSql['link'], $_GET['sSortDir_'.$i] ) .", "; } }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" ) { $sOrder = ""; }
    }
     
    /*  * Filtering * NOTE this does not match the built-in DataTables filtering which does it * word by word on any field. It's possible to do here, but concerned about efficiency * on very large tables, and MySQL's regex functionality is very limited */
 
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere .= "AND (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ ) { $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $gaSql['link'], $_GET['sSearch'] )."%' OR "; }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
     
    /* Individual column filtering */
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" ) { $sWhere = "WHERE "; } else { $sWhere .= " AND "; }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
        }
    }
     
    /*  * SQL queries  * Get data to display */
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   ".str_replace(" , ", " ", implode(", ", $aTables))."
		$sJoin
        $sWhere
        $sOrder
        $sLimit";

    $rResult = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
     
    /* Data set length after filtering */
    $sQuery = " SELECT FOUND_ROWS() ";
    $rResultFilterTotal = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
    $aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
    $iFilteredTotal = $aResultFilterTotal[0];
     
    /* Total data set length */
    $sQuery = "
        SELECT COUNT(".$sIndexColumn.")
        FROM   ".$aTables[0];
     
    $rResultTotal = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
    $aResultTotal = mysqli_fetch_array($rResultTotal);
    $iTotal = $aResultTotal[0];
     
    /*  * Output */
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );
	$hh=0;
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
		$hh++;
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        { if ( $aColumns[$i] == "version" ) { /* Special output formatting for 'version' column */ $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; } else if ( $aColumns[$i] != ' ' ) { /* General output */ $row[] = $aRow[$i]; } }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ ) { if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; } else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; } }		
						
		$row[0] = "<span>$hh</span>";
		$row[5] = "<div align='right'>$ $row[5]</div>";
		$row[6] = "<div align='right'>$ $row[6]</div>";
		$cambio = $row[7];
		
		$de = '"'.$row[3].'"';
		$para = '"'.$row[4].'"';
		
		if($row[11]==1){//Hay cambio pendiente
			$row[7] = "<div align='center'><button id='$row[9]' lang='$cambio' class='btn btn-sm btn-warning' onClick='cambio(this.id,this.lang,$de,$para)'>$row[7]</button></div>"; $row[8] = "<div align='center'>-</div>";
		}else{
			if($cambio>0){
				$id_user_rebibe = sqlValue($row[12], "int", $horizonte);
				
				mysqli_select_db($horizonte, $database_horizonte);
				$resultR = mysqli_query($horizonte, "SELECT concat(nombre_u,' ', apaterno_u) from usuarios where id_u = $id_user_rebibe limit 1") or die(mysqli_error($horizonte));
				$rowR = mysqli_fetch_row($resultR);
				
				$row[7] = "<div align='center' style='font-size:0.7em'><span class='text-primary'>$ $row[7]</span><br><span class='text-success'>ENTREGADO</span><br>$rowR[0]<br><span class='text-info'>$row[13]<br>$row[14]</span></div>";
				
				//Checamos si en la tabla de DOCUMENTOS hay un registro de tipo 4 con el id vc en nombre_do
				mysqli_select_db($horizonte, $database_horizonte); $id_vc = sqlValue($row[9], "int", $horizonte);
				$resultC = mysqli_query($horizonte, "SELECT count(id_do) from documentos where tipo_quien_do = 4 and que_es_do = 'COMPROBANTE_GASTO' and nombre_do = $id_vc limit 1") or die(mysqli_error($horizonte));
				$rowC = mysqli_fetch_row($resultC);

				if($rowC[0]<1){
					$row[8] = "<div align='center'><button id='$row[9]' lang='$row[1]' class='btn btn-sm btn-default' onClick='comprobante(this.id,this.lang)'><i class='fa fa-file-image-o' aria-hidden='true'></i></button></div>";
				}else{
					mysqli_select_db($horizonte, $database_horizonte); 
					$resultC1 = mysqli_query($horizonte, "SELECT ext_do, nombre_do, id_do from documentos where nombre_do = $id_vc and tipo_quien_do = 4 and que_es_do = 'COMPROBANTE_GASTO' limit 1") or die (mysqli_error($horizonte));
					$rowC1 = mysqli_fetch_row($resultC1);

					$typeA = '"'.$rowC1[0].'"';
					$x = md5(time()); $x = '"'.$x.'"';
					$nombre_doc = '"'.$rowC1[1].'"';
					$carpeta = '"gastos/documentos"';
					$que_es = '"COMPROBANTE_GASTO"';
					
					$row[8] = "<div align='center'><button id='$row[9]' name='$row[1]' class='btn btn-sm btn-success' onClick='ver_comprobante(this.name, $typeA, $x,$nombre_doc, $carpeta,$rowC1[2], $que_es)'><i class='fa fa-eye' aria-hidden='true'></i></button></div>";
				}
			}else{
				$row[7] = "<div align='right'>$ $row[7]</div>";
			}
		}
		
		if($cambio>0){ }else{$row[8] = "<div align='center'>-</div>";}
		
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>