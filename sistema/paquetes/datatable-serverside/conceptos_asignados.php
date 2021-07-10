<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

	$aleatorio = sqlValue($_GET['aleat'], "text", $horizonte);
	
	$aColumns = array('a.id_ac', 'c.concepto_to', 't.tipo_concepto_tc', 'a.precio_ac', 'a.cantidad_ac', 'a.id_ac', 'a.id_ac', 'a.id_ac', 'a.precio_ac', 'a.cantidad_ac');
	    
    // DB tables to use 
    $aTables = array( 'asigna_conceptos_paquetes a');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "a.id_ac";
     
	// Joins hasta aqui
	$sJoin = 'left join conceptos c on c.id_to = a.id_concepto_ac left join catalogo_tipo_conceptos t on t.id_tc = c.id_tipo_concepto_to ';
	 
    // CONDITIONS
    $sWhere = "where a.aleatorio_ac = $aleatorio order by a.id_ac desc" ;
	
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
		
		$row[0]=$hh;
		$concepto = '"'.$row[1].'"';
		$id_campo_precio = '"p_'.$row[7].'"';
		$id_campo_cantidad = '"c_'.$row[7].'"';
		$id_boton_update = '"b_'.$row[7].'"';
		$valor_precio = '"'.$row[3].'"';
		$valor_cantidad = '"'.$row[4].'"';
		
		//Nunca han sido guardados los valores precio unitario y cantidad:
		if($row[3] == NULL or $row[4] == NULL){
			$row[3]="<div align='center'>$ <input name='p_$row[7]' class='form-control input-sm' id='p_$row[7]' value='$row[3]' style='width:75px;text-align:right;'maxlength='8' onKeyUp='numeros_decimales(this.value, this.name);'></div>";
			$row[4]="<div align='center'><input name='c_$row[7]' class='form-control input-sm' id='c_$row[7]' value='$row[4]' style='width:60px; text-align:right;' maxlength='3' onKeyUp='solo_numeros(this.value, this.name);'></div>";
			$row[5]="<div align='center'><button type='button' class='btn btn-xs btn-primary' onClick='guardarItem($row[7],$id_campo_precio,$id_campo_cantidad);' id='$row[7]' title='Guardar'><i class='fa fa-save' aria-hidden='true'></i></button></div>";
		}else{
			$row[3]="<div name='p_$row[7]' id='p_$row[7]' align='right'>$ $row[3]</div>";
			$row[4]="<div name='c_$row[7]' id='c_$row[7]' align='right'>$row[4]</div>";
			$row[5]="<div align='center'><button type='button' class='btn btn-xs btn-primary' onClick='updateItem($row[7],$id_campo_precio,$id_campo_cantidad,$valor_precio,$valor_cantidad,$id_boton_update);' name='b_$row[7]' id='b_$row[7]' title='Actualizar'><i class='fa fa-refresh' aria-hidden='true'></i></button></div>";
		}
		
		$row[6]="<div align='center'><button type='button' class='btn btn-xs btn-danger' onClick='borrarItem(this.id, $concepto);' id='$row[7]' title='Quitar el concepto'><i class='fa fa-trash' aria-hidden='true'></i></button></div>";
										
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>