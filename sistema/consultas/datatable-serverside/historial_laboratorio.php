<?php
require("../../Connections/horizonte.php");
	$aColumns = array('vc.id_vc', 'DATE_FORMAT(vc.fecha_venta_vc,"%d/%c/%Y")', 'c.concepto_to', 'concat(u.nombre_u," ",u.apaterno_u)', 'vc.id_vc', 'c.id_tipo_concepto_to','p.nombre_completo_p','vc.no_temp_vc','vc.referencia_vc','vc.referencia_vc','u.amaterno_u', 'vc.id_vc', 'vc.id_vc', 'vc.id_paciente_vc');
     
    // DB tables to use 
    $aTables = array( 'venta_conceptos vc');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "vc.id_vc";
     
	 // Joins   
	$sJoin = 'left join conceptos c on c.id_to = vc.id_concepto_es left join catalogo_tipo_conceptos t on t.id_tc = c.id_tipo_concepto_to left join pacientes p on p.id_p = vc.id_paciente_vc left join usuarios u on u.id_u = vc.usuarioEdo4_e';
	 
    // CONDITIONS 
    $sWhere="WHERE vc.id_paciente_vc = '$_GET[aleatorio]' and c.id_tipo_concepto_to = 3 and vc.estatus_vc > 6 ";

    /* Database connection information */
    $gaSql['user']       = $username_horizonte;
    $gaSql['password']   = $password_horizonte;
    $gaSql['db']         = $database_horizonte;
    $gaSql['server']     = $hostname_horizonte;
     
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
    $sOrder = " order by vc.id_vc desc";
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
		
		$x='"'.$row[6].'"';
		$x1='"'.$row[1].'"';
		$x2='"'.$row[7].'"';
		$miRef = substr($row[8], 2); $miRef = str_replace("-","",$miRef);
		$x3='"'.$miRef.'"'; $id_estud = '"'.$row[2].'"';
		
		$row[2]="<div align='left' lang='$_GET[idCo]' name='$_GET[aleatorio]' onClick='rhLab(this.lang,$row[13],$id_estud,$row[0],$x,$x1,$x2,$x3,1)' class='$row[11] histol'><span style='cursor:pointer;'>$row[2]</span></div>";
		
		$row[0]=$hh;
		$row[3] = $row[3].' '.$row[10];
		
		mysqli_select_db($horizonte, $database_horizonte); //Para el primer img
		$result1i = mysqli_query($horizonte, "SELECT v.id_vc, c.concepto_to from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = '$_GET[aleatorio]' and c.id_tipo_concepto_to = 3 and v.estatus_vc > 6 order by v.id_vc desc limit 1 ") or die (mysqli_error($horizonte));
		$row1i = mysqli_fetch_row($result1i);
		
		$row[11] = $row1i[0]; $row[12] = $row1i[1];
		
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>