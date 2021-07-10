<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

	$aColumns = array('d.nombre_d', 'd.id_d', 'd.id_d', 'd.id_d', 'd.id_d', 'd.id_d', 'd.id_d', 'd.id_d' );
     
    // DB tables to use 
    $aTables = array('departamentos d');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = " d.id_d ";
     
	// Joins   
	$sJoin = ' ';

	$sWhere =" WHERE d.id_d in (1,2,3,4) order by d.nombre_d asc ";
    /* Database connection information */
    $gaSql['user'] = $username_horizonte; $gaSql['password'] = $password_horizonte; 
	$gaSql['db']   = $database_horizonte; $gaSql['server']   = $hostname_horizonte;
     
    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] );
     
    mysqli_select_db( $gaSql['link'], $gaSql['db'] );
     
    /*  * Paging */
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayStart'] ).", ".
            mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayLength'] );
    }
     
    /* * Ordering */
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
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
            else { $sWhere .= " AND "; }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
        }
    }
    /* * SQL queries * Get data to display */
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   ".str_replace(" , ", " ", implode(", ", $aTables))."
		$sJoin
        $sWhere
        $sOrder
        $sLimit";
      
    $rResult = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
    /* Data set length after filtering */
    $sQuery = "
        SELECT FOUND_ROWS()
    ";
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
    );
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
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
		
		//Calculamos el número de pacientes por departamento
		mysqli_select_db($horizonte, $database_horizonte);
		
		if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			
			$query_Recordset1 = "SELECT distinct(vc.id_paciente_vc) FROM pagos_ov p left join venta_conceptos vc on vc.referencia_vc = p.referencia_pag left join conceptos e on e.id_to = vc.id_concepto_es WHERE vc.temporal_vc != 1 and e.id_departamento_to = $row[1] and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'";
			//echo $query_Recordset1;
			$Recordset1 = mysqli_query($horizonte, $query_Recordset1) or die(mysqli_error($horizonte));
			$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
			$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
			$ali = $row[2];
			$row[2] = $totalRows_Recordset1; 
			
			$query_Recordset1a = "SELECT distinct(vc.referencia_vc) FROM pagos_ov p left join venta_conceptos vc on vc.referencia_vc = p.referencia_pag left join conceptos e on e.id_to = vc.id_concepto_es WHERE vc.temporal_vc != 1 and e.id_departamento_to = $row[1] and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'";
			$Recordset1a = mysqli_query($horizonte, $query_Recordset1a) or die(mysqli_error($horizonte));
			$row_Recordset1a = mysqli_fetch_assoc($Recordset1a);
			$totalRows_Recordset1a = mysqli_num_rows($Recordset1a);
			$row[1] = $totalRows_Recordset1a;
			
			$resultTC = mysqli_query($horizonte, "SELECT count(vc.id_vc) from pagos_ov p left join venta_conceptos vc on vc.referencia_vc = p.referencia_pag left join conceptos e on e.id_to = vc.id_concepto_es WHERE temporal_vc != 1 and e.id_departamento_to = $ali and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'") or die (mysqli_error($horizonte));
			
			$resultT = mysqli_query($horizonte, "SELECT SUM(p.pago_pag) from pagos_ov p left join venta_conceptos vc on vc.referencia_vc = p.referencia_pag left join conceptos e on e.id_to = vc.id_concepto_es WHERE e.id_departamento_to = $row[3] and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]' and vc.temporal_vc != 1") or die (mysqli_error($horizonte)); //Sacamos cuanto es el total por departamento de las ventas de conceptos, pero no es la de los pagos
			
		}else{ }
		
		$rowTC = mysqli_fetch_row($resultTC); $rowT = mysqli_fetch_row($resultT);
		
		$row[2] = $row[2]; $row[3] = $rowTC[0];
		
		//if($rowT[0]==0){$row[0]="<span class='erase1'>$row[0]</span>";} 
		
		$resultTam = mysqli_query($horizonte, "SELECT SUM(p.pago_pag) FROM pagos_ov p WHERE departamento_pa = 4 and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'") or die (mysqli_error($horizonte));
		$rowTam = mysqli_fetch_row($resultTam);
		
		$resultTim = mysqli_query($horizonte, "SELECT SUM(p.pago_pag) FROM pagos_ov p WHERE departamento_pa = 2 and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'") or die (mysqli_error($horizonte));
		$rowTim = mysqli_fetch_row($resultTim);
		
		$resultTlb = mysqli_query($horizonte, "SELECT SUM(p.pago_pag) FROM pagos_ov p WHERE departamento_pa = 1 and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'") or die (mysqli_error($horizonte));
		$rowTlb = mysqli_fetch_row($resultTlb);
		
		$resultTfa = mysqli_query($horizonte, "SELECT SUM(p.pago_pag) FROM pagos_ov p WHERE departamento_pa = 3 and p.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'") or die (mysqli_error($horizonte));
		$rowTfa = mysqli_fetch_row($resultTfa);
						
		//Asociación médica
		if($row[6]==4){ $row[4] = $rowTam[0]; }
		//Imagen
		else if($row[6]==2){ $row[4] = $rowTim[0]; }
		//Laboratorio
		else if($row[6]==1){ $row[4] = $rowTlb[0]; }
		//Farmacia si es que hay conceptos de farmacia
		else if($row[6]==3){ $row[4] = $rowTfa[0]; }
		//Enfermería si es que hay conceptos de Enfermería
				
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>