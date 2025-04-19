<?php


    include("../config/Conexion.php");
    $run = $_GET['run'];
    $sql = "delete from tablaxx where run='$run'";
    
    if ($res = $conexion->query($sql)) {
        HEADER("LOCATION:../index.php");
    } else {
        echo "resgistro no fue eliminado";
    }
?>
