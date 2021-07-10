<?php require_once('../../../Connections/horizonte.php'); ?>
<?php require_once("../../../funciones/php/values.php"); ?>
<?php
// consulta para horizonte
	$obligatorio = 0;
	$aColumns = array('pa.referencia_pag','pa.referencia_pag' , 'concat(p.nombre_p," ", p.apaterno_p)', 'DATE_FORMAT(ov.fecha_venta_ov,GET_FORMAT(DATE,"ISO"))', 's.clave_su', 'u.usuario_u', 'ov.subtotal_ov+ov.descuento_total_ov', 'ov.descuento_total_ov', 'ov.subtotal_ov+ov.descuento_total_ov-ov.descuento_total_ov', 'SUM(pa.pago_pag)', 'ov.subtotal_ov+ov.descuento_total_ov-ov.descuento_total_ov-SUM(pa.pago_pag)', 'p.amaterno_p', 'ov.no_temp_ov', 'ov.id_ov', 's.nombre_su', 'concat(nombre_u, " ", apaterno_u)' );
     
    // DB tables to use 
    $aTables = array( 'orden_venta ov');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "ov.referencia_ov";
     
	 // Joins   hasta aqui
	$sJoin = 'left join pacientes p ON ov.id_paciente_ov = p.id_p left join pagos_ov pa on ov.referencia_ov = pa.referencia_pag left join usuarios u on u.id_u = ov.usuario_ov left join sucursales s on s.id_su = ov.sucursal_ov left join departamentos d on d.id_d = pa.id_departamento_pag';
	 
    // CONDITIONS 
	if(isset($_GET['depto']) && $_GET['depto'] != 'x' && $_GET['depto'] != ''){//para las solicitudes con departamento
		//
		if(isset($_GET['saldos']) && $_GET['saldos'] == 'SI'){//para las solicitudes con saldos
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
    			$sWhere = "WHERE 1=1 and ov.saldo_ov > 0 and pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]' and pa.id_departamento_pag = '$_GET[depto]'";
			}else{$sWhere = "WHERE 1=1 and ov.saldo_ov > 0" ;}
			}else{//si no se solicitan los registros con saldo (que deben dinero)
		if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
    		$sWhere = "WHERE 1=1 and pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]' and pa.id_departamento_pag = '$_GET[depto]'";
		}else{$sWhere = "WHERE 1=1 " ;}
		}
		//
	}else{
		//
		if(isset($_GET['saldos']) && $_GET['saldos'] == 'SI'){//para las solicitudes con saldos
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
    			$sWhere = "WHERE 1=1 and ov.saldo_ov > 0 and pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'";
			}else{$sWhere = "WHERE 1=1 and ov.saldo_ov > 0" ;}
			}else{//si no se solicitan los registros con saldo (que deben dinero)
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
    			$sWhere = "WHERE 1=1 and pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]'";
			}else{$sWhere = "WHERE 1=1 " ;}
		}
		//
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
     
    /* * Ordering */
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "GROUP BY pa.referencia_pag ORDER BY ";
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
		$sOrder = "GROUP BY pa.referencia_pag ORDER BY pa.fecha_pag desc";
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
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $gaSql['link'], $_GET['sSearch'] )."%' OR ";
        }
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
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
			//para el ID	
				if ($i==0){
					$row[0] = $row[] = $aRow[6].$aRow[0];
				}elseif($i==2){
					$row[2] = $row[] = $aRow[2]." ".$aRow[11];
					$nameP = '"'.$row[2].'"';
				}
				else{$row[] = $aRow[$i];}
            }
        }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ )
        {
            if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; }
            else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; }
        }
		
		$row[0] = "<img src='../../imagenes/generales/details_open.png' title='¡Información Adicional' border = '0' />";
		if ($row[10]>0){
			$refi = sqlValue($row[1], "text", $horizonte);
			mysqli_select_db($horizonte, $database_horizonte);
			$resultTC = mysqli_query($horizonte, "SELECT gran_total_ov, saldo_ov, abonado_ov from orden_venta WHERE referencia_ov = $refi ") or die (mysqli_error($horizonte));
			$rowTC = mysqli_fetch_row($resultTC);
			
			$row[11] = "<div style='color:red; text-align:center;' onClick='pagar(this.id, $row[8], $row[8]-$row[9], $row[9], $nameP, $row[13]);' id='$row[1]' class='hacerPago' href='#' title1='Realizar Pago a la Orden de Venta' target='_self'><span style='cursor:pointer; text-decoration:underline;font-style:italic;'>PAGAR</span></div>";
		}else{$row[11]="<div style='text-align:center;'>SI</div>";}
		
		//if($row[6] == 0){$row[1]="<span class='erase1'>$row[1]</span>";}
		
		$row[4]="<span title='$row[14]'>$row[4]</span>";
		$row[5]="<span title='$row[15]'>$row[5]</span>";
		
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>