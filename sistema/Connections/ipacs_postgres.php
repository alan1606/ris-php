<?php
date_default_timezone_set('Mexico/General');
# FileName="Connection_php_mysql.htm" # Type="MYSQL" # HTTP="true"
$hostname_ipacs = "localhost";
$database_ipacs = "pacsdb";
$username_ipacs = "pacs";
$password_ipacs = "pacs";
// MySql
// $ipacs = mysqli_connect($hostname_ipacs, $username_ipacs, $password_ipacs,$database_ipacs);

// Conectando y seleccionado la base de datos POSTGRESQL
$ipacsp = pg_connect("host=".$hostname_ipacs." dbname=".$database_ipacs." user=".$username_ipacs." password=".$password_ipacs)
    // or die('No se ha podido conectar1: ' . pg_last_error());

// $ipacsp = pg_connect("host=192.168.1.59 dbname=pacsdb user=pacs password=pacs")
    or die('No se ha podido conectar1: ' . pg_last_error());
?>
