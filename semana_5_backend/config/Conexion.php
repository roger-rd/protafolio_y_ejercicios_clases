<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "basesx";

// Crear conexión
$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
} else {
    echo "";
}

?>