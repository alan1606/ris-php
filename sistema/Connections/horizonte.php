<?php
date_default_timezone_set('Mexico/General');
# FileName="Connection_php_mysql.htm" # Type="MYSQL" # HTTP="true"
$hostname_horizonte = "localhost";
$database_horizonte = "radiology";
$username_horizonte = "root";
$password_horizonte = "Garbage1.0";
$horizonte = mysqli_connect($hostname_horizonte, $username_horizonte,$password_horizonte,$database_horizonte);
?>
