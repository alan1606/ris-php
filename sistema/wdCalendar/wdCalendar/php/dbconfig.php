<?php
//require("../../../Connections/horizonte.php");
class DBConnection{
	function getConnection(){
	  //change to your database server/user name/password
		mysql_connect("localhost","root","garbage20") or
         die("Could not connect: " . mysqli_error($horizonte));
    //change to your database name
		mysql_select_db("sigma-nuevo") or 
		     die("Could not select database: " . mysqli_error($horizonte));
	}
}
?>