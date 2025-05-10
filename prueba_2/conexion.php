<?php
$host = "localhost";        //nombre del servidor local
$usuario = "root";          //usuario mysql
$contrasena = "";           //clave del usuario mysql
$base_datos = "trabajo";    //nombre de la base de datos mysql

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error)
{
     //die Función que imprime un mensaje y termina la ejecución del script actual    
    //(equivalente a exit()).

    die("Error de conexión: " . $conexion->connect_error);  
}

// Configurar la codificación a UTF-8
// caracteres como ñ, á, é, ü, etc., podrían mostrarse incorrectamente.

$conexion->set_charset("utf8");
?>
