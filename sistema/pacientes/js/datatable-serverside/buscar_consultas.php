<?php
date_default_timezone_set('Mexico/General');
$now = date('His');
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

	//Luego sacamos el día actual, y la hora actual
	$dia_actual = sqlValue(date('N'), "int", $horizonte); $hora_actual = sqlValue(date('G:i'), "date", $horizonte); $urgencia = '';
		
	switch($dia_actual){
		case 1://Lunes
			mysqli_select_db($horizonte, $database_horizonte);
			$resultHl = mysqli_query($horizonte, "SELECT count(id_su), no_temp_su from sucursales where horario_e_lu <= $hora_actual and horario_s_lu >= $hora_actual and id_su = '$_GET[idSucursal]' ") or die (mysqli_error($horizonte)); $rowHl = mysqli_fetch_row($resultHl);
			if($rowHl[0]>0){$urgencia=0;}else{$urgencia=1;}
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
	
	//Checamos si el paciente tiene membresía y si está vigente
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMeV = mysqli_query($horizonte, "SELECT count(id_me) from membresias where id_paciente_me = '$_GET[idP]'") or die (mysqli_error($horizonte));
	$rowMeV = mysqli_fetch_row($resultMeV); $con_membresia = 0;

	if($rowMeV[0]>0){//Tiene membresía
		mysqli_select_db($horizonte, $database_horizonte);
		$resultMe = mysqli_query($horizonte, "SELECT DATEDIFF(fecha_f_me, CURRENT_DATE) from membresias where id_paciente_me = '$_GET[idP]' order by id_me desc limit 1 ") or die (mysqli_error($horizonte)); $rowMe = mysqli_fetch_row($resultMe); //echo $_GET['idP'];

		if($rowMe[0]>=0){//Está Vigente
			$con_membresia++;
		}else{}
	}else{}
	//Si tiene paquete activo tiene precios de membresía
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta4 = "SELECT count(id_pq) from paquetes where id_paciente_pq = '$_GET[idP]' and activo_pq = 1";
	$query4 = mysqli_query($horizonte, $consulta4) or die (mysqli_error($horizonte)); 
	$row4 = mysqli_fetch_row($query4);

	if($row4[0]>0){$con_membresia++;}

	if($con_membresia>0){//Tiene membresía vigente
		if($urgencia==1){//Nocturno
			$aColumns = array('concat(e.concepto_to," (",a.nombre_a,")")', 'concat(u.nombre_u," ", u.apaterno_u)', 'e.precio_mu', 'c.convenio_cv', 'e.id_to', 'c.id_cv' );
		}else{
			$aColumns = array('concat(e.concepto_to," (",a.nombre_a,")")', 'concat(u.nombre_u," ", u.apaterno_u)', 'e.precio_m', 'c.convenio_cv', 'e.id_to', 'c.id_cv' );
		}
		// DB tables to use 
		$aTables = array( 'conceptos e');
		// Indexed column (used for fast and accurate table cardinality) 
		$sIndexColumn = "e.id_to";
		 // Joins   
		$sJoin = 'left join areas a on a.id_a = e.id_area_to left join convenios c on c.id_cv = e.id_convenio_to left join usuarios u on u.temporal_u = e.aleatorio_c';
		// CONDITIONS
		$lista = '0';
		mysqli_select_db($horizonte, $database_horizonte);
		$consulta = "SELECT v.id_concepto_es from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.no_temp_vc = '$_GET[aleatorio]' and c.id_tipo_concepto_to = 1 ";
		$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
		while ($fila = mysqli_fetch_array($query)) { $lista = $lista.','.$fila['id_concepto_es']; };//echo $lista;
		$sWhere = "WHERE e.id_to not in ($lista) and e.id_tipo_concepto_to = 1 and u.nombre_u != '' ";
	}else{//No tiene membresía vigente
		if($_GET['idConvenio']==0){//Sin convenios
			if($urgencia==1){//Nocturno
				$aColumns = array('concat(e.concepto_to," (",a.nombre_a,")")', 'concat(u.nombre_u," ", u.apaterno_u)', 'e.precio_urgencia_to', 'c.convenio_cv', 'e.id_to', 'c.id_cv' );
			}else{
				$aColumns = array('concat(e.concepto_to," (",a.nombre_a,")")', 'concat(u.nombre_u," ", u.apaterno_u)', 'e.precio_to', 'c.convenio_cv', 'e.id_to', 'c.id_cv' );
			}
			// DB tables to use 
			$aTables = array( 'conceptos e');
			// Indexed column (used for fast and accurate table cardinality) 
			$sIndexColumn = "e.id_to";
			 // Joins   
			$sJoin = 'left join areas a on a.id_a = e.id_area_to left join convenios c on c.id_cv = e.id_convenio_to left join usuarios u on u.temporal_u = e.aleatorio_c';
			// CONDITIONS
			$lista = '0';
			mysqli_select_db($horizonte, $database_horizonte);
			$consulta = "SELECT v.id_concepto_es from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.no_temp_vc = '$_GET[aleatorio]' and c.id_tipo_concepto_to = 1 ";
			$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
			while ($fila = mysqli_fetch_array($query)) {
				$lista = $lista.','.$fila['id_concepto_es'];
			};//echo $lista;
			$sWhere = "WHERE e.id_to not in ($lista) and e.id_tipo_concepto_to = 1 and u.nombre_u != '' ";
		}
		else{//Con algún convenio
			if($urgencia==1){
				$aColumns = array('concat(c.concepto_to," (",a.nombre_a,")")', 'concat(u.nombre_u," ", u.apaterno_u)', 'acc.precio_urgencia_ac','cv.convenio_cv', 'c.id_to', 'cv.id_cv', 'cv.id_cv', 'c.id_to', 'cb.id_cb', 'cb.usado_cb');
			}else{
				$aColumns = array('concat(c.concepto_to," (",a.nombre_a,")")', 'concat(u.nombre_u," ", u.apaterno_u)', 'acc.precio_ac','cv.convenio_cv', 'c.id_to', 'cv.id_cv', 'cv.id_cv', 'c.id_to', 'cb.id_cb', 'cb.usado_cb');
			}
			// DB tables to use 
			$aTables = array( 'conceptos_beneficios cb');
			// Indexed column (used for fast and accurate table cardinality) 
			$sIndexColumn = "cb.id_cb";
			 // Joins   
			$sJoin = 'left join convenios_paciente cp on cp.id_cvp = cb.id_convenio_paciente_cb left join convenios cv on cv.id_cv = cp.id_convenio_cvp left join asigna_conceptos_paquetes acc on acc.id_ac = cb.id_concepto_convenio_cb left join conceptos c on c.id_to = acc.id_concepto_ac left join areas a on a.id_a = c.id_area_to left join usuarios u on u.temporal_u = e.aleatorio_c';
			// CONDITIONS
			$lista = '0';
			mysqli_select_db($horizonte, $database_horizonte);
			$consulta="SELECT v.id_conceptos_beneficios from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.no_temp_vc = '$_GET[aleatorio]' and c.id_tipo_concepto_to = 1 ";
			$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
			while ($fila = mysqli_fetch_array($query)) { $lista = $lista.','.$fila['id_conceptos_beneficios']; };//echo $lista;
			$sWhere = "WHERE cb.id_cb not in ($lista) and c.id_tipo_concepto_to = 1 and cv.id_cv = '$_GET[idConvenio]' and cb.id_paciente_cb = '$_GET[idP]' and u.nombre_u != '' ";
		}
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
			$row[1]="<span lang='$row[2]'>$row[1]</span>"; $row[0]="<span lang='$row[4]'>$row[0]</span>";

			if($_GET['idConvenio']==0){ $row[3]="PARTICULAR"; }//else{ $row[3] = "<div lang='1'>$row[3]</div>"; }
		}
		else{
			if($row[9]==1){
				$row[1] = "<div lang='$row[2]' style='text-decoration:line-through; color:red;'>$row[1]</div>";
				$row[0] = "<div lang='$row[4]' class='1' style='text-decoration:line-through; color:red;'>$row[0]</div>";
			}else{
				$row[1] = "<div lang='$row[2]'>$row[1]</div>";
				$row[0] = "<div lang='$row[4]'>$row[0]</div>";
			}
		}
		$output['aaData'][] = $row;	
    }     
    echo json_encode( $output );
?>