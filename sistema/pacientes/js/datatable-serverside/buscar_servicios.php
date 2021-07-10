<?php
date_default_timezone_set('Mexico/General');
$now = date('His');
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

	//primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
	$tabu = $_GET['idSucursal'].'_precio'; $resultT = mysqli_query($horizonte, "SHOW COLUMNS FROM conceptos LIKE '$tabu' ");
	$existsT = (mysqli_num_rows($resultT))?TRUE:FALSE;
	if($existsT) {
		$precio_nor = $_GET['idSucursal'].'_precio'; $precio_ur = $_GET['idSucursal'].'_precio_u';
		$precio_nor_me = $_GET['idSucursal'].'_precio_mem'; $precio_ur_me = $_GET['idSucursal'].'_precio_mem_u';
	}else{
		$precio_nor = 'e.precio_to'; $precio_ur = 'e.precio_urgencia_to';
		$precio_nor_me = 'precio_membrecia_to'; $precio_ur_me = 'precio_membrecia1';
	}
	//Luego sacamos el día actual, y la hora actual
	$dia_actual = sqlValue(date('N'), "int", $horizonte); $hora_actual = sqlValue(date('G:i'), "date", $horizonte); $urgencia = '';
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultNA = mysqli_query($horizonte, "SELECT temporal_u from usuarios where id_u = '$_GET[idMedico]' ") or die (mysqli_error($horizonte));
	$rowNA = mysqli_fetch_row($resultNA);
	
	switch($dia_actual){
		case 1://Lunes
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_lu <= $hora_actual and horario_s_lu >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl); if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
		break;
		case 2:
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_ma <= $hora_actual and horario_s_ma >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl); if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
		break;
		case 3:
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_mi <= $hora_actual and horario_s_mi >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl); if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
		break;
		case 4:
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_ju <= $hora_actual and horario_s_ju >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl); if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
		break;
		case 5:
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_vi <= $hora_actual and horario_s_vi >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl); if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
		break;
		case 6:
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_sa <= $hora_actual and horario_s_sa >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl); if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
		break;
		case 7://Domingo
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_do <= $hora_actual and horario_s_do >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl); if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
		break;
		default: $urgencia=0; $rowHl[1] = '000000000';
	}
	$aleatorioX = sqlValue($rowNA[0], "text", $horizonte);
	
