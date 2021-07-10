<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
    /* Array of database columns which should be read and sent back to DataTables. Use a space where * you want to insert a non-database field (for example a counter or static image) */
	
	$aColumns = array('v.id_vc', 'p.nombre_completo_p', 'v.referencia_vc', 'e.concepto_to', 'es.estatus_est', 's.clave_su', 'a.nombre_a', 'ur.usuario_u', 'DATE_FORMAT(v.fecha_venta_vc,"%H:%i:%s")', 'up.usuario_u', 'DATE_FORMAT(v.fechaEdo2_e,"%H:%i:%s")', 'ure.usuario_u', 'DATE_FORMAT(v.fechaEdo3_e,"%H:%i:%s")', 'uc.usuario_u', 'DATE_FORMAT(v.fechaEdo4_e,"%H:%i:%s")', 'ui.usuario_u', 'DATE_FORMAT(v.fechaEdo5_e,"%H:%i:%s")', 'TIMEDIFF(v.fechaEdo5_e, v.fecha_venta_vc)', 'pr.procedencia_pr', 'v.id_vc', 'v.id_vc', 'a.nombre_a','p.amaterno_p', 'p.id_p', 'v.id_vc', 'v.referencia_vc', 'v.contador_vc', 'v.area_vc', 'a.nombre_a', 's.nombre_su', 'a.nombre_a', 'concat(ui.nombre_u," ", ui.apaterno_u)' );
     
    // DB tables to use 
    $aTables = array( 'venta_conceptos v');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "v.id_vc";
     
	 // Joins   
	$sJoin = 'left JOIN pacientes p ON p.id_p = v.id_paciente_vc left join conceptos e on e.id_to = v.id_concepto_es left join estatus es on es.id_est = v.estatus_vc left join areas a on a.id_a = v.area_vc left join sucursales s on s.id_su = v.id_sucursal_vc left join pagos_ov pa on pa.id_vc_pag = v.id_vc left join catalogo_centro_salud c on c.id_cs = p.centro_salud_p left join mexico m on m.id_mx = p.colonia_p left join usuarios ui on ui.id_u = v.usuarioEdo5_e left join usuarios ur on ur.id_u = v.id_usuario_vc  left join usuarios up on up.id_u = v.usuarioEdo2_e left join usuarios ure on ure.id_u = v.usuarioEdo3_e left join usuarios uc on uc.id_u = v.usuarioEdo4_e left join orden_venta o on o.referencia_ov = v.referencia_vc left join procedencia pr on pr.id_pr = o.procedencia_ov ';
	
	if(isset($_GET['convenio']) && $_GET['convenio'] != ''){
		if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
		 $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 4 and v.temporal_vc = 0 and v.id_convenio_vc = '$_GET[convenio]' ";
		}else{
		 $sWhere = "WHERE p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 4 and v.temporal_vc = 0 and v.id_convenio_vc = '$_GET[convenio]'";
		}
	}else{
		if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
		 $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 4 and v.temporal_vc = 0 ";
		}else{ $sWhere = "WHERE p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 4 and v.temporal_vc = 0"; }
	}
	
    /* Database connection information */
    $gaSql['user']       = $username_horizonte; $gaSql['password']   = $password_horizonte; $gaSql['db']         = $database_horizonte; $gaSql['server']     = $hostname_horizonte;
     
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
        if ( $sOrder == "ORDER BY" ) { $sOrder = " group by v.id_vc asc "; }
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
        { $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $gaSql['link'], $_GET['sSearch'] )."%' OR "; }
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
		
		$row[10]="<span title=''>$row[10]</span>";
		
		$ti = $hh.'-1';
		
		$row[5]="<span id='$ti' name='$ti'>$row[5]</span>";
				
		$titulo = sqlValue($row[30],text);
		$title = "'".$row[28]."'";
		
		$row[6] = "<div title='$titulo' id='$row[20]'>$row[6]</div>";
				
		$output['aaData'][] = $row;
    }
     
    echo json_encode( $output );
?>