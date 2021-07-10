<?php
require("../../../Connections/horizonte.php");
	$now = date('Y-m-d');
	$aColumns = array('v.convenio_cv', 'DATE_FORMAT(c.fecha_expedicion_cvp,"%d/%c/%Y")', 'DATE_FORMAT(c.fecha_expiracion_cvp,"%d/%c/%Y")','c.id_cvp','c.id_cvp', 'c.id_convenio_cvp','c.id_cvp', 'concat(p.nombre_p," ", p.apaterno_p)', 'DATE_FORMAT(c.fecha_expiracion_cvp,"%Y-%c-%d")');
     
    // DB tables to use 
    $aTables = array( 'convenios_paciente c');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "c.id_cvp";
     
	 // Joins   
	$sJoin = 'left join convenios v on id_cv = c.id_convenio_cvp left join pacientes p on p.id_p = c.id_paciente_cvp';
	   
    // CONDITIONS 
	if(isset($_GET['idP'])){
		$sWhere = "WHERE c.id_paciente_cvp = '$_GET[idP]' order by c.fecha_expedicion_cvp asc ";
	}else{
		$sWhere = "WHERE 1=1 order by c.fecha_expedicion_cvp asc ";
	}

    /* Database connection information */
    $gaSql['user'] = $username_horizonte; $gaSql['password'] = $password_horizonte; $gaSql['db'] = $database_horizonte; $gaSql['server'] = $hostname_horizonte;
     
    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] );
     
    mysqli_select_db( $gaSql['link'], $gaSql['db'] );
     
     
    /* * Paging */
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
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
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
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
        }
    }
     
    /*
     * SQL queries
     * Get data to display
    */
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   ".str_replace(" , ", " ", implode(", ", $aTables))."
		$sJoin
        $sWhere
        $sOrder
        $sLimit";
 
        // $c = fopen('../debugging.txt','a+');
        // fwrite($c, '$sQuery: '.$sQuery."\n");
        // fclose($c);
     
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
					$row[] = $aRow[$i];
            }
        }

		if($row[5]!='baba'){ 
		$row[5] = "<div style='text-align:center;'> <img style='cursor:pointer;' src='../imagenes/generales/_eliminar.png' onClick='eliminarConvenio(this.id, this.lang);' id='$row[6]', lang='$row[0]' border = '0' width='22' /> </div>";}
		else{$row[5] = "";}
		
		$xb = $row[0].';*]'.$row[7];
		
		$row[0] = "<div style='text-align:left;'><span id='$xb' lang='$row[6]' onClick='detallesConvenioP(this.lang, this.id);' style='cursor:pointer;'>$row[0]</span></div>";
				
		if($row[2]=='01/1/3000'){$row[2]='INDEFINIDA';$row[4]='INDEFINIDOS';}
		else{
			$ts1 = strtotime($now);
			$ts2 = strtotime($row[8]);
			$row[4] = floor((($ts2 - $ts1)/3600)/24);
		}
		
		$row[3] = 'ACTIVO';
		
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>