<?php
//esta función transforma a un formato adecuado los valores de los campos que se van a indertar en la DB, evitando inyección de código maligno
//require_once('../../Connections/horizonte.php');

function sqlValue($value, $type, $horizonte) {
	
  //require_once('Connections/horizonte.php');

  $value = get_magic_quotes_gpc() ? stripslashes($value) : $value;
  $value = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($horizonte, $value) : mysqli_escape_string($value, $horizonte);

  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  return $value;
}
?>