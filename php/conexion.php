<?php

// Establece la conexión a mysql
$conexion = mysqli_connect("localhost", "root", "", "baseeventos");
//$conexion = mysqli_connect("localhost", "user", "password", "database") or die("Error de Conexión " . mysqli_error($conexion));

//if (!$conexion)
//    die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
?>