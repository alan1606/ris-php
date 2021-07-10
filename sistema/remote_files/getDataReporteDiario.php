<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

 $date = sqlValue($_POST["date"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sql = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno_1q = mysqli_fetch_row($sql);

if (!$uno_1q[0] == '') { $uno_1 = $uno_1q[0]; }else { $uno_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno_2q = mysqli_fetch_row($sql2);

if (!$uno_2q[0] == '') { $uno_2 = $uno_2q[0]; }else { $uno_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno_3q = mysqli_fetch_row($sql3);

if (!$uno_3q[0] == '') { $uno_3 = $uno_3q[0]; }else { $uno_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno_4q = mysqli_fetch_row($sql4);

if (!$uno_4q[0] == '') { $uno_4 = $uno_4q[0]; }else { $uno_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno_5q = mysqli_fetch_row($sql5);

if (!$uno_5q[0] == '') { $uno_5 = $uno_5q[0]; }else { $uno_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno_6q = mysqli_fetch_row($sql6);

if (!$uno_6q[0] == '') { $uno_6 = $uno_6q[0]; }else { $uno_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno_7q = mysqli_fetch_row($sql7);

if (!$uno_7q[0] == '') { $uno_7 = $uno_7q[0]; }else { $uno_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno_8q = mysqli_fetch_row($sql8);

if (!$uno_8q[0] == '') { $uno_8 = $uno_8q[0]; }else { $uno_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno_9q = mysqli_fetch_row($sql9);

if (!$uno_9q[0] == '') { $uno_9 = $uno_9q[0]; }else { $uno_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno_10q = mysqli_fetch_row($sql10);

if (!$uno_10q[0] == '') { $uno_10 = $uno_10q[0]; }else { $uno_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno_11q = mysqli_fetch_row($sql11);

if (!$uno_11q[0] == '') { $uno_11 = $uno_11q[0]; }else { $uno_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno_12q = mysqli_fetch_row($sql12);

if (!$uno_12q[0] == '') { $uno_12 = $uno_12q[0]; }else { $uno_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno_13q = mysqli_fetch_row($sql13);

if (!$uno_13q[0] == '') { $uno_13 = $uno_13q[0]; }else { $uno_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno_14q = mysqli_fetch_row($sql14);

if (!$uno_14q[0] == '') { $uno_14 = $uno_14q[0]; }else { $uno_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno_15q = mysqli_fetch_row($sql15);

if (!$uno_15q[0] == '') { $uno_15 = $uno_15q[0]; }else { $uno_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno_16q = mysqli_fetch_row($sql16);

if (!$uno_16q[0] == '') { $uno_16 = $uno_16q[0]; }else { $uno_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno_17q = mysqli_fetch_row($sql17);

if (!$uno_17q[0] == '') { $uno_17 = $uno_17q[0]; }else { $uno_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno_18q = mysqli_fetch_row($sql18);

if (!$uno_18q[0] == '') { $uno_18 = $uno_18q[0]; }else { $uno_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno_19q = mysqli_fetch_row($sql19);

if (!$uno_19q[0] == '') { $uno_19 = $uno_19q[0]; }else { $uno_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno_20q = mysqli_fetch_row($sql20);

if (!$uno_20q[0] == '') { $uno_20 = $uno_20q[0]; }else { $uno_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno_21q = mysqli_fetch_row($sql21);

if (!$uno_21q[0] == '') { $uno_21 = $uno_21q[0]; }else { $uno_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno_22q = mysqli_fetch_row($sql22);

if (!$uno_22q[0] == '') { $uno_22 = $uno_22q[0]; }else { $uno_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno_23q = mysqli_fetch_row($sql23);

if (!$uno_23q[0] == '') { $uno_23 = $uno_23q[0]; }else { $uno_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno_24q = mysqli_fetch_row($sql24);

if (!$uno_24q[0] == '') { $uno_24 = $uno_24q[0]; }else { $uno_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno_25q = mysqli_fetch_row($sql25);

if (!$uno_25q[0] == '') { $uno_25 = $uno_25q[0]; }else { $uno_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno_26q = mysqli_fetch_row($sql26);

if (!$uno_26q[0] == '') { $uno_26 = $uno_26q[0]; }else { $uno_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno_27q = mysqli_fetch_row($sql27);

if (!$uno_27q[0] == '') { $uno_27 = $uno_27q[0]; }else { $uno_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno_28q = mysqli_fetch_row($sql28);

if (!$uno_28q[0] == '') { $uno_28 = $uno_28q[0]; }else { $uno_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno_29q = mysqli_fetch_row($sql29);

if (!$uno_29q[0] == '') { $uno_29 = $uno_29q[0]; }else { $uno_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno_30q = mysqli_fetch_row($sql30);

if (!$uno_30q[0] == '') { $uno_30 = $uno_30q[0]; }else { $uno_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-M' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno_31q = mysqli_fetch_row($sql31);

if (!$uno_31q[0] == '') { $uno_31 = $uno_31q[0]; }else { $uno_31 = 0; }

$suma1 = $uno_1 + $uno_2 + $uno_3 + $uno_4 + $uno_5 + $uno_6 + $uno_7 + $uno_8 + $uno_9 + $uno_10 + $uno_11 + $uno_12 + $uno_13 + $uno_14 + $uno_15 + $uno_16 + $uno_17 + $uno_18 + $uno_19 + $uno_20 + $uno_21 + $uno_22 + $uno_23 + $uno_24 + $uno_25 + $uno_26 + $uno_27 + $uno_28 + $uno_29 + $uno_30 + $uno_31;

$uno = $uno_1.';-}'.$uno_2.';-}'.$uno_3.';-}'.$uno_4.';-}'.$uno_5.';-}'.$uno_6.';-}'.$uno_7.';-}'.$uno_8.';-}'.$uno_9.';-}'.$uno_10.';-}'.$uno_11.';-}'.$uno_12.';-}'.$uno_13.';-}'.$uno_14.';-}'.$uno_15.';-}'.$uno_16.';-}'.$uno_17.';-}'.$uno_18.';-}'.$uno_19.';-}'.$uno_20.';-}'.$uno_21.';-}'.$uno_22.';-}'.$uno_23.';-}'.$uno_24.';-}'.$uno_25.';-}'.$uno_26.';-}'.$uno_27.';-}'.$uno_28.';-}'.$uno_29.';-}'.$uno_30.';-}'.$uno_31.';-}'.$suma1;

mysqli_select_db($horizonte, $database_horizonte);
$sql2_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno2_1q = mysqli_fetch_row($sql2_1);

if (!$uno2_1q[0] == '') { $uno2_1 = $uno2_1q[0]; }else { $uno2_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno2_2q = mysqli_fetch_row($sql2_2);

if (!$uno2_2q[0] == '') { $uno2_2 = $uno2_2q[0]; }else { $uno2_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno2_3q = mysqli_fetch_row($sql2_3);

if (!$uno2_3q[0] == '') { $uno2_3 = $uno2_3q[0]; }else { $uno2_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno2_4q = mysqli_fetch_row($sql2_4);

if (!$uno2_4q[0] == '') { $uno2_4 = $uno2_4q[0]; }else { $uno2_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno2_5q = mysqli_fetch_row($sql2_5);

if (!$uno2_5q[0] == '') { $uno2_5 = $uno2_5q[0]; }else { $uno2_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno2_6q = mysqli_fetch_row($sql2_6);

if (!$uno2_6q[0] == '') { $uno2_6 = $uno2_6q[0]; }else { $uno2_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno2_7q = mysqli_fetch_row($sql2_7);

if (!$uno2_7q[0] == '') { $uno2_7 = $uno2_7q[0]; }else { $uno2_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno2_8q = mysqli_fetch_row($sql2_8);

if (!$uno2_8q[0] == '') { $uno2_8 = $uno2_8q[0]; }else { $uno2_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno2_9q = mysqli_fetch_row($sql2_9);

if (!$uno2_9q[0] == '') { $uno2_9 = $uno2_9q[0]; }else { $uno2_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno2_10q = mysqli_fetch_row($sql2_10);

if (!$uno2_10q[0] == '') { $uno2_10 = $uno2_10q[0]; }else { $uno2_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno2_11q = mysqli_fetch_row($sql2_11);

if (!$uno2_11q[0] == '') { $uno2_11 = $uno2_11q[0]; }else { $uno2_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno2_12q = mysqli_fetch_row($sql2_12);

if (!$uno2_12q[0] == '') { $uno2_12 = $uno2_12q[0]; }else { $uno2_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno2_13q = mysqli_fetch_row($sql2_13);

if (!$uno2_13q[0] == '') { $uno2_13 = $uno2_13q[0]; }else { $uno2_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno2_14q = mysqli_fetch_row($sql2_14);

if (!$uno2_14q[0] == '') { $uno2_14 = $uno2_14q[0]; }else { $uno2_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno2_15q = mysqli_fetch_row($sql2_15);

if (!$uno2_15q[0] == '') { $uno2_15 = $uno2_15q[0]; }else { $uno2_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno2_16q = mysqli_fetch_row($sql2_16);

if (!$uno2_16q[0] == '') { $uno2_16 = $uno2_16q[0]; }else { $uno2_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno2_17q = mysqli_fetch_row($sql2_17);

if (!$uno2_17q[0] == '') { $uno2_17 = $uno2_17q[0]; }else { $uno2_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno2_18q = mysqli_fetch_row($sql2_18);

if (!$uno2_18q[0] == '') { $uno2_18 = $uno2_18q[0]; }else { $uno2_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno2_19q = mysqli_fetch_row($sql2_19);

if (!$uno2_19q[0] == '') { $uno2_19 = $uno2_19q[0]; }else { $uno2_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno2_20q = mysqli_fetch_row($sql2_20);

if (!$uno2_20q[0] == '') { $uno2_20 = $uno2_20q[0]; }else { $uno2_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno2_21q = mysqli_fetch_row($sql2_21);

if (!$uno2_21q[0] == '') { $uno2_21 = $uno2_21q[0]; }else { $uno2_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno2_22q = mysqli_fetch_row($sql2_22);

if (!$uno2_22q[0] == '') { $uno2_22 = $uno2_22q[0]; }else { $uno2_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno2_23q = mysqli_fetch_row($sql2_23);

if (!$uno2_23q[0] == '') { $uno2_23 = $uno2_23q[0]; }else { $uno2_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno2_24q = mysqli_fetch_row($sql2_24);

if (!$uno2_24q[0] == '') { $uno2_24 = $uno2_24q[0]; }else { $uno2_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno2_25q = mysqli_fetch_row($sql2_25);

if (!$uno2_25q[0] == '') { $uno2_25 = $uno2_25q[0]; }else { $uno2_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno2_26q = mysqli_fetch_row($sql2_26);

if (!$uno2_26q[0] == '') { $uno2_26 = $uno2_26q[0]; }else { $uno2_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno2_27q = mysqli_fetch_row($sql2_27);

if (!$uno2_27q[0] == '') { $uno2_27 = $uno2_27q[0]; }else { $uno2_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno2_28q = mysqli_fetch_row($sql2_28);

if (!$uno2_28q[0] == '') { $uno2_28 = $uno2_28q[0]; }else { $uno2_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno2_29q = mysqli_fetch_row($sql2_29);

if (!$uno2_29q[0] == '') { $uno2_29 = $uno2_29q[0]; }else { $uno2_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno2_30q = mysqli_fetch_row($sql2_30);

if (!$uno2_30q[0] == '') { $uno2_30 = $uno2_30q[0]; }else { $uno2_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql2_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-V' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno2_31q = mysqli_fetch_row($sql2_31);

if (!$uno2_31q[0] == '') { $uno2_31 = $uno2_31q[0]; }else { $uno2_31 = 0; }

$suma2 = $uno2_1 + $uno2_2 + $uno2_3 + $uno2_4 + $uno2_5 + $uno2_6 + $uno2_7 + $uno2_8 + $uno2_9 + $uno2_10 + $uno2_11 + $uno2_12 + $uno2_13 + $uno2_14 + $uno2_15 + $uno2_16 + $uno2_17 + $uno2_18 + $uno2_19 + $uno2_20 + $uno2_21 + $uno2_22 + $uno2_23 + $uno2_24 + $uno2_25 + $uno2_26 + $uno2_27 + $uno2_28 + $uno2_29 + $uno2_30 + $uno2_31;

$dos = $uno2_1.';-}'.$uno2_2.';-}'.$uno2_3.';-}'.$uno2_4.';-}'.$uno2_5.';-}'.$uno2_6.';-}'.$uno2_7.';-}'.$uno2_8.';-}'.$uno2_9.';-}'.$uno2_10.';-}'.$uno2_11.';-}'.$uno2_12.';-}'.$uno2_13.';-}'.$uno2_14.';-}'.$uno2_15.';-}'.$uno2_16.';-}'.$uno2_17.';-}'.$uno2_18.';-}'.$uno2_19.';-}'.$uno2_20.';-}'.$uno2_21.';-}'.$uno2_22.';-}'.$uno2_23.';-}'.$uno2_24.';-}'.$uno2_25.';-}'.$uno2_26.';-}'.$uno2_27.';-}'.$uno2_28.';-}'.$uno2_29.';-}'.$uno2_30.';-}'.$uno2_31.';-}'.$suma2;

mysqli_select_db($horizonte, $database_horizonte);
$sql3_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno3_1q = mysqli_fetch_row($sql3_1);

if (!$uno3_1q[0] == '') { $uno3_1 = $uno3_1q[0]; }else { $uno3_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno3_2q = mysqli_fetch_row($sql3_2);

if (!$uno3_2q[0] == '') { $uno3_2 = $uno3_2q[0]; }else { $uno3_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno3_3q = mysqli_fetch_row($sql3_3);

if (!$uno3_3q[0] == '') { $uno3_3 = $uno3_3q[0]; }else { $uno3_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno3_4q = mysqli_fetch_row($sql3_4);

if (!$uno3_4q[0] == '') { $uno3_4 = $uno3_4q[0]; }else { $uno3_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno3_5q = mysqli_fetch_row($sql3_5);

if (!$uno3_5q[0] == '') { $uno3_5 = $uno3_5q[0]; }else { $uno3_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno3_6q = mysqli_fetch_row($sql3_6);

if (!$uno3_6q[0] == '') { $uno3_6 = $uno3_6q[0]; }else { $uno3_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno3_7q = mysqli_fetch_row($sql3_7);

if (!$uno3_7q[0] == '') { $uno3_7 = $uno3_7q[0]; }else { $uno3_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno3_8q = mysqli_fetch_row($sql3_8);

if (!$uno3_8q[0] == '') { $uno3_8 = $uno3_8q[0]; }else { $uno3_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno3_9q = mysqli_fetch_row($sql3_9);

if (!$uno3_9q[0] == '') { $uno3_9 = $uno3_9q[0]; }else { $uno3_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno3_10q = mysqli_fetch_row($sql3_10);

if (!$uno3_10q[0] == '') { $uno3_10 = $uno3_10q[0]; }else { $uno3_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno3_11q = mysqli_fetch_row($sql3_11);

if (!$uno3_11q[0] == '') { $uno3_11 = $uno3_11q[0]; }else { $uno3_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno3_12q = mysqli_fetch_row($sql3_12);

if (!$uno3_12q[0] == '') { $uno3_12 = $uno3_12q[0]; }else { $uno3_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno3_13q = mysqli_fetch_row($sql3_13);

if (!$uno3_13q[0] == '') { $uno3_13 = $uno3_13q[0]; }else { $uno3_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno3_14q = mysqli_fetch_row($sql3_14);

if (!$uno3_14q[0] == '') { $uno3_14 = $uno3_14q[0]; }else { $uno3_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno3_15q = mysqli_fetch_row($sql3_15);

if (!$uno3_15q[0] == '') { $uno3_15 = $uno3_15q[0]; }else { $uno3_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno3_16q = mysqli_fetch_row($sql3_16);

if (!$uno3_16q[0] == '') { $uno3_16 = $uno3_16q[0]; }else { $uno3_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno3_17q = mysqli_fetch_row($sql3_17);

if (!$uno3_17q[0] == '') { $uno3_17 = $uno3_17q[0]; }else { $uno3_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno3_18q = mysqli_fetch_row($sql3_18);

if (!$uno3_18q[0] == '') { $uno3_18 = $uno3_18q[0]; }else { $uno3_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno3_19q = mysqli_fetch_row($sql3_19);

if (!$uno3_19q[0] == '') { $uno3_19 = $uno3_19q[0]; }else { $uno3_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno3_20q = mysqli_fetch_row($sql3_20);

if (!$uno3_20q[0] == '') { $uno3_20 = $uno3_20q[0]; }else { $uno3_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno3_21q = mysqli_fetch_row($sql3_21);

if (!$uno3_21q[0] == '') { $uno3_21 = $uno3_21q[0]; }else { $uno3_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno3_22q = mysqli_fetch_row($sql3_22);

if (!$uno3_22q[0] == '') { $uno3_22 = $uno3_22q[0]; }else { $uno3_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno3_23q = mysqli_fetch_row($sql3_23);

if (!$uno3_23q[0] == '') { $uno3_23 = $uno3_23q[0]; }else { $uno3_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno3_24q = mysqli_fetch_row($sql3_24);

if (!$uno3_24q[0] == '') { $uno3_24 = $uno3_24q[0]; }else { $uno3_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno3_25q = mysqli_fetch_row($sql3_25);

if (!$uno3_25q[0] == '') { $uno3_25 = $uno3_25q[0]; }else { $uno3_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno3_26q = mysqli_fetch_row($sql3_26);

if (!$uno3_26q[0] == '') { $uno3_26 = $uno3_26q[0]; }else { $uno3_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno3_27q = mysqli_fetch_row($sql3_27);

if (!$uno3_27q[0] == '') { $uno3_27 = $uno3_27q[0]; }else { $uno3_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno3_28q = mysqli_fetch_row($sql3_28);

if (!$uno3_28q[0] == '') { $uno3_28 = $uno3_28q[0]; }else { $uno3_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno3_29q = mysqli_fetch_row($sql3_29);

if (!$uno3_29q[0] == '') { $uno3_29 = $uno3_29q[0]; }else { $uno3_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno3_30q = mysqli_fetch_row($sql3_30);

if (!$uno3_30q[0] == '') { $uno3_30 = $uno3_30q[0]; }else { $uno3_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql3_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno3_31q = mysqli_fetch_row($sql3_31);

if (!$uno3_31q[0] == '') { $uno3_31 = $uno3_31q[0]; }else { $uno3_31 = 0; }

$suma3 = $uno3_1 + $uno3_2 + $uno3_3 + $uno3_4 + $uno3_5 + $uno3_6 + $uno3_7 + $uno3_8 + $uno3_9 + $uno3_10 + $uno3_11 + $uno3_12 + $uno3_13 + $uno3_14 + $uno3_15 + $uno3_16 + $uno3_17 + $uno3_18 + $uno3_19 + $uno3_20 + $uno3_21 + $uno3_22 + $uno3_23 + $uno3_24 + $uno3_25 + $uno3_26 + $uno3_27 + $uno3_28 + $uno3_29 + $uno3_30 + $uno3_31;

$tres = $uno3_1.';-}'.$uno3_2.';-}'.$uno3_3.';-}'.$uno3_4.';-}'.$uno3_5.';-}'.$uno3_6.';-}'.$uno3_7.';-}'.$uno3_8.';-}'.$uno3_9.';-}'.$uno3_10.';-}'.$uno3_11.';-}'.$uno3_12.';-}'.$uno3_13.';-}'.$uno3_14.';-}'.$uno3_15.';-}'.$uno3_16.';-}'.$uno3_17.';-}'.$uno3_18.';-}'.$uno3_19.';-}'.$uno3_20.';-}'.$uno3_21.';-}'.$uno3_22.';-}'.$uno3_23.';-}'.$uno3_24.';-}'.$uno3_25.';-}'.$uno3_26.';-}'.$uno3_27.';-}'.$uno3_28.';-}'.$uno3_29.';-}'.$uno3_30.';-}'.$uno3_31.';-}'.$suma3;

mysqli_select_db($horizonte, $database_horizonte);
$sql4_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno4_1q = mysqli_fetch_row($sql4_1);

if (!$uno4_1q[0] == '') { $uno4_1 = $uno4_1q[0]; }else { $uno4_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno4_2q = mysqli_fetch_row($sql4_2);

if (!$uno4_2q[0] == '') { $uno4_2 = $uno4_2q[0]; }else { $uno4_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno4_3q = mysqli_fetch_row($sql4_3);

if (!$uno4_3q[0] == '') { $uno4_3 = $uno4_3q[0]; }else { $uno4_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno4_4q = mysqli_fetch_row($sql4_4);

if (!$uno4_4q[0] == '') { $uno4_4 = $uno4_4q[0]; }else { $uno4_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno4_5q = mysqli_fetch_row($sql4_5);

if (!$uno4_5q[0] == '') { $uno4_5 = $uno4_5q[0]; }else { $uno4_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno4_6q = mysqli_fetch_row($sql4_6);

if (!$uno4_6q[0] == '') { $uno4_6 = $uno4_6q[0]; }else { $uno4_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno4_7q = mysqli_fetch_row($sql4_7);

if (!$uno4_7q[0] == '') { $uno4_7 = $uno4_7q[0]; }else { $uno4_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno4_8q = mysqli_fetch_row($sql4_8);

if (!$uno4_8q[0] == '') { $uno4_8 = $uno4_8q[0]; }else { $uno4_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno4_9q = mysqli_fetch_row($sql4_9);

if (!$uno4_9q[0] == '') { $uno4_9 = $uno4_9q[0]; }else { $uno4_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno4_10q = mysqli_fetch_row($sql4_10);

if (!$uno4_10q[0] == '') { $uno4_10 = $uno4_10q[0]; }else { $uno4_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno4_11q = mysqli_fetch_row($sql4_11);

if (!$uno4_11q[0] == '') { $uno4_11 = $uno4_11q[0]; }else { $uno4_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno4_12q = mysqli_fetch_row($sql4_12);

if (!$uno4_12q[0] == '') { $uno4_12 = $uno4_12q[0]; }else { $uno4_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno4_13q = mysqli_fetch_row($sql4_13);

if (!$uno4_13q[0] == '') { $uno4_13 = $uno4_13q[0]; }else { $uno4_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno4_14q = mysqli_fetch_row($sql4_14);

if (!$uno4_14q[0] == '') { $uno4_14 = $uno4_14q[0]; }else { $uno4_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno4_15q = mysqli_fetch_row($sql4_15);

if (!$uno4_15q[0] == '') { $uno4_15 = $uno4_15q[0]; }else { $uno4_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno4_16q = mysqli_fetch_row($sql4_16);

if (!$uno4_16q[0] == '') { $uno4_16 = $uno4_16q[0]; }else { $uno4_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno4_17q = mysqli_fetch_row($sql4_17);

if (!$uno4_17q[0] == '') { $uno4_17 = $uno4_17q[0]; }else { $uno4_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CONSULTAS U-N' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno4_18q = mysqli_fetch_row($sql4_18);

if (!$uno4_18q[0] == '') { $uno4_18 = $uno4_18q[0]; }else { $uno4_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno4_19q = mysqli_fetch_row($sql4_19);

if (!$uno4_19q[0] == '') { $uno4_19 = $uno4_19q[0]; }else { $uno4_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno4_20q = mysqli_fetch_row($sql4_20);

if (!$uno4_20q[0] == '') { $uno4_20 = $uno4_20q[0]; }else { $uno4_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno4_21q = mysqli_fetch_row($sql4_21);

if (!$uno4_21q[0] == '') { $uno4_21 = $uno4_21q[0]; }else { $uno4_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno4_22q = mysqli_fetch_row($sql4_22);

if (!$uno4_22q[0] == '') { $uno4_22 = $uno4_22q[0]; }else { $uno4_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno4_23q = mysqli_fetch_row($sql4_23);

if (!$uno4_23q[0] == '') { $uno4_23 = $uno4_23q[0]; }else { $uno4_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno4_24q = mysqli_fetch_row($sql4_24);

if (!$uno4_24q[0] == '') { $uno4_24 = $uno4_24q[0]; }else { $uno4_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno4_25q = mysqli_fetch_row($sql4_25);

if (!$uno4_25q[0] == '') { $uno4_25 = $uno4_25q[0]; }else { $uno4_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno4_26q = mysqli_fetch_row($sql4_26);

if (!$uno4_26q[0] == '') { $uno4_26 = $uno4_26q[0]; }else { $uno4_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno4_27q = mysqli_fetch_row($sql4_27);

if (!$uno4_27q[0] == '') { $uno4_27 = $uno4_27q[0]; }else { $uno4_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno4_28q = mysqli_fetch_row($sql4_28);

if (!$uno4_28q[0] == '') { $uno4_28 = $uno4_28q[0]; }else { $uno4_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno4_29q = mysqli_fetch_row($sql4_29);

if (!$uno4_29q[0] == '') { $uno4_29 = $uno4_29q[0]; }else { $uno4_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno4_30q = mysqli_fetch_row($sql4_30);

if (!$uno4_30q[0] == '') { $uno4_30 = $uno4_30q[0]; }else { $uno4_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql4_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'URGENCIAS CALIFICADAS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno4_31q = mysqli_fetch_row($sql4_31);

if (!$uno4_31q[0] == '') { $uno4_31 = $uno4_31q[0]; }else { $uno4_31 = 0; }

$suma4 = $uno4_1 + $uno4_2 + $uno4_3 + $uno4_4 + $uno4_5 + $uno4_6 + $uno4_7 + $uno4_8 + $uno4_9 + $uno4_10 + $uno4_11 + $uno4_12 + $uno4_13 + $uno4_14 + $uno4_15 + $uno4_16 + $uno4_17 + $uno4_18 + $uno4_19 + $uno4_20 + $uno4_21 + $uno4_22 + $uno4_23 + $uno4_24 + $uno4_25 + $uno4_26 + $uno4_27 + $uno4_28 + $uno4_29 + $uno4_30 + $uno4_31;

$cuatro = $uno4_1.';-}'.$uno4_2.';-}'.$uno4_3.';-}'.$uno4_4.';-}'.$uno4_5.';-}'.$uno4_6.';-}'.$uno4_7.';-}'.$uno4_8.';-}'.$uno4_9.';-}'.$uno4_10.';-}'.$uno4_11.';-}'.$uno4_12.';-}'.$uno4_13.';-}'.$uno4_14.';-}'.$uno4_15.';-}'.$uno4_16.';-}'.$uno4_17.';-}'.$uno4_18.';-}'.$uno4_19.';-}'.$uno4_20.';-}'.$uno4_21.';-}'.$uno4_22.';-}'.$uno4_23.';-}'.$uno4_24.';-}'.$uno4_25.';-}'.$uno4_26.';-}'.$uno4_27.';-}'.$uno4_28.';-}'.$uno4_29.';-}'.$uno4_30.';-}'.$uno4_31.';-}'.$suma4;

mysqli_select_db($horizonte, $database_horizonte);
$sql5_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno5_1q = mysqli_fetch_row($sql5_1);

if (!$uno5_1q[0] == '') { $uno5_1 = $uno5_1q[0]; }else { $uno5_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno5_2q = mysqli_fetch_row($sql5_2);

if (!$uno5_2q[0] == '') { $uno5_2 = $uno5_2q[0]; }else { $uno5_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno5_3q = mysqli_fetch_row($sql5_3);

if (!$uno5_3q[0] == '') { $uno5_3 = $uno5_3q[0]; }else { $uno5_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno5_4q = mysqli_fetch_row($sql5_4);

if (!$uno5_4q[0] == '') { $uno5_4 = $uno5_4q[0]; }else { $uno5_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno5_5q = mysqli_fetch_row($sql5_5);

if (!$uno5_5q[0] == '') { $uno5_5 = $uno5_5q[0]; }else { $uno5_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno5_6q = mysqli_fetch_row($sql5_6);

if (!$uno5_6q[0] == '') { $uno5_6 = $uno5_6q[0]; }else { $uno5_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno5_7q = mysqli_fetch_row($sql5_7);

if (!$uno5_7q[0] == '') { $uno5_7 = $uno5_7q[0]; }else { $uno5_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno5_8q = mysqli_fetch_row($sql5_8);

if (!$uno5_8q[0] == '') { $uno5_8 = $uno5_8q[0]; }else { $uno5_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno5_9q = mysqli_fetch_row($sql5_9);

if (!$uno5_9q[0] == '') { $uno5_9 = $uno5_9q[0]; }else { $uno5_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno5_10q = mysqli_fetch_row($sql5_10);

if (!$uno5_10q[0] == '') { $uno5_10 = $uno5_10q[0]; }else { $uno5_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno5_11q = mysqli_fetch_row($sql5_11);

if (!$uno5_11q[0] == '') { $uno5_11 = $uno5_11q[0]; }else { $uno5_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno5_12q = mysqli_fetch_row($sql5_12);

if (!$uno5_12q[0] == '') { $uno5_12 = $uno5_12q[0]; }else { $uno5_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno5_13q = mysqli_fetch_row($sql5_13);

if (!$uno5_13q[0] == '') { $uno5_13 = $uno5_13q[0]; }else { $uno5_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno5_14q = mysqli_fetch_row($sql5_14);

if (!$uno5_14q[0] == '') { $uno5_14 = $uno5_14q[0]; }else { $uno5_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno5_15q = mysqli_fetch_row($sql5_15);

if (!$uno5_15q[0] == '') { $uno5_15 = $uno5_15q[0]; }else { $uno5_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno5_16q = mysqli_fetch_row($sql5_16);

if (!$uno5_16q[0] == '') { $uno5_16 = $uno5_16q[0]; }else { $uno5_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno5_17q = mysqli_fetch_row($sql5_17);

if (!$uno5_17q[0] == '') { $uno5_17 = $uno5_17q[0]; }else { $uno5_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno5_18q = mysqli_fetch_row($sql5_18);

if (!$uno5_18q[0] == '') { $uno5_18 = $uno5_18q[0]; }else { $uno5_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno5_19q = mysqli_fetch_row($sql5_19);

if (!$uno5_19q[0] == '') { $uno5_19 = $uno5_19q[0]; }else { $uno5_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno5_20q = mysqli_fetch_row($sql5_20);

if (!$uno5_20q[0] == '') { $uno5_20 = $uno5_20q[0]; }else { $uno5_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno5_21q = mysqli_fetch_row($sql5_21);

if (!$uno5_21q[0] == '') { $uno5_21 = $uno5_21q[0]; }else { $uno5_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno5_22q = mysqli_fetch_row($sql5_22);

if (!$uno5_22q[0] == '') { $uno5_22 = $uno5_22q[0]; }else { $uno5_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno5_23q = mysqli_fetch_row($sql5_23);

if (!$uno5_23q[0] == '') { $uno5_23 = $uno5_23q[0]; }else { $uno5_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno5_24q = mysqli_fetch_row($sql5_24);

if (!$uno5_24q[0] == '') { $uno5_24 = $uno5_24q[0]; }else { $uno5_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno5_25q = mysqli_fetch_row($sql5_25);

if (!$uno5_25q[0] == '') { $uno5_25 = $uno5_25q[0]; }else { $uno5_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno5_26q = mysqli_fetch_row($sql5_26);

if (!$uno5_26q[0] == '') { $uno5_26 = $uno5_26q[0]; }else { $uno5_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno5_27q = mysqli_fetch_row($sql5_27);

if (!$uno5_27q[0] == '') { $uno5_27 = $uno5_27q[0]; }else { $uno5_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno5_28q = mysqli_fetch_row($sql5_28);

if (!$uno5_28q[0] == '') { $uno5_28 = $uno5_28q[0]; }else { $uno5_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno5_29q = mysqli_fetch_row($sql5_29);

if (!$uno5_29q[0] == '') { $uno5_29 = $uno5_29q[0]; }else { $uno5_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno5_30q = mysqli_fetch_row($sql5_30);

if (!$uno5_30q[0] == '') { $uno5_30 = $uno5_30q[0]; }else { $uno5_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql5_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'OTRAS URGENCIAS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno5_31q = mysqli_fetch_row($sql5_31);

if (!$uno5_31q[0] == '') { $uno5_31 = $uno5_31q[0]; }else { $uno5_31 = 0; }

$suma5 = $uno5_1 + $uno5_2 + $uno5_3 + $uno5_4 + $uno5_5 + $uno5_6 + $uno5_7 + $uno5_8 + $uno5_9 + $uno5_10 + $uno5_11 + $uno5_12 + $uno5_13 + $uno5_14 + $uno5_15 + $uno5_16 + $uno5_17 + $uno5_18 + $uno5_19 + $uno5_20 + $uno5_21 + $uno5_22 + $uno5_23 + $uno5_24 + $uno5_25 + $uno5_26 + $uno5_27 + $uno5_28 + $uno5_29 + $uno5_30 + $uno5_31;

$cinco = $uno5_1.';-}'.$uno5_2.';-}'.$uno5_3.';-}'.$uno5_4.';-}'.$uno5_5.';-}'.$uno5_6.';-}'.$uno5_7.';-}'.$uno5_8.';-}'.$uno5_9.';-}'.$uno5_10.';-}'.$uno5_11.';-}'.$uno5_12.';-}'.$uno5_13.';-}'.$uno5_14.';-}'.$uno5_15.';-}'.$uno5_16.';-}'.$uno5_17.';-}'.$uno5_18.';-}'.$uno5_19.';-}'.$uno5_20.';-}'.$uno5_21.';-}'.$uno5_22.';-}'.$uno5_23.';-}'.$uno5_24.';-}'.$uno5_25.';-}'.$uno5_26.';-}'.$uno5_27.';-}'.$uno5_28.';-}'.$uno5_29.';-}'.$uno5_30.';-}'.$uno5_31.';-}'.$suma5;

mysqli_select_db($horizonte, $database_horizonte);
$sql6_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno6_1q = mysqli_fetch_row($sql6_1);

if (!$uno6_1q[0] == '') { $uno6_1 = $uno6_1q[0]; }else { $uno6_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno6_2q = mysqli_fetch_row($sql6_2);

if (!$uno6_2q[0] == '') { $uno6_2 = $uno6_2q[0]; }else { $uno6_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno6_3q = mysqli_fetch_row($sql6_3);

if (!$uno6_3q[0] == '') { $uno6_3 = $uno6_3q[0]; }else { $uno6_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno6_4q = mysqli_fetch_row($sql6_4);

if (!$uno6_4q[0] == '') { $uno6_4 = $uno6_4q[0]; }else { $uno6_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno6_5q = mysqli_fetch_row($sql6_5);

if (!$uno6_5q[0] == '') { $uno6_5 = $uno6_5q[0]; }else { $uno6_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno6_6q = mysqli_fetch_row($sql6_6);

if (!$uno6_6q[0] == '') { $uno6_6 = $uno6_6q[0]; }else { $uno6_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno6_7q = mysqli_fetch_row($sql6_7);

if (!$uno6_7q[0] == '') { $uno6_7 = $uno6_7q[0]; }else { $uno6_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno6_8q = mysqli_fetch_row($sql6_8);

if (!$uno6_8q[0] == '') { $uno6_8 = $uno6_8q[0]; }else { $uno6_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno6_9q = mysqli_fetch_row($sql6_9);

if (!$uno6_9q[0] == '') { $uno6_9 = $uno6_9q[0]; }else { $uno6_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno6_10q = mysqli_fetch_row($sql6_10);

if (!$uno6_10q[0] == '') { $uno6_10 = $uno6_10q[0]; }else { $uno6_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno6_11q = mysqli_fetch_row($sql6_11);

if (!$uno6_11q[0] == '') { $uno6_11 = $uno6_11q[0]; }else { $uno6_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno6_12q = mysqli_fetch_row($sql6_12);

if (!$uno6_12q[0] == '') { $uno6_12 = $uno6_12q[0]; }else { $uno6_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno6_13q = mysqli_fetch_row($sql6_13);

if (!$uno6_13q[0] == '') { $uno6_13 = $uno6_13q[0]; }else { $uno6_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno6_14q = mysqli_fetch_row($sql6_14);

if (!$uno6_14q[0] == '') { $uno6_14 = $uno6_14q[0]; }else { $uno6_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno6_15q = mysqli_fetch_row($sql6_15);

if (!$uno6_15q[0] == '') { $uno6_15 = $uno6_15q[0]; }else { $uno6_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno6_16q = mysqli_fetch_row($sql6_16);

if (!$uno6_16q[0] == '') { $uno6_16 = $uno6_16q[0]; }else { $uno6_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno6_17q = mysqli_fetch_row($sql6_17);

if (!$uno6_17q[0] == '') { $uno6_17 = $uno6_17q[0]; }else { $uno6_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno6_18q = mysqli_fetch_row($sql6_18);

if (!$uno6_18q[0] == '') { $uno6_18 = $uno6_18q[0]; }else { $uno6_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno6_19q = mysqli_fetch_row($sql6_19);

if (!$uno6_19q[0] == '') { $uno6_19 = $uno6_19q[0]; }else { $uno6_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno6_20q = mysqli_fetch_row($sql6_20);

if (!$uno6_20q[0] == '') { $uno6_20 = $uno6_20q[0]; }else { $uno6_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno6_21q = mysqli_fetch_row($sql6_21);

if (!$uno6_21q[0] == '') { $uno6_21 = $uno6_21q[0]; }else { $uno6_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno6_22q = mysqli_fetch_row($sql6_22);

if (!$uno6_22q[0] == '') { $uno6_22 = $uno6_22q[0]; }else { $uno6_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno6_23q = mysqli_fetch_row($sql6_23);

if (!$uno6_23q[0] == '') { $uno6_23 = $uno6_23q[0]; }else { $uno6_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno6_24q = mysqli_fetch_row($sql6_24);

if (!$uno6_24q[0] == '') { $uno6_24 = $uno6_24q[0]; }else { $uno6_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno6_25q = mysqli_fetch_row($sql6_25);

if (!$uno6_25q[0] == '') { $uno6_25 = $uno6_25q[0]; }else { $uno6_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno6_26q = mysqli_fetch_row($sql6_26);

if (!$uno6_26q[0] == '') { $uno6_26 = $uno6_26q[0]; }else { $uno6_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno6_27q = mysqli_fetch_row($sql6_27);

if (!$uno6_27q[0] == '') { $uno6_27 = $uno6_27q[0]; }else { $uno6_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno6_28q = mysqli_fetch_row($sql6_28);

if (!$uno6_28q[0] == '') { $uno6_28 = $uno6_28q[0]; }else { $uno6_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno6_29q = mysqli_fetch_row($sql6_29);

if (!$uno6_29q[0] == '') { $uno6_29 = $uno6_29q[0]; }else { $uno6_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno6_30q = mysqli_fetch_row($sql6_30);

if (!$uno6_30q[0] == '') { $uno6_30 = $uno6_30q[0]; }else { $uno6_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql6_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS GENERAL' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno6_31q = mysqli_fetch_row($sql6_31);

if (!$uno6_31q[0] == '') { $uno6_31 = $uno6_31q[0]; }else { $uno6_31 = 0; }

$suma6 = $uno6_1 + $uno6_2 + $uno6_3 + $uno6_4 + $uno6_5 + $uno6_6 + $uno6_7 + $uno6_8 + $uno6_9 + $uno6_10 + $uno6_11 + $uno6_12 + $uno6_13 + $uno6_14 + $uno6_15 + $uno6_16 + $uno6_17 + $uno6_18 + $uno6_19 + $uno6_20 + $uno6_21 + $uno6_22 + $uno6_23 + $uno6_24 + $uno6_25 + $uno6_26 + $uno6_27 + $uno6_28 + $uno6_29 + $uno6_30 + $uno6_31;

$seis = $uno6_1.';-}'.$uno6_2.';-}'.$uno6_3.';-}'.$uno6_4.';-}'.$uno6_5.';-}'.$uno6_6.';-}'.$uno6_7.';-}'.$uno6_8.';-}'.$uno6_9.';-}'.$uno6_10.';-}'.$uno6_11.';-}'.$uno6_12.';-}'.$uno6_13.';-}'.$uno6_14.';-}'.$uno6_15.';-}'.$uno6_16.';-}'.$uno6_17.';-}'.$uno6_18.';-}'.$uno6_19.';-}'.$uno6_20.';-}'.$uno6_21.';-}'.$uno6_22.';-}'.$uno6_23.';-}'.$uno6_24.';-}'.$uno6_25.';-}'.$uno6_26.';-}'.$uno6_27.';-}'.$uno6_28.';-}'.$uno6_29.';-}'.$uno6_30.';-}'.$uno6_31.';-}'.$suma6;

mysqli_select_db($horizonte, $database_horizonte);
$sql7_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno7_1q = mysqli_fetch_row($sql7_1);

if (!$uno7_1q[0] == '') { $uno7_1 = $uno7_1q[0]; }else { $uno7_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno7_2q = mysqli_fetch_row($sql7_2);

if (!$uno7_2q[0] == '') { $uno7_2 = $uno7_2q[0]; }else { $uno7_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno7_3q = mysqli_fetch_row($sql7_3);

if (!$uno7_3q[0] == '') { $uno7_3 = $uno7_3q[0]; }else { $uno7_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno7_4q = mysqli_fetch_row($sql7_4);

if (!$uno7_4q[0] == '') { $uno7_4 = $uno7_4q[0]; }else { $uno7_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno7_5q = mysqli_fetch_row($sql7_5);

if (!$uno7_5q[0] == '') { $uno7_5 = $uno7_5q[0]; }else { $uno7_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno7_6q = mysqli_fetch_row($sql7_6);

if (!$uno7_6q[0] == '') { $uno7_6 = $uno7_6q[0]; }else { $uno7_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno7_7q = mysqli_fetch_row($sql7_7);

if (!$uno7_7q[0] == '') { $uno7_7 = $uno7_7q[0]; }else { $uno7_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno7_8q = mysqli_fetch_row($sql7_8);

if (!$uno7_8q[0] == '') { $uno7_8 = $uno7_8q[0]; }else { $uno7_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno7_9q = mysqli_fetch_row($sql7_9);

if (!$uno7_9q[0] == '') { $uno7_9 = $uno7_9q[0]; }else { $uno7_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno7_10q = mysqli_fetch_row($sql7_10);

if (!$uno7_10q[0] == '') { $uno7_10 = $uno7_10q[0]; }else { $uno7_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno7_11q = mysqli_fetch_row($sql7_11);

if (!$uno7_11q[0] == '') { $uno7_11 = $uno7_11q[0]; }else { $uno7_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno7_12q = mysqli_fetch_row($sql7_12);

if (!$uno7_12q[0] == '') { $uno7_12 = $uno7_12q[0]; }else { $uno7_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno7_13q = mysqli_fetch_row($sql7_13);

if (!$uno7_13q[0] == '') { $uno7_13 = $uno7_13q[0]; }else { $uno7_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno7_14q = mysqli_fetch_row($sql7_14);

if (!$uno7_14q[0] == '') { $uno7_14 = $uno7_14q[0]; }else { $uno7_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno7_15q = mysqli_fetch_row($sql7_15);

if (!$uno7_15q[0] == '') { $uno7_15 = $uno7_15q[0]; }else { $uno7_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno7_16q = mysqli_fetch_row($sql7_16);

if (!$uno7_16q[0] == '') { $uno7_16 = $uno7_16q[0]; }else { $uno7_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno7_17q = mysqli_fetch_row($sql7_17);

if (!$uno7_17q[0] == '') { $uno7_17 = $uno7_17q[0]; }else { $uno7_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno7_18q = mysqli_fetch_row($sql7_18);

if (!$uno7_18q[0] == '') { $uno7_18 = $uno7_18q[0]; }else { $uno7_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno7_19q = mysqli_fetch_row($sql7_19);

if (!$uno7_19q[0] == '') { $uno7_19 = $uno7_19q[0]; }else { $uno7_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno7_20q = mysqli_fetch_row($sql7_20);

if (!$uno7_20q[0] == '') { $uno7_20 = $uno7_20q[0]; }else { $uno7_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno7_21q = mysqli_fetch_row($sql7_21);

if (!$uno7_21q[0] == '') { $uno7_21 = $uno7_21q[0]; }else { $uno7_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno7_22q = mysqli_fetch_row($sql7_22);

if (!$uno7_22q[0] == '') { $uno7_22 = $uno7_22q[0]; }else { $uno7_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno7_23q = mysqli_fetch_row($sql7_23);

if (!$uno7_23q[0] == '') { $uno7_23 = $uno7_23q[0]; }else { $uno7_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno7_24q = mysqli_fetch_row($sql7_24);

if (!$uno7_24q[0] == '') { $uno7_24 = $uno7_24q[0]; }else { $uno7_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno7_25q = mysqli_fetch_row($sql7_25);

if (!$uno7_25q[0] == '') { $uno7_25 = $uno7_25q[0]; }else { $uno7_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno7_26q = mysqli_fetch_row($sql7_26);

if (!$uno7_26q[0] == '') { $uno7_26 = $uno7_26q[0]; }else { $uno7_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno7_27q = mysqli_fetch_row($sql7_27);

if (!$uno7_27q[0] == '') { $uno7_27 = $uno7_27q[0]; }else { $uno7_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno7_28q = mysqli_fetch_row($sql7_28);

if (!$uno7_28q[0] == '') { $uno7_28 = $uno7_28q[0]; }else { $uno7_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno7_29q = mysqli_fetch_row($sql7_29);

if (!$uno7_29q[0] == '') { $uno7_29 = $uno7_29q[0]; }else { $uno7_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno7_30q = mysqli_fetch_row($sql7_30);

if (!$uno7_30q[0] == '') { $uno7_30 = $uno7_30q[0]; }else { $uno7_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql7_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS PEDIATRIA' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno7_31q = mysqli_fetch_row($sql7_31);

if (!$uno7_31q[0] == '') { $uno7_31 = $uno7_31q[0]; }else { $uno7_31 = 0; }

$suma7 = $uno7_1 + $uno7_2 + $uno7_3 + $uno7_4 + $uno7_5 + $uno7_6 + $uno7_7 + $uno7_8 + $uno7_9 + $uno7_10 + $uno7_11 + $uno7_12 + $uno7_13 + $uno7_14 + $uno7_15 + $uno7_16 + $uno7_17 + $uno7_18 + $uno7_19 + $uno7_20 + $uno7_21 + $uno7_22 + $uno7_23 + $uno7_24 + $uno7_25 + $uno7_26 + $uno7_27 + $uno7_28 + $uno7_29 + $uno7_30 + $uno7_31;

$siete = $uno7_1.';-}'.$uno7_2.';-}'.$uno7_3.';-}'.$uno7_4.';-}'.$uno7_5.';-}'.$uno7_6.';-}'.$uno7_7.';-}'.$uno7_8.';-}'.$uno7_9.';-}'.$uno7_10.';-}'.$uno7_11.';-}'.$uno7_12.';-}'.$uno7_13.';-}'.$uno7_14.';-}'.$uno7_15.';-}'.$uno7_16.';-}'.$uno7_17.';-}'.$uno7_18.';-}'.$uno7_19.';-}'.$uno7_20.';-}'.$uno7_21.';-}'.$uno7_22.';-}'.$uno7_23.';-}'.$uno7_24.';-}'.$uno7_25.';-}'.$uno7_26.';-}'.$uno7_27.';-}'.$uno7_28.';-}'.$uno7_29.';-}'.$uno7_30.';-}'.$uno7_31.';-}'.$suma7;

mysqli_select_db($horizonte, $database_horizonte);
$sql8_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno8_1q = mysqli_fetch_row($sql8_1);

if (!$uno8_1q[0] == '') { $uno8_1 = $uno8_1q[0]; }else { $uno8_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno8_2q = mysqli_fetch_row($sql8_2);

if (!$uno8_2q[0] == '') { $uno8_2 = $uno8_2q[0]; }else { $uno8_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno8_3q = mysqli_fetch_row($sql8_3);

if (!$uno8_3q[0] == '') { $uno8_3 = $uno8_3q[0]; }else { $uno8_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno8_4q = mysqli_fetch_row($sql8_4);

if (!$uno8_4q[0] == '') { $uno8_4 = $uno8_4q[0]; }else { $uno8_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno8_5q = mysqli_fetch_row($sql8_5);

if (!$uno8_5q[0] == '') { $uno8_5 = $uno8_5q[0]; }else { $uno8_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno8_6q = mysqli_fetch_row($sql8_6);

if (!$uno8_6q[0] == '') { $uno8_6 = $uno8_6q[0]; }else { $uno8_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno8_7q = mysqli_fetch_row($sql8_7);

if (!$uno8_7q[0] == '') { $uno8_7 = $uno8_7q[0]; }else { $uno8_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno8_8q = mysqli_fetch_row($sql8_8);

if (!$uno8_8q[0] == '') { $uno8_8 = $uno8_8q[0]; }else { $uno8_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno8_9q = mysqli_fetch_row($sql8_9);

if (!$uno8_9q[0] == '') { $uno8_9 = $uno8_9q[0]; }else { $uno8_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno8_10q = mysqli_fetch_row($sql8_10);

if (!$uno8_10q[0] == '') { $uno8_10 = $uno8_10q[0]; }else { $uno8_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno8_11q = mysqli_fetch_row($sql8_11);

if (!$uno8_11q[0] == '') { $uno8_11 = $uno8_11q[0]; }else { $uno8_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno8_12q = mysqli_fetch_row($sql8_12);

if (!$uno8_12q[0] == '') { $uno8_12 = $uno8_12q[0]; }else { $uno8_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno8_13q = mysqli_fetch_row($sql8_13);

if (!$uno8_13q[0] == '') { $uno8_13 = $uno8_13q[0]; }else { $uno8_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno8_14q = mysqli_fetch_row($sql8_14);

if (!$uno8_14q[0] == '') { $uno8_14 = $uno8_14q[0]; }else { $uno8_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno8_15q = mysqli_fetch_row($sql8_15);

if (!$uno8_15q[0] == '') { $uno8_15 = $uno8_15q[0]; }else { $uno8_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno8_16q = mysqli_fetch_row($sql8_16);

if (!$uno8_16q[0] == '') { $uno8_16 = $uno8_16q[0]; }else { $uno8_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno8_17q = mysqli_fetch_row($sql8_17);

if (!$uno8_17q[0] == '') { $uno8_17 = $uno8_17q[0]; }else { $uno8_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno8_18q = mysqli_fetch_row($sql8_18);

if (!$uno8_18q[0] == '') { $uno8_18 = $uno8_18q[0]; }else { $uno8_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno8_19q = mysqli_fetch_row($sql8_19);

if (!$uno8_19q[0] == '') { $uno8_19 = $uno8_19q[0]; }else { $uno8_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno8_20q = mysqli_fetch_row($sql8_20);

if (!$uno8_20q[0] == '') { $uno8_20 = $uno8_20q[0]; }else { $uno8_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno8_21q = mysqli_fetch_row($sql8_21);

if (!$uno8_21q[0] == '') { $uno8_21 = $uno8_21q[0]; }else { $uno8_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno8_22q = mysqli_fetch_row($sql8_22);

if (!$uno8_22q[0] == '') { $uno8_22 = $uno8_22q[0]; }else { $uno8_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno8_23q = mysqli_fetch_row($sql8_23);

if (!$uno8_23q[0] == '') { $uno8_23 = $uno8_23q[0]; }else { $uno8_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno8_24q = mysqli_fetch_row($sql8_24);

if (!$uno8_24q[0] == '') { $uno8_24 = $uno8_24q[0]; }else { $uno8_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno8_25q = mysqli_fetch_row($sql8_25);

if (!$uno8_25q[0] == '') { $uno8_25 = $uno8_25q[0]; }else { $uno8_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno8_26q = mysqli_fetch_row($sql8_26);

if (!$uno8_26q[0] == '') { $uno8_26 = $uno8_26q[0]; }else { $uno8_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno8_27q = mysqli_fetch_row($sql8_27);

if (!$uno8_27q[0] == '') { $uno8_27 = $uno8_27q[0]; }else { $uno8_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno8_28q = mysqli_fetch_row($sql8_28);

if (!$uno8_28q[0] == '') { $uno8_28 = $uno8_28q[0]; }else { $uno8_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno8_29q = mysqli_fetch_row($sql8_29);

if (!$uno8_29q[0] == '') { $uno8_29 = $uno8_29q[0]; }else { $uno8_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno8_30q = mysqli_fetch_row($sql8_30);

if (!$uno8_30q[0] == '') { $uno8_30 = $uno8_30q[0]; }else { $uno8_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql8_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS NEONATOS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno8_31q = mysqli_fetch_row($sql8_31);

if (!$uno8_31q[0] == '') { $uno8_31 = $uno8_31q[0]; }else { $uno8_31 = 0; }

$suma8 = $uno8_1 + $uno8_2 + $uno8_3 + $uno8_4 + $uno8_5 + $uno8_6 + $uno8_7 + $uno8_8 + $uno8_9 + $uno8_10 + $uno8_11 + $uno8_12 + $uno8_13 + $uno8_14 + $uno8_15 + $uno8_16 + $uno8_17 + $uno8_18 + $uno8_19 + $uno8_20 + $uno8_21 + $uno8_22 + $uno8_23 + $uno8_24 + $uno8_25 + $uno8_26 + $uno8_27 + $uno8_28 + $uno8_29 + $uno8_30 + $uno8_31;

$ocho = $uno8_1.';-}'.$uno8_2.';-}'.$uno8_3.';-}'.$uno8_4.';-}'.$uno8_5.';-}'.$uno8_6.';-}'.$uno8_7.';-}'.$uno8_8.';-}'.$uno8_9.';-}'.$uno8_10.';-}'.$uno8_11.';-}'.$uno8_12.';-}'.$uno8_13.';-}'.$uno8_14.';-}'.$uno8_15.';-}'.$uno8_16.';-}'.$uno8_17.';-}'.$uno8_18.';-}'.$uno8_19.';-}'.$uno8_20.';-}'.$uno8_21.';-}'.$uno8_22.';-}'.$uno8_23.';-}'.$uno8_24.';-}'.$uno8_25.';-}'.$uno8_26.';-}'.$uno8_27.';-}'.$uno8_28.';-}'.$uno8_29.';-}'.$uno8_30.';-}'.$uno8_31.';-}'.$suma8;

mysqli_select_db($horizonte, $database_horizonte);
$sql9_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno9_1q = mysqli_fetch_row($sql9_1);

if (!$uno9_1q[0] == '') { $uno9_1 = $uno9_1q[0]; }else { $uno9_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno9_2q = mysqli_fetch_row($sql9_2);

if (!$uno9_2q[0] == '') { $uno9_2 = $uno9_2q[0]; }else { $uno9_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno9_3q = mysqli_fetch_row($sql9_3);

if (!$uno9_3q[0] == '') { $uno9_3 = $uno9_3q[0]; }else { $uno9_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno9_4q = mysqli_fetch_row($sql9_4);

if (!$uno9_4q[0] == '') { $uno9_4 = $uno9_4q[0]; }else { $uno9_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno9_5q = mysqli_fetch_row($sql9_5);

if (!$uno9_5q[0] == '') { $uno9_5 = $uno9_5q[0]; }else { $uno9_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno9_6q = mysqli_fetch_row($sql9_6);

if (!$uno9_6q[0] == '') { $uno9_6 = $uno9_6q[0]; }else { $uno9_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno9_7q = mysqli_fetch_row($sql9_7);

if (!$uno9_7q[0] == '') { $uno9_7 = $uno9_7q[0]; }else { $uno9_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno9_8q = mysqli_fetch_row($sql9_8);

if (!$uno9_8q[0] == '') { $uno9_8 = $uno9_8q[0]; }else { $uno9_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno9_9q = mysqli_fetch_row($sql9_9);

if (!$uno9_9q[0] == '') { $uno9_9 = $uno9_9q[0]; }else { $uno9_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno9_10q = mysqli_fetch_row($sql9_10);

if (!$uno9_10q[0] == '') { $uno9_10 = $uno9_10q[0]; }else { $uno9_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno9_11q = mysqli_fetch_row($sql9_11);

if (!$uno9_11q[0] == '') { $uno9_11 = $uno9_11q[0]; }else { $uno9_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno9_12q = mysqli_fetch_row($sql9_12);

if (!$uno9_12q[0] == '') { $uno9_12 = $uno9_12q[0]; }else { $uno9_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno9_13q = mysqli_fetch_row($sql9_13);

if (!$uno9_13q[0] == '') { $uno9_13 = $uno9_13q[0]; }else { $uno9_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno9_14q = mysqli_fetch_row($sql9_14);

if (!$uno9_14q[0] == '') { $uno9_14 = $uno9_14q[0]; }else { $uno9_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno9_15q = mysqli_fetch_row($sql9_15);

if (!$uno9_15q[0] == '') { $uno9_15 = $uno9_15q[0]; }else { $uno9_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno9_16q = mysqli_fetch_row($sql9_16);

if (!$uno9_16q[0] == '') { $uno9_16 = $uno9_16q[0]; }else { $uno9_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno9_17q = mysqli_fetch_row($sql9_17);

if (!$uno9_17q[0] == '') { $uno9_17 = $uno9_17q[0]; }else { $uno9_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno9_18q = mysqli_fetch_row($sql9_18);

if (!$uno9_18q[0] == '') { $uno9_18 = $uno9_18q[0]; }else { $uno9_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno9_19q = mysqli_fetch_row($sql9_19);

if (!$uno9_19q[0] == '') { $uno9_19 = $uno9_19q[0]; }else { $uno9_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno9_20q = mysqli_fetch_row($sql9_20);

if (!$uno9_20q[0] == '') { $uno9_20 = $uno9_20q[0]; }else { $uno9_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno9_21q = mysqli_fetch_row($sql9_21);

if (!$uno9_21q[0] == '') { $uno9_21 = $uno9_21q[0]; }else { $uno9_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno9_22q = mysqli_fetch_row($sql9_22);

if (!$uno9_22q[0] == '') { $uno9_22 = $uno9_22q[0]; }else { $uno9_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno9_23q = mysqli_fetch_row($sql9_23);

if (!$uno9_23q[0] == '') { $uno9_23 = $uno9_23q[0]; }else { $uno9_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno9_24q = mysqli_fetch_row($sql9_24);

if (!$uno9_24q[0] == '') { $uno9_24 = $uno9_24q[0]; }else { $uno9_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno9_25q = mysqli_fetch_row($sql9_25);

if (!$uno9_25q[0] == '') { $uno9_25 = $uno9_25q[0]; }else { $uno9_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno9_26q = mysqli_fetch_row($sql9_26);

if (!$uno9_26q[0] == '') { $uno9_26 = $uno9_26q[0]; }else { $uno9_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno9_27q = mysqli_fetch_row($sql9_27);

if (!$uno9_27q[0] == '') { $uno9_27 = $uno9_27q[0]; }else { $uno9_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno9_28q = mysqli_fetch_row($sql9_28);

if (!$uno9_28q[0] == '') { $uno9_28 = $uno9_28q[0]; }else { $uno9_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno9_29q = mysqli_fetch_row($sql9_29);

if (!$uno9_29q[0] == '') { $uno9_29 = $uno9_29q[0]; }else { $uno9_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno9_30q = mysqli_fetch_row($sql9_30);

if (!$uno9_30q[0] == '') { $uno9_30 = $uno9_30q[0]; }else { $uno9_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql9_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS G-O' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno9_31q = mysqli_fetch_row($sql9_31);

if (!$uno9_31q[0] == '') { $uno9_31 = $uno9_31q[0]; }else { $uno9_31 = 0; }

$suma9 = $uno9_1 + $uno9_2 + $uno9_3 + $uno9_4 + $uno9_5 + $uno9_6 + $uno9_7 + $uno9_8 + $uno9_9 + $uno9_10 + $uno9_11 + $uno9_12 + $uno9_13 + $uno9_14 + $uno9_15 + $uno9_16 + $uno9_17 + $uno9_18 + $uno9_19 + $uno9_20 + $uno9_21 + $uno9_22 + $uno9_23 + $uno9_24 + $uno9_25 + $uno9_26 + $uno9_27 + $uno9_28 + $uno9_29 + $uno9_30 + $uno9_31;

$nueve = $uno9_1.';-}'.$uno9_2.';-}'.$uno9_3.';-}'.$uno9_4.';-}'.$uno9_5.';-}'.$uno9_6.';-}'.$uno9_7.';-}'.$uno9_8.';-}'.$uno9_9.';-}'.$uno9_10.';-}'.$uno9_11.';-}'.$uno9_12.';-}'.$uno9_13.';-}'.$uno9_14.';-}'.$uno9_15.';-}'.$uno9_16.';-}'.$uno9_17.';-}'.$uno9_18.';-}'.$uno9_19.';-}'.$uno9_20.';-}'.$uno9_21.';-}'.$uno9_22.';-}'.$uno9_23.';-}'.$uno9_24.';-}'.$uno9_25.';-}'.$uno9_26.';-}'.$uno9_27.';-}'.$uno9_28.';-}'.$uno9_29.';-}'.$uno9_30.';-}'.$uno9_31.';-}'.$suma9;

mysqli_select_db($horizonte, $database_horizonte);
$sql10_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno10_1q = mysqli_fetch_row($sql10_1);

if (!$uno10_1q[0] == '') { $uno10_1 = $uno10_1q[0]; }else { $uno10_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno10_2q = mysqli_fetch_row($sql10_2);

if (!$uno10_2q[0] == '') { $uno10_2 = $uno10_2q[0]; }else { $uno10_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno10_3q = mysqli_fetch_row($sql10_3);

if (!$uno10_3q[0] == '') { $uno10_3 = $uno10_3q[0]; }else { $uno10_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno10_4q = mysqli_fetch_row($sql10_4);

if (!$uno10_4q[0] == '') { $uno10_4 = $uno10_4q[0]; }else { $uno10_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno10_5q = mysqli_fetch_row($sql10_5);

if (!$uno10_5q[0] == '') { $uno10_5 = $uno10_5q[0]; }else { $uno10_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno10_6q = mysqli_fetch_row($sql10_6);

if (!$uno10_6q[0] == '') { $uno10_6 = $uno10_6q[0]; }else { $uno10_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno10_7q = mysqli_fetch_row($sql10_7);

if (!$uno10_7q[0] == '') { $uno10_7 = $uno10_7q[0]; }else { $uno10_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno10_8q = mysqli_fetch_row($sql10_8);

if (!$uno10_8q[0] == '') { $uno10_8 = $uno10_8q[0]; }else { $uno10_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno10_9q = mysqli_fetch_row($sql10_9);

if (!$uno10_9q[0] == '') { $uno10_9 = $uno10_9q[0]; }else { $uno10_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno10_10q = mysqli_fetch_row($sql10_10);

if (!$uno10_10q[0] == '') { $uno10_10 = $uno10_10q[0]; }else { $uno10_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno10_11q = mysqli_fetch_row($sql10_11);

if (!$uno10_11q[0] == '') { $uno10_11 = $uno10_11q[0]; }else { $uno10_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno10_12q = mysqli_fetch_row($sql10_12);

if (!$uno10_12q[0] == '') { $uno10_12 = $uno10_12q[0]; }else { $uno10_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno10_13q = mysqli_fetch_row($sql10_13);

if (!$uno10_13q[0] == '') { $uno10_13 = $uno10_13q[0]; }else { $uno10_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno10_14q = mysqli_fetch_row($sql10_14);

if (!$uno10_14q[0] == '') { $uno10_14 = $uno10_14q[0]; }else { $uno10_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno10_15q = mysqli_fetch_row($sql10_15);

if (!$uno10_15q[0] == '') { $uno10_15 = $uno10_15q[0]; }else { $uno10_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno10_16q = mysqli_fetch_row($sql10_16);

if (!$uno10_16q[0] == '') { $uno10_16 = $uno10_16q[0]; }else { $uno10_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno10_17q = mysqli_fetch_row($sql10_17);

if (!$uno10_17q[0] == '') { $uno10_17 = $uno10_17q[0]; }else { $uno10_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno10_18q = mysqli_fetch_row($sql10_18);

if (!$uno10_18q[0] == '') { $uno10_18 = $uno10_18q[0]; }else { $uno10_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno10_19q = mysqli_fetch_row($sql10_19);

if (!$uno10_19q[0] == '') { $uno10_19 = $uno10_19q[0]; }else { $uno10_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno10_20q = mysqli_fetch_row($sql10_20);

if (!$uno10_20q[0] == '') { $uno10_20 = $uno10_20q[0]; }else { $uno10_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno10_21q = mysqli_fetch_row($sql10_21);

if (!$uno10_21q[0] == '') { $uno10_21 = $uno10_21q[0]; }else { $uno10_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno10_22q = mysqli_fetch_row($sql10_22);

if (!$uno10_22q[0] == '') { $uno10_22 = $uno10_22q[0]; }else { $uno10_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno10_23q = mysqli_fetch_row($sql10_23);

if (!$uno10_23q[0] == '') { $uno10_23 = $uno10_23q[0]; }else { $uno10_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno10_24q = mysqli_fetch_row($sql10_24);

if (!$uno10_24q[0] == '') { $uno10_24 = $uno10_24q[0]; }else { $uno10_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno10_25q = mysqli_fetch_row($sql10_25);

if (!$uno10_25q[0] == '') { $uno10_25 = $uno10_25q[0]; }else { $uno10_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno10_26q = mysqli_fetch_row($sql10_26);

if (!$uno10_26q[0] == '') { $uno10_26 = $uno10_26q[0]; }else { $uno10_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno10_27q = mysqli_fetch_row($sql10_27);

if (!$uno10_27q[0] == '') { $uno10_27 = $uno10_27q[0]; }else { $uno10_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno10_28q = mysqli_fetch_row($sql10_28);

if (!$uno10_28q[0] == '') { $uno10_28 = $uno10_28q[0]; }else { $uno10_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno10_29q = mysqli_fetch_row($sql10_29);

if (!$uno10_29q[0] == '') { $uno10_29 = $uno10_29q[0]; }else { $uno10_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno10_30q = mysqli_fetch_row($sql10_30);

if (!$uno10_30q[0] == '') { $uno10_30 = $uno10_30q[0]; }else { $uno10_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql10_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS M-I' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno10_31q = mysqli_fetch_row($sql10_31);

if (!$uno10_31q[0] == '') { $uno10_31 = $uno10_31q[0]; }else { $uno10_31 = 0; }

$suma10 = $uno10_1 + $uno10_2 + $uno10_3 + $uno10_4 + $uno10_5 + $uno10_6 + $uno10_7 + $uno10_8 + $uno10_9 + $uno10_10 + $uno10_11 + $uno10_12 + $uno10_13 + $uno10_14 + $uno10_15 + $uno10_16 + $uno10_17 + $uno10_18 + $uno10_19 + $uno10_20 + $uno10_21 + $uno10_22 + $uno10_23 + $uno10_24 + $uno10_25 + $uno10_26 + $uno10_27 + $uno10_28 + $uno10_29 + $uno10_30 + $uno10_31;

$diez = $uno10_1.';-}'.$uno10_2.';-}'.$uno10_3.';-}'.$uno10_4.';-}'.$uno10_5.';-}'.$uno10_6.';-}'.$uno10_7.';-}'.$uno10_8.';-}'.$uno10_9.';-}'.$uno10_10.';-}'.$uno10_11.';-}'.$uno10_12.';-}'.$uno10_13.';-}'.$uno10_14.';-}'.$uno10_15.';-}'.$uno10_16.';-}'.$uno10_17.';-}'.$uno10_18.';-}'.$uno10_19.';-}'.$uno10_20.';-}'.$uno10_21.';-}'.$uno10_22.';-}'.$uno10_23.';-}'.$uno10_24.';-}'.$uno10_25.';-}'.$uno10_26.';-}'.$uno10_27.';-}'.$uno10_28.';-}'.$uno10_29.';-}'.$uno10_30.';-}'.$uno10_31.';-}'.$suma10;

mysqli_select_db($horizonte, $database_horizonte);
$sql11_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno11_1q = mysqli_fetch_row($sql11_1);

if (!$uno11_1q[0] == '') { $uno11_1 = $uno11_1q[0]; }else { $uno11_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno11_2q = mysqli_fetch_row($sql11_2);

if (!$uno11_2q[0] == '') { $uno11_2 = $uno11_2q[0]; }else { $uno11_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno11_3q = mysqli_fetch_row($sql11_3);

if (!$uno11_3q[0] == '') { $uno11_3 = $uno11_3q[0]; }else { $uno11_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno11_4q = mysqli_fetch_row($sql11_4);

if (!$uno11_4q[0] == '') { $uno11_4 = $uno11_4q[0]; }else { $uno11_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno11_5q = mysqli_fetch_row($sql11_5);

if (!$uno11_5q[0] == '') { $uno11_5 = $uno11_5q[0]; }else { $uno11_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno11_6q = mysqli_fetch_row($sql11_6);

if (!$uno11_6q[0] == '') { $uno11_6 = $uno11_6q[0]; }else { $uno11_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno11_7q = mysqli_fetch_row($sql11_7);

if (!$uno11_7q[0] == '') { $uno11_7 = $uno11_7q[0]; }else { $uno11_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno11_8q = mysqli_fetch_row($sql11_8);

if (!$uno11_8q[0] == '') { $uno11_8 = $uno11_8q[0]; }else { $uno11_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno11_9q = mysqli_fetch_row($sql11_9);

if (!$uno11_9q[0] == '') { $uno11_9 = $uno11_9q[0]; }else { $uno11_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno11_10q = mysqli_fetch_row($sql11_10);

if (!$uno11_10q[0] == '') { $uno11_10 = $uno11_10q[0]; }else { $uno11_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno11_11q = mysqli_fetch_row($sql11_11);

if (!$uno11_11q[0] == '') { $uno11_11 = $uno11_11q[0]; }else { $uno11_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno11_12q = mysqli_fetch_row($sql11_12);

if (!$uno11_12q[0] == '') { $uno11_12 = $uno11_12q[0]; }else { $uno11_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno11_13q = mysqli_fetch_row($sql11_13);

if (!$uno11_13q[0] == '') { $uno11_13 = $uno11_13q[0]; }else { $uno11_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno11_14q = mysqli_fetch_row($sql11_14);

if (!$uno11_14q[0] == '') { $uno11_14 = $uno11_14q[0]; }else { $uno11_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno11_15q = mysqli_fetch_row($sql11_15);

if (!$uno11_15q[0] == '') { $uno11_15 = $uno11_15q[0]; }else { $uno11_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno11_16q = mysqli_fetch_row($sql11_16);

if (!$uno11_16q[0] == '') { $uno11_16 = $uno11_16q[0]; }else { $uno11_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno11_17q = mysqli_fetch_row($sql11_17);

if (!$uno11_17q[0] == '') { $uno11_17 = $uno11_17q[0]; }else { $uno11_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno11_18q = mysqli_fetch_row($sql11_18);

if (!$uno11_18q[0] == '') { $uno11_18 = $uno11_18q[0]; }else { $uno11_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno11_19q = mysqli_fetch_row($sql11_19);

if (!$uno11_19q[0] == '') { $uno11_19 = $uno11_19q[0]; }else { $uno11_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno11_20q = mysqli_fetch_row($sql11_20);

if (!$uno11_20q[0] == '') { $uno11_20 = $uno11_20q[0]; }else { $uno11_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno11_21q = mysqli_fetch_row($sql11_21);

if (!$uno11_21q[0] == '') { $uno11_21 = $uno11_21q[0]; }else { $uno11_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno11_22q = mysqli_fetch_row($sql11_22);

if (!$uno11_22q[0] == '') { $uno11_22 = $uno11_22q[0]; }else { $uno11_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno11_23q = mysqli_fetch_row($sql11_23);

if (!$uno11_23q[0] == '') { $uno11_23 = $uno11_23q[0]; }else { $uno11_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno11_24q = mysqli_fetch_row($sql11_24);

if (!$uno11_24q[0] == '') { $uno11_24 = $uno11_24q[0]; }else { $uno11_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno11_25q = mysqli_fetch_row($sql11_25);

if (!$uno11_25q[0] == '') { $uno11_25 = $uno11_25q[0]; }else { $uno11_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno11_26q = mysqli_fetch_row($sql11_26);

if (!$uno11_26q[0] == '') { $uno11_26 = $uno11_26q[0]; }else { $uno11_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno11_27q = mysqli_fetch_row($sql11_27);

if (!$uno11_27q[0] == '') { $uno11_27 = $uno11_27q[0]; }else { $uno11_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno11_28q = mysqli_fetch_row($sql11_28);

if (!$uno11_28q[0] == '') { $uno11_28 = $uno11_28q[0]; }else { $uno11_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno11_29q = mysqli_fetch_row($sql11_29);

if (!$uno11_29q[0] == '') { $uno11_29 = $uno11_29q[0]; }else { $uno11_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno11_30q = mysqli_fetch_row($sql11_30);

if (!$uno11_30q[0] == '') { $uno11_30 = $uno11_30q[0]; }else { $uno11_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql11_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZADOS CIRUGÍA' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno11_31q = mysqli_fetch_row($sql11_31);

if (!$uno11_31q[0] == '') { $uno11_31 = $uno11_31q[0]; }else { $uno11_31 = 0; }

$suma11 = $uno11_1 + $uno11_2 + $uno11_3 + $uno11_4 + $uno11_5 + $uno11_6 + $uno11_7 + $uno11_8 + $uno11_9 + $uno11_10 + $uno11_11 + $uno11_12 + $uno11_13 + $uno11_14 + $uno11_15 + $uno11_16 + $uno11_17 + $uno11_18 + $uno11_19 + $uno11_20 + $uno11_21 + $uno11_22 + $uno11_23 + $uno11_24 + $uno11_25 + $uno11_26 + $uno11_27 + $uno11_28 + $uno11_29 + $uno11_30 + $uno11_31;

$once = $uno11_1.';-}'.$uno11_2.';-}'.$uno11_3.';-}'.$uno11_4.';-}'.$uno11_5.';-}'.$uno11_6.';-}'.$uno11_7.';-}'.$uno11_8.';-}'.$uno11_9.';-}'.$uno11_10.';-}'.$uno11_11.';-}'.$uno11_12.';-}'.$uno11_13.';-}'.$uno11_14.';-}'.$uno11_15.';-}'.$uno11_16.';-}'.$uno11_17.';-}'.$uno11_18.';-}'.$uno11_19.';-}'.$uno11_20.';-}'.$uno11_21.';-}'.$uno11_22.';-}'.$uno11_23.';-}'.$uno11_24.';-}'.$uno11_25.';-}'.$uno11_26.';-}'.$uno11_27.';-}'.$uno11_28.';-}'.$uno11_29.';-}'.$uno11_30.';-}'.$uno11_31.';-}'.$suma11;

mysqli_select_db($horizonte, $database_horizonte);
$sql12_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno12_1q = mysqli_fetch_row($sql12_1);

if (!$uno12_1q[0] == '') { $uno12_1 = $uno12_1q[0]; }else { $uno12_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno12_2q = mysqli_fetch_row($sql12_2);

if (!$uno12_2q[0] == '') { $uno12_2 = $uno12_2q[0]; }else { $uno12_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno12_3q = mysqli_fetch_row($sql12_3);

if (!$uno12_3q[0] == '') { $uno12_3 = $uno12_3q[0]; }else { $uno12_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno12_4q = mysqli_fetch_row($sql12_4);

if (!$uno12_4q[0] == '') { $uno12_4 = $uno12_4q[0]; }else { $uno12_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno12_5q = mysqli_fetch_row($sql12_5);

if (!$uno12_5q[0] == '') { $uno12_5 = $uno12_5q[0]; }else { $uno12_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno12_6q = mysqli_fetch_row($sql12_6);

if (!$uno12_6q[0] == '') { $uno12_6 = $uno12_6q[0]; }else { $uno12_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno12_7q = mysqli_fetch_row($sql12_7);

if (!$uno12_7q[0] == '') { $uno12_7 = $uno12_7q[0]; }else { $uno12_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno12_8q = mysqli_fetch_row($sql12_8);

if (!$uno12_8q[0] == '') { $uno12_8 = $uno12_8q[0]; }else { $uno12_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno12_9q = mysqli_fetch_row($sql12_9);

if (!$uno12_9q[0] == '') { $uno12_9 = $uno12_9q[0]; }else { $uno12_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno12_10q = mysqli_fetch_row($sql12_10);

if (!$uno12_10q[0] == '') { $uno12_10 = $uno12_10q[0]; }else { $uno12_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno12_11q = mysqli_fetch_row($sql12_11);

if (!$uno12_11q[0] == '') { $uno12_11 = $uno12_11q[0]; }else { $uno12_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno12_12q = mysqli_fetch_row($sql12_12);

if (!$uno12_12q[0] == '') { $uno12_12 = $uno12_12q[0]; }else { $uno12_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno12_13q = mysqli_fetch_row($sql12_13);

if (!$uno12_13q[0] == '') { $uno12_13 = $uno12_13q[0]; }else { $uno12_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno12_14q = mysqli_fetch_row($sql12_14);

if (!$uno12_14q[0] == '') { $uno12_14 = $uno12_14q[0]; }else { $uno12_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno12_15q = mysqli_fetch_row($sql12_15);

if (!$uno12_15q[0] == '') { $uno12_15 = $uno12_15q[0]; }else { $uno12_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno12_16q = mysqli_fetch_row($sql12_16);

if (!$uno12_16q[0] == '') { $uno12_16 = $uno12_16q[0]; }else { $uno12_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno12_17q = mysqli_fetch_row($sql12_17);

if (!$uno12_17q[0] == '') { $uno12_17 = $uno12_17q[0]; }else { $uno12_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno12_18q = mysqli_fetch_row($sql12_18);

if (!$uno12_18q[0] == '') { $uno12_18 = $uno12_18q[0]; }else { $uno12_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno12_19q = mysqli_fetch_row($sql12_19);

if (!$uno12_19q[0] == '') { $uno12_19 = $uno12_19q[0]; }else { $uno12_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno12_20q = mysqli_fetch_row($sql12_20);

if (!$uno12_20q[0] == '') { $uno12_20 = $uno12_20q[0]; }else { $uno12_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno12_21q = mysqli_fetch_row($sql12_21);

if (!$uno12_21q[0] == '') { $uno12_21 = $uno12_21q[0]; }else { $uno12_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno12_22q = mysqli_fetch_row($sql12_22);

if (!$uno12_22q[0] == '') { $uno12_22 = $uno12_22q[0]; }else { $uno12_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno12_23q = mysqli_fetch_row($sql12_23);

if (!$uno12_23q[0] == '') { $uno12_23 = $uno12_23q[0]; }else { $uno12_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno12_24q = mysqli_fetch_row($sql12_24);

if (!$uno12_24q[0] == '') { $uno12_24 = $uno12_24q[0]; }else { $uno12_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno12_25q = mysqli_fetch_row($sql12_25);

if (!$uno12_25q[0] == '') { $uno12_25 = $uno12_25q[0]; }else { $uno12_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno12_26q = mysqli_fetch_row($sql12_26);

if (!$uno12_26q[0] == '') { $uno12_26 = $uno12_26q[0]; }else { $uno12_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno12_27q = mysqli_fetch_row($sql12_27);

if (!$uno12_27q[0] == '') { $uno12_27 = $uno12_27q[0]; }else { $uno12_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno12_28q = mysqli_fetch_row($sql12_28);

if (!$uno12_28q[0] == '') { $uno12_28 = $uno12_28q[0]; }else { $uno12_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno12_29q = mysqli_fetch_row($sql12_29);

if (!$uno12_29q[0] == '') { $uno12_29 = $uno12_29q[0]; }else { $uno12_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno12_30q = mysqli_fetch_row($sql12_30);

if (!$uno12_30q[0] == '') { $uno12_30 = $uno12_30q[0]; }else { $uno12_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql12_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN JUNIOR S' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno12_31q = mysqli_fetch_row($sql12_31);

if (!$uno12_31q[0] == '') { $uno12_31 = $uno12_31q[0]; }else { $uno12_31 = 0; }

$suma12 = $uno12_1 + $uno12_2 + $uno12_3 + $uno12_4 + $uno12_5 + $uno12_6 + $uno12_7 + $uno12_8 + $uno12_9 + $uno12_10 + $uno12_11 + $uno12_12 + $uno12_13 + $uno12_14 + $uno12_15 + $uno12_16 + $uno12_17 + $uno12_18 + $uno12_19 + $uno12_20 + $uno12_21 + $uno12_22 + $uno12_23 + $uno12_24 + $uno12_25 + $uno12_26 + $uno12_27 + $uno12_28 + $uno12_29 + $uno12_30 + $uno12_31;

$doce = $uno12_1.';-}'.$uno12_2.';-}'.$uno12_3.';-}'.$uno12_4.';-}'.$uno12_5.';-}'.$uno12_6.';-}'.$uno12_7.';-}'.$uno12_8.';-}'.$uno12_9.';-}'.$uno12_10.';-}'.$uno12_11.';-}'.$uno12_12.';-}'.$uno12_13.';-}'.$uno12_14.';-}'.$uno12_15.';-}'.$uno12_16.';-}'.$uno12_17.';-}'.$uno12_18.';-}'.$uno12_19.';-}'.$uno12_20.';-}'.$uno12_21.';-}'.$uno12_22.';-}'.$uno12_23.';-}'.$uno12_24.';-}'.$uno12_25.';-}'.$uno12_26.';-}'.$uno12_27.';-}'.$uno12_28.';-}'.$uno12_29.';-}'.$uno12_30.';-}'.$uno12_31.';-}'.$suma12;

mysqli_select_db($horizonte, $database_horizonte);
$sql13_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno13_1q = mysqli_fetch_row($sql13_1);

if (!$uno13_1q[0] == '') { $uno13_1 = $uno13_1q[0]; }else { $uno13_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno13_2q = mysqli_fetch_row($sql13_2);

if (!$uno13_2q[0] == '') { $uno13_2 = $uno13_2q[0]; }else { $uno13_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno13_3q = mysqli_fetch_row($sql13_3);

if (!$uno13_3q[0] == '') { $uno13_3 = $uno13_3q[0]; }else { $uno13_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno13_4q = mysqli_fetch_row($sql13_4);

if (!$uno13_4q[0] == '') { $uno13_4 = $uno13_4q[0]; }else { $uno13_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno13_5q = mysqli_fetch_row($sql13_5);

if (!$uno13_5q[0] == '') { $uno13_5 = $uno13_5q[0]; }else { $uno13_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno13_6q = mysqli_fetch_row($sql13_6);

if (!$uno13_6q[0] == '') { $uno13_6 = $uno13_6q[0]; }else { $uno13_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno13_7q = mysqli_fetch_row($sql13_7);

if (!$uno13_7q[0] == '') { $uno13_7 = $uno13_7q[0]; }else { $uno13_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno13_8q = mysqli_fetch_row($sql13_8);

if (!$uno13_8q[0] == '') { $uno13_8 = $uno13_8q[0]; }else { $uno13_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno13_9q = mysqli_fetch_row($sql13_9);

if (!$uno13_9q[0] == '') { $uno13_9 = $uno13_9q[0]; }else { $uno13_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno13_10q = mysqli_fetch_row($sql13_10);

if (!$uno13_10q[0] == '') { $uno13_10 = $uno13_10q[0]; }else { $uno13_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno13_11q = mysqli_fetch_row($sql13_11);

if (!$uno13_11q[0] == '') { $uno13_11 = $uno13_11q[0]; }else { $uno13_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno13_12q = mysqli_fetch_row($sql13_12);

if (!$uno13_12q[0] == '') { $uno13_12 = $uno13_12q[0]; }else { $uno13_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno13_13q = mysqli_fetch_row($sql13_13);

if (!$uno13_13q[0] == '') { $uno13_13 = $uno13_13q[0]; }else { $uno13_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno13_14q = mysqli_fetch_row($sql13_14);

if (!$uno13_14q[0] == '') { $uno13_14 = $uno13_14q[0]; }else { $uno13_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno13_15q = mysqli_fetch_row($sql13_15);

if (!$uno13_15q[0] == '') { $uno13_15 = $uno13_15q[0]; }else { $uno13_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno13_16q = mysqli_fetch_row($sql13_16);

if (!$uno13_16q[0] == '') { $uno13_16 = $uno13_16q[0]; }else { $uno13_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno13_17q = mysqli_fetch_row($sql13_17);

if (!$uno13_17q[0] == '') { $uno13_17 = $uno13_17q[0]; }else { $uno13_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno13_18q = mysqli_fetch_row($sql13_18);

if (!$uno13_18q[0] == '') { $uno13_18 = $uno13_18q[0]; }else { $uno13_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno13_19q = mysqli_fetch_row($sql13_19);

if (!$uno13_19q[0] == '') { $uno13_19 = $uno13_19q[0]; }else { $uno13_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno13_20q = mysqli_fetch_row($sql13_20);

if (!$uno13_20q[0] == '') { $uno13_20 = $uno13_20q[0]; }else { $uno13_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno13_21q = mysqli_fetch_row($sql13_21);

if (!$uno13_21q[0] == '') { $uno13_21 = $uno13_21q[0]; }else { $uno13_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno13_22q = mysqli_fetch_row($sql13_22);

if (!$uno13_22q[0] == '') { $uno13_22 = $uno13_22q[0]; }else { $uno13_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno13_23q = mysqli_fetch_row($sql13_23);

if (!$uno13_23q[0] == '') { $uno13_23 = $uno13_23q[0]; }else { $uno13_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno13_24q = mysqli_fetch_row($sql13_24);

if (!$uno13_24q[0] == '') { $uno13_24 = $uno13_24q[0]; }else { $uno13_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno13_25q = mysqli_fetch_row($sql13_25);

if (!$uno13_25q[0] == '') { $uno13_25 = $uno13_25q[0]; }else { $uno13_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno13_26q = mysqli_fetch_row($sql13_26);

if (!$uno13_26q[0] == '') { $uno13_26 = $uno13_26q[0]; }else { $uno13_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno13_27q = mysqli_fetch_row($sql13_27);

if (!$uno13_27q[0] == '') { $uno13_27 = $uno13_27q[0]; }else { $uno13_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno13_28q = mysqli_fetch_row($sql13_28);

if (!$uno13_28q[0] == '') { $uno13_28 = $uno13_28q[0]; }else { $uno13_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno13_29q = mysqli_fetch_row($sql13_29);

if (!$uno13_29q[0] == '') { $uno13_29 = $uno13_29q[0]; }else { $uno13_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno13_30q = mysqli_fetch_row($sql13_30);

if (!$uno13_30q[0] == '') { $uno13_30 = $uno13_30q[0]; }else { $uno13_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql13_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'HOSPITALIZACIÓN MASTER S' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno13_31q = mysqli_fetch_row($sql13_31);

if (!$uno13_31q[0] == '') { $uno13_31 = $uno13_31q[0]; }else { $uno13_31 = 0; }

$suma13 = $uno13_1 + $uno13_2 + $uno13_3 + $uno13_4 + $uno13_5 + $uno13_6 + $uno13_7 + $uno13_8 + $uno13_9 + $uno13_10 + $uno13_11 + $uno13_12 + $uno13_13 + $uno13_14 + $uno13_15 + $uno13_16 + $uno13_17 + $uno13_18 + $uno13_19 + $uno13_20 + $uno13_21 + $uno13_22 + $uno13_23 + $uno13_24 + $uno13_25 + $uno13_26 + $uno13_27 + $uno13_28 + $uno13_29 + $uno13_30 + $uno13_31;

$trece = $uno13_1.';-}'.$uno13_2.';-}'.$uno13_3.';-}'.$uno13_4.';-}'.$uno13_5.';-}'.$uno13_6.';-}'.$uno13_7.';-}'.$uno13_8.';-}'.$uno13_9.';-}'.$uno13_10.';-}'.$uno13_11.';-}'.$uno13_12.';-}'.$uno13_13.';-}'.$uno13_14.';-}'.$uno13_15.';-}'.$uno13_16.';-}'.$uno13_17.';-}'.$uno13_18.';-}'.$uno13_19.';-}'.$uno13_20.';-}'.$uno13_21.';-}'.$uno13_22.';-}'.$uno13_23.';-}'.$uno13_24.';-}'.$uno13_25.';-}'.$uno13_26.';-}'.$uno13_27.';-}'.$uno13_28.';-}'.$uno13_29.';-}'.$uno13_30.';-}'.$uno13_31.';-}'.$suma13;

mysqli_select_db($horizonte, $database_horizonte);
$sql14_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno14_1q = mysqli_fetch_row($sql14_1);

if (!$uno14_1q[0] == '') { $uno14_1 = $uno14_1q[0]; }else { $uno14_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno14_2q = mysqli_fetch_row($sql14_2);

if (!$uno14_2q[0] == '') { $uno14_2 = $uno14_2q[0]; }else { $uno14_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno14_3q = mysqli_fetch_row($sql14_3);

if (!$uno14_3q[0] == '') { $uno14_3 = $uno14_3q[0]; }else { $uno14_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno14_4q = mysqli_fetch_row($sql14_4);

if (!$uno14_4q[0] == '') { $uno14_4 = $uno14_4q[0]; }else { $uno14_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno14_5q = mysqli_fetch_row($sql14_5);

if (!$uno14_5q[0] == '') { $uno14_5 = $uno14_5q[0]; }else { $uno14_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno14_6q = mysqli_fetch_row($sql14_6);

if (!$uno14_6q[0] == '') { $uno14_6 = $uno14_6q[0]; }else { $uno14_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno14_7q = mysqli_fetch_row($sql14_7);

if (!$uno14_7q[0] == '') { $uno14_7 = $uno14_7q[0]; }else { $uno14_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno14_8q = mysqli_fetch_row($sql14_8);

if (!$uno14_8q[0] == '') { $uno14_8 = $uno14_8q[0]; }else { $uno14_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno14_9q = mysqli_fetch_row($sql14_9);

if (!$uno14_9q[0] == '') { $uno14_9 = $uno14_9q[0]; }else { $uno14_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno14_10q = mysqli_fetch_row($sql14_10);

if (!$uno14_10q[0] == '') { $uno14_10 = $uno14_10q[0]; }else { $uno14_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno14_11q = mysqli_fetch_row($sql14_11);

if (!$uno14_11q[0] == '') { $uno14_11 = $uno14_11q[0]; }else { $uno14_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno14_12q = mysqli_fetch_row($sql14_12);

if (!$uno14_12q[0] == '') { $uno14_12 = $uno14_12q[0]; }else { $uno14_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno14_13q = mysqli_fetch_row($sql14_13);

if (!$uno14_13q[0] == '') { $uno14_13 = $uno14_13q[0]; }else { $uno14_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno14_14q = mysqli_fetch_row($sql14_14);

if (!$uno14_14q[0] == '') { $uno14_14 = $uno14_14q[0]; }else { $uno14_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno14_15q = mysqli_fetch_row($sql14_15);

if (!$uno14_15q[0] == '') { $uno14_15 = $uno14_15q[0]; }else { $uno14_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno14_16q = mysqli_fetch_row($sql14_16);

if (!$uno14_16q[0] == '') { $uno14_16 = $uno14_16q[0]; }else { $uno14_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno14_17q = mysqli_fetch_row($sql14_17);

if (!$uno14_17q[0] == '') { $uno14_17 = $uno14_17q[0]; }else { $uno14_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno14_18q = mysqli_fetch_row($sql14_18);

if (!$uno14_18q[0] == '') { $uno14_18 = $uno14_18q[0]; }else { $uno14_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno14_19q = mysqli_fetch_row($sql14_19);

if (!$uno14_19q[0] == '') { $uno14_19 = $uno14_19q[0]; }else { $uno14_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno14_20q = mysqli_fetch_row($sql14_20);

if (!$uno14_20q[0] == '') { $uno14_20 = $uno14_20q[0]; }else { $uno14_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno14_21q = mysqli_fetch_row($sql14_21);

if (!$uno14_21q[0] == '') { $uno14_21 = $uno14_21q[0]; }else { $uno14_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno14_22q = mysqli_fetch_row($sql14_22);

if (!$uno14_22q[0] == '') { $uno14_22 = $uno14_22q[0]; }else { $uno14_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno14_23q = mysqli_fetch_row($sql14_23);

if (!$uno14_23q[0] == '') { $uno14_23 = $uno14_23q[0]; }else { $uno14_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno14_24q = mysqli_fetch_row($sql14_24);

if (!$uno14_24q[0] == '') { $uno14_24 = $uno14_24q[0]; }else { $uno14_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno14_25q = mysqli_fetch_row($sql14_25);

if (!$uno14_25q[0] == '') { $uno14_25 = $uno14_25q[0]; }else { $uno14_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno14_26q = mysqli_fetch_row($sql14_26);

if (!$uno14_26q[0] == '') { $uno14_26 = $uno14_26q[0]; }else { $uno14_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno14_27q = mysqli_fetch_row($sql14_27);

if (!$uno14_27q[0] == '') { $uno14_27 = $uno14_27q[0]; }else { $uno14_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno14_28q = mysqli_fetch_row($sql14_28);

if (!$uno14_28q[0] == '') { $uno14_28 = $uno14_28q[0]; }else { $uno14_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno14_29q = mysqli_fetch_row($sql14_29);

if (!$uno14_29q[0] == '') { $uno14_29 = $uno14_29q[0]; }else { $uno14_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno14_30q = mysqli_fetch_row($sql14_30);

if (!$uno14_30q[0] == '') { $uno14_30 = $uno14_30q[0]; }else { $uno14_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql14_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS DE URGENCIA' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno14_31q = mysqli_fetch_row($sql14_31);

if (!$uno14_31q[0] == '') { $uno14_31 = $uno14_31q[0]; }else { $uno14_31 = 0; }

$suma14 = $uno14_1 + $uno14_2 + $uno14_3 + $uno14_4 + $uno14_5 + $uno14_6 + $uno14_7 + $uno14_8 + $uno14_9 + $uno14_10 + $uno14_11 + $uno14_12 + $uno14_13 + $uno14_14 + $uno14_15 + $uno14_16 + $uno14_17 + $uno14_18 + $uno14_19 + $uno14_20 + $uno14_21 + $uno14_22 + $uno14_23 + $uno14_24 + $uno14_25 + $uno14_26 + $uno14_27 + $uno14_28 + $uno14_29 + $uno14_30 + $uno14_31;

$catorce = $uno14_1.';-}'.$uno14_2.';-}'.$uno14_3.';-}'.$uno14_4.';-}'.$uno14_5.';-}'.$uno14_6.';-}'.$uno14_7.';-}'.$uno14_8.';-}'.$uno14_9.';-}'.$uno14_10.';-}'.$uno14_11.';-}'.$uno14_12.';-}'.$uno14_13.';-}'.$uno14_14.';-}'.$uno14_15.';-}'.$uno14_16.';-}'.$uno14_17.';-}'.$uno14_18.';-}'.$uno14_19.';-}'.$uno14_20.';-}'.$uno14_21.';-}'.$uno14_22.';-}'.$uno14_23.';-}'.$uno14_24.';-}'.$uno14_25.';-}'.$uno14_26.';-}'.$uno14_27.';-}'.$uno14_28.';-}'.$uno14_29.';-}'.$uno14_30.';-}'.$uno14_31.';-}'.$suma14;

mysqli_select_db($horizonte, $database_horizonte);
$sql15_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno15_1q = mysqli_fetch_row($sql15_1);

if (!$uno15_1q[0] == '') { $uno15_1 = $uno15_1q[0]; }else { $uno15_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno15_2q = mysqli_fetch_row($sql15_2);

if (!$uno15_2q[0] == '') { $uno15_2 = $uno15_2q[0]; }else { $uno15_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno15_3q = mysqli_fetch_row($sql15_3);

if (!$uno15_3q[0] == '') { $uno15_3 = $uno15_3q[0]; }else { $uno15_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno15_4q = mysqli_fetch_row($sql15_4);

if (!$uno15_4q[0] == '') { $uno15_4 = $uno15_4q[0]; }else { $uno15_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno15_5q = mysqli_fetch_row($sql15_5);

if (!$uno15_5q[0] == '') { $uno15_5 = $uno15_5q[0]; }else { $uno15_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno15_6q = mysqli_fetch_row($sql15_6);

if (!$uno15_6q[0] == '') { $uno15_6 = $uno15_6q[0]; }else { $uno15_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno15_7q = mysqli_fetch_row($sql15_7);

if (!$uno15_7q[0] == '') { $uno15_7 = $uno15_7q[0]; }else { $uno15_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno15_8q = mysqli_fetch_row($sql15_8);

if (!$uno15_8q[0] == '') { $uno15_8 = $uno15_8q[0]; }else { $uno15_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno15_9q = mysqli_fetch_row($sql15_9);

if (!$uno15_9q[0] == '') { $uno15_9 = $uno15_9q[0]; }else { $uno15_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno15_10q = mysqli_fetch_row($sql15_10);

if (!$uno15_10q[0] == '') { $uno15_10 = $uno15_10q[0]; }else { $uno15_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno15_11q = mysqli_fetch_row($sql15_11);

if (!$uno15_11q[0] == '') { $uno15_11 = $uno15_11q[0]; }else { $uno15_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno15_12q = mysqli_fetch_row($sql15_12);

if (!$uno15_12q[0] == '') { $uno15_12 = $uno15_12q[0]; }else { $uno15_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno15_13q = mysqli_fetch_row($sql15_13);

if (!$uno15_13q[0] == '') { $uno15_13 = $uno15_13q[0]; }else { $uno15_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno15_14q = mysqli_fetch_row($sql15_14);

if (!$uno15_14q[0] == '') { $uno15_14 = $uno15_14q[0]; }else { $uno15_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno15_15q = mysqli_fetch_row($sql15_15);

if (!$uno15_15q[0] == '') { $uno15_15 = $uno15_15q[0]; }else { $uno15_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno15_16q = mysqli_fetch_row($sql15_16);

if (!$uno15_16q[0] == '') { $uno15_16 = $uno15_16q[0]; }else { $uno15_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno15_17q = mysqli_fetch_row($sql15_17);

if (!$uno15_17q[0] == '') { $uno15_17 = $uno15_17q[0]; }else { $uno15_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno15_18q = mysqli_fetch_row($sql15_18);

if (!$uno15_18q[0] == '') { $uno15_18 = $uno15_18q[0]; }else { $uno15_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno15_19q = mysqli_fetch_row($sql15_19);

if (!$uno15_19q[0] == '') { $uno15_19 = $uno15_19q[0]; }else { $uno15_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno15_20q = mysqli_fetch_row($sql15_20);

if (!$uno15_20q[0] == '') { $uno15_20 = $uno15_20q[0]; }else { $uno15_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno15_21q = mysqli_fetch_row($sql15_21);

if (!$uno15_21q[0] == '') { $uno15_21 = $uno15_21q[0]; }else { $uno15_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno15_22q = mysqli_fetch_row($sql15_22);

if (!$uno15_22q[0] == '') { $uno15_22 = $uno15_22q[0]; }else { $uno15_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno15_23q = mysqli_fetch_row($sql15_23);

if (!$uno15_23q[0] == '') { $uno15_23 = $uno15_23q[0]; }else { $uno15_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno15_24q = mysqli_fetch_row($sql15_24);

if (!$uno15_24q[0] == '') { $uno15_24 = $uno15_24q[0]; }else { $uno15_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno15_25q = mysqli_fetch_row($sql15_25);

if (!$uno15_25q[0] == '') { $uno15_25 = $uno15_25q[0]; }else { $uno15_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno15_26q = mysqli_fetch_row($sql15_26);

if (!$uno15_26q[0] == '') { $uno15_26 = $uno15_26q[0]; }else { $uno15_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno15_27q = mysqli_fetch_row($sql15_27);

if (!$uno15_27q[0] == '') { $uno15_27 = $uno15_27q[0]; }else { $uno15_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno15_28q = mysqli_fetch_row($sql15_28);

if (!$uno15_28q[0] == '') { $uno15_28 = $uno15_28q[0]; }else { $uno15_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno15_29q = mysqli_fetch_row($sql15_29);

if (!$uno15_29q[0] == '') { $uno15_29 = $uno15_29q[0]; }else { $uno15_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno15_30q = mysqli_fetch_row($sql15_30);

if (!$uno15_30q[0] == '') { $uno15_30 = $uno15_30q[0]; }else { $uno15_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql15_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CIRUGÍAS PROGRAMADAS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno15_31q = mysqli_fetch_row($sql15_31);

if (!$uno15_31q[0] == '') { $uno15_31 = $uno15_31q[0]; }else { $uno15_31 = 0; }

$suma15 = $uno15_1 + $uno15_2 + $uno15_3 + $uno15_4 + $uno15_5 + $uno15_6 + $uno15_7 + $uno15_8 + $uno15_9 + $uno15_10 + $uno15_11 + $uno15_12 + $uno15_13 + $uno15_14 + $uno15_15 + $uno15_16 + $uno15_17 + $uno15_18 + $uno15_19 + $uno15_20 + $uno15_21 + $uno15_22 + $uno15_23 + $uno15_24 + $uno15_25 + $uno15_26 + $uno15_27 + $uno15_28 + $uno15_29 + $uno15_30 + $uno15_31;

$quince = $uno15_1.';-}'.$uno15_2.';-}'.$uno15_3.';-}'.$uno15_4.';-}'.$uno15_5.';-}'.$uno15_6.';-}'.$uno15_7.';-}'.$uno15_8.';-}'.$uno15_9.';-}'.$uno15_10.';-}'.$uno15_11.';-}'.$uno15_12.';-}'.$uno15_13.';-}'.$uno15_14.';-}'.$uno15_15.';-}'.$uno15_16.';-}'.$uno15_17.';-}'.$uno15_18.';-}'.$uno15_19.';-}'.$uno15_20.';-}'.$uno15_21.';-}'.$uno15_22.';-}'.$uno15_23.';-}'.$uno15_24.';-}'.$uno15_25.';-}'.$uno15_26.';-}'.$uno15_27.';-}'.$uno15_28.';-}'.$uno15_29.';-}'.$uno15_30.';-}'.$uno15_31.';-}'.$suma15;

mysqli_select_db($horizonte, $database_horizonte);
$sql16_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno16_1q = mysqli_fetch_row($sql16_1);

if (!$uno16_1q[0] == '') { $uno16_1 = $uno16_1q[0]; }else { $uno16_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno16_2q = mysqli_fetch_row($sql16_2);

if (!$uno16_2q[0] == '') { $uno16_2 = $uno16_2q[0]; }else { $uno16_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno16_3q = mysqli_fetch_row($sql16_3);

if (!$uno16_3q[0] == '') { $uno16_3 = $uno16_3q[0]; }else { $uno16_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno16_4q = mysqli_fetch_row($sql16_4);

if (!$uno16_4q[0] == '') { $uno16_4 = $uno16_4q[0]; }else { $uno16_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno16_5q = mysqli_fetch_row($sql16_5);

if (!$uno16_5q[0] == '') { $uno16_5 = $uno16_5q[0]; }else { $uno16_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno16_6q = mysqli_fetch_row($sql16_6);

if (!$uno16_6q[0] == '') { $uno16_6 = $uno16_6q[0]; }else { $uno16_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno16_7q = mysqli_fetch_row($sql16_7);

if (!$uno16_7q[0] == '') { $uno16_7 = $uno16_7q[0]; }else { $uno16_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno16_8q = mysqli_fetch_row($sql16_8);

if (!$uno16_8q[0] == '') { $uno16_8 = $uno16_8q[0]; }else { $uno16_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno16_9q = mysqli_fetch_row($sql16_9);

if (!$uno16_9q[0] == '') { $uno16_9 = $uno16_9q[0]; }else { $uno16_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno16_10q = mysqli_fetch_row($sql16_10);

if (!$uno16_10q[0] == '') { $uno16_10 = $uno16_10q[0]; }else { $uno16_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno16_11q = mysqli_fetch_row($sql16_11);

if (!$uno16_11q[0] == '') { $uno16_11 = $uno16_11q[0]; }else { $uno16_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno16_12q = mysqli_fetch_row($sql16_12);

if (!$uno16_12q[0] == '') { $uno16_12 = $uno16_12q[0]; }else { $uno16_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno16_13q = mysqli_fetch_row($sql16_13);

if (!$uno16_13q[0] == '') { $uno16_13 = $uno16_13q[0]; }else { $uno16_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno16_14q = mysqli_fetch_row($sql16_14);

if (!$uno16_14q[0] == '') { $uno16_14 = $uno16_14q[0]; }else { $uno16_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno16_15q = mysqli_fetch_row($sql16_15);

if (!$uno16_15q[0] == '') { $uno16_15 = $uno16_15q[0]; }else { $uno16_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno16_16q = mysqli_fetch_row($sql16_16);

if (!$uno16_16q[0] == '') { $uno16_16 = $uno16_16q[0]; }else { $uno16_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno16_17q = mysqli_fetch_row($sql16_17);

if (!$uno16_17q[0] == '') { $uno16_17 = $uno16_17q[0]; }else { $uno16_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno16_18q = mysqli_fetch_row($sql16_18);

if (!$uno16_18q[0] == '') { $uno16_18 = $uno16_18q[0]; }else { $uno16_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno16_19q = mysqli_fetch_row($sql16_19);

if (!$uno16_19q[0] == '') { $uno16_19 = $uno16_19q[0]; }else { $uno16_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno16_20q = mysqli_fetch_row($sql16_20);

if (!$uno16_20q[0] == '') { $uno16_20 = $uno16_20q[0]; }else { $uno16_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno16_21q = mysqli_fetch_row($sql16_21);

if (!$uno16_21q[0] == '') { $uno16_21 = $uno16_21q[0]; }else { $uno16_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno16_22q = mysqli_fetch_row($sql16_22);

if (!$uno16_22q[0] == '') { $uno16_22 = $uno16_22q[0]; }else { $uno16_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno16_23q = mysqli_fetch_row($sql16_23);

if (!$uno16_23q[0] == '') { $uno16_23 = $uno16_23q[0]; }else { $uno16_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno16_24q = mysqli_fetch_row($sql16_24);

if (!$uno16_24q[0] == '') { $uno16_24 = $uno16_24q[0]; }else { $uno16_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno16_25q = mysqli_fetch_row($sql16_25);

if (!$uno16_25q[0] == '') { $uno16_25 = $uno16_25q[0]; }else { $uno16_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno16_26q = mysqli_fetch_row($sql16_26);

if (!$uno16_26q[0] == '') { $uno16_26 = $uno16_26q[0]; }else { $uno16_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno16_27q = mysqli_fetch_row($sql16_27);

if (!$uno16_27q[0] == '') { $uno16_27 = $uno16_27q[0]; }else { $uno16_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno16_28q = mysqli_fetch_row($sql16_28);

if (!$uno16_28q[0] == '') { $uno16_28 = $uno16_28q[0]; }else { $uno16_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno16_29q = mysqli_fetch_row($sql16_29);

if (!$uno16_29q[0] == '') { $uno16_29 = $uno16_29q[0]; }else { $uno16_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno16_30q = mysqli_fetch_row($sql16_30);

if (!$uno16_30q[0] == '') { $uno16_30 = $uno16_30q[0]; }else { $uno16_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql16_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PACIENTES EN P.B.R.' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno16_31q = mysqli_fetch_row($sql16_31);

if (!$uno16_31q[0] == '') { $uno16_31 = $uno16_31q[0]; }else { $uno16_31 = 0; }

$suma16 = $uno16_1 + $uno16_2 + $uno16_3 + $uno16_4 + $uno16_5 + $uno16_6 + $uno16_7 + $uno16_8 + $uno16_9 + $uno16_10 + $uno16_11 + $uno16_12 + $uno16_13 + $uno16_14 + $uno16_15 + $uno16_16 + $uno16_17 + $uno16_18 + $uno16_19 + $uno16_20 + $uno16_21 + $uno16_22 + $uno16_23 + $uno16_24 + $uno16_25 + $uno16_26 + $uno16_27 + $uno16_28 + $uno16_29 + $uno16_30 + $uno16_31;

$dieciseis = $uno16_1.';-}'.$uno16_2.';-}'.$uno16_3.';-}'.$uno16_4.';-}'.$uno16_5.';-}'.$uno16_6.';-}'.$uno16_7.';-}'.$uno16_8.';-}'.$uno16_9.';-}'.$uno16_10.';-}'.$uno16_11.';-}'.$uno16_12.';-}'.$uno16_13.';-}'.$uno16_14.';-}'.$uno16_15.';-}'.$uno16_16.';-}'.$uno16_17.';-}'.$uno16_18.';-}'.$uno16_19.';-}'.$uno16_20.';-}'.$uno16_21.';-}'.$uno16_22.';-}'.$uno16_23.';-}'.$uno16_24.';-}'.$uno16_25.';-}'.$uno16_26.';-}'.$uno16_27.';-}'.$uno16_28.';-}'.$uno16_29.';-}'.$uno16_30.';-}'.$uno16_31.';-}'.$suma16;

mysqli_select_db($horizonte, $database_horizonte);
$sql17_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno17_1q = mysqli_fetch_row($sql17_1);

if (!$uno17_1q[0] == '') { $uno17_1 = $uno17_1q[0]; }else { $uno17_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno17_2q = mysqli_fetch_row($sql17_2);

if (!$uno17_2q[0] == '') { $uno17_2 = $uno17_2q[0]; }else { $uno17_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno17_3q = mysqli_fetch_row($sql17_3);

if (!$uno17_3q[0] == '') { $uno17_3 = $uno17_3q[0]; }else { $uno17_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno17_4q = mysqli_fetch_row($sql17_4);

if (!$uno17_4q[0] == '') { $uno17_4 = $uno17_4q[0]; }else { $uno17_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno17_5q = mysqli_fetch_row($sql17_5);

if (!$uno17_5q[0] == '') { $uno17_5 = $uno17_5q[0]; }else { $uno17_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno17_6q = mysqli_fetch_row($sql17_6);

if (!$uno17_6q[0] == '') { $uno17_6 = $uno17_6q[0]; }else { $uno17_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno17_7q = mysqli_fetch_row($sql17_7);

if (!$uno17_7q[0] == '') { $uno17_7 = $uno17_7q[0]; }else { $uno17_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno17_8q = mysqli_fetch_row($sql17_8);

if (!$uno17_8q[0] == '') { $uno17_8 = $uno17_8q[0]; }else { $uno17_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno17_9q = mysqli_fetch_row($sql17_9);

if (!$uno17_9q[0] == '') { $uno17_9 = $uno17_9q[0]; }else { $uno17_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno17_10q = mysqli_fetch_row($sql17_10);

if (!$uno17_10q[0] == '') { $uno17_10 = $uno17_10q[0]; }else { $uno17_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno17_11q = mysqli_fetch_row($sql17_11);

if (!$uno17_11q[0] == '') { $uno17_11 = $uno17_11q[0]; }else { $uno17_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno17_12q = mysqli_fetch_row($sql17_12);

if (!$uno17_12q[0] == '') { $uno17_12 = $uno17_12q[0]; }else { $uno17_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno17_13q = mysqli_fetch_row($sql17_13);

if (!$uno17_13q[0] == '') { $uno17_13 = $uno17_13q[0]; }else { $uno17_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno17_14q = mysqli_fetch_row($sql17_14);

if (!$uno17_14q[0] == '') { $uno17_14 = $uno17_14q[0]; }else { $uno17_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno17_15q = mysqli_fetch_row($sql17_15);

if (!$uno17_15q[0] == '') { $uno17_15 = $uno17_15q[0]; }else { $uno17_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno17_16q = mysqli_fetch_row($sql17_16);

if (!$uno17_16q[0] == '') { $uno17_16 = $uno17_16q[0]; }else { $uno17_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno17_17q = mysqli_fetch_row($sql17_17);

if (!$uno17_17q[0] == '') { $uno17_17 = $uno17_17q[0]; }else { $uno17_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno17_18q = mysqli_fetch_row($sql17_18);

if (!$uno17_18q[0] == '') { $uno17_18 = $uno17_18q[0]; }else { $uno17_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno17_19q = mysqli_fetch_row($sql17_19);

if (!$uno17_19q[0] == '') { $uno17_19 = $uno17_19q[0]; }else { $uno17_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno17_20q = mysqli_fetch_row($sql17_20);

if (!$uno17_20q[0] == '') { $uno17_20 = $uno17_20q[0]; }else { $uno17_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno17_21q = mysqli_fetch_row($sql17_21);

if (!$uno17_21q[0] == '') { $uno17_21 = $uno17_21q[0]; }else { $uno17_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno17_22q = mysqli_fetch_row($sql17_22);

if (!$uno17_22q[0] == '') { $uno17_22 = $uno17_22q[0]; }else { $uno17_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno17_23q = mysqli_fetch_row($sql17_23);

if (!$uno17_23q[0] == '') { $uno17_23 = $uno17_23q[0]; }else { $uno17_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno17_24q = mysqli_fetch_row($sql17_24);

if (!$uno17_24q[0] == '') { $uno17_24 = $uno17_24q[0]; }else { $uno17_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno17_25q = mysqli_fetch_row($sql17_25);

if (!$uno17_25q[0] == '') { $uno17_25 = $uno17_25q[0]; }else { $uno17_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno17_26q = mysqli_fetch_row($sql17_26);

if (!$uno17_26q[0] == '') { $uno17_26 = $uno17_26q[0]; }else { $uno17_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno17_27q = mysqli_fetch_row($sql17_27);

if (!$uno17_27q[0] == '') { $uno17_27 = $uno17_27q[0]; }else { $uno17_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno17_28q = mysqli_fetch_row($sql17_28);

if (!$uno17_28q[0] == '') { $uno17_28 = $uno17_28q[0]; }else { $uno17_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno17_29q = mysqli_fetch_row($sql17_29);

if (!$uno17_29q[0] == '') { $uno17_29 = $uno17_29q[0]; }else { $uno17_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno17_30q = mysqli_fetch_row($sql17_30);

if (!$uno17_30q[0] == '') { $uno17_30 = $uno17_30q[0]; }else { $uno17_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql17_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'LEGRADOS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno17_31q = mysqli_fetch_row($sql17_31);

if (!$uno17_31q[0] == '') { $uno17_31 = $uno17_31q[0]; }else { $uno17_31 = 0; }

$suma17 = $uno17_1 + $uno17_2 + $uno17_3 + $uno17_4 + $uno17_5 + $uno17_6 + $uno17_7 + $uno17_8 + $uno17_9 + $uno17_10 + $uno17_11 + $uno17_12 + $uno17_13 + $uno17_14 + $uno17_15 + $uno17_16 + $uno17_17 + $uno17_18 + $uno17_19 + $uno17_20 + $uno17_21 + $uno17_22 + $uno17_23 + $uno17_24 + $uno17_25 + $uno17_26 + $uno17_27 + $uno17_28 + $uno17_29 + $uno17_30 + $uno17_31;

$diecisiete = $uno17_1.';-}'.$uno17_2.';-}'.$uno17_3.';-}'.$uno17_4.';-}'.$uno17_5.';-}'.$uno17_6.';-}'.$uno17_7.';-}'.$uno17_8.';-}'.$uno17_9.';-}'.$uno17_10.';-}'.$uno17_11.';-}'.$uno17_12.';-}'.$uno17_13.';-}'.$uno17_14.';-}'.$uno17_15.';-}'.$uno17_16.';-}'.$uno17_17.';-}'.$uno17_18.';-}'.$uno17_19.';-}'.$uno17_20.';-}'.$uno17_21.';-}'.$uno17_22.';-}'.$uno17_23.';-}'.$uno17_24.';-}'.$uno17_25.';-}'.$uno17_26.';-}'.$uno17_27.';-}'.$uno17_28.';-}'.$uno17_29.';-}'.$uno17_30.';-}'.$uno17_31.';-}'.$suma17;

mysqli_select_db($horizonte, $database_horizonte);
$sql18_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno18_1q = mysqli_fetch_row($sql18_1);

if (!$uno18_1q[0] == '') { $uno18_1 = $uno18_1q[0]; }else { $uno18_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno18_2q = mysqli_fetch_row($sql18_2);

if (!$uno18_2q[0] == '') { $uno18_2 = $uno18_2q[0]; }else { $uno18_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno18_3q = mysqli_fetch_row($sql18_3);

if (!$uno18_3q[0] == '') { $uno18_3 = $uno18_3q[0]; }else { $uno18_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno18_4q = mysqli_fetch_row($sql18_4);

if (!$uno18_4q[0] == '') { $uno18_4 = $uno18_4q[0]; }else { $uno18_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno18_5q = mysqli_fetch_row($sql18_5);

if (!$uno18_5q[0] == '') { $uno18_5 = $uno18_5q[0]; }else { $uno18_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno18_6q = mysqli_fetch_row($sql18_6);

if (!$uno18_6q[0] == '') { $uno18_6 = $uno18_6q[0]; }else { $uno18_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno18_7q = mysqli_fetch_row($sql18_7);

if (!$uno18_7q[0] == '') { $uno18_7 = $uno18_7q[0]; }else { $uno18_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno18_8q = mysqli_fetch_row($sql18_8);

if (!$uno18_8q[0] == '') { $uno18_8 = $uno18_8q[0]; }else { $uno18_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno18_9q = mysqli_fetch_row($sql18_9);

if (!$uno18_9q[0] == '') { $uno18_9 = $uno18_9q[0]; }else { $uno18_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno18_10q = mysqli_fetch_row($sql18_10);

if (!$uno18_10q[0] == '') { $uno18_10 = $uno18_10q[0]; }else { $uno18_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno18_11q = mysqli_fetch_row($sql18_11);

if (!$uno18_11q[0] == '') { $uno18_11 = $uno18_11q[0]; }else { $uno18_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno18_12q = mysqli_fetch_row($sql18_12);

if (!$uno18_12q[0] == '') { $uno18_12 = $uno18_12q[0]; }else { $uno18_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno18_13q = mysqli_fetch_row($sql18_13);

if (!$uno18_13q[0] == '') { $uno18_13 = $uno18_13q[0]; }else { $uno18_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno18_14q = mysqli_fetch_row($sql18_14);

if (!$uno18_14q[0] == '') { $uno18_14 = $uno18_14q[0]; }else { $uno18_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno18_15q = mysqli_fetch_row($sql18_15);

if (!$uno18_15q[0] == '') { $uno18_15 = $uno18_15q[0]; }else { $uno18_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno18_16q = mysqli_fetch_row($sql18_16);

if (!$uno18_16q[0] == '') { $uno18_16 = $uno18_16q[0]; }else { $uno18_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno18_17q = mysqli_fetch_row($sql18_17);

if (!$uno18_17q[0] == '') { $uno18_17 = $uno18_17q[0]; }else { $uno18_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno18_18q = mysqli_fetch_row($sql18_18);

if (!$uno18_18q[0] == '') { $uno18_18 = $uno18_18q[0]; }else { $uno18_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno18_19q = mysqli_fetch_row($sql18_19);

if (!$uno18_19q[0] == '') { $uno18_19 = $uno18_19q[0]; }else { $uno18_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno18_20q = mysqli_fetch_row($sql18_20);

if (!$uno18_20q[0] == '') { $uno18_20 = $uno18_20q[0]; }else { $uno18_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno18_21q = mysqli_fetch_row($sql18_21);

if (!$uno18_21q[0] == '') { $uno18_21 = $uno18_21q[0]; }else { $uno18_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno18_22q = mysqli_fetch_row($sql18_22);

if (!$uno18_22q[0] == '') { $uno18_22 = $uno18_22q[0]; }else { $uno18_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno18_23q = mysqli_fetch_row($sql18_23);

if (!$uno18_23q[0] == '') { $uno18_23 = $uno18_23q[0]; }else { $uno18_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno18_24q = mysqli_fetch_row($sql18_24);

if (!$uno18_24q[0] == '') { $uno18_24 = $uno18_24q[0]; }else { $uno18_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno18_25q = mysqli_fetch_row($sql18_25);

if (!$uno18_25q[0] == '') { $uno18_25 = $uno18_25q[0]; }else { $uno18_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno18_26q = mysqli_fetch_row($sql18_26);

if (!$uno18_26q[0] == '') { $uno18_26 = $uno18_26q[0]; }else { $uno18_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno18_27q = mysqli_fetch_row($sql18_27);

if (!$uno18_27q[0] == '') { $uno18_27 = $uno18_27q[0]; }else { $uno18_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno18_28q = mysqli_fetch_row($sql18_28);

if (!$uno18_28q[0] == '') { $uno18_28 = $uno18_28q[0]; }else { $uno18_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno18_29q = mysqli_fetch_row($sql18_29);

if (!$uno18_29q[0] == '') { $uno18_29 = $uno18_29q[0]; }else { $uno18_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno18_30q = mysqli_fetch_row($sql18_30);

if (!$uno18_30q[0] == '') { $uno18_30 = $uno18_30q[0]; }else { $uno18_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql18_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PARTOS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno18_31q = mysqli_fetch_row($sql18_31);

if (!$uno18_31q[0] == '') { $uno18_31 = $uno18_31q[0]; }else { $uno18_31 = 0; }

$suma18 = $uno18_1 + $uno18_2 + $uno18_3 + $uno18_4 + $uno18_5 + $uno18_6 + $uno18_7 + $uno18_8 + $uno18_9 + $uno18_10 + $uno18_11 + $uno18_12 + $uno18_13 + $uno18_14 + $uno18_15 + $uno18_16 + $uno18_17 + $uno18_18 + $uno18_19 + $uno18_20 + $uno18_21 + $uno18_22 + $uno18_23 + $uno18_24 + $uno18_25 + $uno18_26 + $uno18_27 + $uno18_28 + $uno18_29 + $uno18_30 + $uno18_31;

$dieciocho = $uno18_1.';-}'.$uno18_2.';-}'.$uno18_3.';-}'.$uno18_4.';-}'.$uno18_5.';-}'.$uno18_6.';-}'.$uno18_7.';-}'.$uno18_8.';-}'.$uno18_9.';-}'.$uno18_10.';-}'.$uno18_11.';-}'.$uno18_12.';-}'.$uno18_13.';-}'.$uno18_14.';-}'.$uno18_15.';-}'.$uno18_16.';-}'.$uno18_17.';-}'.$uno18_18.';-}'.$uno18_19.';-}'.$uno18_20.';-}'.$uno18_21.';-}'.$uno18_22.';-}'.$uno18_23.';-}'.$uno18_24.';-}'.$uno18_25.';-}'.$uno18_26.';-}'.$uno18_27.';-}'.$uno18_28.';-}'.$uno18_29.';-}'.$uno18_30.';-}'.$uno18_31.';-}'.$suma18;

mysqli_select_db($horizonte, $database_horizonte);
$sql19_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno19_1q = mysqli_fetch_row($sql19_1);

if (!$uno19_1q[0] == '') { $uno19_1 = $uno19_1q[0]; }else { $uno19_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno19_2q = mysqli_fetch_row($sql19_2);

if (!$uno19_2q[0] == '') { $uno19_2 = $uno19_2q[0]; }else { $uno19_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno19_3q = mysqli_fetch_row($sql19_3);

if (!$uno19_3q[0] == '') { $uno19_3 = $uno19_3q[0]; }else { $uno19_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno19_4q = mysqli_fetch_row($sql19_4);

if (!$uno19_4q[0] == '') { $uno19_4 = $uno19_4q[0]; }else { $uno19_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno19_5q = mysqli_fetch_row($sql19_5);

if (!$uno19_5q[0] == '') { $uno19_5 = $uno19_5q[0]; }else { $uno19_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno19_6q = mysqli_fetch_row($sql19_6);

if (!$uno19_6q[0] == '') { $uno19_6 = $uno19_6q[0]; }else { $uno19_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno19_7q = mysqli_fetch_row($sql19_7);

if (!$uno19_7q[0] == '') { $uno19_7 = $uno19_7q[0]; }else { $uno19_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno19_8q = mysqli_fetch_row($sql19_8);

if (!$uno19_8q[0] == '') { $uno19_8 = $uno19_8q[0]; }else { $uno19_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno19_9q = mysqli_fetch_row($sql19_9);

if (!$uno19_9q[0] == '') { $uno19_9 = $uno19_9q[0]; }else { $uno19_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno19_10q = mysqli_fetch_row($sql19_10);

if (!$uno19_10q[0] == '') { $uno19_10 = $uno19_10q[0]; }else { $uno19_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno18_11q = mysqli_fetch_row($sql19_11);

if (!$uno19_11q[0] == '') { $uno19_11 = $uno19_11q[0]; }else { $uno19_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno19_12q = mysqli_fetch_row($sql19_12);

if (!$uno19_12q[0] == '') { $uno19_12 = $uno19_12q[0]; }else { $uno19_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno19_13q = mysqli_fetch_row($sql19_13);

if (!$uno19_13q[0] == '') { $uno19_13 = $uno19_13q[0]; }else { $uno19_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno19_14q = mysqli_fetch_row($sql19_14);

if (!$uno19_14q[0] == '') { $uno19_14 = $uno19_14q[0]; }else { $uno19_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno19_15q = mysqli_fetch_row($sql19_15);

if (!$uno19_15q[0] == '') { $uno19_15 = $uno19_15q[0]; }else { $uno19_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno19_16q = mysqli_fetch_row($sql19_16);

if (!$uno19_16q[0] == '') { $uno19_16 = $uno19_16q[0]; }else { $uno19_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno19_17q = mysqli_fetch_row($sql19_17);

if (!$uno19_17q[0] == '') { $uno19_17 = $uno19_17q[0]; }else { $uno19_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno19_18q = mysqli_fetch_row($sql19_18);

if (!$uno19_18q[0] == '') { $uno19_18 = $uno19_18q[0]; }else { $uno19_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno19_19q = mysqli_fetch_row($sql19_19);

if (!$uno19_19q[0] == '') { $uno19_19 = $uno19_19q[0]; }else { $uno19_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno19_20q = mysqli_fetch_row($sql19_20);

if (!$uno19_20q[0] == '') { $uno19_20 = $uno19_20q[0]; }else { $uno19_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno19_21q = mysqli_fetch_row($sql19_21);

if (!$uno19_21q[0] == '') { $uno19_21 = $uno19_21q[0]; }else { $uno19_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno19_22q = mysqli_fetch_row($sql19_22);

if (!$uno19_22q[0] == '') { $uno19_22 = $uno19_22q[0]; }else { $uno19_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno19_23q = mysqli_fetch_row($sql19_23);

if (!$uno19_23q[0] == '') { $uno19_23 = $uno19_23q[0]; }else { $uno19_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno19_24q = mysqli_fetch_row($sql19_24);

if (!$uno19_24q[0] == '') { $uno19_24 = $uno19_24q[0]; }else { $uno19_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno19_25q = mysqli_fetch_row($sql19_25);

if (!$uno19_25q[0] == '') { $uno19_25 = $uno19_25q[0]; }else { $uno19_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno19_26q = mysqli_fetch_row($sql19_26);

if (!$uno19_26q[0] == '') { $uno19_26 = $uno19_26q[0]; }else { $uno19_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno19_27q = mysqli_fetch_row($sql19_27);

if (!$uno19_27q[0] == '') { $uno19_27 = $uno19_27q[0]; }else { $uno19_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno19_28q = mysqli_fetch_row($sql19_28);

if (!$uno19_28q[0] == '') { $uno19_28 = $uno19_28q[0]; }else { $uno19_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno19_29q = mysqli_fetch_row($sql19_29);

if (!$uno19_29q[0] == '') { $uno19_29 = $uno19_29q[0]; }else { $uno19_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno19_30q = mysqli_fetch_row($sql19_30);

if (!$uno19_30q[0] == '') { $uno19_30 = $uno19_30q[0]; }else { $uno19_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql19_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS URGENCIAS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno19_31q = mysqli_fetch_row($sql19_31);

if (!$uno19_31q[0] == '') { $uno19_31 = $uno19_31q[0]; }else { $uno19_31 = 0; }

$suma19 = $uno19_1 + $uno19_2 + $uno19_3 + $uno19_4 + $uno19_5 + $uno19_6 + $uno19_7 + $uno19_8 + $uno19_9 + $uno19_10 + $uno19_11 + $uno19_12 + $uno19_13 + $uno19_14 + $uno19_15 + $uno19_16 + $uno19_17 + $uno19_18 + $uno19_19 + $uno19_20 + $uno19_21 + $uno19_22 + $uno19_23 + $uno19_24 + $uno19_25 + $uno19_26 + $uno19_27 + $uno19_28 + $uno19_29 + $uno19_30 + $uno19_31;

$diecinueve = $uno19_1.';-}'.$uno19_2.';-}'.$uno19_3.';-}'.$uno19_4.';-}'.$uno19_5.';-}'.$uno19_6.';-}'.$uno19_7.';-}'.$uno19_8.';-}'.$uno19_9.';-}'.$uno19_10.';-}'.$uno19_11.';-}'.$uno19_12.';-}'.$uno19_13.';-}'.$uno19_14.';-}'.$uno19_15.';-}'.$uno19_16.';-}'.$uno19_17.';-}'.$uno19_18.';-}'.$uno19_19.';-}'.$uno19_20.';-}'.$uno19_21.';-}'.$uno19_22.';-}'.$uno19_23.';-}'.$uno19_24.';-}'.$uno19_25.';-}'.$uno19_26.';-}'.$uno19_27.';-}'.$uno19_28.';-}'.$uno19_29.';-}'.$uno19_30.';-}'.$uno19_31.';-}'.$suma19;

mysqli_select_db($horizonte, $database_horizonte);
$sql20_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno20_1q = mysqli_fetch_row($sql20_1);

if (!$uno20_1q[0] == '') { $uno20_1 = $uno20_1q[0]; }else { $uno20_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno20_2q = mysqli_fetch_row($sql20_2);

if (!$uno20_2q[0] == '') { $uno20_2 = $uno20_2q[0]; }else { $uno20_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno20_3q = mysqli_fetch_row($sql20_3);

if (!$uno20_3q[0] == '') { $uno20_3 = $uno20_3q[0]; }else { $uno20_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno20_4q = mysqli_fetch_row($sql20_4);

if (!$uno20_4q[0] == '') { $uno20_4 = $uno20_4q[0]; }else { $uno20_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno20_5q = mysqli_fetch_row($sql20_5);

if (!$uno20_5q[0] == '') { $uno20_5 = $uno20_5q[0]; }else { $uno20_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno20_6q = mysqli_fetch_row($sql20_6);

if (!$uno20_6q[0] == '') { $uno20_6 = $uno20_6q[0]; }else { $uno20_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno20_7q = mysqli_fetch_row($sql20_7);

if (!$uno20_7q[0] == '') { $uno20_7 = $uno20_7q[0]; }else { $uno20_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno20_8q = mysqli_fetch_row($sql20_8);

if (!$uno20_8q[0] == '') { $uno20_8 = $uno20_8q[0]; }else { $uno20_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno20_9q = mysqli_fetch_row($sql20_9);

if (!$uno20_9q[0] == '') { $uno20_9 = $uno20_9q[0]; }else { $uno20_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno20_10q = mysqli_fetch_row($sql20_10);

if (!$uno20_10q[0] == '') { $uno20_10 = $uno20_10q[0]; }else { $uno20_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno20_11q = mysqli_fetch_row($sql20_11);

if (!$uno20_11q[0] == '') { $uno20_11 = $uno20_11q[0]; }else { $uno20_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno20_12q = mysqli_fetch_row($sql20_12);

if (!$uno20_12q[0] == '') { $uno20_12 = $uno20_12q[0]; }else { $uno20_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno20_13q = mysqli_fetch_row($sql20_13);

if (!$uno20_13q[0] == '') { $uno20_13 = $uno20_13q[0]; }else { $uno20_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno20_14q = mysqli_fetch_row($sql20_14);

if (!$uno20_14q[0] == '') { $uno20_14 = $uno20_14q[0]; }else { $uno20_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno20_15q = mysqli_fetch_row($sql20_15);

if (!$uno20_15q[0] == '') { $uno20_15 = $uno20_15q[0]; }else { $uno20_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno20_16q = mysqli_fetch_row($sql20_16);

if (!$uno20_16q[0] == '') { $uno20_16 = $uno20_16q[0]; }else { $uno20_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno20_17q = mysqli_fetch_row($sql20_17);

if (!$uno20_17q[0] == '') { $uno20_17 = $uno20_17q[0]; }else { $uno20_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno20_18q = mysqli_fetch_row($sql20_18);

if (!$uno20_18q[0] == '') { $uno20_18 = $uno20_18q[0]; }else { $uno20_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno20_19q = mysqli_fetch_row($sql20_19);

if (!$uno20_19q[0] == '') { $uno20_19 = $uno20_19q[0]; }else { $uno20_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno20_20q = mysqli_fetch_row($sql20_20);

if (!$uno20_20q[0] == '') { $uno20_20 = $uno20_20q[0]; }else { $uno20_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno20_21q = mysqli_fetch_row($sql20_21);

if (!$uno20_21q[0] == '') { $uno20_21 = $uno20_21q[0]; }else { $uno20_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno20_22q = mysqli_fetch_row($sql20_22);

if (!$uno20_22q[0] == '') { $uno20_22 = $uno20_22q[0]; }else { $uno20_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno20_23q = mysqli_fetch_row($sql20_23);

if (!$uno20_23q[0] == '') { $uno20_23 = $uno20_23q[0]; }else { $uno20_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno20_24q = mysqli_fetch_row($sql20_24);

if (!$uno20_24q[0] == '') { $uno20_24 = $uno20_24q[0]; }else { $uno20_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno20_25q = mysqli_fetch_row($sql20_25);

if (!$uno20_25q[0] == '') { $uno20_25 = $uno20_25q[0]; }else { $uno20_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno20_26q = mysqli_fetch_row($sql20_26);

if (!$uno20_26q[0] == '') { $uno20_26 = $uno20_26q[0]; }else { $uno20_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno20_27q = mysqli_fetch_row($sql20_27);

if (!$uno20_27q[0] == '') { $uno20_27 = $uno20_27q[0]; }else { $uno20_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno20_28q = mysqli_fetch_row($sql20_28);

if (!$uno20_28q[0] == '') { $uno20_28 = $uno20_28q[0]; }else { $uno20_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno20_29q = mysqli_fetch_row($sql20_29);

if (!$uno20_29q[0] == '') { $uno20_29 = $uno20_29q[0]; }else { $uno20_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno20_30q = mysqli_fetch_row($sql20_30);

if (!$uno20_30q[0] == '') { $uno20_30 = $uno20_30q[0]; }else { $uno20_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql20_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'CESAREAS PROGRAMADAS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno20_31q = mysqli_fetch_row($sql20_31);

if (!$uno20_31q[0] == '') { $uno20_31 = $uno20_31q[0]; }else { $uno20_31 = 0; }

$suma20 = $uno20_1 + $uno20_2 + $uno20_3 + $uno20_4 + $uno20_5 + $uno20_6 + $uno20_7 + $uno20_8 + $uno20_9 + $uno20_10 + $uno20_11 + $uno20_12 + $uno20_13 + $uno20_14 + $uno20_15 + $uno20_16 + $uno20_17 + $uno20_18 + $uno20_19 + $uno20_20 + $uno20_21 + $uno20_22 + $uno20_23 + $uno20_24 + $uno20_25 + $uno20_26 + $uno20_27 + $uno20_28 + $uno20_29 + $uno20_30 + $uno20_31;

$veinte = $uno20_1.';-}'.$uno20_2.';-}'.$uno20_3.';-}'.$uno20_4.';-}'.$uno20_5.';-}'.$uno20_6.';-}'.$uno20_7.';-}'.$uno20_8.';-}'.$uno20_9.';-}'.$uno20_10.';-}'.$uno20_11.';-}'.$uno20_12.';-}'.$uno20_13.';-}'.$uno20_14.';-}'.$uno20_15.';-}'.$uno20_16.';-}'.$uno20_17.';-}'.$uno20_18.';-}'.$uno20_19.';-}'.$uno20_20.';-}'.$uno20_21.';-}'.$uno20_22.';-}'.$uno20_23.';-}'.$uno20_24.';-}'.$uno20_25.';-}'.$uno20_26.';-}'.$uno20_27.';-}'.$uno20_28.';-}'.$uno20_29.';-}'.$uno20_30.';-}'.$uno20_31.';-}'.$suma20;

// 21
mysqli_select_db($horizonte, $database_horizonte);
$sql21_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno21_1q = mysqli_fetch_row($sql21_1);

if (!$uno21_1q[0] == '') { $uno21_1 = $uno21_1q[0]; }else { $uno21_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno21_2q = mysqli_fetch_row($sql21_2);

if (!$uno21_2q[0] == '') { $uno21_2 = $uno21_2q[0]; }else { $uno21_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno21_3q = mysqli_fetch_row($sql21_3);

if (!$uno21_3q[0] == '') { $uno21_3 = $uno21_3q[0]; }else { $uno21_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno21_4q = mysqli_fetch_row($sql21_4);

if (!$uno21_4q[0] == '') { $uno21_4 = $uno21_4q[0]; }else { $uno21_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno21_5q = mysqli_fetch_row($sql21_5);

if (!$uno21_5q[0] == '') { $uno21_5 = $uno21_5q[0]; }else { $uno21_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno21_6q = mysqli_fetch_row($sql21_6);

if (!$uno21_6q[0] == '') { $uno21_6 = $uno21_6q[0]; }else { $uno21_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno21_7q = mysqli_fetch_row($sql21_7);

if (!$uno21_7q[0] == '') { $uno21_7 = $uno21_7q[0]; }else { $uno21_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno21_8q = mysqli_fetch_row($sql21_8);

if (!$uno21_8q[0] == '') { $uno21_8 = $uno21_8q[0]; }else { $uno21_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno21_9q = mysqli_fetch_row($sql21_9);

if (!$uno21_9q[0] == '') { $uno21_9 = $uno21_9q[0]; }else { $uno21_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno21_10q = mysqli_fetch_row($sql21_10);

if (!$uno21_10q[0] == '') { $uno21_10 = $uno21_10q[0]; }else { $uno21_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno21_11q = mysqli_fetch_row($sql21_11);

if (!$uno21_11q[0] == '') { $uno21_11 = $uno21_11q[0]; }else { $uno21_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno21_12q = mysqli_fetch_row($sql21_12);

if (!$uno21_12q[0] == '') { $uno21_12 = $uno21_12q[0]; }else { $uno21_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno21_13q = mysqli_fetch_row($sql21_13);

if (!$uno21_13q[0] == '') { $uno21_13 = $uno21_13q[0]; }else { $uno21_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno21_14q = mysqli_fetch_row($sql21_14);

if (!$uno21_14q[0] == '') { $uno21_14 = $uno21_14q[0]; }else { $uno21_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno21_15q = mysqli_fetch_row($sql21_15);

if (!$uno21_15q[0] == '') { $uno21_15 = $uno21_15q[0]; }else { $uno21_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno21_16q = mysqli_fetch_row($sql21_16);

if (!$uno21_16q[0] == '') { $uno21_16 = $uno21_16q[0]; }else { $uno21_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno21_17q = mysqli_fetch_row($sql21_17);

if (!$uno21_17q[0] == '') { $uno21_17 = $uno21_17q[0]; }else { $uno21_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno21_18q = mysqli_fetch_row($sql21_18);

if (!$uno21_18q[0] == '') { $uno21_18 = $uno21_18q[0]; }else { $uno21_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno21_19q = mysqli_fetch_row($sql21_19);

if (!$uno21_19q[0] == '') { $uno21_19 = $uno21_19q[0]; }else { $uno21_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno21_20q = mysqli_fetch_row($sql21_20);

if (!$uno21_20q[0] == '') { $uno21_20 = $uno21_20q[0]; }else { $uno21_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno21_21q = mysqli_fetch_row($sql21_21);

if (!$uno21_21q[0] == '') { $uno21_21 = $uno21_21q[0]; }else { $uno21_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno21_22q = mysqli_fetch_row($sql21_22);

if (!$uno21_22q[0] == '') { $uno21_22 = $uno21_22q[0]; }else { $uno21_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno21_23q = mysqli_fetch_row($sql21_23);

if (!$uno21_23q[0] == '') { $uno21_23 = $uno21_23q[0]; }else { $uno21_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno21_24q = mysqli_fetch_row($sql21_24);

if (!$uno21_24q[0] == '') { $uno21_24 = $uno21_24q[0]; }else { $uno21_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno21_25q = mysqli_fetch_row($sql21_25);

if (!$uno21_25q[0] == '') { $uno21_25 = $uno21_25q[0]; }else { $uno21_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno21_26q = mysqli_fetch_row($sql21_26);

if (!$uno21_26q[0] == '') { $uno21_26 = $uno21_26q[0]; }else { $uno21_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno21_27q = mysqli_fetch_row($sql21_27);

if (!$uno21_27q[0] == '') { $uno21_27 = $uno21_27q[0]; }else { $uno21_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno21_28q = mysqli_fetch_row($sql21_28);

if (!$uno21_28q[0] == '') { $uno21_28 = $uno21_28q[0]; }else { $uno21_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno21_29q = mysqli_fetch_row($sql21_29);

if (!$uno21_29q[0] == '') { $uno21_29 = $uno21_29q[0]; }else { $uno21_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno21_30q = mysqli_fetch_row($sql21_30);

if (!$uno21_30q[0] == '') { $uno21_30 = $uno21_30q[0]; }else { $uno21_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql21_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO URGENCIA' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno21_31q = mysqli_fetch_row($sql21_31);

if (!$uno21_31q[0] == '') { $uno21_31 = $uno21_31q[0]; }else { $uno21_31 = 0; }

$suma21 = $uno21_1 + $uno21_2 + $uno21_3 + $uno21_4 + $uno21_5 + $uno21_6 + $uno21_7 + $uno21_8 + $uno21_9 + $uno21_10 + $uno21_11 + $uno21_12 + $uno21_13 + $uno21_14 + $uno21_15 + $uno21_16 + $uno21_17 + $uno21_18 + $uno21_19 + $uno21_20 + $uno21_21 + $uno21_22 + $uno21_23 + $uno21_24 + $uno21_25 + $uno21_26 + $uno21_27 + $uno21_28 + $uno21_29 + $uno21_30 + $uno21_31;

$veintiuno = $uno21_1.';-}'.$uno21_2.';-}'.$uno21_3.';-}'.$uno21_4.';-}'.$uno21_5.';-}'.$uno21_6.';-}'.$uno21_7.';-}'.$uno21_8.';-}'.$uno21_9.';-}'.$uno21_10.';-}'.$uno21_11.';-}'.$uno21_12.';-}'.$uno21_13.';-}'.$uno21_14.';-}'.$uno21_15.';-}'.$uno21_16.';-}'.$uno21_17.';-}'.$uno21_18.';-}'.$uno21_19.';-}'.$uno21_20.';-}'.$uno21_21.';-}'.$uno21_22.';-}'.$uno21_23.';-}'.$uno21_24.';-}'.$uno21_25.';-}'.$uno21_26.';-}'.$uno21_27.';-}'.$uno21_28.';-}'.$uno21_29.';-}'.$uno21_30.';-}'.$uno21_31.';-}'.$suma21;

// 22
mysqli_select_db($horizonte, $database_horizonte);
$sql22_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno22_1q = mysqli_fetch_row($sql22_1);

if (!$uno22_1q[0] == '') { $uno22_1 = $uno22_1q[0]; }else { $uno22_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno22_2q = mysqli_fetch_row($sql22_2);

if (!$uno22_2q[0] == '') { $uno22_2 = $uno22_2q[0]; }else { $uno22_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno22_3q = mysqli_fetch_row($sql22_3);

if (!$uno22_3q[0] == '') { $uno22_3 = $uno22_3q[0]; }else { $uno22_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno22_4q = mysqli_fetch_row($sql22_4);

if (!$uno22_4q[0] == '') { $uno22_4 = $uno22_4q[0]; }else { $uno22_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno22_5q = mysqli_fetch_row($sql22_5);

if (!$uno22_5q[0] == '') { $uno22_5 = $uno22_5q[0]; }else { $uno22_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno22_6q = mysqli_fetch_row($sql22_6);

if (!$uno22_6q[0] == '') { $uno22_6 = $uno22_6q[0]; }else { $uno22_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno22_7q = mysqli_fetch_row($sql22_7);

if (!$uno22_7q[0] == '') { $uno22_7 = $uno22_7q[0]; }else { $uno22_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno22_8q = mysqli_fetch_row($sql22_8);

if (!$uno22_8q[0] == '') { $uno22_8 = $uno22_8q[0]; }else { $uno22_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno22_9q = mysqli_fetch_row($sql22_9);

if (!$uno22_9q[0] == '') { $uno22_9 = $uno22_9q[0]; }else { $uno22_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno22_10q = mysqli_fetch_row($sql22_10);

if (!$uno22_10q[0] == '') { $uno22_10 = $uno22_10q[0]; }else { $uno22_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno22_11q = mysqli_fetch_row($sql22_11);

if (!$uno22_11q[0] == '') { $uno22_11 = $uno22_11q[0]; }else { $uno22_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno22_12q = mysqli_fetch_row($sql22_12);

if (!$uno22_12q[0] == '') { $uno22_12 = $uno22_12q[0]; }else { $uno22_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno22_13q = mysqli_fetch_row($sql22_13);

if (!$uno22_13q[0] == '') { $uno22_13 = $uno22_13q[0]; }else { $uno22_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno22_14q = mysqli_fetch_row($sql22_14);

if (!$uno22_14q[0] == '') { $uno22_14 = $uno22_14q[0]; }else { $uno22_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno22_15q = mysqli_fetch_row($sql22_15);

if (!$uno22_15q[0] == '') { $uno22_15 = $uno22_15q[0]; }else { $uno22_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno22_16q = mysqli_fetch_row($sql22_16);

if (!$uno22_16q[0] == '') { $uno22_16 = $uno22_16q[0]; }else { $uno22_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno22_17q = mysqli_fetch_row($sql22_17);

if (!$uno22_17q[0] == '') { $uno22_17 = $uno22_17q[0]; }else { $uno22_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno22_18q = mysqli_fetch_row($sql22_18);

if (!$uno22_18q[0] == '') { $uno22_18 = $uno22_18q[0]; }else { $uno22_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno22_19q = mysqli_fetch_row($sql22_19);

if (!$uno22_19q[0] == '') { $uno22_19 = $uno22_19q[0]; }else { $uno22_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno22_20q = mysqli_fetch_row($sql22_20);

if (!$uno22_20q[0] == '') { $uno22_20 = $uno22_20q[0]; }else { $uno22_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno22_21q = mysqli_fetch_row($sql22_21);

if (!$uno22_21q[0] == '') { $uno22_21 = $uno22_21q[0]; }else { $uno22_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno22_22q = mysqli_fetch_row($sql22_22);

if (!$uno22_22q[0] == '') { $uno22_22 = $uno22_22q[0]; }else { $uno22_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno22_23q = mysqli_fetch_row($sql22_23);

if (!$uno22_23q[0] == '') { $uno22_23 = $uno22_23q[0]; }else { $uno22_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno22_24q = mysqli_fetch_row($sql22_24);

if (!$uno22_24q[0] == '') { $uno22_24 = $uno22_24q[0]; }else { $uno22_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno22_25q = mysqli_fetch_row($sql22_25);

if (!$uno22_25q[0] == '') { $uno22_25 = $uno22_25q[0]; }else { $uno22_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno22_26q = mysqli_fetch_row($sql22_26);

if (!$uno22_26q[0] == '') { $uno22_26 = $uno22_26q[0]; }else { $uno22_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno22_27q = mysqli_fetch_row($sql22_27);

if (!$uno22_27q[0] == '') { $uno22_27 = $uno22_27q[0]; }else { $uno22_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno22_28q = mysqli_fetch_row($sql22_28);

if (!$uno22_28q[0] == '') { $uno22_28 = $uno22_28q[0]; }else { $uno22_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno22_29q = mysqli_fetch_row($sql22_29);

if (!$uno22_29q[0] == '') { $uno22_29 = $uno22_29q[0]; }else { $uno22_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno22_30q = mysqli_fetch_row($sql22_30);

if (!$uno22_30q[0] == '') { $uno22_30 = $uno22_30q[0]; }else { $uno22_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql22_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INTERNAMIENTO REFERIDO' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno22_31q = mysqli_fetch_row($sql22_31);

if (!$uno22_31q[0] == '') { $uno22_31 = $uno22_31q[0]; }else { $uno22_31 = 0; }

$suma22 = $uno22_1 + $uno22_2 + $uno22_3 + $uno22_4 + $uno22_5 + $uno22_6 + $uno22_7 + $uno22_8 + $uno22_9 + $uno22_10 + $uno22_11 + $uno22_12 + $uno22_13 + $uno22_14 + $uno22_15 + $uno22_16 + $uno22_17 + $uno22_18 + $uno22_19 + $uno22_20 + $uno22_21 + $uno22_22 + $uno22_23 + $uno22_24 + $uno22_25 + $uno22_26 + $uno22_27 + $uno22_28 + $uno22_29 + $uno22_30 + $uno22_31;

$veintidos = $uno22_1.';-}'.$uno22_2.';-}'.$uno22_3.';-}'.$uno22_4.';-}'.$uno22_5.';-}'.$uno22_6.';-}'.$uno22_7.';-}'.$uno22_8.';-}'.$uno22_9.';-}'.$uno22_10.';-}'.$uno22_11.';-}'.$uno22_12.';-}'.$uno22_13.';-}'.$uno22_14.';-}'.$uno22_15.';-}'.$uno22_16.';-}'.$uno22_17.';-}'.$uno22_18.';-}'.$uno22_19.';-}'.$uno22_20.';-}'.$uno22_21.';-}'.$uno22_22.';-}'.$uno22_23.';-}'.$uno22_24.';-}'.$uno22_25.';-}'.$uno22_26.';-}'.$uno22_27.';-}'.$uno22_28.';-}'.$uno22_29.';-}'.$uno22_30.';-}'.$uno22_31.';-}'.$suma22;

// 23
mysqli_select_db($horizonte, $database_horizonte);
$sql23_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno23_1q = mysqli_fetch_row($sql23_1);

if (!$uno23_1q[0] == '') { $uno23_1 = $uno23_1q[0]; }else { $uno23_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno23_2q = mysqli_fetch_row($sql23_2);

if (!$uno23_2q[0] == '') { $uno23_2 = $uno23_2q[0]; }else { $uno23_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno23_3q = mysqli_fetch_row($sql23_3);

if (!$uno23_3q[0] == '') { $uno23_3 = $uno23_3q[0]; }else { $uno23_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno23_4q = mysqli_fetch_row($sql23_4);

if (!$uno23_4q[0] == '') { $uno23_4 = $uno23_4q[0]; }else { $uno23_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno23_5q = mysqli_fetch_row($sql23_5);

if (!$uno23_5q[0] == '') { $uno23_5 = $uno23_5q[0]; }else { $uno23_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno23_6q = mysqli_fetch_row($sql23_6);

if (!$uno23_6q[0] == '') { $uno23_6 = $uno23_6q[0]; }else { $uno23_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno23_7q = mysqli_fetch_row($sql23_7);

if (!$uno23_7q[0] == '') { $uno23_7 = $uno23_7q[0]; }else { $uno23_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno23_8q = mysqli_fetch_row($sql23_8);

if (!$uno23_8q[0] == '') { $uno23_8 = $uno23_8q[0]; }else { $uno23_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno23_9q = mysqli_fetch_row($sql23_9);

if (!$uno23_9q[0] == '') { $uno23_9 = $uno23_9q[0]; }else { $uno23_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno23_10q = mysqli_fetch_row($sql23_10);

if (!$uno23_10q[0] == '') { $uno23_10 = $uno23_10q[0]; }else { $uno23_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno23_11q = mysqli_fetch_row($sql23_11);

if (!$uno23_11q[0] == '') { $uno23_11 = $uno23_11q[0]; }else { $uno23_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno23_12q = mysqli_fetch_row($sql23_12);

if (!$uno23_12q[0] == '') { $uno23_12 = $uno23_12q[0]; }else { $uno23_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno23_13q = mysqli_fetch_row($sql23_13);

if (!$uno23_13q[0] == '') { $uno23_13 = $uno23_13q[0]; }else { $uno23_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno23_14q = mysqli_fetch_row($sql23_14);

if (!$uno23_14q[0] == '') { $uno23_14 = $uno23_14q[0]; }else { $uno23_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno23_15q = mysqli_fetch_row($sql23_15);

if (!$uno23_15q[0] == '') { $uno23_15 = $uno23_15q[0]; }else { $uno23_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno23_16q = mysqli_fetch_row($sql23_16);

if (!$uno23_16q[0] == '') { $uno23_16 = $uno23_16q[0]; }else { $uno23_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno23_17q = mysqli_fetch_row($sql23_17);

if (!$uno23_17q[0] == '') { $uno23_17 = $uno23_17q[0]; }else { $uno23_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno23_18q = mysqli_fetch_row($sql23_18);

if (!$uno23_18q[0] == '') { $uno23_18 = $uno23_18q[0]; }else { $uno23_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno23_19q = mysqli_fetch_row($sql23_19);

if (!$uno23_19q[0] == '') { $uno23_19 = $uno23_19q[0]; }else { $uno23_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno23_20q = mysqli_fetch_row($sql23_20);

if (!$uno23_20q[0] == '') { $uno23_20 = $uno23_20q[0]; }else { $uno23_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno23_21q = mysqli_fetch_row($sql23_21);

if (!$uno23_21q[0] == '') { $uno23_21 = $uno23_21q[0]; }else { $uno23_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno23_22q = mysqli_fetch_row($sql23_22);

if (!$uno23_22q[0] == '') { $uno23_22 = $uno23_22q[0]; }else { $uno23_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno23_23q = mysqli_fetch_row($sql23_23);

if (!$uno23_23q[0] == '') { $uno23_23 = $uno23_23q[0]; }else { $uno23_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno23_24q = mysqli_fetch_row($sql23_24);

if (!$uno23_24q[0] == '') { $uno23_24 = $uno23_24q[0]; }else { $uno23_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno23_25q = mysqli_fetch_row($sql23_25);

if (!$uno23_25q[0] == '') { $uno23_25 = $uno23_25q[0]; }else { $uno23_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno23_26q = mysqli_fetch_row($sql23_26);

if (!$uno23_26q[0] == '') { $uno23_26 = $uno23_26q[0]; }else { $uno23_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno23_27q = mysqli_fetch_row($sql23_27);

if (!$uno23_27q[0] == '') { $uno23_27 = $uno23_27q[0]; }else { $uno23_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno23_28q = mysqli_fetch_row($sql23_28);

if (!$uno23_28q[0] == '') { $uno23_28 = $uno23_28q[0]; }else { $uno23_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno23_29q = mysqli_fetch_row($sql23_29);

if (!$uno23_29q[0] == '') { $uno23_29 = $uno23_29q[0]; }else { $uno23_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno23_30q = mysqli_fetch_row($sql23_30);

if (!$uno23_30q[0] == '') { $uno23_30 = $uno23_30q[0]; }else { $uno23_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql23_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS M' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno23_31q = mysqli_fetch_row($sql23_31);

if (!$uno23_31q[0] == '') { $uno23_31 = $uno23_31q[0]; }else { $uno23_31 = 0; }

$suma23 = $uno23_1 + $uno23_2 + $uno23_3 + $uno23_4 + $uno23_5 + $uno23_6 + $uno23_7 + $uno23_8 + $uno23_9 + $uno23_10 + $uno23_11 + $uno23_12 + $uno23_13 + $uno23_14 + $uno23_15 + $uno23_16 + $uno23_17 + $uno23_18 + $uno23_19 + $uno23_20 + $uno23_21 + $uno23_22 + $uno23_23 + $uno23_24 + $uno23_25 + $uno23_26 + $uno23_27 + $uno23_28 + $uno23_29 + $uno23_30 + $uno23_31;

$veintitres = $uno23_1.';-}'.$uno23_2.';-}'.$uno23_3.';-}'.$uno23_4.';-}'.$uno23_5.';-}'.$uno23_6.';-}'.$uno23_7.';-}'.$uno23_8.';-}'.$uno23_9.';-}'.$uno23_10.';-}'.$uno23_11.';-}'.$uno23_12.';-}'.$uno23_13.';-}'.$uno23_14.';-}'.$uno23_15.';-}'.$uno23_16.';-}'.$uno23_17.';-}'.$uno23_18.';-}'.$uno23_19.';-}'.$uno23_20.';-}'.$uno23_21.';-}'.$uno23_22.';-}'.$uno23_23.';-}'.$uno23_24.';-}'.$uno23_25.';-}'.$uno23_26.';-}'.$uno23_27.';-}'.$uno23_28.';-}'.$uno23_29.';-}'.$uno23_30.';-}'.$uno23_31.';-}'.$suma23;

// 24
mysqli_select_db($horizonte, $database_horizonte);
$sql24_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno24_1q = mysqli_fetch_row($sql24_1);

if (!$uno24_1q[0] == '') { $uno24_1 = $uno24_1q[0]; }else { $uno24_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno24_2q = mysqli_fetch_row($sql24_2);

if (!$uno24_2q[0] == '') { $uno24_2 = $uno24_2q[0]; }else { $uno24_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno24_3q = mysqli_fetch_row($sql24_3);

if (!$uno24_3q[0] == '') { $uno24_3 = $uno24_3q[0]; }else { $uno24_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno24_4q = mysqli_fetch_row($sql24_4);

if (!$uno24_4q[0] == '') { $uno24_4 = $uno24_4q[0]; }else { $uno24_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno24_5q = mysqli_fetch_row($sql24_5);

if (!$uno24_5q[0] == '') { $uno24_5 = $uno24_5q[0]; }else { $uno24_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno24_6q = mysqli_fetch_row($sql24_6);

if (!$uno24_6q[0] == '') { $uno24_6 = $uno24_6q[0]; }else { $uno24_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno24_7q = mysqli_fetch_row($sql24_7);

if (!$uno24_7q[0] == '') { $uno24_7 = $uno24_7q[0]; }else { $uno24_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno24_8q = mysqli_fetch_row($sql24_8);

if (!$uno24_8q[0] == '') { $uno24_8 = $uno23_8q[0]; }else { $uno24_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno24_9q = mysqli_fetch_row($sql24_9);

if (!$uno24_9q[0] == '') { $uno24_9 = $uno24_9q[0]; }else { $uno24_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno24_10q = mysqli_fetch_row($sql24_10);

if (!$uno24_10q[0] == '') { $uno24_10 = $uno24_10q[0]; }else { $uno24_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno24_11q = mysqli_fetch_row($sql24_11);

if (!$uno24_11q[0] == '') { $uno24_11 = $uno24_11q[0]; }else { $uno24_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno24_12q = mysqli_fetch_row($sql24_12);

if (!$uno24_12q[0] == '') { $uno24_12 = $uno24_12q[0]; }else { $uno24_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno24_13q = mysqli_fetch_row($sql24_13);

if (!$uno24_13q[0] == '') { $uno24_13 = $uno24_13q[0]; }else { $uno24_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno24_14q = mysqli_fetch_row($sql24_14);

if (!$uno24_14q[0] == '') { $uno24_14 = $uno24_14q[0]; }else { $uno24_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno24_15q = mysqli_fetch_row($sql24_15);

if (!$uno24_15q[0] == '') { $uno24_15 = $uno24_15q[0]; }else { $uno24_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno24_16q = mysqli_fetch_row($sql24_16);

if (!$uno24_16q[0] == '') { $uno24_16 = $uno24_16q[0]; }else { $uno24_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno24_17q = mysqli_fetch_row($sql24_17);

if (!$uno24_17q[0] == '') { $uno24_17 = $uno24_17q[0]; }else { $uno24_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno24_18q = mysqli_fetch_row($sql24_18);

if (!$uno24_18q[0] == '') { $uno24_18 = $uno24_18q[0]; }else { $uno24_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno24_19q = mysqli_fetch_row($sql24_19);

if (!$uno24_19q[0] == '') { $uno24_19 = $uno24_19q[0]; }else { $uno24_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno24_20q = mysqli_fetch_row($sql24_20);

if (!$uno24_20q[0] == '') { $uno24_20 = $uno24_20q[0]; }else { $uno24_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno24_21q = mysqli_fetch_row($sql24_21);

if (!$uno24_21q[0] == '') { $uno24_21 = $uno24_21q[0]; }else { $uno24_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno24_22q = mysqli_fetch_row($sql24_22);

if (!$uno24_22q[0] == '') { $uno24_22 = $uno24_22q[0]; }else { $uno24_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno24_23q = mysqli_fetch_row($sql24_23);

if (!$uno24_23q[0] == '') { $uno24_23 = $uno24_23q[0]; }else { $uno24_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno24_24q = mysqli_fetch_row($sql24_24);

if (!$uno24_24q[0] == '') { $uno24_24 = $uno24_24q[0]; }else { $uno24_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno24_25q = mysqli_fetch_row($sql24_25);

if (!$uno24_25q[0] == '') { $uno24_25 = $uno24_25q[0]; }else { $uno24_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno24_26q = mysqli_fetch_row($sql24_26);

if (!$uno24_26q[0] == '') { $uno24_26 = $uno24_26q[0]; }else { $uno24_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno24_27q = mysqli_fetch_row($sql24_27);

if (!$uno24_27q[0] == '') { $uno24_27 = $uno24_27q[0]; }else { $uno24_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno24_28q = mysqli_fetch_row($sql24_28);

if (!$uno24_28q[0] == '') { $uno24_28 = $uno24_28q[0]; }else { $uno24_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno24_29q = mysqli_fetch_row($sql24_29);

if (!$uno24_29q[0] == '') { $uno24_29 = $uno24_29q[0]; }else { $uno24_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno24_30q = mysqli_fetch_row($sql24_30);

if (!$uno24_30q[0] == '') { $uno24_30 = $uno24_30q[0]; }else { $uno24_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql24_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS V' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno24_31q = mysqli_fetch_row($sql24_31);

if (!$uno24_31q[0] == '') { $uno24_31 = $uno24_31q[0]; }else { $uno24_31 = 0; }

$suma24 = $uno24_1 + $uno24_2 + $uno24_3 + $uno24_4 + $uno24_5 + $uno24_6 + $uno24_7 + $uno24_8 + $uno24_9 + $uno24_10 + $uno24_11 + $uno24_12 + $uno24_13 + $uno24_14 + $uno24_15 + $uno24_16 + $uno24_17 + $uno24_18 + $uno24_19 + $uno24_20 + $uno24_21 + $uno24_22 + $uno24_23 + $uno24_24 + $uno24_25 + $uno24_26 + $uno24_27 + $uno24_28 + $uno24_29 + $uno24_30 + $uno24_31;

$veinticuatro = $uno24_1.';-}'.$uno24_2.';-}'.$uno24_3.';-}'.$uno24_4.';-}'.$uno24_5.';-}'.$uno24_6.';-}'.$uno24_7.';-}'.$uno24_8.';-}'.$uno24_9.';-}'.$uno24_10.';-}'.$uno24_11.';-}'.$uno24_12.';-}'.$uno24_13.';-}'.$uno24_14.';-}'.$uno24_15.';-}'.$uno24_16.';-}'.$uno24_17.';-}'.$uno24_18.';-}'.$uno24_19.';-}'.$uno24_20.';-}'.$uno24_21.';-}'.$uno24_22.';-}'.$uno24_23.';-}'.$uno24_24.';-}'.$uno24_25.';-}'.$uno24_26.';-}'.$uno24_27.';-}'.$uno24_28.';-}'.$uno24_29.';-}'.$uno24_30.';-}'.$uno24_31.';-}'.$suma24;

// 25
mysqli_select_db($horizonte, $database_horizonte);
$sql25_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno25_1q = mysqli_fetch_row($sql25_1);

if (!$uno25_1q[0] == '') { $uno25_1 = $uno25_1q[0]; }else { $uno25_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno25_2q = mysqli_fetch_row($sql25_2);

if (!$uno25_2q[0] == '') { $uno25_2 = $uno25_2q[0]; }else { $uno25_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno25_3q = mysqli_fetch_row($sql25_3);

if (!$uno25_3q[0] == '') { $uno25_3 = $uno25_3q[0]; }else { $uno25_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno25_4q = mysqli_fetch_row($sql25_4);

if (!$uno25_4q[0] == '') { $uno25_4 = $uno25_4q[0]; }else { $uno25_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno25_5q = mysqli_fetch_row($sql25_5);

if (!$uno25_5q[0] == '') { $uno25_5 = $uno25_5q[0]; }else { $uno25_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno25_6q = mysqli_fetch_row($sql25_6);

if (!$uno25_6q[0] == '') { $uno25_6 = $uno25_6q[0]; }else { $uno25_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno25_7q = mysqli_fetch_row($sql25_7);

if (!$uno25_7q[0] == '') { $uno25_7 = $uno25_7q[0]; }else { $uno25_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno25_8q = mysqli_fetch_row($sql25_8);

if (!$uno25_8q[0] == '') { $uno25_8 = $uno25_8q[0]; }else { $uno25_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno25_9q = mysqli_fetch_row($sql25_9);

if (!$uno25_9q[0] == '') { $uno25_9 = $uno25_9q[0]; }else { $uno25_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno25_10q = mysqli_fetch_row($sql25_10);

if (!$uno25_10q[0] == '') { $uno25_10 = $uno25_10q[0]; }else { $uno25_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno25_11q = mysqli_fetch_row($sql25_11);

if (!$uno25_11q[0] == '') { $uno25_11 = $uno25_11q[0]; }else { $uno25_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno25_12q = mysqli_fetch_row($sql25_12);

if (!$uno25_12q[0] == '') { $uno25_12 = $uno25_12q[0]; }else { $uno25_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno25_13q = mysqli_fetch_row($sql25_13);

if (!$uno25_13q[0] == '') { $uno25_13 = $uno25_13q[0]; }else { $uno25_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno25_14q = mysqli_fetch_row($sql25_14);

if (!$uno25_14q[0] == '') { $uno25_14 = $uno25_14q[0]; }else { $uno25_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno25_15q = mysqli_fetch_row($sql25_15);

if (!$uno25_15q[0] == '') { $uno25_15 = $uno25_15q[0]; }else { $uno25_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno25_16q = mysqli_fetch_row($sql25_16);

if (!$uno25_16q[0] == '') { $uno25_16 = $uno25_16q[0]; }else { $uno25_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno25_17q = mysqli_fetch_row($sql25_17);

if (!$uno25_17q[0] == '') { $uno25_17 = $uno25_17q[0]; }else { $uno25_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno25_18q = mysqli_fetch_row($sql25_18);

if (!$uno25_18q[0] == '') { $uno25_18 = $uno25_18q[0]; }else { $uno25_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno25_19q = mysqli_fetch_row($sql25_19);

if (!$uno25_19q[0] == '') { $uno25_19 = $uno25_19q[0]; }else { $uno25_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno25_20q = mysqli_fetch_row($sql25_20);

if (!$uno25_20q[0] == '') { $uno25_20 = $uno25_20q[0]; }else { $uno25_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno25_21q = mysqli_fetch_row($sql25_21);

if (!$uno25_21q[0] == '') { $uno25_21 = $uno25_21q[0]; }else { $uno25_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno25_22q = mysqli_fetch_row($sql25_22);

if (!$uno25_22q[0] == '') { $uno25_22 = $uno25_22q[0]; }else { $uno25_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno25_23q = mysqli_fetch_row($sql25_23);

if (!$uno25_23q[0] == '') { $uno25_23 = $uno25_23q[0]; }else { $uno25_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno25_24q = mysqli_fetch_row($sql25_24);

if (!$uno25_24q[0] == '') { $uno25_24 = $uno25_24q[0]; }else { $uno25_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno25_25q = mysqli_fetch_row($sql25_25);

if (!$uno25_25q[0] == '') { $uno25_25 = $uno25_25q[0]; }else { $uno25_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno25_26q = mysqli_fetch_row($sql25_26);

if (!$uno25_26q[0] == '') { $uno25_26 = $uno25_26q[0]; }else { $uno25_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno25_27q = mysqli_fetch_row($sql25_27);

if (!$uno25_27q[0] == '') { $uno25_27 = $uno25_27q[0]; }else { $uno25_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno25_28q = mysqli_fetch_row($sql25_28);

if (!$uno25_28q[0] == '') { $uno25_28 = $uno25_28q[0]; }else { $uno25_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno25_29q = mysqli_fetch_row($sql25_29);

if (!$uno25_29q[0] == '') { $uno25_29 = $uno25_29q[0]; }else { $uno25_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno25_30q = mysqli_fetch_row($sql25_30);

if (!$uno25_30q[0] == '') { $uno25_30 = $uno25_30q[0]; }else { $uno25_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql25_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'RX SOLICITADOS NOCTURNO' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno25_31q = mysqli_fetch_row($sql25_31);

if (!$uno25_31q[0] == '') { $uno25_31 = $uno25_31q[0]; }else { $uno25_31 = 0; }

$suma25 = $uno25_1 + $uno25_2 + $uno25_3 + $uno25_4 + $uno25_5 + $uno25_6 + $uno25_7 + $uno25_8 + $uno25_9 + $uno25_10 + $uno25_11 + $uno25_12 + $uno25_13 + $uno25_14 + $uno25_15 + $uno25_16 + $uno25_17 + $uno25_18 + $uno25_19 + $uno25_20 + $uno25_21 + $uno25_22 + $uno25_23 + $uno25_24 + $uno25_25 + $uno25_26 + $uno25_27 + $uno25_28 + $uno25_29 + $uno25_30 + $uno25_31;

$veinticinco = $uno25_1.';-}'.$uno25_2.';-}'.$uno25_3.';-}'.$uno25_4.';-}'.$uno25_5.';-}'.$uno25_6.';-}'.$uno25_7.';-}'.$uno25_8.';-}'.$uno25_9.';-}'.$uno25_10.';-}'.$uno25_11.';-}'.$uno25_12.';-}'.$uno25_13.';-}'.$uno25_14.';-}'.$uno25_15.';-}'.$uno25_16.';-}'.$uno25_17.';-}'.$uno25_18.';-}'.$uno25_19.';-}'.$uno25_20.';-}'.$uno25_21.';-}'.$uno25_22.';-}'.$uno25_23.';-}'.$uno25_24.';-}'.$uno25_25.';-}'.$uno25_26.';-}'.$uno25_27.';-}'.$uno25_28.';-}'.$uno25_29.';-}'.$uno25_30.';-}'.$uno25_31.';-}'.$suma25;

// 26
mysqli_select_db($horizonte, $database_horizonte);
$sql26_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno26_1q = mysqli_fetch_row($sql26_1);

if (!$uno26_1q[0] == '') { $uno26_1 = $uno26_1q[0]; }else { $uno26_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno26_2q = mysqli_fetch_row($sql26_2);

if (!$uno26_2q[0] == '') { $uno26_2 = $uno26_2q[0]; }else { $uno26_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno26_3q = mysqli_fetch_row($sql26_3);

if (!$uno26_3q[0] == '') { $uno26_3 = $uno26_3q[0]; }else { $uno26_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno26_4q = mysqli_fetch_row($sql26_4);

if (!$uno26_4q[0] == '') { $uno26_4 = $uno26_4q[0]; }else { $uno26_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno26_5q = mysqli_fetch_row($sql26_5);

if (!$uno26_5q[0] == '') { $uno26_5 = $uno26_5q[0]; }else { $uno26_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno26_6q = mysqli_fetch_row($sql26_6);

if (!$uno26_6q[0] == '') { $uno26_6 = $uno26_6q[0]; }else { $uno26_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno26_7q = mysqli_fetch_row($sql26_7);

if (!$uno26_7q[0] == '') { $uno26_7 = $uno26_7q[0]; }else { $uno26_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno26_8q = mysqli_fetch_row($sql26_8);

if (!$uno26_8q[0] == '') { $uno26_8 = $uno26_8q[0]; }else { $uno26_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno26_9q = mysqli_fetch_row($sql26_9);

if (!$uno26_9q[0] == '') { $uno26_9 = $uno26_9q[0]; }else { $uno26_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno26_10q = mysqli_fetch_row($sql26_10);

if (!$uno26_10q[0] == '') { $uno26_10 = $uno26_10q[0]; }else { $uno26_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno26_11q = mysqli_fetch_row($sql26_11);

if (!$uno26_11q[0] == '') { $uno26_11 = $uno26_11q[0]; }else { $uno26_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno26_12q = mysqli_fetch_row($sql26_12);

if (!$uno26_12q[0] == '') { $uno26_12 = $uno26_12q[0]; }else { $uno26_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno26_13q = mysqli_fetch_row($sql26_13);

if (!$uno26_13q[0] == '') { $uno26_13 = $uno26_13q[0]; }else { $uno26_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno26_14q = mysqli_fetch_row($sql26_14);

if (!$uno26_14q[0] == '') { $uno26_14 = $uno26_14q[0]; }else { $uno26_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno26_15q = mysqli_fetch_row($sql26_15);

if (!$uno26_15q[0] == '') { $uno26_15 = $uno26_15q[0]; }else { $uno26_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno26_16q = mysqli_fetch_row($sql26_16);

if (!$uno26_16q[0] == '') { $uno26_16 = $uno26_16q[0]; }else { $uno26_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno26_17q = mysqli_fetch_row($sql26_17);

if (!$uno26_17q[0] == '') { $uno26_17 = $uno26_17q[0]; }else { $uno26_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno26_18q = mysqli_fetch_row($sql26_18);

if (!$uno26_18q[0] == '') { $uno26_18 = $uno26_18q[0]; }else { $uno26_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno26_19q = mysqli_fetch_row($sql26_19);

if (!$uno26_19q[0] == '') { $uno26_19 = $uno26_19q[0]; }else { $uno26_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno26_20q = mysqli_fetch_row($sql26_20);

if (!$uno26_20q[0] == '') { $uno26_20 = $uno26_20q[0]; }else { $uno26_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno26_21q = mysqli_fetch_row($sql26_21);

if (!$uno26_21q[0] == '') { $uno26_21 = $uno26_21q[0]; }else { $uno26_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno26_22q = mysqli_fetch_row($sql26_22);

if (!$uno26_22q[0] == '') { $uno26_22 = $uno26_22q[0]; }else { $uno26_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno26_23q = mysqli_fetch_row($sql26_23);

if (!$uno26_23q[0] == '') { $uno26_23 = $uno26_23q[0]; }else { $uno26_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno26_24q = mysqli_fetch_row($sql26_24);

if (!$uno26_24q[0] == '') { $uno26_24 = $uno26_24q[0]; }else { $uno26_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno26_25q = mysqli_fetch_row($sql26_25);

if (!$uno26_25q[0] == '') { $uno26_25 = $uno26_25q[0]; }else { $uno26_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno26_26q = mysqli_fetch_row($sql26_26);

if (!$uno26_26q[0] == '') { $uno26_26 = $uno26_26q[0]; }else { $uno26_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno26_27q = mysqli_fetch_row($sql26_27);

if (!$uno26_27q[0] == '') { $uno26_27 = $uno26_27q[0]; }else { $uno26_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno26_28q = mysqli_fetch_row($sql26_28);

if (!$uno26_28q[0] == '') { $uno26_28 = $uno26_28q[0]; }else { $uno26_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno26_29q = mysqli_fetch_row($sql26_29);

if (!$uno26_29q[0] == '') { $uno26_29 = $uno26_29q[0]; }else { $uno26_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno26_30q = mysqli_fetch_row($sql26_30);

if (!$uno26_30q[0] == '') { $uno26_30 = $uno26_30q[0]; }else { $uno26_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql26_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'USG' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno26_31q = mysqli_fetch_row($sql26_31);

if (!$uno26_31q[0] == '') { $uno26_31 = $uno26_31q[0]; }else { $uno26_31 = 0; }

$suma26 = $uno26_1 + $uno26_2 + $uno26_3 + $uno26_4 + $uno26_5 + $uno26_6 + $uno26_7 + $uno26_8 + $uno26_9 + $uno26_10 + $uno26_11 + $uno26_12 + $uno26_13 + $uno26_14 + $uno26_15 + $uno26_16 + $uno26_17 + $uno26_18 + $uno26_19 + $uno26_20 + $uno26_21 + $uno26_22 + $uno26_23 + $uno26_24 + $uno26_25 + $uno26_26 + $uno26_27 + $uno26_28 + $uno26_29 + $uno26_30 + $uno26_31;

$veintiseis = $uno26_1.';-}'.$uno26_2.';-}'.$uno26_3.';-}'.$uno26_4.';-}'.$uno26_5.';-}'.$uno26_6.';-}'.$uno26_7.';-}'.$uno26_8.';-}'.$uno26_9.';-}'.$uno26_10.';-}'.$uno26_11.';-}'.$uno26_12.';-}'.$uno26_13.';-}'.$uno26_14.';-}'.$uno26_15.';-}'.$uno26_16.';-}'.$uno26_17.';-}'.$uno26_18.';-}'.$uno26_19.';-}'.$uno26_20.';-}'.$uno26_21.';-}'.$uno26_22.';-}'.$uno26_23.';-}'.$uno26_24.';-}'.$uno26_25.';-}'.$uno26_26.';-}'.$uno26_27.';-}'.$uno26_28.';-}'.$uno26_29.';-}'.$uno26_30.';-}'.$uno26_31.';-}'.$suma26;

// 27
mysqli_select_db($horizonte, $database_horizonte);
$sql27_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno27_1q = mysqli_fetch_row($sql27_1);

if (!$uno27_1q[0] == '') { $uno27_1 = $uno27_1q[0]; }else { $uno27_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno27_2q = mysqli_fetch_row($sql27_2);

if (!$uno27_2q[0] == '') { $uno27_2 = $uno27_2q[0]; }else { $uno27_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno27_3q = mysqli_fetch_row($sql27_3);

if (!$uno27_3q[0] == '') { $uno27_3 = $uno27_3q[0]; }else { $uno27_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno27_4q = mysqli_fetch_row($sql27_4);

if (!$uno27_4q[0] == '') { $uno27_4 = $uno27_4q[0]; }else { $uno27_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno27_5q = mysqli_fetch_row($sql27_5);

if (!$uno27_5q[0] == '') { $uno27_5 = $uno27_5q[0]; }else { $uno27_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno27_6q = mysqli_fetch_row($sql27_6);

if (!$uno27_6q[0] == '') { $uno27_6 = $uno27_6q[0]; }else { $uno27_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno27_7q = mysqli_fetch_row($sql27_7);

if (!$uno27_7q[0] == '') { $uno27_7 = $uno27_7q[0]; }else { $uno27_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno27_8q = mysqli_fetch_row($sql27_8);

if (!$uno27_8q[0] == '') { $uno27_8 = $uno27_8q[0]; }else { $uno27_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno27_9q = mysqli_fetch_row($sql27_9);

if (!$uno27_9q[0] == '') { $uno27_9 = $uno27_9q[0]; }else { $uno27_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno27_10q = mysqli_fetch_row($sql27_10);

if (!$uno27_10q[0] == '') { $uno27_10 = $uno27_10q[0]; }else { $uno27_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno27_11q = mysqli_fetch_row($sql27_11);

if (!$uno27_11q[0] == '') { $uno27_11 = $uno27_11q[0]; }else { $uno27_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno27_12q = mysqli_fetch_row($sql27_12);

if (!$uno27_12q[0] == '') { $uno27_12 = $uno27_12q[0]; }else { $uno27_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno27_13q = mysqli_fetch_row($sql27_13);

if (!$uno27_13q[0] == '') { $uno27_13 = $uno27_13q[0]; }else { $uno27_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno27_14q = mysqli_fetch_row($sql27_14);

if (!$uno27_14q[0] == '') { $uno27_14 = $uno27_14q[0]; }else { $uno27_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno27_15q = mysqli_fetch_row($sql27_15);

if (!$uno27_15q[0] == '') { $uno27_15 = $uno27_15q[0]; }else { $uno27_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno27_16q = mysqli_fetch_row($sql27_16);

if (!$uno27_16q[0] == '') { $uno27_16 = $uno27_16q[0]; }else { $uno27_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno27_17q = mysqli_fetch_row($sql27_17);

if (!$uno27_17q[0] == '') { $uno27_17 = $uno27_17q[0]; }else { $uno27_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno27_18q = mysqli_fetch_row($sql27_18);

if (!$uno27_18q[0] == '') { $uno27_18 = $uno27_18q[0]; }else { $uno27_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno27_19q = mysqli_fetch_row($sql27_19);

if (!$uno27_19q[0] == '') { $uno27_19 = $uno27_19q[0]; }else { $uno27_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno27_20q = mysqli_fetch_row($sql27_20);

if (!$uno27_20q[0] == '') { $uno27_20 = $uno27_20q[0]; }else { $uno27_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno27_21q = mysqli_fetch_row($sql27_21);

if (!$uno27_21q[0] == '') { $uno27_21 = $uno27_21q[0]; }else { $uno27_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno27_22q = mysqli_fetch_row($sql27_22);

if (!$uno27_22q[0] == '') { $uno27_22 = $uno27_22q[0]; }else { $uno27_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno27_23q = mysqli_fetch_row($sql27_23);

if (!$uno27_23q[0] == '') { $uno27_23 = $uno27_23q[0]; }else { $uno27_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno27_24q = mysqli_fetch_row($sql27_24);

if (!$uno27_24q[0] == '') { $uno27_24 = $uno27_24q[0]; }else { $uno27_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno27_25q = mysqli_fetch_row($sql27_25);

if (!$uno27_25q[0] == '') { $uno27_25 = $uno27_25q[0]; }else { $uno27_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno27_26q = mysqli_fetch_row($sql27_26);

if (!$uno27_26q[0] == '') { $uno27_26 = $uno27_26q[0]; }else { $uno27_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno27_27q = mysqli_fetch_row($sql27_27);

if (!$uno27_27q[0] == '') { $uno27_27 = $uno27_27q[0]; }else { $uno27_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno27_28q = mysqli_fetch_row($sql27_28);

if (!$uno27_28q[0] == '') { $uno27_28 = $uno27_28q[0]; }else { $uno27_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno27_29q = mysqli_fetch_row($sql27_29);

if (!$uno27_29q[0] == '') { $uno27_29 = $uno27_29q[0]; }else { $uno27_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno27_30q = mysqli_fetch_row($sql27_30);

if (!$uno27_30q[0] == '') { $uno27_30 = $uno27_30q[0]; }else { $uno27_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql27_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'MATUTINO' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno27_31q = mysqli_fetch_row($sql27_31);

if (!$uno27_31q[0] == '') { $uno27_31 = $uno27_31q[0]; }else { $uno27_31 = 0; }

$suma27 = $uno27_1 + $uno27_2 + $uno27_3 + $uno27_4 + $uno27_5 + $uno27_6 + $uno27_7 + $uno27_8 + $uno27_9 + $uno27_10 + $uno27_11 + $uno27_12 + $uno27_13 + $uno27_14 + $uno27_15 + $uno27_16 + $uno27_17 + $uno27_18 + $uno27_19 + $uno27_20 + $uno27_21 + $uno27_22 + $uno27_23 + $uno27_24 + $uno27_25 + $uno27_26 + $uno27_27 + $uno27_28 + $uno27_29 + $uno27_30 + $uno27_31;

$veintisiete = $uno27_1.';-}'.$uno27_2.';-}'.$uno27_3.';-}'.$uno27_4.';-}'.$uno27_5.';-}'.$uno27_6.';-}'.$uno27_7.';-}'.$uno27_8.';-}'.$uno27_9.';-}'.$uno27_10.';-}'.$uno27_11.';-}'.$uno27_12.';-}'.$uno27_13.';-}'.$uno27_14.';-}'.$uno27_15.';-}'.$uno27_16.';-}'.$uno27_17.';-}'.$uno27_18.';-}'.$uno27_19.';-}'.$uno27_20.';-}'.$uno27_21.';-}'.$uno27_22.';-}'.$uno27_23.';-}'.$uno27_24.';-}'.$uno27_25.';-}'.$uno27_26.';-}'.$uno27_27.';-}'.$uno27_28.';-}'.$uno27_29.';-}'.$uno27_30.';-}'.$uno27_31.';-}'.$suma27;

// 28
mysqli_select_db($horizonte, $database_horizonte);
$sql28_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno28_1q = mysqli_fetch_row($sql28_1);

if (!$uno28_1q[0] == '') { $uno28_1 = $uno28_1q[0]; }else { $uno28_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno28_2q = mysqli_fetch_row($sql28_2);

if (!$uno28_2q[0] == '') { $uno28_2 = $uno28_2q[0]; }else { $uno28_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno28_3q = mysqli_fetch_row($sql28_3);

if (!$uno28_3q[0] == '') { $uno28_3 = $uno28_3q[0]; }else { $uno28_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno28_4q = mysqli_fetch_row($sql28_4);

if (!$uno28_4q[0] == '') { $uno28_4 = $uno28_4q[0]; }else { $uno28_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno28_5q = mysqli_fetch_row($sql28_5);

if (!$uno28_5q[0] == '') { $uno28_5 = $uno28_5q[0]; }else { $uno28_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno28_6q = mysqli_fetch_row($sql28_6);

if (!$uno28_6q[0] == '') { $uno28_6 = $uno28_6q[0]; }else { $uno28_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno28_7q = mysqli_fetch_row($sql28_7);

if (!$uno28_7q[0] == '') { $uno28_7 = $uno28_7q[0]; }else { $uno28_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno28_8q = mysqli_fetch_row($sql28_8);

if (!$uno28_8q[0] == '') { $uno28_8 = $uno28_8q[0]; }else { $uno28_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno28_9q = mysqli_fetch_row($sql28_9);

if (!$uno28_9q[0] == '') { $uno28_9 = $uno28_9q[0]; }else { $uno28_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno28_10q = mysqli_fetch_row($sql28_10);

if (!$uno28_10q[0] == '') { $uno28_10 = $uno28_10q[0]; }else { $uno28_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno28_11q = mysqli_fetch_row($sql28_11);

if (!$uno28_11q[0] == '') { $uno28_11 = $uno28_11q[0]; }else { $uno28_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno28_12q = mysqli_fetch_row($sql28_12);

if (!$uno28_12q[0] == '') { $uno28_12 = $uno28_12q[0]; }else { $uno28_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno28_13q = mysqli_fetch_row($sql28_13);

if (!$uno28_13q[0] == '') { $uno28_13 = $uno28_13q[0]; }else { $uno28_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno28_14q = mysqli_fetch_row($sql28_14);

if (!$uno28_14q[0] == '') { $uno28_14 = $uno28_14q[0]; }else { $uno28_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno28_15q = mysqli_fetch_row($sql28_15);

if (!$uno28_15q[0] == '') { $uno28_15 = $uno28_15q[0]; }else { $uno28_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno28_16q = mysqli_fetch_row($sql28_16);

if (!$uno28_16q[0] == '') { $uno28_16 = $uno28_16q[0]; }else { $uno28_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno28_17q = mysqli_fetch_row($sql28_17);

if (!$uno28_17q[0] == '') { $uno28_17 = $uno28_17q[0]; }else { $uno28_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno28_18q = mysqli_fetch_row($sql28_18);

if (!$uno28_18q[0] == '') { $uno28_18 = $uno28_18q[0]; }else { $uno28_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno28_19q = mysqli_fetch_row($sql28_19);

if (!$uno28_19q[0] == '') { $uno28_19 = $uno28_19q[0]; }else { $uno28_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno28_20q = mysqli_fetch_row($sql28_20);

if (!$uno28_20q[0] == '') { $uno28_20 = $uno28_20q[0]; }else { $uno28_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno28_21q = mysqli_fetch_row($sql28_21);

if (!$uno28_21q[0] == '') { $uno28_21 = $uno28_21q[0]; }else { $uno28_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno28_22q = mysqli_fetch_row($sql28_22);

if (!$uno28_22q[0] == '') { $uno28_22 = $uno28_22q[0]; }else { $uno28_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno28_23q = mysqli_fetch_row($sql28_23);

if (!$uno28_23q[0] == '') { $uno28_23 = $uno28_23q[0]; }else { $uno28_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno28_24q = mysqli_fetch_row($sql28_24);

if (!$uno28_24q[0] == '') { $uno28_24 = $uno28_24q[0]; }else { $uno28_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno28_25q = mysqli_fetch_row($sql28_25);

if (!$uno28_25q[0] == '') { $uno28_25 = $uno28_25q[0]; }else { $uno28_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno28_26q = mysqli_fetch_row($sql28_26);

if (!$uno28_26q[0] == '') { $uno28_26 = $uno28_26q[0]; }else { $uno28_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno28_27q = mysqli_fetch_row($sql28_27);

if (!$uno28_27q[0] == '') { $uno28_27 = $uno28_27q[0]; }else { $uno28_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno28_28q = mysqli_fetch_row($sql28_28);

if (!$uno28_28q[0] == '') { $uno28_28 = $uno28_28q[0]; }else { $uno28_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno28_29q = mysqli_fetch_row($sql28_29);

if (!$uno28_29q[0] == '') { $uno28_29 = $uno28_29q[0]; }else { $uno28_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno28_30q = mysqli_fetch_row($sql28_30);

if (!$uno28_30q[0] == '') { $uno28_30 = $uno28_30q[0]; }else { $uno28_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql28_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'VESPERTINO' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno28_31q = mysqli_fetch_row($sql28_31);

if (!$uno28_31q[0] == '') { $uno28_31 = $uno28_31q[0]; }else { $uno28_31 = 0; }

$suma28 = $uno28_1 + $uno28_2 + $uno28_3 + $uno28_4 + $uno28_5 + $uno28_6 + $uno28_7 + $uno28_8 + $uno28_9 + $uno28_10 + $uno28_11 + $uno28_12 + $uno28_13 + $uno28_14 + $uno28_15 + $uno28_16 + $uno28_17 + $uno28_18 + $uno28_19 + $uno28_20 + $uno28_21 + $uno28_22 + $uno28_23 + $uno28_24 + $uno28_25 + $uno28_26 + $uno28_27 + $uno28_28 + $uno28_29 + $uno28_30 + $uno28_31;

$veintiocho = $uno28_1.';-}'.$uno28_2.';-}'.$uno28_3.';-}'.$uno28_4.';-}'.$uno28_5.';-}'.$uno28_6.';-}'.$uno28_7.';-}'.$uno28_8.';-}'.$uno28_9.';-}'.$uno28_10.';-}'.$uno28_11.';-}'.$uno28_12.';-}'.$uno28_13.';-}'.$uno28_14.';-}'.$uno28_15.';-}'.$uno28_16.';-}'.$uno28_17.';-}'.$uno28_18.';-}'.$uno28_19.';-}'.$uno28_20.';-}'.$uno28_21.';-}'.$uno28_22.';-}'.$uno28_23.';-}'.$uno28_24.';-}'.$uno28_25.';-}'.$uno28_26.';-}'.$uno28_27.';-}'.$uno28_28.';-}'.$uno28_29.';-}'.$uno28_30.';-}'.$uno28_31.';-}'.$suma28;

// 29
mysqli_select_db($horizonte, $database_horizonte);
$sql29_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno29_1q = mysqli_fetch_row($sql29_1);

if (!$uno29_1q[0] == '') { $uno29_1 = $uno29_1q[0]; }else { $uno29_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno29_2q = mysqli_fetch_row($sql29_2);

if (!$uno29_2q[0] == '') { $uno29_2 = $uno29_2q[0]; }else { $uno29_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno29_3q = mysqli_fetch_row($sql29_3);

if (!$uno29_3q[0] == '') { $uno29_3 = $uno29_3q[0]; }else { $uno29_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno29_4q = mysqli_fetch_row($sql29_4);

if (!$uno29_4q[0] == '') { $uno29_4 = $uno29_4q[0]; }else { $uno29_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno29_5q = mysqli_fetch_row($sql29_5);

if (!$uno29_5q[0] == '') { $uno29_5 = $uno29_5q[0]; }else { $uno29_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno29_6q = mysqli_fetch_row($sql29_6);

if (!$uno29_6q[0] == '') { $uno29_6 = $uno29_6q[0]; }else { $uno29_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno29_7q = mysqli_fetch_row($sql29_7);

if (!$uno29_7q[0] == '') { $uno29_7 = $uno29_7q[0]; }else { $uno29_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno29_8q = mysqli_fetch_row($sql29_8);

if (!$uno29_8q[0] == '') { $uno29_8 = $uno29_8q[0]; }else { $uno29_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno29_9q = mysqli_fetch_row($sql29_9);

if (!$uno29_9q[0] == '') { $uno29_9 = $uno29_9q[0]; }else { $uno29_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno29_10q = mysqli_fetch_row($sql29_10);

if (!$uno29_10q[0] == '') { $uno29_10 = $uno29_10q[0]; }else { $uno29_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno29_11q = mysqli_fetch_row($sql29_11);

if (!$uno29_11q[0] == '') { $uno29_11 = $uno29_11q[0]; }else { $uno29_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno29_12q = mysqli_fetch_row($sql29_12);

if (!$uno29_12q[0] == '') { $uno29_12 = $uno29_12q[0]; }else { $uno29_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno29_13q = mysqli_fetch_row($sql29_13);

if (!$uno29_13q[0] == '') { $uno29_13 = $uno29_13q[0]; }else { $uno29_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno29_14q = mysqli_fetch_row($sql29_14);

if (!$uno29_14q[0] == '') { $uno29_14 = $uno29_14q[0]; }else { $uno29_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno29_15q = mysqli_fetch_row($sql29_15);

if (!$uno29_15q[0] == '') { $uno29_15 = $uno29_15q[0]; }else { $uno29_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno29_16q = mysqli_fetch_row($sql29_16);

if (!$uno29_16q[0] == '') { $uno29_16 = $uno29_16q[0]; }else { $uno29_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno29_17q = mysqli_fetch_row($sql29_17);

if (!$uno29_17q[0] == '') { $uno29_17 = $uno29_17q[0]; }else { $uno29_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno29_18q = mysqli_fetch_row($sql29_18);

if (!$uno29_18q[0] == '') { $uno29_18 = $uno28_18q[0]; }else { $uno29_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno29_19q = mysqli_fetch_row($sql29_19);

if (!$uno29_19q[0] == '') { $uno29_19 = $uno29_19q[0]; }else { $uno29_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno29_20q = mysqli_fetch_row($sql29_20);

if (!$uno29_20q[0] == '') { $uno29_20 = $uno29_20q[0]; }else { $uno29_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno29_21q = mysqli_fetch_row($sql29_21);

if (!$uno29_21q[0] == '') { $uno29_21 = $uno29_21q[0]; }else { $uno29_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno29_22q = mysqli_fetch_row($sql29_22);

if (!$uno29_22q[0] == '') { $uno29_22 = $uno29_22q[0]; }else { $uno29_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno29_23q = mysqli_fetch_row($sql29_23);

if (!$uno29_23q[0] == '') { $uno29_23 = $uno29_23q[0]; }else { $uno29_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno29_24q = mysqli_fetch_row($sql29_24);

if (!$uno29_24q[0] == '') { $uno29_24 = $uno29_24q[0]; }else { $uno29_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno29_25q = mysqli_fetch_row($sql29_25);

if (!$uno29_25q[0] == '') { $uno29_25 = $uno29_25q[0]; }else { $uno29_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno29_26q = mysqli_fetch_row($sql29_26);

if (!$uno29_26q[0] == '') { $uno29_26 = $uno29_26q[0]; }else { $uno29_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno29_27q = mysqli_fetch_row($sql29_27);

if (!$uno29_27q[0] == '') { $uno29_27 = $uno29_27q[0]; }else { $uno29_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno29_28q = mysqli_fetch_row($sql29_28);

if (!$uno29_28q[0] == '') { $uno29_28 = $uno29_28q[0]; }else { $uno29_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno29_29q = mysqli_fetch_row($sql29_29);

if (!$uno29_29q[0] == '') { $uno29_29 = $uno29_29q[0]; }else { $uno29_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno29_30q = mysqli_fetch_row($sql29_30);

if (!$uno29_30q[0] == '') { $uno29_30 = $uno29_30q[0]; }else { $uno29_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql29_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'NOCTURNO' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno29_31q = mysqli_fetch_row($sql29_31);

if (!$uno29_31q[0] == '') { $uno29_31 = $uno29_31q[0]; }else { $uno29_31 = 0; }

$suma29 = $uno29_1 + $uno29_2 + $uno29_3 + $uno29_4 + $uno29_5 + $uno29_6 + $uno29_7 + $uno29_8 + $uno29_9 + $uno29_10 + $uno29_11 + $uno29_12 + $uno29_13 + $uno29_14 + $uno29_15 + $uno29_16 + $uno29_17 + $uno29_18 + $uno29_19 + $uno29_20 + $uno29_21 + $uno29_22 + $uno29_23 + $uno29_24 + $uno29_25 + $uno29_26 + $uno29_27 + $uno29_28 + $uno29_29 + $uno29_30 + $uno29_31;

$veintinueve = $uno29_1.';-}'.$uno29_2.';-}'.$uno29_3.';-}'.$uno29_4.';-}'.$uno29_5.';-}'.$uno29_6.';-}'.$uno29_7.';-}'.$uno29_8.';-}'.$uno29_9.';-}'.$uno29_10.';-}'.$uno29_11.';-}'.$uno29_12.';-}'.$uno29_13.';-}'.$uno29_14.';-}'.$uno29_15.';-}'.$uno29_16.';-}'.$uno29_17.';-}'.$uno29_18.';-}'.$uno29_19.';-}'.$uno29_20.';-}'.$uno29_21.';-}'.$uno29_22.';-}'.$uno29_23.';-}'.$uno29_24.';-}'.$uno29_25.';-}'.$uno29_26.';-}'.$uno29_27.';-}'.$uno29_28.';-}'.$uno29_29.';-}'.$uno29_30.';-}'.$uno29_31.';-}'.$suma29;

// 30
mysqli_select_db($horizonte, $database_horizonte);
$sql30_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno30_1q = mysqli_fetch_row($sql30_1);

if (!$uno30_1q[0] == '') { $uno30_1 = $uno30_1q[0]; }else { $uno30_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno30_2q = mysqli_fetch_row($sql30_2);

if (!$uno30_2q[0] == '') { $uno30_2 = $uno30_2q[0]; }else { $uno30_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno30_3q = mysqli_fetch_row($sql30_3);

if (!$uno30_3q[0] == '') { $uno30_3 = $uno30_3q[0]; }else { $uno30_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno30_4q = mysqli_fetch_row($sql30_4);

if (!$uno30_4q[0] == '') { $uno30_4 = $uno30_4q[0]; }else { $uno30_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno30_5q = mysqli_fetch_row($sql30_5);

if (!$uno30_5q[0] == '') { $uno30_5 = $uno30_5q[0]; }else { $uno30_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno30_6q = mysqli_fetch_row($sql30_6);

if (!$uno30_6q[0] == '') { $uno30_6 = $uno30_6q[0]; }else { $uno30_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno30_7q = mysqli_fetch_row($sql30_7);

if (!$uno30_7q[0] == '') { $uno30_7 = $uno30_7q[0]; }else { $uno30_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno30_8q = mysqli_fetch_row($sql30_8);

if (!$uno30_8q[0] == '') { $uno30_8 = $uno30_8q[0]; }else { $uno30_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno30_9q = mysqli_fetch_row($sql30_9);

if (!$uno30_9q[0] == '') { $uno30_9 = $uno30_9q[0]; }else { $uno30_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno30_10q = mysqli_fetch_row($sql30_10);

if (!$uno30_10q[0] == '') { $uno30_10 = $uno30_10q[0]; }else { $uno30_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno30_11q = mysqli_fetch_row($sql30_11);

if (!$uno30_11q[0] == '') { $uno30_11 = $uno30_11q[0]; }else { $uno30_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno30_12q = mysqli_fetch_row($sql30_12);

if (!$uno30_12q[0] == '') { $uno30_12 = $uno30_12q[0]; }else { $uno30_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno30_13q = mysqli_fetch_row($sql30_13);

if (!$uno30_13q[0] == '') { $uno30_13 = $uno30_13q[0]; }else { $uno30_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno30_14q = mysqli_fetch_row($sql30_14);

if (!$uno30_14q[0] == '') { $uno30_14 = $uno30_14q[0]; }else { $uno30_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno30_15q = mysqli_fetch_row($sql30_15);

if (!$uno30_15q[0] == '') { $uno30_15 = $uno30_15q[0]; }else { $uno30_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno30_16q = mysqli_fetch_row($sql30_16);

if (!$uno30_16q[0] == '') { $uno30_16 = $uno30_16q[0]; }else { $uno30_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno30_17q = mysqli_fetch_row($sql30_17);

if (!$uno30_17q[0] == '') { $uno30_17 = $uno30_17q[0]; }else { $uno30_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno30_18q = mysqli_fetch_row($sql30_18);

if (!$uno30_18q[0] == '') { $uno30_18 = $uno30_18q[0]; }else { $uno30_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno30_19q = mysqli_fetch_row($sql30_19);

if (!$uno30_19q[0] == '') { $uno30_19 = $uno30_19q[0]; }else { $uno30_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno30_20q = mysqli_fetch_row($sql30_20);

if (!$uno30_20q[0] == '') { $uno30_20 = $uno30_20q[0]; }else { $uno30_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno30_21q = mysqli_fetch_row($sql30_21);

if (!$uno30_21q[0] == '') { $uno30_21 = $uno30_21q[0]; }else { $uno30_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno30_22q = mysqli_fetch_row($sql30_22);

if (!$uno30_22q[0] == '') { $uno30_22 = $uno30_22q[0]; }else { $uno30_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno30_23q = mysqli_fetch_row($sql30_23);

if (!$uno30_23q[0] == '') { $uno30_23 = $uno30_23q[0]; }else { $uno30_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno30_24q = mysqli_fetch_row($sql30_24);

if (!$uno30_24q[0] == '') { $uno30_24 = $uno30_24q[0]; }else { $uno30_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno30_25q = mysqli_fetch_row($sql30_25);

if (!$uno30_25q[0] == '') { $uno30_25 = $uno30_25q[0]; }else { $uno30_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno30_26q = mysqli_fetch_row($sql30_26);

if (!$uno30_26q[0] == '') { $uno30_26 = $uno30_26q[0]; }else { $uno30_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno30_27q = mysqli_fetch_row($sql30_27);

if (!$uno30_27q[0] == '') { $uno30_27 = $uno30_27q[0]; }else { $uno30_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno30_28q = mysqli_fetch_row($sql30_28);

if (!$uno30_28q[0] == '') { $uno30_28 = $uno30_28q[0]; }else { $uno30_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno30_29q = mysqli_fetch_row($sql30_29);

if (!$uno30_29q[0] == '') { $uno30_29 = $uno30_29q[0]; }else { $uno30_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno30_30q = mysqli_fetch_row($sql30_30);

if (!$uno30_30q[0] == '') { $uno30_30 = $uno30_30q[0]; }else { $uno30_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql30_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'INGRESOS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno30_31q = mysqli_fetch_row($sql30_31);

if (!$uno30_31q[0] == '') { $uno30_31 = $uno30_31q[0]; }else { $uno30_31 = 0; }

$suma30 = $uno30_1 + $uno30_2 + $uno30_3 + $uno30_4 + $uno30_5 + $uno30_6 + $uno30_7 + $uno30_8 + $uno30_9 + $uno30_10 + $uno30_11 + $uno30_12 + $uno30_13 + $uno30_14 + $uno30_15 + $uno30_16 + $uno30_17 + $uno30_18 + $uno30_19 + $uno30_20 + $uno30_21 + $uno30_22 + $uno30_23 + $uno30_24 + $uno30_25 + $uno30_26 + $uno30_27 + $uno30_28 + $uno30_29 + $uno30_30 + $uno30_31;

$treinta = $uno30_1.';-}'.$uno30_2.';-}'.$uno30_3.';-}'.$uno30_4.';-}'.$uno30_5.';-}'.$uno30_6.';-}'.$uno30_7.';-}'.$uno30_8.';-}'.$uno30_9.';-}'.$uno30_10.';-}'.$uno30_11.';-}'.$uno30_12.';-}'.$uno30_13.';-}'.$uno30_14.';-}'.$uno30_15.';-}'.$uno30_16.';-}'.$uno30_17.';-}'.$uno30_18.';-}'.$uno30_19.';-}'.$uno30_20.';-}'.$uno30_21.';-}'.$uno30_22.';-}'.$uno30_23.';-}'.$uno30_24.';-}'.$uno30_25.';-}'.$uno30_26.';-}'.$uno30_27.';-}'.$uno30_28.';-}'.$uno30_29.';-}'.$uno30_30.';-}'.$uno30_31.';-}'.$suma30;

// 31
mysqli_select_db($horizonte, $database_horizonte);
$sql31_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno31_1q = mysqli_fetch_row($sql31_1);

if (!$uno31_1q[0] == '') { $uno31_1 = $uno31_1q[0]; }else { $uno31_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno31_2q = mysqli_fetch_row($sql31_2);

if (!$uno31_2q[0] == '') { $uno31_2 = $uno31_2q[0]; }else { $uno31_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno31_3q = mysqli_fetch_row($sql31_3);

if (!$uno31_3q[0] == '') { $uno31_3 = $uno31_3q[0]; }else { $uno31_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno31_4q = mysqli_fetch_row($sql31_4);

if (!$uno31_4q[0] == '') { $uno31_4 = $uno31_4q[0]; }else { $uno31_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno31_5q = mysqli_fetch_row($sql31_5);

if (!$uno31_5q[0] == '') { $uno31_5 = $uno31_5q[0]; }else { $uno31_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno31_6q = mysqli_fetch_row($sql31_6);

if (!$uno31_6q[0] == '') { $uno31_6 = $uno31_6q[0]; }else { $uno31_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno31_7q = mysqli_fetch_row($sql31_7);

if (!$uno31_7q[0] == '') { $uno31_7 = $uno31_7q[0]; }else { $uno31_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno31_8q = mysqli_fetch_row($sql31_8);

if (!$uno31_8q[0] == '') { $uno31_8 = $uno31_8q[0]; }else { $uno31_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno31_9q = mysqli_fetch_row($sql31_9);

if (!$uno31_9q[0] == '') { $uno31_9 = $uno31_9q[0]; }else { $uno31_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno31_10q = mysqli_fetch_row($sql31_10);

if (!$uno31_10q[0] == '') { $uno31_10 = $uno31_10q[0]; }else { $uno31_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno31_11q = mysqli_fetch_row($sql31_11);

if (!$uno31_11q[0] == '') { $uno31_11 = $uno31_11q[0]; }else { $uno31_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno31_12q = mysqli_fetch_row($sql31_12);

if (!$uno31_12q[0] == '') { $uno31_12 = $uno31_12q[0]; }else { $uno31_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno31_13q = mysqli_fetch_row($sql31_13);

if (!$uno31_13q[0] == '') { $uno31_13 = $uno31_13q[0]; }else { $uno31_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno31_14q = mysqli_fetch_row($sql31_14);

if (!$uno31_14q[0] == '') { $uno31_14 = $uno31_14q[0]; }else { $uno31_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno31_15q = mysqli_fetch_row($sql31_15);

if (!$uno31_15q[0] == '') { $uno31_15 = $uno31_15q[0]; }else { $uno31_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno31_16q = mysqli_fetch_row($sql31_16);

if (!$uno31_16q[0] == '') { $uno31_16 = $uno31_16q[0]; }else { $uno31_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno31_17q = mysqli_fetch_row($sql31_17);

if (!$uno31_17q[0] == '') { $uno31_17 = $uno31_17q[0]; }else { $uno31_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno31_18q = mysqli_fetch_row($sql31_18);

if (!$uno31_18q[0] == '') { $uno31_18 = $uno31_18q[0]; }else { $uno31_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno31_19q = mysqli_fetch_row($sql31_19);

if (!$uno31_19q[0] == '') { $uno31_19 = $uno31_19q[0]; }else { $uno31_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno31_20q = mysqli_fetch_row($sql31_20);

if (!$uno31_20q[0] == '') { $uno31_20 = $uno31_20q[0]; }else { $uno31_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno31_21q = mysqli_fetch_row($sql31_21);

if (!$uno31_21q[0] == '') { $uno31_21 = $uno31_21q[0]; }else { $uno31_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno31_22q = mysqli_fetch_row($sql31_22);

if (!$uno31_22q[0] == '') { $uno31_22 = $uno31_22q[0]; }else { $uno31_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno31_23q = mysqli_fetch_row($sql31_23);

if (!$uno31_23q[0] == '') { $uno31_23 = $uno31_23q[0]; }else { $uno31_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno31_24q = mysqli_fetch_row($sql31_24);

if (!$uno31_24q[0] == '') { $uno31_24 = $uno31_24q[0]; }else { $uno31_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno31_25q = mysqli_fetch_row($sql31_25);

if (!$uno31_25q[0] == '') { $uno31_25 = $uno31_25q[0]; }else { $uno31_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno31_26q = mysqli_fetch_row($sql31_26);

if (!$uno31_26q[0] == '') { $uno31_26 = $uno31_26q[0]; }else { $uno31_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno31_27q = mysqli_fetch_row($sql31_27);

if (!$uno31_27q[0] == '') { $uno31_27 = $uno31_27q[0]; }else { $uno31_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno31_28q = mysqli_fetch_row($sql31_28);

if (!$uno31_28q[0] == '') { $uno31_28 = $uno31_28q[0]; }else { $uno31_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno31_29q = mysqli_fetch_row($sql31_29);

if (!$uno31_29q[0] == '') { $uno31_29 = $uno31_29q[0]; }else { $uno31_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno31_30q = mysqli_fetch_row($sql31_30);

if (!$uno31_30q[0] == '') { $uno31_30 = $uno31_30q[0]; }else { $uno31_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql31_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'EGRESOS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno31_31q = mysqli_fetch_row($sql31_31);

if (!$uno31_31q[0] == '') { $uno31_31 = $uno31_31q[0]; }else { $uno31_31 = 0; }

$suma31 = $uno31_1 + $uno31_2 + $uno31_3 + $uno31_4 + $uno31_5 + $uno31_6 + $uno31_7 + $uno31_8 + $uno31_9 + $uno31_10 + $uno31_11 + $uno31_12 + $uno31_13 + $uno31_14 + $uno31_15 + $uno31_16 + $uno31_17 + $uno31_18 + $uno31_19 + $uno31_20 + $uno31_21 + $uno31_22 + $uno31_23 + $uno31_24 + $uno31_25 + $uno31_26 + $uno31_27 + $uno31_28 + $uno31_29 + $uno31_30 + $uno31_31;

$treintaiuno = $uno31_1.';-}'.$uno31_2.';-}'.$uno31_3.';-}'.$uno31_4.';-}'.$uno31_5.';-}'.$uno31_6.';-}'.$uno31_7.';-}'.$uno31_8.';-}'.$uno31_9.';-}'.$uno31_10.';-}'.$uno31_11.';-}'.$uno31_12.';-}'.$uno31_13.';-}'.$uno31_14.';-}'.$uno31_15.';-}'.$uno31_16.';-}'.$uno31_17.';-}'.$uno31_18.';-}'.$uno31_19.';-}'.$uno31_20.';-}'.$uno31_21.';-}'.$uno31_22.';-}'.$uno31_23.';-}'.$uno31_24.';-}'.$uno31_25.';-}'.$uno31_26.';-}'.$uno31_27.';-}'.$uno31_28.';-}'.$uno31_29.';-}'.$uno31_30.';-}'.$uno31_31.';-}'.$suma31;

// 32
mysqli_select_db($horizonte, $database_horizonte);
$sql32_1 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 1") or die (mysqli_error($horizonte));
$uno32_1q = mysqli_fetch_row($sql32_1);

if (!$uno32_1q[0] == '') { $uno32_1 = $uno32_1q[0]; }else { $uno32_1 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_2 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 2") or die (mysqli_error($horizonte));
$uno32_2q = mysqli_fetch_row($sql32_2);

if (!$uno32_2q[0] == '') { $uno32_2 = $uno32_2q[0]; }else { $uno32_2 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_3 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 3") or die (mysqli_error($horizonte));
$uno32_3q = mysqli_fetch_row($sql32_3);

if (!$uno32_3q[0] == '') { $uno32_3 = $uno32_3q[0]; }else { $uno32_3 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_4 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 4") or die (mysqli_error($horizonte));
$uno32_4q = mysqli_fetch_row($sql32_4);

if (!$uno32_4q[0] == '') { $uno32_4 = $uno32_4q[0]; }else { $uno32_4 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_5 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 5") or die (mysqli_error($horizonte));
$uno32_5q = mysqli_fetch_row($sql32_5);

if (!$uno32_5q[0] == '') { $uno32_5 = $uno32_5q[0]; }else { $uno32_5 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_6 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 6") or die (mysqli_error($horizonte));
$uno32_6q = mysqli_fetch_row($sql32_6);

if (!$uno32_6q[0] == '') { $uno32_6 = $uno32_6q[0]; }else { $uno32_6 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_7 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 7") or die (mysqli_error($horizonte));
$uno32_7q = mysqli_fetch_row($sql32_7);

if (!$uno32_7q[0] == '') { $uno32_7 = $uno32_7q[0]; }else { $uno32_7 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_8 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 8") or die (mysqli_error($horizonte));
$uno32_8q = mysqli_fetch_row($sql32_8);

if (!$uno32_8q[0] == '') { $uno32_8 = $uno32_8q[0]; }else { $uno32_8 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_9 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 9") or die (mysqli_error($horizonte));
$uno32_9q = mysqli_fetch_row($sql32_9);

if (!$uno32_9q[0] == '') { $uno32_9 = $uno32_9q[0]; }else { $uno32_9 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_10 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 10") or die (mysqli_error($horizonte));
$uno32_10q = mysqli_fetch_row($sql32_10);

if (!$uno32_10q[0] == '') { $uno32_10 = $uno32_10q[0]; }else { $uno32_10 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_11 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 11") or die (mysqli_error($horizonte));
$uno32_11q = mysqli_fetch_row($sql32_11);

if (!$uno32_11q[0] == '') { $uno32_11 = $uno32_11q[0]; }else { $uno32_11 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_12 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 12") or die (mysqli_error($horizonte));
$uno32_12q = mysqli_fetch_row($sql32_12);

if (!$uno32_12q[0] == '') { $uno32_12 = $uno32_12q[0]; }else { $uno32_12 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_13 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 13") or die (mysqli_error($horizonte));
$uno32_13q = mysqli_fetch_row($sql32_13);

if (!$uno32_13q[0] == '') { $uno32_13 = $uno32_13q[0]; }else { $uno32_13 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_14 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 14") or die (mysqli_error($horizonte));
$uno32_14q = mysqli_fetch_row($sql32_14);

if (!$uno32_14q[0] == '') { $uno32_14 = $uno32_14q[0]; }else { $uno32_14 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_15 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 15") or die (mysqli_error($horizonte));
$uno32_15q = mysqli_fetch_row($sql32_15);

if (!$uno32_15q[0] == '') { $uno32_15 = $uno32_15q[0]; }else { $uno32_15 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_16 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 16") or die (mysqli_error($horizonte));
$uno32_16q = mysqli_fetch_row($sql32_16);

if (!$uno32_16q[0] == '') { $uno32_16 = $uno32_16q[0]; }else { $uno32_16 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_17 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 17") or die (mysqli_error($horizonte));
$uno32_17q = mysqli_fetch_row($sql32_17);

if (!$uno32_17q[0] == '') { $uno32_17 = $uno32_17q[0]; }else { $uno32_17 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_18 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 18") or die (mysqli_error($horizonte));
$uno32_18q = mysqli_fetch_row($sql32_18);

if (!$uno32_18q[0] == '') { $uno32_18 = $uno32_18q[0]; }else { $uno32_18 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_19 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 19") or die (mysqli_error($horizonte));
$uno32_19q = mysqli_fetch_row($sql32_19);

if (!$uno32_19q[0] == '') { $uno32_19 = $uno32_19q[0]; }else { $uno32_19 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_20 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 20") or die (mysqli_error($horizonte));
$uno32_20q = mysqli_fetch_row($sql32_20);

if (!$uno32_20q[0] == '') { $uno32_20 = $uno32_20q[0]; }else { $uno32_20 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_21 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 21") or die (mysqli_error($horizonte));
$uno32_21q = mysqli_fetch_row($sql32_21);

if (!$uno32_21q[0] == '') { $uno32_21 = $uno32_21q[0]; }else { $uno32_21 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_22 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 22") or die (mysqli_error($horizonte));
$uno32_22q = mysqli_fetch_row($sql32_22);

if (!$uno32_22q[0] == '') { $uno32_22 = $uno32_22q[0]; }else { $uno32_22 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_23 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 23") or die (mysqli_error($horizonte));
$uno32_23q = mysqli_fetch_row($sql32_23);

if (!$uno32_23q[0] == '') { $uno32_23 = $uno32_23q[0]; }else { $uno32_23 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_24 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 24") or die (mysqli_error($horizonte));
$uno32_24q = mysqli_fetch_row($sql32_24);

if (!$uno32_24q[0] == '') { $uno32_24 = $uno32_24q[0]; }else { $uno32_24 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_25 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 25") or die (mysqli_error($horizonte));
$uno32_25q = mysqli_fetch_row($sql32_25);

if (!$uno32_25q[0] == '') { $uno32_25 = $uno32_25q[0]; }else { $uno32_25 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_26 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 26") or die (mysqli_error($horizonte));
$uno32_26q = mysqli_fetch_row($sql32_26);

if (!$uno32_26q[0] == '') { $uno32_26 = $uno32_26q[0]; }else { $uno32_26 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_27 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 27") or die (mysqli_error($horizonte));
$uno32_27q = mysqli_fetch_row($sql32_27);

if (!$uno32_27q[0] == '') { $uno32_27 = $uno32_27q[0]; }else { $uno32_27 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_28 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 28") or die (mysqli_error($horizonte));
$uno32_28q = mysqli_fetch_row($sql32_28);

if (!$uno32_28q[0] == '') { $uno32_28 = $uno32_28q[0]; }else { $uno32_28 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_29 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 29") or die (mysqli_error($horizonte));
$uno32_29q = mysqli_fetch_row($sql32_29);

if (!$uno32_29q[0] == '') { $uno32_29 = $uno32_29q[0]; }else { $uno32_29 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_30 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 30") or die (mysqli_error($horizonte));
$uno32_30q = mysqli_fetch_row($sql32_30);

if (!$uno32_30q[0] == '') { $uno32_30 = $uno32_30q[0]; }else { $uno32_30 = 0; }

mysqli_select_db($horizonte, $database_horizonte);
$sql32_31 = mysqli_query($horizonte, "SELECT valor_ird from indicador_rd where mesanio_ird = $date and indicador_ird = 'PREALTAS' and dia_ird = 31") or die (mysqli_error($horizonte));
$uno32_31q = mysqli_fetch_row($sql32_31);

if (!$uno32_31q[0] == '') { $uno32_31 = $uno32_31q[0]; }else { $uno32_31 = 0; }

$suma32 = $uno32_1 + $uno32_2 + $uno32_3 + $uno32_4 + $uno32_5 + $uno32_6 + $uno32_7 + $uno32_8 + $uno32_9 + $uno32_10 + $uno32_11 + $uno32_12 + $uno32_13 + $uno32_14 + $uno32_15 + $uno32_16 + $uno32_17 + $uno32_18 + $uno32_19 + $uno32_20 + $uno32_21 + $uno32_22 + $uno32_23 + $uno32_24 + $uno32_25 + $uno32_26 + $uno32_27 + $uno32_28 + $uno32_29 + $uno32_30 + $uno32_31;

$treintaidos = $uno32_1.';-}'.$uno32_2.';-}'.$uno32_3.';-}'.$uno32_4.';-}'.$uno32_5.';-}'.$uno32_6.';-}'.$uno32_7.';-}'.$uno32_8.';-}'.$uno32_9.';-}'.$uno32_10.';-}'.$uno32_11.';-}'.$uno32_12.';-}'.$uno32_13.';-}'.$uno32_14.';-}'.$uno32_15.';-}'.$uno32_16.';-}'.$uno32_17.';-}'.$uno32_18.';-}'.$uno32_19.';-}'.$uno32_20.';-}'.$uno32_21.';-}'.$uno32_22.';-}'.$uno32_23.';-}'.$uno32_24.';-}'.$uno32_25.';-}'.$uno32_26.';-}'.$uno32_27.';-}'.$uno32_28.';-}'.$uno32_29.';-}'.$uno32_30.';-}'.$uno32_31.';-}'.$suma32;

//Resultado
echo $uno.';-}'.$dos.';-}'.$tres.';-}'.$cuatro.';-}'.$cinco.';-}'.$seis.';-}'.$siete.';-}'.$ocho.';-}'.$nueve.';-}'.$diez.';-}'.$once.';-}'.$doce.';-}'.$trece.';-}'.$catorce.';-}'.$quince.';-}'.$dieciseis.';-}'.$diecisiete.';-}'.$dieciocho.';-}'.$diecinueve.';-}'.$veinte.';-}'.$veintiuno.';-}'.$veintidos.';-}'.$veintitres.';-}'.$veinticuatro.';-}'.$veinticinco.';-}'.$veintiseis.';-}'.$veintisiete.';-}'.$veintiocho.';-}'.$veintinueve.';-}'.$treinta.';-}'.$treintaiuno.';-}'.$treintaidos;

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>
