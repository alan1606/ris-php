<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

	$id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

	$id_p = sqlValue($_GET["id_p"], "int", $horizonte);
	$estatus_pqs = sqlValue($_GET["estatus_pqs"], "int", $horizonte);

	$aColumns = array('p.id_pq','p.id_pq', 'c.concepto_to', 'DATE_FORMAT(p.fecha_pq, "%Y-%m-%d")', 'p.activo_pq', 'p.folio_pq','u.usuario_u', 'DATE_FORMAT(p.fecha_fin_pq, "%Y-%m-%d")','p.id_paquete_pq', 'p.no_temp_pq','p.id_pq','pa.nombre_completo_p');
     
    // DB tables to use 
    $aTables = array( 'paquetes p');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "p.id_pq";
     
	 // Joins   hasta aqui
	$sJoin = 'left join conceptos c on c.id_to = p.id_paquete_pq left join usuarios u on u.id_u = p.id_usuario_pq left join pacientes pa on pa.id_p = p.id_paciente_pq';
	 
    // CONDITIONS
	if($estatus_pqs==1){
		$sWhere = "where p.id_paciente_pq = $id_p and p.activo_pq =1";
	}else if($estatus_pqs==0){
		$sWhere = "where p.id_paciente_pq = $id_p and p.activo_pq =0";
	}else{
		$sWhere = "where p.id_paciente_pq = $id_p";	
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
    $sOrder = " order by p.fecha_pq desc";
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
		$folioPQ = '"'.$row[5].'"'; $nombre_pa = '"'.$row[11].'"';
		$aleatorio_pq1 = '"'.$row[9].'"';
		$id_pq = sqlValue($row[8], "int", $horizonte); $aleatorio_pq = sqlValue($row[9], "text", $horizonte); $nombrePQ = '"'.$row[2].'"';
		
		$row[0] = "";
		$row[1] = "<div align='center'>$hh</div>";
		
		$row[2]="<div align='center'><button type='button' class='btn btn-link' id='btn_detalles_pq' onClick='detalles_pq($row[10], $nombrePQ, $folioPQ, $nombre_pa, $row[4]);'>$row[2]</button></div>";
		
		$row[3]="<div align='center'>$row[3]<br>$row[6]</div>";
		if($row[4]==1){$row[4]="<div align='center'>ACTIVO</div>";}else{$row[4]="<div align='center'>INACTIVO</div>";}
		$row[5]="<div align='right'>$row[5]</div>";
		
		if($row[7]==null and $acceso_user==1){
			$row[6]="<div align='center'><button type='button' class='btn btn-link' id='btn_finalizar_pq' onClick='finalizar_pq($row[10], $nombrePQ, $folioPQ);'>FINALIZAR</button></div>";
		}else{$row[6]="<div align='center'>$row[7]</div>";}
		
		mysqli_select_db($horizonte, $database_horizonte);
 		$consulta2 = "SELECT precio_to, aleatorio_c from conceptos where id_to = $id_pq limit 1";
 		$query2 = mysqli_query($horizonte, $consulta2) or die (mysqli_error($horizonte)); 
 		$row2 = mysqli_fetch_row($query2);
		
		mysqli_select_db($horizonte, $database_horizonte);
 		$consulta3 = "SELECT referencia_ov from orden_venta where no_temp_ov = $aleatorio_pq limit 1";
 		$query3 = mysqli_query($horizonte, $consulta3) or die (mysqli_error($horizonte)); 
 		$row3 = mysqli_fetch_row($query3); $referencia = sqlValue($row3[0], "text", $horizonte);
		
		mysqli_select_db($horizonte, $database_horizonte);
 		$consulta4 = "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $referencia";
 		$query4 = mysqli_query($horizonte, $consulta4) or die (mysqli_error($horizonte)); 
 		$row4 = mysqli_fetch_row($query4); $saldo = $row2[0] - $row4[0];
		
		$referencia1 = '"'.$row3[0].'"';
		
		$row[7]="<div align='center'><span class='text-primary'>$$row4[0]</span> DE <span class='text-danger'>$$row2[0]</span></div>";
		//$row[8]="<div align='center'><button type='button' class='btn btn-link' id='btn_abonar_pq' onClick='abonar($nombrePQ, $row[10],$folioPQ,$saldo,$aleatorio_pq1,$referencia1)'>$$saldo</button></div>";
		$row[8]="<div align='center'>$$saldo</div>";
												
		$output['aaData'][] = $row;
		
    }
    echo json_encode( $output );
?>