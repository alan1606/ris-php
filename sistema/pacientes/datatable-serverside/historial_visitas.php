<?php
require("../../Connections/horizonte.php");
require_once("../../funciones/php/values.php");

	$obligatorio = 0; $id_pa = sqlValue($_GET['idPac'], "int", $horizonte);
	$aColumns = array('v.id_vc', 'v.id_vc', 'pa.referencia_pag', 'u.usuario_u','v.id_vc', 'ov.gran_total_ov', 'v.id_vc', 'v.id_vc', 'ov.gran_total_ov-sum(pa.pago_pag)', 'ov.iva_ov', 'v.id_vc', 'v.id_vc', 'ov.id_ov', 'u.nombre_u', 'u.apaterno_u', 'u.amaterno_u', 'p.nombre_p', 'p.apaterno_p', 'p.amaterno_p', 'ov.no_temp_ov', 'pa.referencia_pag');
     
    // DB tables to use
    $aTables = array( 'orden_venta ov');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "ov.id_ov";
     
	 // Joins   hasta aqui
	$sJoin = 'left join pagos_ov pa on pa.referencia_pag = ov.referencia_ov left join venta_conceptos v on v.no_temp_vc = pa.no_temp_pag left join usuarios u on u.id_u = ov.usuario_ov left join pacientes p on p.id_p = ov.id_paciente_ov';
	 
    // CONDITIONS
	if($_GET['zaldazos']==0){//Todos}
		if($_GET['facturado']==1){ $sWhere = "where ov.id_paciente_ov in ('$_GET[idPac]') and ov.iva_ov > 0 group by pa.referencia_pag order by id_ov desc ";}
		else{ $sWhere = "where ov.id_paciente_ov = $id_pa group by pa.referencia_pag order by id_ov desc "; }
	}else{
		if($_GET['facturado']==1){
			$sWhere="where pa.pago_pag < ov.gran_total_ov and ov.id_paciente_ov in ('$_GET[idPac]') and ov.iva_ov > 0 group by pa.referencia_pag order by id_ov desc ";
		}else{ $sWhere = "where pa.pago_pag < ov.gran_total_ov and ov.id_paciente_ov in ('$_GET[idPac]') group by pa.referencia_pag order by id_ov desc "; }
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
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayStart'] ).", ".
            mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayLength'] );
    }
     
    /* * Ordering  */
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".mysqli_real_escape_string( $gaSql['link'], $_GET['sSortDir_'.$i] ) .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" ) { $sOrder = ""; }
    }
     
    /* 
     * Filtering
     * NOTE this does not match the built-in DataTables filtering which does it
     * word by word on any field. It's possible to do here, but concerned about efficiency
     * on very large tables, and MySQL's regex functionality is very limited
    */
 
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
            if ( $sWhere == "" ) { $sWhere = "WHERE "; }
            else{ $sWhere .= " AND "; }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
        }
    }
     
    /* * SQL queries * Get data to display  */
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   ".str_replace(" , ", " ", implode(", ", $aTables))."
		$sJoin
        $sWhere
        $sOrder
        $sLimit";
     //echo $sQuery;
    $rResult = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
     
    /* Data set length after filtering */
    $sQuery = "SELECT FOUND_ROWS()";
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
     
    /* * Output */
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    ); $hh=0;
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
		$hh++;
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" ) { $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; }
            else if ( $aColumns[$i] != ' ' ) { $row[] = $aRow[$i]; }			
        }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ )
        {
            if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; }
            else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; }
        }
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultTabo = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov where referencia_pag = '$row[2]'") or die(mysqli_error($horizonte)); 
		$rowTabo = mysqli_fetch_row($resultTabo);
				
		mysqli_select_db($horizonte, $database_horizonte); $feff = sqlValue($row[2], "text", $horizonte);
		$resultRu = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where referencia_vc = $feff ") or die(mysqli_error($horizonte)); 
		$rowRu = mysqli_fetch_row($resultRu);
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultRu1 = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = '$row[2]' and c.id_tipo_concepto_to in (6,7) and v.precio_vc = 0.00 ") or die(mysqli_error($horizonte)); 
		$rowRu1 = mysqli_fetch_row($resultRu1);
		
		$tRu = $rowRu[0] - $rowRu1[0]; //echo $rowRu[0].'---'.$rowRu1[0].'---'.$feff.';';
		
		$row[0] = "<img src='DataTables-1.9.1/examples/examples_support/details_open.png' border = '0' />";
		
		$row[1]=$hh;
		
		$nombreU = $row[13].' '.$row[14].' '.$row[15];
		
		$row[3] = "<span title='$nombreU'>$row[3]</span>";
					
		$row[4] = "<div style='text-align:center;'>$tRu</div>";
		
		$query_Recordset1a = "SELECT distinct(fecha_pag) from pagos_ov where referencia_pag = '$row[2]' ";
		$Recordset1a = mysqli_query($horizonte, $query_Recordset1a) or die(mysqli_error($horizonte));
		$row_Recordset1a = mysqli_fetch_assoc($Recordset1a);
		$totalRows_Recordset1a = mysqli_num_rows($Recordset1a);
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultTo = mysqli_query($horizonte, "SELECT sum(precio_vc) from venta_conceptos where referencia_vc = '$row[2]' ") or die(mysqli_error($horizonte)); 
		$rowTo = mysqli_fetch_row($resultTo);
		
		//$row[5] = $rowTo[0];
		
		//$row[7] = $row[5]-$row[6];
		
		/*mysqli_select_db($horizonte, $database_horizonte); 
		$sql1 = "update orden_venta set saldo_ov = $row[7] where referencia_ov = '$row[2]' limit 1";
		$update1 = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
			
		if (!$update1) { echo $sql1; }else{}*/
					
		$refe = $row[2]; $nombreP = $row[16].' '.$row[17].' '.$row[18]; $nombreP = '"'.$nombreP.'"';
		$row[8] = "<span lang='$refe' style='cursor:pointer; text-decoration:underline;' onClick='historialPagos(this.lang, $nombreP)'>$totalRows_Recordset1a</span>";
		
		if($row[9]>0){$row[9]="<div style='text-align:center;color:red;cursor:pointer;'>SI</div>";}else{$row[9]="<div style='text-align:center;'>NO</div>";}
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultCOV = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where referencia_vc = '$row[2]' and estatus_vc > 1 ") or die(mysqli_error($horizonte)); 
		$rowCOV = mysqli_fetch_row($resultCOV);
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultCOV1 = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = '$row[2]' and c.descripcion_to = 'membresia_h' ") or die(mysqli_error($horizonte)); 
		$rowCOV1 = mysqli_fetch_row($resultCOV1);
		
		if($rowCOV[0]==0 and $rowCOV1[0]==0){
			$row[10] = "<span lang='$refe' style='cursor:pointer; text-decoration:underline;' onClick='cancelar_ov($row[12], $nombreP,this.lang)'>Cancelar</span>";
		}else{$row[10] = "<span'>-</span>";}
		
		$no_temp = '"'.$row[19].'"'; $no_refe = '"'.$row[2].'"';
		
		//$row[2] = "<button type='button' class='btn btn-link btn-xs' onClick='ver_ov($id_pa, $nombreP, $no_refe, $no_temp);'>$row[2]</button>";
		$row[2] = "<button type='button' class='btn btn-link btn-xs'>$row[2]</button>";
		
		$row[6] = $rowTabo[0];
		
		$row[7] = $row[5]-$row[6];
		
		if($row[7]>0){ $row[7] = "<span class='text-danger'>$row[7]</span>"; }else{}
			
		$output['aaData'][] = $row;
		
    }
    echo json_encode( $output );
?>