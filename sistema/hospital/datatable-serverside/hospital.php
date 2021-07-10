<?php
require("../../Connections/horizonte.php"); 
    /* Array of database columns which should be read and sent back to DataTables. Use a space where * you want to insert a non-database field (for example a counter or static image) */
	
	$aColumns = array('h.id_h', 'p.nombre_completo_p', 'DATE_FORMAT(h.fecha_inicio_h,"%d/%m/%Y %H:%i:%s")', 'concat(c.no_ca," ",c.ubicacion_ca)', 'm.usuario_u','h.id_h', 'h.id_h', 'h.id_h', 'h.id_h', 'h.id_h', 'h.id_h', 'es.estatus_est', 'DATE_FORMAT(h.fecha_fin_h,"%d/%m/%Y %H:%i:%s")', 'h.id_h','h.id_h','h.id_h', 'h.id_h', 'es.id_est', 'h.id_h', 'h.id_h', 'p.id_p', 'o.sucursal_ov' );
     
    // DB tables to use 
    $aTables = array( 'hospitalizacion h');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "h.id_h";
     
	 // Joins   
	$sJoin = 'left JOIN pacientes p ON p.id_p = h.id_paciente_h left join estatus es on es.id_est = h.estatus_h left join camas c on c.id_ca = h.id_cama_h left join usuarios m on m.id_u = h.id_medicoh_h left join venta_conceptos v on v.id_vc = h.id_consulta_vc_h left join orden_venta o on o.referencia_ov = v.referencia_vc';
	 
	if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
	 $sWhere="WHERE h.estatus_h in (13,15)";
	}else{
	 $sWhere="WHERE h.estatus_h in (13,15)";
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
		$nombreP = '"'.$row[1].'"';
		
		$row[0]=$hh;
		
		if($row[3]==''){ $row[3] = '<div align="center">-No asignado-</div>'; }
		
		$row[11] = "<span title='$row[19] $row[20]'>$row[11]</span>";
		
		mysqli_select_db($horizonte, $database_horizonte);
		$result1 = mysqli_query($horizonte, "SELECT count(h.id_nh) from notas_de_hospital h where h.id_hospitalizacion_nh = $row[5] and h.tipo_nota_nh = 1 ") or die (mysqli_error($horizonte));
		$row1 = mysqli_fetch_row($result1);
		
		mysqli_select_db($horizonte, $database_horizonte);
		$result1a = mysqli_query($horizonte, "SELECT h.aleatorio_nh from notas_de_hospital h where h.id_hospitalizacion_nh = $row[5] limit 1") or die (mysqli_error($horizonte));
		$row1a = mysqli_fetch_row($result1a);
		
		$row[5] ="<div align='center'><button type='button' class='btn btn-primary btn-sm' onClick='notasMedicas($row[19],$row[20],$nombreP,$row[21]);'>$row1[0]</button></div>";
		
		mysqli_select_db($horizonte, $database_horizonte);
		$result2 = mysqli_query($horizonte, "SELECT count(h.id_nh) from notas_de_hospital h where h.id_hospitalizacion_nh = $row[6] and h.tipo_nota_nh = 2 ") or die (mysqli_error($horizonte));
		$row2 = mysqli_fetch_row($result2);
		
		mysqli_select_db($horizonte, $database_horizonte);
		$result3 = mysqli_query($horizonte, "SELECT count(DISTINCT h.id_medicamento_mh) from medicamentos_hospital h where h.id_hospitalizacion_mh = $row[6]") or die (mysqli_error($horizonte));
		$row3 = mysqli_fetch_row($result3);
		
		$row[6] = "<div align='center'><button type='button' class='btn btn-primary btn-sm' onClick=''><i class='fa fa-book' aria-hidden='true'></i></button></div>";
		
		$row[7] = "<div align='center'><button type='button' class='btn btn-primary btn-sm' onClick='medicamentos($row[19],$row[20],$nombreP,$row[21]);'><i class='fa fa-medkit' aria-hidden='true'></i></button></div>";
		
		$row[8] = "<div align='center'><button type='button' class='btn btn-primary btn-sm' onClick=''><i class='fa fa-eye' aria-hidden='true'></i></button></div>";
		
		$row[9] = "<div align='center'><button type='button' class='btn btn-primary btn-sm' onClick=''><i class='fa fa-list' aria-hidden='true'></i></button></div>";
		
		$row[10] = "<div align='center'><button type='button' class='btn btn-primary btn-sm' onClick=''><i class='fa fa-camera' aria-hidden='true'></i></button></div>";
		
		if($row[12]==''){ $row[12] = '<div align="center">-</div>'; }
							
		$output['aaData'][] = $row;
    }
     
    echo json_encode( $output );
?>