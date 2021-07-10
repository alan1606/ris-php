<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
	
	$aColumns = array('v.id_vc', 'p.nombre_completo_p', 'v.referencia_vc', 'e.concepto_to', 'es.estatus_est', 'a.nombre_a', 'p.amaterno_p','a.nombre_a', 'p.id_p', 'v.id_vc', 'v.referencia_vc', 'v.contador_vc', 'e.id_area_to', 'a.nombre_a', 'DATE_FORMAT(v.fecha_venta_vc,"%Y%c%d")', 'su.id_su', 'DATE_FORMAT(v.fecha_venta_vc,"%d/%m/%Y %H:%i")', 'au.usuario_u', 'DATE_FORMAT(v.fechaEdo4_e,"%d/%m/%Y %H:%i")' );
     
    // DB tables to use 
    $aTables = array( 'venta_conceptos v');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "v.id_vc";
     
	 // Joins   
	$sJoin = 'left JOIN pacientes p on p.id_p = v.id_paciente_vc left join conceptos e on e.id_to = v.id_concepto_es left join estatus es on es.id_est = v.estatus_vc left join areas a on a.id_a = e.id_area_to left join orden_venta o on o.referencia_ov = v.referencia_vc left join sucursales su on su.id_su = o.sucursal_ov left join usuarios au on au.id_u = v.usuarioEdo4_e';
	
	//Vemos si el usuario es multisucursal
	mysqli_select_db($horizonte, $database_horizonte); 
	$resultSu = mysqli_query($horizonte, "SELECT multisucursal_u, idSucursal_u from usuarios where id_u = '$_GET[idU]'") or die (mysqli_error($horizonte));
	$rowAU = mysqli_fetch_row($resultSu); $id_suc = sqlValue($rowAU[1], "int", $horizonte);
	 
    // CONDITIONS
	switch($rowAU[0]){
		case 0://Solo vé lo suyo
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 4 and v.temporal_vc=0 and a.clave_a = 'COL' and o.sucursal_ov = $id_suc ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 4 and v.temporal_vc = 0 and a.clave_a = 'COL' and o.sucursal_ov = $id_suc ";
			}
		break;
		case 2://Ve todo lo de su sucursal y lo suyo pero no lo que no es suyo
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 4 and v.temporal_vc=0 and a.clave_a = 'COL' and o.sucursal_ov = $id_suc ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 4 and v.temporal_vc = 0 and a.clave_a = 'COL' and o.sucursal_ov = $id_suc ";
			}
		break;
		case 1://Ve todo de todas las sucursales
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 4 and v.temporal_vc = 0 and a.clave_a = 'COL' ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 4 and v.temporal_vc = 0 and a.clave_a = 'COL' ";
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
	$hh=0;
     
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
		//calculando el valor de los íconos dependiendo del estatus del estudio
		
		$row[0]="<span>$hh</span>";
		
		//$row[1] = $row[1]." ".$row[6];
		$nameX='"'.$row[1].'"';
		$estudioX = '"'.$row[3].'"';
		$refX = '"'.$row[2].'"';
		
		$nombreEstud = '"'.$row[3].'"';
		$referenciaE = '"'.$row[2].'"';
		$nombreP = '"'.$row[1].'"';
		
		$row[5] = "<div align='center'><button type='button' class='btn btn-sm btn-primary disabled' ><i class='fa fa-pencil' aria-hidden='true'></i></button></div>";
		$row[6] = "<div align='center'>-</div>";
				
		if ($row[4] == "PENDIENTE"){
			$row[4]= "<span style='text-decoration:underline; cursor:pointer;' onClick='preguntaX($nameX, $refX, $estudioX, $row[9]);'>$row[4]</span>";
		}
		if ($row[4] == "PROCESO"){
			$row[4]= "<span style='text-decoration:underline; cursor:pointer;' onClick='fichaEstudio(2, $row[9], $row[8], $row[15]);'>$row[4]</span>";
		}
		if ($row[4] == "REALIZADO"){
			$row[4]= "<span style='text-decoration:underline; cursor:pointer;' onClick='fichaEstudio(3, $row[9], $row[8], $row[15]);'>$row[4]</span>";
		}
		if ($row[4] == "CAPTURADO"){
			$row[4]= "<span style='text-decoration:underline; cursor:pointer;' onClick='fichaEstudio(4, $row[9], $row[8], $row[15]);'>$row[4]</span>";
		}
		if ($row[4] == "INTERPRETADO"){
			$row[4]= "<span style='text-decoration:underline; cursor:pointer;' onClick='fichaEstudio(5, $row[9], $row[8], $row[15]);'>$row[4]</span><br>$row[17] $row[18]";
			
			$row[5] = "<div align='center'><button type='button' class='btn btn-sm btn-primary' name='$row[8]' id='$row[8]' lang='$row[9]' value='' onClick='editar(this.lang, $nombreEstud, $referenciaE, $nombreP)'><i class='fa fa-pencil' aria-hidden='true'></i></button></div>";
			
			$row[6] = "<div align='center'><button type='button' class='btn btn-sm btn-primary' name='$row[8]' id='$row[8]' lang='$row[9]' value='' onClick='p_imagenes(this.lang, $row[8], $referenciaE, $id_suc)'><i class='fa fa-print' aria-hidden='true'></i></button></div>";
		}
		
		$row[2] = "$row[2]<br>$row[16]";
		
		$output['aaData'][] = $row;
    }
     
    echo json_encode( $output );
?>