if($_GET['idConvenio']==0){
	if($urgencia==1){//Nocturno
		$aColumns = array('e.concepto_to', 'a.nombre_a', $precio_ur, 'c.convenio_cv', $precio_ur,'e.id_to', 'c.id_cv', 'e.id_to', 'e.id_area_to' );
	}else{
		$aColumns = array('e.concepto_to', 'a.nombre_a', $precio_nor, 'c.convenio_cv', $precio_nor,'e.id_to', 'c.id_cv', 'e.id_to', 'e.id_area_to' );
	}
    // DB tables to use 
    $aTables = array( 'conceptos e');
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "e.id_to";
	 // Joins   
	$sJoin = 'left join areas a on a.id_a = e.id_area_to left join convenios c on c.id_cv = 1';
    // CONDITIONS
	$lista = '0';
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT id_concepto_es from venta_conceptos where no_temp_vc = '$_GET[aleatorio]' and tipo_concepto_vc = 2 ";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	while ($fila = mysqli_fetch_array($query)) {
		$lista = $lista.','.$fila['id_concepto_es'];
	};//echo $lista;
	$sWhere = "WHERE e.id_to not in ($lista) and e.id_tipo_concepto_to = 2 ";
}/*else if($_GET['idConvenio']==1){//Con Membresía
	if($urgencia==1){
		$aColumns = array('e.concepto_to', 'a.nombre_a', $precio_ur_me, 'c.convenio_cv', 'c.id_cv', 'e.id_to', 'c.id_cv' );
	}else{
		$aColumns = array('e.concepto_to', 'a.nombre_a', $precio_nor_me, 'c.convenio_cv', 'c.id_cv', 'e.id_to', 'c.id_cv' );
	}
    // DB tables to use 
    $aTables = array( 'conceptos e');
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "e.id_to";
	 // Joins   
	$sJoin = 'left join areas a on a.id_a = e.id_area_to left join convenios c on c.id_cv = 1';
    // CONDITIONS
	$lista = '0';
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT id_concepto_es from venta_conceptos where no_temp_vc = '$_GET[aleatorio]' and tipo_concepto_vc = 2 ";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	while ($fila = mysqli_fetch_array($query)) {
		$lista = $lista.','.$fila['id_concepto_es'];
	};//echo $lista;
	$sWhere = "WHERE e.id_to not in ($lista) and e.id_tipo_concepto_to = 2 ";
}*/
else{//Con paquete
	if($urgencia==1){
		$aColumns = array('c.concepto_to', 'd.nombre_d', 'acc.precio_urgencia_ac','cv.convenio_cv', 'cv.id_cv', 'c.id_to', 'cv.id_cv', 'd.id_d', 'cv.id_cv', 'c.id_to', 'cb.id_cb', 'cb.usado_cb');
	}else{
		$aColumns = array('c.concepto_to', 'd.nombre_d', 'acc.precio_ac','cv.convenio_cv', 'cv.id_cv', 'c.id_to', 'cv.id_cv', 'd.id_d', 'cv.id_cv', 'c.id_to', 'cb.id_cb', 'cb.usado_cb');
	}
	// DB tables to use 
	$aTables = array( 'conceptos_beneficios cb');
	// Indexed column (used for fast and accurate table cardinality) 
	$sIndexColumn = "cb.id_cb";
	 // Joins   
	$sJoin = 'left join convenios_paciente cp on cp.id_cvp = cb.id_convenio_paciente_cb left join convenios cv on cv.id_cv = cp.id_convenio_cvp left join asigna_conceptos_paquetes acc on acc.id_ac = cb.id_concepto_convenio_cb left join conceptos c on c.id_to = acc.id_concepto_ac left join departamentos d on d.id_d = c.id_departamento_to';
	
	// CONDITIONS
	$lista = '0';
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta="SELECT id_conceptos_beneficios from venta_conceptos where no_temp_vc = '$_GET[aleatorio]' and tipo_concepto_vc = 2 ";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	while ($fila = mysqli_fetch_array($query)) {
		$lista = $lista.','.$fila['id_conceptos_beneficios'];
	};//echo $lista;
	$sWhere = "WHERE cb.id_cb not in ($lista) and c.id_tipo_concepto_to = 2 and cv.id_cv = '$_GET[idConvenio]' and cb.id_paciente_cb = '$_GET[idP]' ";
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
		if($_GET['idConvenio']==0 or $_GET['idConvenio']==1){
			$xo = $row[6].';0';
			$row[1]="<span lang='$row[2]'>$row[1]</span>";
			$row[2]="<span lang='$xo'>$row[2]</span>";
			$row[0]="<span lang='$row[5]'>$row[0]</span>";
			if($_GET['idConvenio']==0){
				$row[3]="<span lang='$row[5]'>PARTICULAR</span>";
			}
			else{
				$row[3] = "<div lang='1'>$row[3]</div>";
			}
		}
		else{
			$xo = $row[6].';'.$row[9];
			if($row[11]==1){
				$row[1] = "<div lang='$row[2]' style='text-decoration:line-through; color:red;'>$row[1]</div>";
				$row[2] = "<div lang='$xo' style='text-decoration:line-through; color:red;'>$row[2]</div>";
				$row[0] = "<div lang='$row[5]' class='1' style='text-decoration:line-through; color:red;'>$row[0]</div>";
				$row[3] = "<div lang='$row[5]' style='text-decoration:line-through; color:red;'>$row[3]</div>";
			}else{
				$row[1] = "<div lang='$row[2]'>$row[1]</div>";
				$row[2] = "<div lang='$xo'>$row[2]</div>";
				$row[0] = "<div lang='$row[5]'>$row[0]</div>";
				$row[3] = "<div lang='$row[5]'>$row[3]</div>";
			}
		}
		$output['aaData'][] = $row;	
    }     
    echo json_encode( $output );
?>