<?php require_once('../../../Connections/horizonte.php'); ?>
<?php require_once("../../../funciones/php/values.php"); ?>
<?php
	// consulta para horizonte
	$obligatorio = 0;
	$aColumns = array('pa.referencia_pag','pa.referencia_pag' , 'p.nombre_completo_p', 'DATE_FORMAT(ov.fecha_venta_ov,GET_FORMAT(DATE,"ISO"))', 's.clave_su', 'u.usuario_u', 'ov.subtotal_ov', 'SUM(ov.adicionales_c_ov + ov.adicionales_ei_ov + ov.adicionales_el_ov + ov.adicionales_s_ov)', 'ov.t_desc_cta+ov.t_desc_img+ov.t_desc_lab+ov.t_desc_serv', 'ov.gran_total_ov', 'SUM(pa.pago_pag)', 'SUM(pa.pago_pag)', 'SUM(pa.pago_pag)', 'ov.gran_total_ov-SUM(pa.pago_pag)', 'p.amaterno_p', 'ov.no_temp_ov', 'ov.no_temp_ov');
     
    // DB tables to use 
    $aTables = array( 'orden_venta ov');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "ov.referencia_ov";
     
	 // Joins   hasta aqui
	$sJoin = 'left join pacientes p ON ov.id_paciente_ov = p.id_p left join pagos_ov pa on ov.referencia_ov = pa.referencia_pag left join usuarios u on u.id_u = ov.usuario_ov left join sucursales s on s.id_su = ov.sucursal_ov';
	// left join conceptos to on to. =  left join departamentos d on d.id_d = pa.id_departamento_pag
	 
    // CONDITIONS 
	if(isset($_GET['usuario']) ){//para las solicitudes con usuario
		if(isset($_GET['depto']) && $_GET['depto'] != 'x' && $_GET['depto'] != ''){//para las solicitudes con departamento
			if(isset($_GET['saldos']) && $_GET['saldos'] == 'SI'){//para las solicitudes con saldos
				if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
					$sWhere = "WHERE ov.gran_total_ov > pa.pago_pag and pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]' and pa.id_departamento_pag = '$_GET[depto]' and pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]'";
				}else{$sWhere = "WHERE ov.gran_total_ov > pa.pago_pag and pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]'" ;}
			}else{//si no se solicitan los registros con saldo (que deben dinero)
				if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
					$sWhere = "WHERE pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]' and pa.id_departamento_pag = '$_GET[depto]' and pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]'";
				}else{$sWhere = "WHERE pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]' " ;}
			}
		}else{
			if(isset($_GET['saldos']) && $_GET['saldos'] == 'SI'){//para las solicitudes con saldos
				if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
					$sWhere = "WHERE ov.gran_total_ov > pa.pago_pag and pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]' and pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]'";
				}else{$sWhere = "WHERE ov.gran_total_ov > pa.pago_pag and pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]'" ;}
			}else{//si no se solicitan los registros con saldo (que deben dinero)
				if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
					$sWhere = "WHERE pa.fecha_pag BETWEEN '$_GET[min]' AND '$_GET[max]' and pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]'";
				}else{$sWhere = "WHERE pa.usuario_pag = '$_GET[usuario]' and ov.usuario_ov = '$_GET[usuario]' " ;}
			}
		}	
	}else{}
	 
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
            if ( $aColumns[$i] == "version" ) { $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; }
            else if ( $aColumns[$i] != ' ' )
            {
               $row[] = $aRow[$i];
            }
        }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ )
        {
            if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; }
            else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; }
        }
		$nombreP = '"'.$row[2].'"';
		$row[0] = "<img src='imagenes/generales/details_open.png' title='¡Información Adicional' border = '0' />";
		
		$refi = sqlValue($row[1], "text", $horizonte);
		//
		mysqli_select_db($horizonte, $database_horizonte);
		$resultS = mysqli_query($horizonte, "SELECT ov.gran_total_ov, sum(pa.pago_pag) from orden_venta ov left join pagos_ov pa on ov.referencia_ov = pa.referencia_pag WHERE ov.referencia_ov = $refi ") or die (mysqli_error($horizonte));
		$rowS = mysqli_fetch_row($resultS); $saldo = $rowS[0]-$rowS[1];
		//
		
		if ($rowS[1]<$rowS[0]){ //Órdenes no pagadas
			mysqli_select_db($horizonte, $database_horizonte);
			$resultTC = mysqli_query($horizonte, "SELECT ov.gran_total_ov, ov.gran_total_ov - pa.pago_pag, sum(pa.pago_pag) from orden_venta ov left join pagos_ov pa on ov.referencia_ov = pa.referencia_pag WHERE ov.referencia_ov = $refi ") or die (mysqli_error($horizonte));
			$rowTC = mysqli_fetch_row($resultTC);
			
			$aleatory = '"'.$row[16].'"';
			
			//checamos si la OV tiene por lo menos un pago o no
			
				mysqli_select_db($horizonte, $database_horizonte);
				$resultV = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov WHERE referencia_pag = $refi ") or die (mysqli_error($horizonte));
				$rowV = mysqli_fetch_row($resultV);
			
				if($rowV[0]>0){
					//Si tiene ya por lo menos un pago, entonces revisamos si los pagos fueron hechos por DEPARTAMERNTO
					
					mysqli_select_db($horizonte, $database_horizonte);
					$resultV1 = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov WHERE referencia_pag = $refi and departamento_pa is not NULL ") or die (mysqli_error($horizonte));
					$rowV1 = mysqli_fetch_row($resultV1);
					
					if($rowV1[0]>0){
						//Si el pago fue por departamento, entonces sólo calculamos el resto de los departamentos
						mysqli_select_db($horizonte, $database_horizonte);
						$result2 = mysqli_query($horizonte, "SELECT ov.total_c + ov.total_s, ov.total_ei, ov.total_el, ov.total_p from orden_venta ov WHERE ov.referencia_ov = $refi ") or die (mysqli_error($horizonte));
						$row2 = mysqli_fetch_row($result2);

						mysqli_select_db($horizonte, $database_horizonte);
						$result2am = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov WHERE referencia_pag = $refi and departamento_pa = 4") or die (mysqli_error($horizonte));
						$row2am = mysqli_fetch_row($result2am); $t_con = $row2[0]-$row2am[0];

						mysqli_select_db($horizonte, $database_horizonte);
						$result2im = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov WHERE referencia_pag = $refi and departamento_pa = 2") or die (mysqli_error($horizonte));
						$row2im = mysqli_fetch_row($result2im); $t_ima = $row2[1]-$row2im[0];

						mysqli_select_db($horizonte, $database_horizonte);
						$result2lb = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov WHERE referencia_pag = $refi and departamento_pa = 1") or die (mysqli_error($horizonte));
						$row2lb = mysqli_fetch_row($result2lb); $t_lab = $row2[2]-$row2lb[0];

						mysqli_select_db($horizonte, $database_horizonte);
						$result2fa = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov WHERE referencia_pag = $refi and departamento_pa = 3") or die (mysqli_error($horizonte));
						$row2fa = mysqli_fetch_row($result2fa); $t_far = $row2[3]-$row2fa[0];

						$row[14] = "<div style='color:red; text-align:center;' onClick='pagar(this.id, $rowS[0], $saldo, $rowS[1], $nombreP, $aleatory,1,$t_con,$t_ima,$t_lab,$t_far);' id='$row[1]' class='hacerPago' href='#' title1='Realizar Pago a la Orden de Venta' target='_self'><span style='cursor:pointer; text-decoration:underline;font-style:italic;'>PAGAR</span></div>";
					}else{
						//Si los pagos no fueron por departamento, entonces con una alerta poner que por favor redistribuya el total de los pagos anteriores y entonces los totales serían recalculados como si no hubiera pago pero la suma de los pagos por departamentos debe ser por lo menos igual a la suma de los pagos anteriores
						mysqli_select_db($horizonte, $database_horizonte);
						$result1 = mysqli_query($horizonte, "SELECT ov.total_c + ov.total_s, ov.total_ei, ov.total_el, ov.total_p from orden_venta ov WHERE ov.referencia_ov = $refi ") or die (mysqli_error($horizonte));
						$row1 = mysqli_fetch_row($result1);

						$row[14] = "<div style='color:red; text-align:center;' onClick='pagar(this.id, $rowS[0], $saldo, $rowS[1], $nombreP, $aleatory,2,$row1[0],$row1[1],$row1[2],$row1[3]);' id='$row[1]' class='hacerPago' href='#' title1='Realizar Pago a la Orden de Venta' target='_self'><span style='cursor:pointer; text-decoration:underline;font-style:italic;'>PAGAR</span></div>";
					}
				}else{
					//Si no tiene algún pago, entonces sacamos los pagos por departamento
					mysqli_select_db($horizonte, $database_horizonte);
					$result1 = mysqli_query($horizonte, "SELECT ov.total_c + ov.total_s, ov.total_ei, ov.total_el, ov.total_p from orden_venta ov WHERE ov.referencia_ov = $refi ") or die (mysqli_error($horizonte));
					$row1 = mysqli_fetch_row($result1);
					
					$row[14] = "<div style='color:red; text-align:center;' onClick='pagar(this.id, $rowS[0], $saldo, $rowS[1], $nombreP, $aleatory,0,$row1[0],$row1[1],$row1[2],$row1[3]);' id='$row[1]' class='hacerPago' href='#' title1='Realizar Pago a la Orden de Venta' target='_self'><span style='cursor:pointer; text-decoration:underline;font-style:italic;'>PAGAR</span></div>";
				}
		}else{$row[14]="<div style='text-align:center;'>SI</div>";} //if($row[6] == 0){$row[1]="<span class='erase1'>$row[1]</span>";}
				
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>