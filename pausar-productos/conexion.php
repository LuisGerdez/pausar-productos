<?php 

$server = "localhost";
$user = "root";
$pass = "";
$db = "faizkhan_toclick";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_errno) {
	die('Error de conexión: ' . $mysqli->connect_errno);
}

?>